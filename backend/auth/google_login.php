<?php
// backend/auth/google_login.php

session_start();

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../config/google.php';

use Google\Client;

$client = new Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);

// Scope WAJIB
$client->addScope('email');
$client->addScope('profile');

// (Opsional tapi direkomendasikan)
$client->setPrompt('select_account');

$authUrl = $client->createAuthUrl();
header('Location: ' . $authUrl);
exit;
