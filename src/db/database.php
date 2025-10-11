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

///**
// * @return array[]
// */
//function findAll(): array
//{
//// TODO
//}
//
//function remove(int $id): bool
//{
//// TODO
//}
//
//function create(): bool
//{
//// TODO
//}
//
//
//function findById(int $id): array
//{
//// TODO
//}
//
//function update(??)???
//{
//    //TODO
//}

