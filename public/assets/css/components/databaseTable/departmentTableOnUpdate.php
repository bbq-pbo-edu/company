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
    <title>Database Table Demo</title>
</head>
<body>
<div class="table">
    <table class="table__content">
        <tr class="table__header">
            <th class="table-header__entry">Name</th>
            <th class="table-header__entry">Is Hiring?</th>
            <th class="table-header__entry">Work Mode</th>
            <th class="table-header__entry">Created At</th>
            <th class="table-header__entry">Last Updated</th>
            <th class="table-header__entry">Action</th>
        </tr>
        <tbody class="table__body">
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>

        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <button class="button button--confirm" type="submit" name="btn-confirm">
                         <span class="button__content">
                            <svg width="24" height="24" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" class="button__icon" preserveAspectRatio="xMidYMid meet">
                                <circle cx="24" cy="24" r="20" fill="transparent" stroke="#FFF" stroke-width="2"/>
                            </svg>
                         </span>
                    </button>

                    <button class="button button--cancel" type='submit' formaction='./processCancel.php' name="btn-cancel">
                        <span class="button__content">
                            <svg width="24" height="24" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" class="button__icon" preserveAspectRatio="xMidYMid meet">
                                <circle cx="24" cy="24" r="20" fill="transparent" stroke="#FFF" stroke-width="2"/>
                            </svg>
                         </span>
                    </button>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        <tr class="table__row" $isEntryUpdateHidden>
            <form class="form__update-table" action='./processUpdate.php' method='POST'>
                <td $colorStyleTag>
                    <div class="text-input">
                        <input type='text' name='name' value='{$name}' required>
                    </div>
                </td>
                <td $colorStyleTag>
                    <input type='checkbox' id='is-hiring' name='is-hiring' $isHiringChecked>
                </td>
                <td>
                    <input type='radio' id='remote' name='work-mode' value='remote' $isRemoteChecked>
                    <label for='remote'>Remote</label>
                    <input type='radio' id='hybrid' name='work-mode' value='hybrid' $isHybridChecked>
                    <label for='hybrid'>Hybrid</label>
                    <input type='radio' id='onsite' name='work-mode' value='onsite' $isOnsiteChecked>
                    <label for='onsite'>Onsite</label>
                </td>
                <td $colorStyleTag>$createdAt</td>
                <td $colorStyleTag>$lastUpdated</td>
                <td $colorStyleTag>
                    <input type='submit' value='submit'>
                    <input type='submit' formaction='./processCancel.php' value='Cancel'>
                </td>
            </form>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
