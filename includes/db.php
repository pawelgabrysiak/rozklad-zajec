<?php
require_once __DIR__ . '/../config.php';

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                   DB_USER, DB_PASS,
                   [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"]);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Połączenie nieudane: " . $e->getMessage());
}
?>
