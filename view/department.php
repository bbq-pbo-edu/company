<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/tokens/colors.css">
    <link rel="stylesheet" href="../../assets/css/components/navbar/navbar.css">
    <link rel="stylesheet" href="../../assets/css/components/card/card.css">
    <link rel="stylesheet" href="../../assets/css/components/modals/add-department-modal.css">
    <link rel="stylesheet" href="../../assets/css/components/button/button.css">
    <link rel="stylesheet" href="../../assets/css/components/card--prompt-2-btn/card--prompt-2-btn.css">
    <link rel="stylesheet" href="../../assets/css/components/text-input/text-input.css">
    <link rel="stylesheet" href="../../assets/css/components/checkbox/checkbox.css">
    <link rel="stylesheet" href="../../assets/css/components/radiobutton/radiobutton.css">
    <link rel="stylesheet" href="../../assets/css/components/databaseTable/table.css">
    <link rel="stylesheet" href="../../assets/css/layout/department.css">
    <title>Departments View</title>
</head>
<body>
<div class="main-grid">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar__content">
            <div class="navbar__brand-icon">
                <svg class="navbar__icon" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                    <path d="M9.4 16.6 4.8 12l4.6-4.6L8 6l-6 6 6 6zm5.2 0 4.6-4.6-4.6-4.6L16 6l6 6-6 6z" fill="#FFF" stroke="transparent" stroke-width="0"></path>
                </svg>
            </div>
            <div class="navbar__links">
                <ul class="navbar__list">
                    <li class="navbar__item">
                        <a class="navbar__link" href="#">
                            <svg class="navbar__icon" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" fill="#FFF" stroke="transparent" stroke-width="0"></path>
                            </svg>
                            <span class="navbar__text">Home</span>
                        </a>
                    </li>
                    <li class="navbar__item navbar__item_selected">
                        <a class=navbar__link href="#">
                            <svg class="navbar__icon" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                                <path d="M2 20h20v-4H2zm2-3h2v2H4zM2 4v4h20V4zm4 3H4V5h2zm-4 7h20v-4H2zm2-3h2v2H4z" fill="#FFF" stroke="transparent" stroke-width="0"></path>
                            </svg>
                            <span class="navbar__text">Database</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar__profile-icon">
                <svg class="navbar__icon" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4m0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4" fill="#FFF" stroke="transparent" stroke-width="0"></path>
                </svg>
            </div>
        </div>
    </nav>
    <main class="app">
        <div class="app__content">
            <!-- App Header Section -->
            <header class="app__header">
                <div class="app__icon">
                    <svg class="app__icon_content" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                        <path d="M12 7V3H2v18h20V7zM6 19H4v-2h2zm0-4H4v-2h2zm0-4H4V9h2zm0-4H4V5h2zm4 12H8v-2h2zm0-4H8v-2h2zm0-4H8V9h2zm0-4H8V5h2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8zm-2-8h-2v2h2zm0 4h-2v2h2z" fill="#FFF" stroke="transparent" stroke-width="0"></path>
                    </svg>
                </div>
                <div class="app__title_container">
                    <h1 class="app__title">Departments View</h1>
                    <p class="app__subtitle">View and edit department data below.</p>
                </div>
            </header>
            <div class="app__body">
                <!-- Add New Department Dialog Modal -->
                <dialog id="modal" >
                    <div class="card">
                        <div class="card__content">
                            <div class="card__header">
                                <h2 class="card__title">Add New Department</h2>
                            </div>
                            <div class="card__body">
                                <form class="add-department-form" method="POST" action="/department/create">
                                    <label class='text-input__content' for='add-form__name'>Department Name
                                        <input type="text" name="name" id="add-form__name" required>
                                    </label>
                                    <label class='checkbox__content' for='add-form__is_hiring'>Is Hiring
                                        <input type='hidden' name='is_hiring' value='0'>
                                        <input type='checkbox' id='add-form__is_hiring' name='is_hiring' value='1'>
                                        <span class='checkbox__checkmark'></span>
                                    </label>
                                    <h3>Work Mode</h3>
                                    <label class='radiobutton__content' for='add-form__remote'>remote
                                        <input type='radio' name='work_mode' value='remote' id='add-form__remote'>
                                        <span class='radiobutton__checkmark'></span>
                                    </label>
                                    <label class='radiobutton__content' for='add-form__hybrid'>hybrid
                                        <input type='radio' name='work_mode' value='hybrid' id='add-form__hybrid'>
                                        <span class='radiobutton__checkmark'></span>
                                    </label>
                                    <label class='radiobutton__content' for='add-form__onsite'>onsite
                                        <input type='radio' name='work_mode' value='onsite' id='add-form__onsite'>
                                        <span class='radiobutton__checkmark'></span>
                                    </label>
                                    <div class="form__button-group">
                                        <button class='button button--confirm' type='submit'>Add Department</button>
                                        <form class="dialog-cancel-form" method="dialog">
                                            <button class='button button--cancel' formnovalidate formmethod="dialog">Cancel</button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </dialog>
                <div class="app__table-body-container">
                    <!-- Create new Entry Button -->
                    <button class="button button--green" onclick="modal.showModal()">
                        <span class="button__content">
                            <svg class="button__icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                                <path d="M700-200h40v-100h100v-40H740v-100h-40v100H600v40h100v100Zm20 80q-83 0-141.5-58.5T520-320q0-83 58.5-141.5T720-520q83 0 141.5 58.5T920-320q0 83-58.5 141.5T720-120Zm-560-80v-480l320-240 320 240v92q-19-6-39-9t-41-3v-40L480-820 240-640v360h203q3 21 9 41t15 39H160Zm320-350Z"/>
                            </svg>
                            <span class="button__text">Add New Department</span>
                        </span>
                    </button>
                    <!-- Department Table -->
                    <div class="table">
                        <?= $htmlTable ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
