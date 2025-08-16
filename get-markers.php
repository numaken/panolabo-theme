<?php
// データベース接続の設定
$servername = "mysql3006.xserver.jp";
$username = "panolabo_d7fd3";
$password = "6cb3xmbf8b";
$dbname = "panolabo_wp7";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// オフセットとリミットの取得
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;

// SQLクエリの実行
$sql = "SELECT title, lat, lng, description, thumb, authored_index_url, regular_holiday, tel, site_url, business_hour_from, business_hour_to, address, qr_code 
        FROM wp_panolabo_contents 
        LIMIT $offset, $limit";

$result = $conn->query($sql);

$locations = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
}

// JSON形式で結果を返す
echo json_encode($locations);

// データベース接続のクローズ
$conn->close();
