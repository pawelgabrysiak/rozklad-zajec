<?php
require_once '../includes/db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM rozklad_zajec WHERE id_rozkladu = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch();

$zajecia = $pdo->query("SELECT * FROM zajecia")->fetchAll();
$grupy = $pdo->query("SELECT * FROM grupy_studenckie")->fetchAll();
$prowadzacy = $pdo->query("SELECT * FROM prowadzacy")->fetchAll();
$sale = $pdo->query("SELECT * FROM sale")->fetchAll();
$terminy = $pdo->query("SELECT * FROM terminy_zajec")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE rozklad_zajec SET
        zajecia_id = :zajecia,
        sala_id = :sala,
        prowadzacy_id = :prowadzacy,
        grupa_id = :grupa,
        id_terminu = :termin
        WHERE id_rozkladu = :id");
    $stmt->execute([
        'zajecia' => $_POST['zajecia_id'],
        'sala' => $_POST['sala_id'],
        'prowadzacy' => $_POST['prowadzacy_id'],
        'grupa' => $_POST['grupa_id'],
        'termin' => $_POST['id_terminu'],
        'id' => $id
    ]);
    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Edytuj wpis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Edytuj wpis</h2>
  <form method="post">
    <div class="mb-3">
      <label>Zajęcia</label>
      <select name="zajecia_id" class="form-select">
        <?php foreach ($zajecia as $z): ?>
          <option value="<?= $z['id_zajecia'] ?>" <?= $z['id_zajecia'] == $data['zajecia_id'] ? 'selected' : '' ?>>
            <?= $z['nazwa_zajecia'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Grupa</label>
      <select name="grupa_id" class="form-select">
        <?php foreach ($grupy as $g): ?>
          <option value="<?= $g['grupa_id'] ?>" <?= $g['grupa_id'] == $data['grupa_id'] ? 'selected' : '' ?>>
            <?= $g['grupa_nazwa'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Prowadzący</label>
      <select name="prowadzacy_id" class="form-select">
        <?php foreach ($prowadzacy as $p): ?>
          <option value="<?= $p['prowadzacy_id'] ?>" <?= $p['prowadzacy_id'] == $data['prowadzacy_id'] ? 'selected' : '' ?>>
            <?= $p['imie'] . ' ' . $p['nazwisko'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Sala</label>
      <select name="sala_id" class="form-select">
        <?php foreach ($sale as $s): ?>
          <option value="<?= $s['sale_id'] ?>" <?= $s['sale_id'] == $data['sala_id'] ? 'selected' : '' ?>>
            <?= $s['nazwa'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Termin</label>
      <select name="id_terminu" class="form-select">
        <?php foreach ($terminy as $t): ?>
          <option value="<?= $t['id_terminu'] ?>" <?= $t['id_terminu'] == $data['id_terminu'] ? 'selected' : '' ?>>
            <?= $t['dzien_tygodnia'] . " " . substr($t['godzina_start'], 0, 5) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Zapisz zmiany</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>
</body>
</html>
