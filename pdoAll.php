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


## //新增 修改 刪除 資料
$result = $conn->query("INSERT INTO ch8_animal VALUES (null,'熊貓',125,'黑白色的熊',NOW())"); //新增
$result = $conn->query("UPDATE ch8_animal SET weight=185 WHERE name='熊貓'");   //修改
$result = $conn->query("DELETE FROM ch8_animal WHERE id=1"); //刪除
if(!$result) print_r($conn->errorInfo());// 找錯誤問題的方法


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

# 選取資料方法
## 1. fetch：通常你並不知道資料結果會有幾筆，所以你需要用 while 的方式去做。
## while 這裡做判斷如果$row 有東西時，也就是$result->fetch() 會倒出一筆並塞值給$row。所以接著被 print_r 出來。一筆資料會有多項欄位，所以是陣列結構。
$result = $conn->query("SELECT * FROM ch8_animal");
if (!$result) print_r($conn->errorInfo()); // 找錯誤問題的方法
while ($row = $result->fetch()) {
	#print_r($row);
    #echo "--------------------\n";
}


## 2. fetchAll：會一次全部回傳（用陣列包住回傳），所以這裡會到二維陣列去解讀。
$result = $conn->query("SELECT * FROM ch8_animal");
if (!$result) print_r($conn->errorInfo()); // 找錯誤問題的方法
// by fetchAll
$row = $result->fetchAll();
#print_r($row);


# fetchAll 取得的會是二位陣列，跟 fetch 取得的不同。
# fetchAll 透過一次全吐出來，優點是快直接處理資料，缺點是你暫存會隨資料多而吃重。
# 要注意不管是 fetch 或 fetchAll，被讀取出來後就會被清掉。

?>
