<?php
if (!isset($returnUrl, $deleteQuery, $idColumn, $idValue)) {
    die("Błędne użycie confirm_delete.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['confirm'] === 'yes') {
        $stmt = $pdo->prepare($deleteQuery);
        $stmt->execute([$idColumn => $idValue]);
    }
    header("Location: $returnUrl");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Potwierdzenie usunięcia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>⚠️ Czy na pewno chcesz usunąć ten rekord?</h2>
  <form method="post">
    <input type="hidden" name="confirm" value="yes">
    <button type="submit" class="btn btn-danger">Tak, usuń</button>
    <a href="<?= htmlspecialchars($returnUrl) ?>" class="btn btn-secondary">Anuluj</a>
  </form>
</body>
</html>
