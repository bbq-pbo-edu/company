<?php

require_once "../utilities.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $conn = createDBConnection();
    $stmt = $conn->prepare("UPDATE employees SET fname = :fname, lname = :lname WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->execute();

    header("Location: ./");
    exit();
}