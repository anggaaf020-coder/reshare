<?php
// backend/auth/google_callback.php

session_start();

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../config/google.php';

use Google\Client;
use Google\Service\Oauth2;

// Validasi code dari Google
if (!isset($_GET['code'])) {
    exit('Google OAuth gagal: authorization code tidak ditemukan.');
}

$client = new Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);

// Tukar authorization code dengan access token
$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

if (isset($token['error'])) {
    exit('Error Google OAuth: ' . $token['error_description']);
}

$client->setAccessToken($token);

// Ambil data user Google
$oauth2 = new Oauth2($client);
$userInfo = $oauth2->userinfo->get();

/*
Data penting yang tersedia:
$userInfo->id
$userInfo->email
$userInfo->name
$userInfo->picture
*/

// Simpan ke session (contoh)
$_SESSION['google_id'] = $userInfo->id;
$_SESSION['email']     = $userInfo->email;
$_SESSION['name']      = $userInfo->name;
$_SESSION['avatar']    = $userInfo->picture;
$_SESSION['login_via'] = 'google';

// Redirect ke halaman setelah login
header('Location: /reshare/frontend/home.php');
exit;
