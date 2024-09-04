<?php
$server = 'regid.ca';
$username = 'myxtaomy_pula';
$password = 'm6=G3a373z0?';
$database = 'myxtaomy_www_evolved';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>