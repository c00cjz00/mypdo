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
## 1. fetch：通常你並不知道資料結果會有幾筆，所以你需要用 while 的方式去做。
## while 這裡做判斷如果$row 有東西時，也就是$result->fetch() 會倒出一筆並塞值給$row。所以接著被 print_r 出來。一筆資料會有多項欄位，所以是陣列結構。
$result = $conn->query("SELECT * FROM ch8_animal");
if (!$result) print_r($conn->errorInfo()); // 找錯誤問題的方法
while ($row = $result->fetch()) {
	print_r($row);
    echo "--------------------\n";
}
