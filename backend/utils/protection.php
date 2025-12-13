<?php

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            jsonResponse(false, 'Not authenticated');
        } else {
            redirect('../frontend/login.php');
        }
    }
}

function csrfToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function rateLimitCheck($key, $maxAttempts = 5, $timeWindow = 300) {
    if (!isset($_SESSION['rate_limit'])) {
        $_SESSION['rate_limit'] = [];
    }

    $now = time();
    $attempts = $_SESSION['rate_limit'][$key] ?? [];

    $attempts = array_filter($attempts, function($timestamp) use ($now, $timeWindow) {
        return ($now - $timestamp) < $timeWindow;
    });

    if (count($attempts) >= $maxAttempts) {
        return false;
    }

    $attempts[] = $now;
    $_SESSION['rate_limit'][$key] = $attempts;

    return true;
}

function validatePostRequest() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        jsonResponse(false, 'Invalid request method');
    }
}
?>
