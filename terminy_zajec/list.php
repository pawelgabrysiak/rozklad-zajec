<?php require_once '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Terminy zajęć</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Terminy zajęć</h2>
  <a href="create.php" class="btn btn-primary mb-3">Dodaj termin</a>

  <table class="table table-bordered">
    <thead>
      <tr><th>ID</th><th>Zajęcia</th><th>Dzień</th><th>Godzina</th><th>Akcje</th></tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT t.id_terminu, t.dzien_tygodnia, t.godzina_start, z.nazwa_zajecia
              FROM terminy_zajec t
              JOIN zajecia z ON t.id_zajecia = z.id_zajecia";
      $stmt = $pdo->query($sql);
      foreach ($stmt as $row) {
          echo "<tr>
                  <td>{$row['id_terminu']}</td>
                  <td>{$row['nazwa_zajecia']}</td>
                  <td>{$row['dzien_tygodnia']}</td>
                  <td>" . substr($row['godzina_start'], 0, 5) . "</td>
                  <td>
                    <a href='edit.php?id={$row['id_terminu']}' class='btn btn-warning btn-sm'>Edytuj</a>
                    <a href='delete.php?id={$row['id_terminu']}' class='btn btn-danger btn-sm'>Usuń</a>
                  </td>
                </tr>";
      }
    ?>
    </tbody>
  </table>
</body>
</html>
