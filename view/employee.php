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
    <title>Employees View</title>
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
                <a href="/start">
                    <div class="app__go-back">
                        <span class="app__go-back-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                                <path d="m480-320 56-56-64-64h168v-80H472l64-64-56-56-160 160 160 160Zm0 240q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                            </svg>
                        </span>
                        <span class="app_go-back-text">Go back</span>
                    </div>
                </a>
                <div class="app__title-group">
                    <div class="app__icon">
                        <svg class="app__icon_content" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3m-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3m0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5m8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5" fill="#FFF" stroke="transparent" stroke-width="0"></path>
                        </svg>
                    </div>
                    <div class="app__title_container">
                        <h1 class="app__title">Employees</h1>
                        <p class="app__subtitle">View and manage employee data.</p>
                    </div>
                </div>
            </header>
            <div class="app__body">
                <!-- Add New Employee Dialog Modal -->
                <dialog id="modal" >
                    <div class="card">
                        <div class="card__content">
                            <div class="card__header">
                                <h2 class="card__title">Add New Employee</h2>
                            </div>
                            <div class="card__body">
                                <form class="add-employee-form" method="POST" action="/employee/create">
                                    <label class='text-input__content' for='add-form__first_name'>First Name
                                        <input type="text" name="first_name" id="add-form__first_name" required>
                                    </label>
                                    <label class='text-input__content' for='add-form__last_name'>Last Name
                                        <input type="text" name="last_name" id="add-form__last_name" required>
                                    </label>
                                    <div class="form__button-group">
                                        <button class='button button--confirm' type='submit'>Add Employee</button>
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
                                <path d="M720-400v-120H600v-80h120v-120h80v120h120v80H800v120h-80Zm-360-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm80-80h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0-80Zm0 400Z"/>
                            </svg>
                            <span class="button__text">Add New Employee</span>
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