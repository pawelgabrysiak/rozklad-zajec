<?php
require_once '../includes/db.php';

$zajecia = $pdo->query("SELECT * FROM zajecia")->fetchAll();
$dni = ['Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO terminy_zajec (id_zajecia, dzien_tygodnia, godzina_start)
                           VALUES (:zajecia, :dzien, :godzina)");
    $stmt->execute([
        'zajecia' => $_POST['id_zajecia'],
        'dzien' => $_POST['dzien_tygodnia'],
        'godzina' => $_POST['godzina_start']
    ]);
    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dodaj termin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Dodaj termin zajęć</h2>
  <form method="post">
    <div class="mb-3">
      <label>Zajęcia</label>
      <select name="id_zajecia" class="form-select" required>
        <?php foreach ($zajecia as $z): ?>
          <option value="<?= $z['id_zajecia'] ?>"><?= $z['nazwa_zajecia'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Dzień tygodnia</label>
      <select name="dzien_tygodnia" class="form-select" required>
        <?php foreach ($dni as $dzien): ?>
          <option value="<?= $dzien ?>"><?= $dzien ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Godzina rozpoczęcia</label>
      <input type="time" name="godzina_start" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Zapisz</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>
</body>
</html>
