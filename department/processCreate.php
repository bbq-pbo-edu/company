<?php

require_once "../utilities.php";

$conn = createDBConnection();

$name = htmlspecialchars($_POST["name"]);

// Prepare INSERT statement with placeholders for column values
$stmt = $conn->prepare("INSERT INTO department (name) VALUES (:name)");

// Bind placeholders to php variables containing the respective value
$stmt->bindParam(":name", $name);

// Execute and send statement to database
$stmt->execute();

// Return back to main page
header("Location: ./");