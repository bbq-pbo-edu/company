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
                <a href="<?= "/{$entity}/read" ?>">
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
                            <path d="M12 7V3H2v18h20V7zM6 19H4v-2h2zm0-4H4v-2h2zm0-4H4V9h2zm0-4H4V5h2zm4 12H8v-2h2zm0-4H8v-2h2zm0-4H8V9h2zm0-4H8V5h2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8zm-2-8h-2v2h2zm0 4h-2v2h2z" fill="#FFF" stroke="transparent" stroke-width="0"></path>
                        </svg>
                    </div>
                    <div class="app__title_container">
                        <h1 class="app__title"><?= "{$entity} - Single Record #{$id}" ?></h1>
                        <p class="app__subtitle"><?= "View and manage data from {$entity} {$name}." ?></p>
                    </div>
                </div>
            </header>
            <div class="app__body">
                <div class="app__table-body-container">
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