<?php

require_once "../utilities.php";

$id = $_GET['id'];

$conn = createDBConnection();
$stmt = $conn->prepare("DELETE FROM department WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: ./");