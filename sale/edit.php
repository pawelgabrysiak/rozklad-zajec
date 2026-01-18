<?php
require_once '../includes/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: list.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM sale WHERE sale_id = :id");
$stmt->execute(['id' => $id]);
$sala = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE sale SET nazwa = :nazwa WHERE sale_id = :id");
    $stmt->execute(['nazwa' => $_POST['nazwa'], 'id' => $id]);
    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Edytuj salę</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Edytuj salę</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nazwa sali</label>
      <input type="text" name="nazwa" class="form-control" value="<?= htmlspecialchars($sala['nazwa']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Zapisz zmiany</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>
</body>
</html>
