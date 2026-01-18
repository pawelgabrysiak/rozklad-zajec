<?php
require_once '../includes/db.php';

$zajecia = $pdo->query("SELECT * FROM zajecia")->fetchAll();
$grupy = $pdo->query("SELECT * FROM grupy_studenckie")->fetchAll();
$prowad = $pdo->query("SELECT * FROM prowadzacy")->fetchAll();
$sale = $pdo->query("SELECT * FROM sale")->fetchAll();
$terminy = $pdo->query("SELECT * FROM terminy_zajec")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO rozklad_zajec (zajecia_id, sala_id, prowadzacy_id, grupa_id, id_terminu)
                           VALUES (:zajecia, :sala, :prowadzacy, :grupa, :termin)");
    $stmt->execute([
        'zajecia' => $_POST['zajecia_id'],
        'sala' => $_POST['sala_id'],
        'prowadzacy' => $_POST['prowadzacy_id'],
        'grupa' => $_POST['grupa_id'],
        'termin' => $_POST['id_terminu']
    ]);
    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dodaj wpis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Dodaj wpis do rozkładu</h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Zajęcia</label>
      <select name="zajecia_id" class="form-select">
        <?php foreach ($zajecia as $z): ?>
          <option value="<?= $z['id_zajecia'] ?>"><?= $z['nazwa_zajecia'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Grupa</label>
      <select name="grupa_id" class="form-select">
        <?php foreach ($grupy as $g): ?>
          <option value="<?= $g['grupa_id'] ?>"><?= $g['grupa_nazwa'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Prowadzący</label>
      <select name="prowadzacy_id" class="form-select">
        <?php foreach ($prowad as $p): ?>
          <option value="<?= $p['prowadzacy_id'] ?>"><?= $p['imie'] . ' ' . $p['nazwisko'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Sala</label>
      <select name="sala_id" class="form-select">
        <?php foreach ($sale as $s): ?>
          <option value="<?= $s['sale_id'] ?>"><?= $s['nazwa'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Termin</label>
      <select name="id_terminu" class="form-select">
        <?php foreach ($terminy as $t): ?>
          <option value="<?= $t['id_terminu'] ?>">
            <?= $t['dzien_tygodnia'] . " " . substr($t['godzina_start'], 0, 5) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Zapisz</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>
</body>
</html>
