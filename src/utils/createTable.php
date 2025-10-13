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
function createTable(array $records, string $tableName, bool $withHeader=false, bool $editable=false, string $mode='read', int|null $editingRecordId=null): string {
    $htmlString = "<table class='table__content'>";

    if ($withHeader) {
        $htmlString .= createHeaderRow($records);
    }

    $htmlString .= "<tbody class='table__body'>";

    foreach ($records as $record) {
        if ($mode === 'edit' && $editingRecordId === $record['id']) {
            $htmlString .= createEditModeRow($record, $tableName);
        }
        else {
            $htmlString .= createRecordRow($record, $tableName, $editable);
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
function createRecordRow(array $record, string $tableName, bool $editable): string {
    $htmlString = "<tr class='table__row'>";
    foreach ($record as $fieldName => $fieldValue) {
        $inputType = determineInputType($fieldName);

        if (str_contains($fieldName, 'name')) {
            $fieldValue = "<div class='field__value--name'>{$fieldValue}</div>";
        }

        if ($inputType === 'checkbox') {
            $fieldValue = $fieldValue === 1 ? "<div class='field__value--bool true'><span class='field__value--bool true icon'><svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 0 24 24' width='24'><path d='M0 0h24v24H0z' fill='none'/><path d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z'/></svg></span><span class='field__value--bool true text'>Yes</span></div>" : "<div class='field__value--bool false'><span class='field__value--bool false icon'><svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 0 24 24' width='24'><path d='M0 0h24v24H0z' fill='none'/><path d='M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z'/></svg></span><span class='field__value--bool false text'>No</span></div>";
        }

        if ($fieldValue === 'remote') {
            $fieldValue = "<div class='field__value--work-mode remote'><span class='field__value--work-mode remote icon'><svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px'><path d='M400-510ZM80-160v-480l320-240 270 201q-28 1-54 6t-51 15L400-780 160-600v360h224q9 22 21.5 42t26.5 38H80Zm416-16q-35-38-55.5-85.5T420-360q0-109 76-184.5T680-620q109 0 184.5 75.5T940-360q0 51-19 98.5T865-177l-43-43q29-29 43.5-65t14.5-75q0-84-58-142t-142-58q-83 0-141.5 58T480-360q0 39 15.5 75.5T539-219l-43 43Zm71-71q-22-23-34.5-52T520-360q0-67 47-113.5T680-520q67 0 113.5 46.5T840-360q0 31-11.5 60T794-248l-43-42q14-14 21.5-32t7.5-38q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 20 8 38t22 32l-43 43Zm83 127v-200q-9-8-14.5-18.5T630-360q0-21 15-35.5t35-14.5q21 0 35.5 14.5T730-360q0 11-4.5 22T710-320v200h-60Z'/></svg></span><span class='field__value--work-mode remote text'>remote</span></div>";
        }
        if ($fieldValue === 'hybrid') {
            $fieldValue = "<div class='field__value--work-mode hybrid'><span class='field__value--work-mode hybrid icon'><svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px'><path d='M680-600h80v-80h-80v80Zm0 160h80v-80h-80v80Zm0 160h80v-80h-80v80Zm0 160v-80h160v-560H480v56l-80-58v-78h520v720H680Zm-640 0v-400l280-200 280 200v400H360v-200h-80v200H40Zm80-80h80v-200h240v200h80v-280L320-622 120-480v280Zm560-360ZM440-200v-200H200v200-200h240v200Z'/></svg></span><span class='field__value--work-mode hybrid text'>hybrid</span></div>";
        }
        if ($fieldValue === 'onsite') {
            $fieldValue = "<div class='field__value--work-mode onsite'><span class='field__value--work-mode onsite icon'><svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px'><path d='M120-120v-560h160v-160h400v320h160v400H520v-160h-80v160H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z'/></svg></span><span class='field__value--work-mode onsite text'>onsite</span></div>";
        }

        if ($fieldName === 'created_at' || $fieldName === 'last_updated') {
            $fieldValue = str_replace(' ', '<br>', $fieldValue);
            $fieldValue = "<span class='field__value--timestamp'>{$fieldValue}</span>";
        }
        $htmlString .= "<td class='table__field'>{$fieldValue}</td>";
    }

    if ($editable) {
        $htmlString .= "<td class='table__field table--actions'>
                            <a href='/{$tableName}/edit/{$record['id']}'>
                                <button class='button button-edit' type='submit'>Edit</button>
                            </a>
                            <a href='/{$tableName}/delete/{$record['id']}'>
                                <button class='button button-delete' type='submit'>Delete</button>
                            </a>
                        </td>";
    }
    else {
        $htmlString .= "<td class='table__field table--actions'>
                            <a href='/{$tableName}/read/{$record['id']}'>
                                <button class='button button-view-details' type='submit'>Details</button>
                            </a>
                        </td>";
    }

    $htmlString .= "</tr>";
    return $htmlString;
}

/**
 * Renders a table row in edit mode with form inputs for each editable field.
 *
 * @param array $record  Associative array of fieldName => fieldValue for a single row.
 * @return string        HTML string for the editable table row.
 */
function createEditModeRow(array $record, string $tableName): string {
    $htmlString = "<form method='POST' action='/{$tableName}/update/{$record['id']}'>";
    $htmlString .= "<tr class='table__row row-editable'>";
    $autofocus = 'autofocus';
    foreach ($record as $fieldName => $fieldValue) {
        $inputType = determineInputType($fieldName);

        if ($fieldName === 'created_at' || $fieldName === 'last_updated') {
            $fieldValue = str_replace(' ', '<br>', $fieldValue);
        }

        if (empty($inputType)) {
            $htmlString .= "<td class='table__field'>{$fieldValue}</td>";
        }
        else if ($inputType === 'checkbox') {
            $checkedAttribute = $fieldValue == 1 ? 'checked' : '';
            $htmlString .= "<td class='table__field'>
                                <label class='checkbox__content' for='{$fieldName}'>
                                    <input type='hidden' name='{$fieldName}' value='0'>
                                    <input type='{$inputType}' id='{$fieldName}' name='$fieldName' value='1' {$checkedAttribute}>
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
                                <input type='{$inputType}' id='{$fieldName}' name='{$fieldName}' value='{$fieldValue}' {$autofocus}>
                            </label>
                        </td>";
            $autofocus = '';
        }
    }

    $htmlString .= "<td class='table__field table--actions'>
                        <button class='button button--confirm' type='submit'>Save</button>
                        
                        <a href='/{$tableName}/read/{$record['id']}'>
                            <button class='button button--cancel' type='button'>Cancel</button>
                        </a>
                    </td>";

    $htmlString .= "</tr>";
    $htmlString .= "</form>";
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
//
//$test = [
//    0 => [
//        "id" => 1,
//        "name" => "Inhumane Resources",
//        "is_hiring" => 1,
//        "work_mode" => "onsite",
//        "created_at" => "2025-10-08 21:50:24",
//        "last_updated" => "2025-10-08 21:50:24"
//    ],
//
//    1 => [
//        "id" => 2,
//        "name" => "Support",
//        "is_hiring" => 0,
//        "work_mode" => "remote",
//        "created_at" => "2025-10-08 21:50:24",
//        "last_updated" => "2025-10-08 21:50:24"
//    ]
//];
//
//$test2 = [
//    0 => [
//        "id" => 1,
//        "first_name" => "John",
//        "last_name" => "Doe",
//        "created_at" => "2025-10-08 21:50:24",
//        "last_updated" => "2025-10-08 21:50:24"
//    ],
//
//    1 => [
//        "id" => 2,
//        "first_name" => "Jane",
//        "last_name" => "Doe",
//        "created_at" => "2025-10-08 21:50:24",
//        "last_updated" => "2025-10-08 21:50:24"
//    ]
//];
//
//echo createTable($test2, 'employee', withHeader: true, mode: 'edit', editingRecordId: 1);
//
//?>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <link rel="stylesheet" href="./assets/css/tokens/colors.css">-->
<!--    <link rel="stylesheet" href="./assets/css/components/button/button.css">-->
<!--    <link rel="stylesheet" href="./assets/css/components/databaseTable/departmentTableOnUpdate.css">-->
<!--    <link rel="stylesheet" href="./assets/css/components/text-input/text-input.css">-->
<!--    <link rel="stylesheet" href="./assets/css/components/checkbox/checkbox.css">-->
<!--    <link rel="stylesheet" href="./assets/css/components/radiobutton/radiobutton.css">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--</body>-->
<!--</html>-->
