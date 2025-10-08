<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../tokens/colors.css">
    <link rel="stylesheet" href="../button/button.css">
    <link rel="stylesheet" href="databaseTable.css">
    <title>Database Table Demo</title>
</head>
<body>
<div class="table">
<table class="table__table-content">
    <tr class="table-row__table-header">
        <th class="table-header__entry">ID</th>
        <th class="table-header__entry">Name</th>
        <th class="table-header__entry">Is Hiring?</th>
        <th class="table-header__entry">Work Mode</th>
        <th class="table-header__entry">Created At</th>
        <th class="table-header__entry">Last Updated</th>
    </tr>
<tr class="table-row__table-body" $isEntryUpdateHidden>
    <form class ="form__update-table" action='./processUpdate.php' method='POST'>
        <td $colorStyleTag>{$id}
            <input type='hidden' name='id' value='{$id}'>
        </td>
        <td $colorStyleTag>
            <input type='text' name='name' value='{$name}' required>
        </td>
        <td $colorStyleTag>
            <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
            <label for='is-hiring'>Is Hiring?</label>
        </td>
        <td>
            <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
            <label for='remote'>Remote</label>
            <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
            <label for='hybrid'>Hybrid</label>
            <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
            <label for='onsite'>Onsite</label>
        </td>
        <td $colorStyleTag>
            <input type='submit' value='submit'>
        </td>
        <td $colorStyleTag>
            <input type='submit' formaction='./processCancel.php' value='Cancel'>
        </td>
    </form>
</tr>
</table>
</div>
</body>
</html>
