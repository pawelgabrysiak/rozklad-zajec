<?php
require_once '../includes/db.php';
$stopnie = ['brak','mgr','dr','dr hab.','prof.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO prowadzacy (imie, nazwisko, stopien_prowadzacy)
                           VALUES (:imie, :nazwisko, :stopien)");
    $stmt->execute([
        'imie' => $_POST['imie'],
        'nazwisko' => $_POST['nazwisko'],
        'stopien' => $_POST['stopien_prowadzacy']
    ]);
    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dodaj prowadzącego</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Dodaj prowadzącego</h2>
  <form method="post">
    <div class="mb-3">
      <label>Imię</label>
      <input type="text" name="imie" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nazwisko</label>
      <input type="text" name="nazwisko" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Stopień</label>
      <select name="stopien_prowadzacy" class="form-select" required>
        <?php foreach ($stopnie as $s): ?>
          <option value="<?= $s ?>"><?= $s ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Zapisz</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>

</body>
</html>
