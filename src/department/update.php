<?php

require_once '../src/db/database.php';
require_once '../src/utils/createTable.php';

$conn = createDBConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    update($conn, $entity, $id, $_POST);

    header("Location: " . DOMAIN_URL . "/{$entity}/read/{$id}");
    exit();
}

