<?php

require_once '../src/db/database.php';
require_once '../src/utils/createTable.php';

$conn = createDBConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    create($conn, $entity, $_POST);

    header('Location: /employee/read');
    exit();
}
