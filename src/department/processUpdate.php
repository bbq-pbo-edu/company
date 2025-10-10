<?php

require_once "../utilities.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $isHiring = isset($_POST['is-hiring']) ? 1 : 0;
    $workMode = strtolower($_POST['work-mode']);

    $conn = createDBConnection();
    $stmt = $conn->prepare("UPDATE department SET name = :name, is_hiring = :isHiring, work_mode = :workMode WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':isHiring', $isHiring);
    $stmt->bindParam(':workMode', $workMode);
    $stmt->execute();

    header("Location: http://www.company.patrick.web.bbq/emplyee/read");
    exit();
}