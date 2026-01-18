<?php require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa = $_POST['grupa_nazwa'];
    $stmt = $pdo->prepare("INSERT INTO grupy_studenckie (grupa_nazwa) VALUES (:nazwa)");
    $stmt->execute(['nazwa' => $nazwa]);
    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dodaj grupę</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Dodaj nową grupę</h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Nazwa grupy</label>
      <input type="text" name="grupa_nazwa" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Zapisz</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>

</body>
</html>
