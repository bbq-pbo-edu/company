<?php

require_once "../utilities.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $conn = createDBConnection();
    $stmt = $conn->prepare("UPDATE department SET name = :name WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    header("Location: ./");
}