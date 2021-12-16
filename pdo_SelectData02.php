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

# 選取資料方法
## 2. fetchAll：會一次全部回傳（用陣列包住回傳），所以這裡會到二維陣列去解讀。
$result = $conn->query("SELECT * FROM ch8_animal");
if (!$result) print_r($conn->errorInfo()); // 找錯誤問題的方法
// by fetchAll
$row = $result->fetchAll();
print_r($row);
