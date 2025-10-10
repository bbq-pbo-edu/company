<?php

function createTable(array $data, bool $includeHeader=false, string|null $method=null, int|null $updateId=null): string {
    $htmlString = "<table>";

    if ($includeHeader) {
        $htmlString .= createHeaderRow($data);
    }

    foreach ($data as $row) {
        foreach($row as $key => $value) {
            $htmlString .= createBodyRow($value, $method, $updateId);
        }
    }

    $htmlString .= "</table>";
    return $htmlString;
}

function createHeaderRow(array $data): string {
    $htmlString = "<tr>";
    foreach ($data as $key => $value) {
        $htmlString .= "<th>{$key}</th>";
    }
    $htmlString .= "</tr>";
    return $htmlString;
}

function createBodyRow(mixed $value, string|null $method=null, int|null $updateId=null): string {
    $htmlString = "<tr>";

    if ($method === 'update') {

    }

    $htmlString .= "</td>";
    return $htmlString;
}