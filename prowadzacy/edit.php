<?php
require_once '../includes/db.php';

$stopnie = ['brak','mgr','dr','dr hab.','prof.'];
$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM prowadzacy WHERE prowadzacy_id = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE prowadzacy SET
        imie = :imie,
        nazwisko = :nazwisko,
        stopien_prowadzacy = :stopien
        WHERE prowadzacy_id = :id");
    $stmt->execute([
        'imie' => $_POST['imie'],
        'nazwisko' => $_POST['nazwisko'],
        'stopien' => $_POST['stopien_prowadzacy'],
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
  <title>Edytuj prowadzącego</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Edytuj prowadzącego</h2>
  <form method="post">
    <div class="mb-3">
      <label>Imię</label>
      <input type="text" name="imie" class="form-control" value="<?= htmlspecialchars($data['imie']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Nazwisko</label>
      <input type="text" name="nazwisko" class="form-control" value="<?= htmlspecialchars($data['nazwisko']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Stopień</label>
      <select name="stopien_prowadzacy" class="form-select" required>
        <?php foreach ($stopnie as $s): ?>
          <option value="<?= $s ?>" <?= $s === $data['stopien_prowadzacy'] ? 'selected' : '' ?>>
            <?= $s ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Zapisz zmiany</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>
</body>
</html>
