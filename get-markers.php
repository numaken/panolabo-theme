<?php
// データベース接続の設定
// 環境変数から認証情報を取得（セキュリティ対策）
$servername = $_ENV['DB_HOST'] ?? "localhost";
$username = $_ENV['DB_USER'] ?? "";
$password = $_ENV['DB_PASS'] ?? "";
$dbname = $_ENV['DB_NAME'] ?? "";

// 認証情報のチェック
if (empty($servername) || empty($username) || empty($password) || empty($dbname)) {
    http_response_code(500);
    die(json_encode(['error' => 'Database configuration missing']));
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(['error' => 'Database connection failed']));
}

// 入力値の検証とサニタイゼーション
$offset = max(0, (int)($_GET['offset'] ?? 0));
$limit = max(1, min(100, (int)($_GET['limit'] ?? 20))); // 最大100件に制限

// プリペアドステートメントを使用してSQLインジェクション対策
$sql = "SELECT title, lat, lng, description, thumb, authored_index_url, regular_holiday, tel, site_url, business_hour_from, business_hour_to, address, qr_code 
        FROM wp_panolabo_contents 
        LIMIT ?, ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    die(json_encode(['error' => 'Query preparation failed']));
}

$stmt->bind_param("ii", $offset, $limit);
if (!$stmt->execute()) {
    http_response_code(500);
    die(json_encode(['error' => 'Query execution failed']));
}

$result = $stmt->get_result();
$locations = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // データのサニタイゼーション
        $locations[] = array_map('htmlspecialchars', $row);
    }
}

// セキュリティヘッダーとJSONレスポンス
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');

echo json_encode($locations, JSON_UNESCAPED_UNICODE);

// リソースのクリーンアップ
$stmt->close();
$conn->close();
