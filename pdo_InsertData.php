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

## 新增單筆
$sql = "
	INSERT INTO ch8_animal VALUES
        (null,'熊貓',125,'黑白色的熊',NOW())
	;
";
$result = $conn->query($sql);
if (!$result) {
    print_r($conn->errorInfo());
}

## 批次新增資料
$sql = "
	INSERT INTO ch8_animal VALUES
		(null,'藪貓',52,'夜行性動物，喜歡狩獵遊戲，口頭禪是好厲害唷',NOW()),
		(null,'河馬',155,'個性不算溫和，咬合力很強唷',NOW()),
		(null,'浣熊',123,'由於會偷人類人物，所以常常被說是個小偷',NOW()),
		(null,'耳廓狐',33,'擅長透過挖洞來尋找潛藏在地底下的獵物',NOW())
	;
";
$result = $conn->query($sql);
if (!$result) {
    print_r($conn->errorInfo());
}
