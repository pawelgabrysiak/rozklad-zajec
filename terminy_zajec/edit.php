<?php
require_once '../includes/db.php';
$id = $_GET['id'];
$dni = ['Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela'];

$stmt = $pdo->prepare("SELECT * FROM terminy_zajec WHERE id_terminu = :id");
$stmt->execute(['id' => $id]);
$termin = $stmt->fetch();

$zajecia = $pdo->query("SELECT * FROM zajecia")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE terminy_zajec SET
        id_zajecia = :zajecia,
        dzien_tygodnia = :dzien,
        godzina_start = :godzina
        WHERE id_terminu = :id");
    $stmt->execute([
        'zajecia' => $_POST['id_zajecia'],
        'dzien' => $_POST['dzien_tygodnia'],
        'godzina' => $_POST['godzina_start'],
        'id' => $id
    ]);
    header("Location: list.php");
    exit;
}
?>

<!-- HTML taki jak w create.php, ale z dodanym selected/value -->
