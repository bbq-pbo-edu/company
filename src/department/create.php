<?php

require_once '../src/db/database.php';
require_once '../src/utils/createTable.php';

$conn = createDBConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    create($conn, $entity, $_POST);
    $lastRecord = findLastRecord($conn, $entity);

    header('Location: ' . DOMAIN_URL . '/department/read/' . $lastRecord[0]['id']);
    exit();
}
