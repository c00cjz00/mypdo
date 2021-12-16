<?php
## 連線資料庫
$host = 'localhost';
$db   = 'demo';
$user = 'root';
$pass = 'xxxxxx';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$conn = new PDO($dsn, $user, $pass);
//$conn = new PDO("mysql:host=localhost;dbname=demo;charset=utf8mb4", "root", "xxxxx");

## 建立表單
$sqlcode = "
    CREATE TABLE demo.ch8_animal (
        id INT UNSIGNED AUTO_INCREMENT,
        name TEXT,
        weight INT,
        info TEXT,
        date DATETIME,
        PRIMARY KEY (id)
    );
";
$result = $conn->query($sqlcode);
