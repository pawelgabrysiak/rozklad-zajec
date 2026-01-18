<?php
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO sale (nazwa) VALUES (:nazwa)");
    $stmt->execute(['nazwa' => $_POST['nazwa']]);
    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dodaj salę</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Dodaj salę</h2>
  <form method="post">
    <div class="mb-3">
      <label>Nazwa sali</label>
      <input type="text" name="nazwa" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Zapisz</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>
</body>
</html>
