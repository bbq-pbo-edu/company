<?php

function createDBConnection(string $host='localhost', string $user='phpstorm', $password='p@ssw0rt', $database='company'): PDO|null {
    try {
        return new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $user, $password);
    }
    catch (PDOException $e) {
        echo "Connection to database failed.<br>" . $e->getMessage() . "<br>";
        return null;
    }
}

function createEmployeesTable(array $data, array|false $ueberschriften = false, string $farbe_1 = '#f9fafb', string $farbe_2 = '#ccd4db'): string
{
    $htmlString = "<table>";

    if ($ueberschriften) {
        foreach ($ueberschriften as $ueberschrift => $value) {
            $htmlString .= "<th>$ueberschrift</th>";
        }
    }

    foreach ($data as $index => $dataSet) {
        $_GET['id'] = $_GET['id'] ?? 0;
        $_GET['fname'] = $_GET['fname'] ?? '';
        $_GET['lname'] = $_GET['lname'] ?? '';

        $id = $dataSet['id'];
        $fname = $dataSet['fname'];
        $lname = $dataSet['lname'];

        $htmlString .= "<tr>";

        $isEntryUpdateHidden = $id == $_GET['id'] && $_GET['process'] == 'update' ? '' : 'hidden';
        $isEntryHidden = $isEntryUpdateHidden == 'hidden' ? '' : 'hidden';

        $colorStyleTag = "style=\"background-color: " . ($index % 2 == 0 ? $farbe_1 : $farbe_2) . ";\"";

        foreach ($dataSet as $key => $value) {
            if ($key === 'ip') {
                $htmlString .= "<td $colorStyleTag $isEntryHidden><a href=\"http://$value\" target=\"_blank\">$value</a></td>";
            } else {
                $htmlString .= "<td $colorStyleTag $isEntryHidden>$value</td>";
            }
        }

        $htmlString .= "<td $colorStyleTag $isEntryHidden><a href=\"./processDelete.php?id={$id}\">Delete</a></td>";
        $htmlString .= "<td $colorStyleTag $isEntryHidden><a href=\"./index.php?id={$id}&process=update\">Update</a></td>";
        $htmlString .= "</tr>";

        $htmlString .= "<tr $isEntryUpdateHidden><form action='./processUpdate.php' method='POST'><td  $colorStyleTag >{$id}<input type='hidden' name='id' value='{$id}'></td><td $colorStyleTag><input type='text' name='fname' value='{$fname}' required></td><td><input type='text' name='lname' value='{$lname}' required><td $colorStyleTag><input type='submit' value='submit'></td><td $colorStyleTag><input type='submit' formaction='./processCancel.php' value='Cancel'></td></form></tr>";
    }

    $htmlString .= "</table>";

    return $htmlString;
}

function createDepartmentTable(array $data, array|false $ueberschriften = false, string $farbe_1 = '#f9fafb', string $farbe_2 = '#ccd4db'): string {
    $htmlString = "<table>";

    if ($ueberschriften) {
        foreach ($ueberschriften as $ueberschrift => $value) {
            $htmlString .= "<th>$ueberschrift</th>";
        }
    }

    foreach ($data as $index => $dataSet) {
        $_GET['id'] = $_GET['id'] ?? 0;
        $_GET['name'] = $_GET['name'] ?? '';

        $process = $_GET['process'] ?? '';
        $id = $dataSet['id'];
        $name = $dataSet['name'];
        $isHiring = $dataSet['is_hiring'];
        $workMode = $dataSet['work_mode'];
        $createdAt = $dataSet['created_at'];
        $lastUpdated = $dataSet['last_updated'];

        $htmlString .= "<tr>";


        $isEntryUpdateHidden = $id == $_GET['id'] && $process == 'update' ? '' : 'hidden';
        $isEntryHidden = $isEntryUpdateHidden == 'hidden' ? '' : 'hidden';

        $isHiringChecked = $process == 'update' && $isHiring != 0 ? 'checked' : '';
        $isRemoteChecked = $process == 'update' && $workMode == 'remote' ? 'checked' : '';
        $isHybridChecked = $process == 'update' && $workMode == 'hybrid' ? 'checked' : '';
        $isOnsiteChecked = $process == 'update' && $workMode == 'onsite' ? 'checked' : '';

        $colorStyleTag = "style=\"background-color: " . ($index % 2 == 0 ? $farbe_1 : $farbe_2) . ";\"";

        foreach ($dataSet as $key => $value) {
            $htmlString .= "<td $colorStyleTag $isEntryHidden>$value</td>";
        }

        $htmlString .= "<td $colorStyleTag $isEntryHidden><a href=\"./processDelete.php?id={$id}\">Delete</a></td>";
        $htmlString .= "<td $colorStyleTag $isEntryHidden><a href=\"./index.php?id={$id}&process=update\">Update</a></td>";
        $htmlString .= "</tr>";

        $htmlString .= "<tr $isEntryUpdateHidden><form action='./processUpdate.php' method='POST'><td  $colorStyleTag>{$id}<input type='hidden' name='id' value='{$id}'></td><td $colorStyleTag><input type='text' name='name' value='{$name}' required></td><td $colorStyleTag><input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked><label for='is-hiring'>Is Hiring?</label></td><td><input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked><label for='remote'>Remote</label><input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked><label for='hybrid'>Hybrid</label><input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked><label for='onsite'>Onsite</label></td><td $colorStyleTag>$createdAt</td><td $colorStyleTag>$lastUpdated</td><td $colorStyleTag><input type='submit' value='submit'></td><td $colorStyleTag><input type='submit' formaction='./processCancel.php' value='Cancel'></td></form></tr>";
    }

    $htmlString .= "</table>";

    return $htmlString;
}

function displayTable(PDO $dbConnection, string $tableName): string {
    $stmt = $dbConnection->prepare("SELECT * FROM {$tableName}");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $tableName == 'employees' ? createEmployeesTable($data, $data[0]) : createDepartmentTable($data, $data[0]);
}