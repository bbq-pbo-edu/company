<?php

/**
 * Generates an HTML table from an array of records.
 *
 * @param array    $records          Array of associative arrays representing table rows.
 * @param bool     $withHeader       Whether to include a header row based on the first record's keys.
 * @param string   $mode             Rendering mode: 'view' or 'edit'.
 * @param int|null $editingRecordId  ID of the record currently being edited (only applies in 'edit' mode).
 * @return string                    HTML string for the complete table.
 */
function createTable(array $records, string $tableName, bool $withHeader=false, string $mode='view', int|null $editingRecordId=null): string {
    $htmlString = "<table class='table__content'>";

    if ($withHeader) {
        $htmlString .= createHeaderRow($records);
    }

    $htmlString .= "<tbody class='table__body'>";

    foreach ($records as $record) {
        if ($mode === 'edit' && $editingRecordId === $record['id']) {
            $htmlString .= createEditableRow($record, $tableName);
        }
        else {
            $htmlString .= createRecordRow($record, $tableName);
        }
    }

    $htmlString .= "</tbody>";

    $htmlString .= "</table>";
    return $htmlString;
}

/**
 * Creates the header row (&lt;tr&gt;&lt;th&gt;...) for a table using the keys of the first record.
 *
 * @param array $records  Array of records; uses the first element to determine column names.
 * @return string         HTML string for the table header row.
 */
function createHeaderRow(array $records): string {
    $htmlString = "<tr class='table__header'>";
    foreach ($records[0] as $headerName => $_) {
        $headerName = formatHeaderName($headerName);
        $htmlString .= "<th class='table-header__entry'>{$headerName}</th>";
    }
    $htmlString .= "<th class='table-header__entry'>Action</th>";
    $htmlString .= "</tr>";
    return $htmlString;
}

/**
 * Formats a snake_case header name into a human-readable label.
 *
 * @param string $headerName  The underscore-separated field name.
 * @return string             The formatted header (words capitalized and separated by spaces).
 */
function formatHeaderName(string $headerName): string {
    $parts = explode('_', $headerName);
    $partsUppercase = [];
    foreach ($parts as $part) {
        $partsUppercase[] = ucfirst($part);
    }
    return implode(' ', $partsUppercase);
}

/**
 * Renders a table row in read-only mode, converting certain field types as needed.
 *
 * @param array $record  Associative array of fieldName => fieldValue for a single row.
 * @return string        HTML string for the table row.
 */
function createRecordRow(array $record, string $tableName): string {
    $htmlString = "<tr class='table__row'>";
    foreach ($record as $fieldName => $fieldValue) {
        $inputType = determineInputType($fieldName);
        if ($inputType === 'checkbox') {
            $fieldValue = $fieldValue === 1 ? 'Yes' : 'No';
        }
        $htmlString .= "<td class='table__field'>{$fieldValue}</td>";
    }

    $htmlString .= "<td class='table__field table--actions'>
                        <a href='/{$tableName}/edit/{$record['id']}'>
                            <button class='button button-edit' type='submit' name='edit'>Edit</button>
                        </a>
                        <a href='/delete/{$record['id']}'>
                            <button class='button button-delete' type='submit' name='delete'>Delete</button>
                        </a>
                    </td>";

    $htmlString .= "</tr>";
    return $htmlString;
}

/**
 * Renders a table row in edit mode with form inputs for each editable field.
 *
 * @param array $record  Associative array of fieldName => fieldValue for a single row.
 * @return string        HTML string for the editable table row.
 */
