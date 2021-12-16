<?php
## 連線資料庫
$host = 'localhost';
$db   = 'demo';
$user = 'root';
$pass = 'cwycjz321';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$conn = new PDO($dsn, $user, $pass);
//$conn = new PDO("mysql:host=localhost;dbname=demo;charset=utf8mb4", "root", "xxxxx");

## 刪除資料
$sql = "
    DELETE FROM ch8_animal WHERE id=1
";
$result = $conn->query($sql);
if (!$result) {
    print_r($conn->errorInfo());
}
