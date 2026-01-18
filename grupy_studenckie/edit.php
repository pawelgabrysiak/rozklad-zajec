<?php
require_once '../includes/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM grupy_studenckie WHERE grupa_id = :id");
$stmt->execute(['id' => $id]);
$grupa = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nowa_nazwa = $_POST['grupa_nazwa'];
    $stmt = $pdo->prepare("UPDATE grupy_studenckie SET grupa_nazwa = :nazwa WHERE grupa_id = :id");
    $stmt->execute(['nazwa' => $nowa_nazwa, 'id' => $id]);
    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Edytuj grupę</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Edytuj grupę</h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Nazwa grupy</label>
      <input type="text" name="grupa_nazwa" class="form-control" value="<?= htmlspecialchars($grupa['grupa_nazwa']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Zapisz zmiany</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>

</body>
</html>
