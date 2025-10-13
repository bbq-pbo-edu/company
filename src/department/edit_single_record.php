<?php

require_once '../src/db/database.php';
require_once '../src/utils/createTable.php';

$conn = createDBConnection();
$records = findById($conn, $entity, $id);

$htmlTable = createTable($records, $entity, withHeader: true, mode: 'edit', editingRecordId: $id);

$name = ucfirst($records[0]['name']);

require_once "../view/single_record.php";