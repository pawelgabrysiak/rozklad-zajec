<?php
require_once '../includes/db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM zajecia WHERE id_zajecia = :id");
$stmt->execute(['id' => $id]);
$zajecie = $stmt->fetch();

$sale = $pdo->query("SELECT * FROM sale")->fetchAll();
$prowadzacy = $pdo->query("SELECT * FROM prowadzacy")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE zajecia SET
        nazwa_zajecia = :nazwa,
        rodzaj_zajecia = :rodzaj,
        sala_id = :sala,
        prowadzacy_id = :prowadzacy
        WHERE id_zajecia = :id");
    $stmt->execute([
        'nazwa' => $_POST['nazwa_zajecia'],
        'rodzaj' => $_POST['rodzaj_zajecia'],
        'sala' => $_POST['sala_id'],
        'prowadzacy' => $_POST['prowadzacy_id'],
        'id' => $id
    ]);
    header("Location: list.php");
    exit;
}
?>

<!-- HTML identyczny jak create.php, ale z wypełnionymi wartościami w value/selected -->
