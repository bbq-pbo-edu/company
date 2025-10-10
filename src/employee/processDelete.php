<?php

require_once "../utilities.php";

$conn = createDBConnection();
$stmt = $conn->prepare("DELETE FROM employees WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: http://www.company.patrick.web.bbq/employee/read");
exit();