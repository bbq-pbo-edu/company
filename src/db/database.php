<?php

function createDBConnection(string $host=DB_HOST, string $user=DB_USER, $password=DB_PASSWORD, $database=DB_NAME): PDO|null {
    try {
        return new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $user, $password);
    }
    catch (PDOException $e) {
        echo "Connection to database failed.<br>" . $e->getMessage() . "<br>";
        return null;
    }
}

/**
 * @return array[]
 */
function findAll(PDO $conn, string $tableName): array
{
    $stmt = $conn->prepare("SELECT * FROM {$tableName}");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function remove(PDO $conn, string $tableName, int $id): bool
{
    $stmt = $conn->prepare("DELETE FROM {$tableName} WHERE id = ?");
    return $stmt->execute([$id]);
}

function create(PDO $conn, string $tableName, array $postData): bool
{
    $columnsArray = array_keys($postData);
    $columnsFormatted = implode(', ', $columnsArray);
    $numColumns = count($columnsArray);
    $columnPlaceHolders = str_repeat('?,', $numColumns - 1) . '?';

    $valuesArray = array_values($postData);

    $sql = "INSERT INTO {$tableName} ($columnsFormatted) VALUES ({$columnPlaceHolders})";

    $stmt = $conn->prepare($sql);
    return $stmt->execute($valuesArray);
}

function findById(PDO $conn, string $tableName, int $id): array
{
    $stmt = $conn->prepare("SELECT * FROM {$tableName} WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update(PDO $conn, string $tableName, int $id, array $postData): bool {
    $columns = array_keys($postData);

    foreach ($columns as $column) {
        $stmt = $conn->prepare("UPDATE {$tableName} SET $column = ? WHERE id = ?");
        $stmt->execute([$postData[$column], $id]);
    }
    return true;
}

function findLastRecord(PDO $conn, string $tableName): array {
    $stmt = $conn->prepare("SELECT * FROM {$tableName} ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}