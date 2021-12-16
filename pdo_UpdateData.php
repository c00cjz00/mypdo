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

## 更新單筆
$sql = "
    UPDATE ch8_animal SET weight=185 WHERE name='熊貓'
";
$result = $conn->query($sql);
if (!$result) {
    print_r($conn->errorInfo());
}
