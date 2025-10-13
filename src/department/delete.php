<?php

require_once '../src/db/database.php';
require_once '../src/utils/createTable.php';

$conn = createDBConnection();
$wasRemoved = remove($conn, $entity,  $id);

header('Location: ' . DOMAIN_URL . '/department/read');
exit();