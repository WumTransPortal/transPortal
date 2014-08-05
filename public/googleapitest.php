<?php
session_start();
require_once dirname(__FILE__).'/GoogleClientApi/src/Google_Client.php';
require_once dirname(__FILE__).'/GoogleClientApi/src/contrib/Google_AnalyticsService.php';

$scriptUri = "http://dk1.informatik.uni-bremen.de/googleapitest.php";

$client = new Google_Client();
$client->setAccessType('online'); // default: offline
$client->setApplicationName('TransPortal');
$client->setClientId('285871726249.apps.googleusercontent.com');
$client->setClientSecret('e59E1FW8vsGcKrBALS7g7kfI');
$client->setRedirectUri($scriptUri);
$client->setDeveloperKey('AIzaSyCqWcLSzyuqt4Wq9mDa3_0hp0H_7Y6IQho'); // API key

// $service implements the client interface, has to be set before auth call
$service = new Google_AnalyticsService($client);

if (isset($_GET['logout'])) { // logout: destroy token
    unset($_SESSION['token']);
	die('Logged out.');
}

if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in session
    $client->authenticate();
    $_SESSION['token'] = $client->getAccessToken();
}

if (isset($_SESSION['token'])) { // extract token from session and configure client
    $token = $_SESSION['token'];
    $client->setAccessToken($token);
}

if (!$client->getAccessToken()) { // auth call to google
    $authUrl = $client->createAuthUrl();
    header("Location: ".$authUrl);
    die;
}
echo 'Hello, world.';