function createEditableRow(array $record, string $tableName): string {
    $htmlString = "<tr class='table__row row-editable'>";
    foreach ($record as $fieldName => $fieldValue) {
        $inputType = determineInputType($fieldName);

        if (empty($inputType)) {
            $htmlString .= "<td class='table__field'>{$fieldValue}</td>";
        }
        else if ($inputType === 'checkbox') {
            $checkedAttribute = $fieldValue == 1 ? 'checked' : '';
            $htmlString .= "<td class='table__field'>
                                <label class='checkbox__content' for='{$fieldName}'>
                                    <input type='{$inputType}' id='{$fieldName}' name='$fieldName' value='{$fieldValue}' {$checkedAttribute}>
                                    <span class='checkbox__checkmark'></span>
                                </label>
                            </td>";
        }
        else if ($inputType === 'radio') {
            $htmlString .= createRadioGroup($fieldName, $fieldValue);
        }
        else if ($inputType === 'text') {
            $htmlString .= "<td class='table__field'>
                            <label class='text-input__content' for='{$fieldName}'>
                                <input type='{$inputType}' id='{$fieldName}' name='{$fieldName}' value='{$fieldValue}'>
                        </td>";
        }
    }

    $htmlString .= "<td class='table__field table--actions'>
                        <a href='/{$tableName}/update/{$record['id']}'>
                            <button class='button button--confirm' type='submit' name='save_edit'>Save</button>
                        </a>
                        <a href='/{$tableName}/read/{$record['id']}'>
                            <button class='button button--cancel' type='submit' name='cancel_edit'>Cancel</button>
                        </a>
                    </td>";

    return $htmlString;
}

/**
 * Generates a set of radio inputs for a given field based on predefined choices.
 *
 * @param string       $fieldName   The name attribute for the radio inputs.
 * @param mixed        $fieldValue  The currently selected value.
 * @return string                   HTML string for the radio input group.
 */
function createRadioGroup(string $fieldName, mixed $fieldValue): string {
    $htmlString = '<td class="table__field">';
    $choices = match ($fieldName) {
        'work_mode' => ['remote', 'hybrid', 'onsite']
    };
    foreach ($choices as $choice) {
        $checkedAttribute = $fieldValue === $choice ? 'checked' : '';
        $htmlString .= "<label class='radiobutton__content' for='{$choice}'>{$choice}
                            <input type='radio' name='{$fieldName}' value='{$choice}' id='{$choice}' $checkedAttribute>
                            <span class='radiobutton__checkmark'></span>
                        </label>";
    }
    $htmlString .= "</td>";
    return $htmlString;
}

/**
 * Determines the appropriate HTML input type for a given field name.
 *
 * @param string $fieldName  The field name to evaluate.
 * @return string            The input type ('text', 'checkbox', 'radio') or empty for non-editable.
 */
function determineInputType(string $fieldName): string {
    return match ($fieldName) {
        'first_name', 'last_name', 'name' => 'text',
        'is_hiring' => 'checkbox',
        'work_mode' => 'radio',

        default => ''
    };
}

$test = [
    0 => [
        "id" => 1,
        "name" => "Inhumane Resources",
        "is_hiring" => 1,
        "work_mode" => "onsite",
        "created_at" => "2025-10-08 21:50:24",
        "last_updated" => "2025-10-08 21:50:24"
    ],

    1 => [
        "id" => 2,
        "name" => "Support",
        "is_hiring" => 0,
        "work_mode" => "remote",
        "created_at" => "2025-10-08 21:50:24",
        "last_updated" => "2025-10-08 21:50:24"
    ]
];

$test2 = [
    0 => [
        "id" => 1,
        "first_name" => "John",
        "last_name" => "Doe",
        "created_at" => "2025-10-08 21:50:24",
        "last_updated" => "2025-10-08 21:50:24"
    ],

    1 => [
        "id" => 2,
        "first_name" => "Jane",
        "last_name" => "Doe",
        "created_at" => "2025-10-08 21:50:24",
        "last_updated" => "2025-10-08 21:50:24"
    ]
];

echo createTable($test2, 'employee', withHeader: true, mode: 'edit', editingRecordId: 1);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/tokens/colors.css">
    <link rel="stylesheet" href="./assets/css/components/button/button.css">
    <link rel="stylesheet" href="./assets/css/components/databaseTable/departmentTableOnUpdate.css">
    <link rel="stylesheet" href="./assets/css/components/text-input/text-input.css">
    <link rel="stylesheet" href="./assets/css/components/checkbox/checkbox.css">
    <link rel="stylesheet" href="./assets/css/components/radiobutton/radiobutton.css">
    <title>Document</title>
</head>
<body>

</body>
</html>
