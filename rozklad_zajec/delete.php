<?php
require_once '../includes/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

$returnUrl = "list.php";
$deleteQuery = "DELETE FROM rozklad_zajec WHERE id_rozkladu = :id";
$idColumn = 'id';
$idValue = $id;

require_once '../includes/confirm_delete.php';
