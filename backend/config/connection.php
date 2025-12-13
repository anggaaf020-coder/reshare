<?php
session_start();

// Supabase PostgreSQL Connection
$host = 'aws-0-ap-southeast-1.pooler.supabase.com';
$port = '6543';
$dbname = 'postgres';
$user = 'postgres.lqkaukotnznvtcdcgldd';
$password = getenv('SUPABASE_DB_PASSWORD') ?: 'Fandi1234567890';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Helper function to set user context for RLS
function setUserContext($pdo, $userId) {
    if ($userId) {
        $stmt = $pdo->prepare("SELECT set_config('app.user_id', :user_id, false)");
        $stmt->execute(['user_id' => $userId]);
    }
}

// Get current user ID from session
function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}
?>
