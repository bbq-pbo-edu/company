<?php

require_once "../utilities.php";

$conn = createDBConnection();

$name = htmlspecialchars($_POST["name"]);
$isHiring = 0;
if (isset($_POST['is-hiring'])) {
    $isHiring = 1;
}
$workMode = htmlspecialchars($_POST["work-mode"]);

// Prepare INSERT statement with placeholders for column values
$stmt = $conn->prepare("INSERT INTO department (name, is_hiring, work_mode) VALUES (:name, :isHiring, :workMode)");

// Bind placeholders to php variables containing the respective value
$stmt->bindParam(":name", $name);
$stmt->bindParam(":isHiring", $isHiring);
$stmt->bindParam(":workMode", $workMode);

// Execute and send statement to database
$stmt->execute();

// Return back to main page
header("Location: ./");
exit();