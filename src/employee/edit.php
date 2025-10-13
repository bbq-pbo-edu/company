<?php

require_once '../src/db/database.php';
require_once '../src/utils/createTable.php';

$conn = createDBConnection();
$records = findAll($conn, $entity);

$htmlTable = createTable($records, $entity, withHeader: true, mode: 'edit', editingRecordId: $id);

require_once "../view/employee.php";