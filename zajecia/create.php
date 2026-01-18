<?php require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa = $_POST['nazwa_zajecia'];
    $rodzaj = $_POST['rodzaj_zajecia'];
    $sala_id = $_POST['sala_id'];
    $prowadzacy_id = $_POST['prowadzacy_id'];

    $stmt = $pdo->prepare("INSERT INTO zajecia (nazwa_zajecia, rodzaj_zajecia, sala_id, prowadzacy_id)
                           VALUES (:nazwa, :rodzaj, :sala, :prowadzacy)");
    $stmt->execute([
        'nazwa' => $nazwa,
        'rodzaj' => $rodzaj,
        'sala' => $sala_id,
        'prowadzacy' => $prowadzacy_id
    ]);
    header("Location: list.php");
    exit;
}

$sale = $pdo->query("SELECT * FROM sale")->fetchAll();
$prowadzacy = $pdo->query("SELECT * FROM prowadzacy")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dodaj zajęcia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Dodaj zajęcia</h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Nazwa zajęć</label>
      <input type="text" name="nazwa_zajecia" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Rodzaj zajęć</label>
      <input type="text" name="rodzaj_zajecia" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Sala</label>
      <select name="sala_id" class="form-select" required>
        <?php foreach ($sale as $sala): ?>
          <option value="<?= $sala['sale_id'] ?>"><?= $sala['nazwa'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Prowadzący</label>
      <select name="prowadzacy_id" class="form-select" required>
        <?php foreach ($prowadzacy as $p): ?>
          <option value="<?= $p['prowadzacy_id'] ?>"><?= $p['imie'] . ' ' . $p['nazwisko'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Zapisz</button>
    <a href="list.php" class="btn btn-secondary">Anuluj</a>
  </form>

</body>
</html>
