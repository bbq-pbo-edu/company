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
function createTable(array $records, bool $withHeader=false, string $mode='view', int|null $editingRecordId=null): string {
    $htmlString = "<table>";

    if ($withHeader) {
        $htmlString .= createHeaderRow($records);
    }

    foreach ($records as $record) {
        if ($mode === 'edit' && $editingRecordId === $record['id']) {
            $htmlString .= createEditableRow($record);
        }
        else {
            $htmlString .= createRecordRow($record);
        }
    }

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
    $htmlString = "<tr>";
    foreach ($records[0] as $headerName => $_) {
        $headerName = formatHeaderName($headerName);
        $htmlString .= "<th>{$headerName}</th>";
    }
    $htmlString .= "<th>Action</th>";
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
function createRecordRow(array $record): string {
    $htmlString = "<tr>";
    foreach ($record as $fieldName => $fieldValue) {
        $inputType = determineInputType($fieldName);
        if ($inputType === 'checkbox') {
            $fieldValue = $fieldValue === 1 ? 'Yes' : 'No';
        }
        $htmlString .= "<td>{$fieldValue}</td>";
    }

    $htmlString .= "<td>
                        <button type='submit' name='edit' value='{$record['id']}'>Edit</button>
                        <button type='submit' name='delete' value='{$record['id']}'>Delete</button>
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
function createEditableRow(array $record): string {
    $htmlString = "<tr>";
    foreach ($record as $fieldName => $fieldValue) {
        $inputType = determineInputType($fieldName);

        if (empty($inputType)) {
            $htmlString .= "<td>{$fieldValue}</td>";
        }
        else if ($inputType === 'checkbox') {
            $checkedAttribute = $fieldValue == 1 ? 'checked' : '';
            $htmlString .= "<td>
                                <input type='{$inputType}' name='$fieldName' value='{$fieldValue}' {$checkedAttribute}>
                            </td>";
        }
        else if ($inputType === 'radio') {
            $htmlString .= createRadioGroup($fieldName, $fieldValue);
        }
        else {
            $htmlString .= "<td>
                            <input type='{$inputType}' name='{$fieldName}' value='{$fieldValue}'>
                        </td>";
        }
    }

    $htmlString .= "<td>
                        <button type='submit' name='save_edit' value='{$record['id']}'>Save</button>
                        <button type='submit' name='cancel_edit' value='{$record['id']}'>Cancel</button>
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
    $htmlString = '<td>';
    $choices = match ($fieldName) {
        'work_mode' => ['remote', 'hybrid', 'onsite']
    };
    foreach ($choices as $choice) {
        $checkedAttribute = $fieldValue === $choice ? 'checked' : '';
        $htmlString .= "<label for='{$choice}'>{$choice}</label>
                        <input type='radio' name='{$fieldName}' value='{$choice}' id='{$choice}' $checkedAttribute>";
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

echo createTable($test, withHeader: true, mode: 'edit', editingRecordId: 1);