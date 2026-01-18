<?php require_once '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Prowadzący</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Prowadzący</h2>
  <a href="create.php" class="btn btn-primary mb-3">Dodaj prowadzącego</a>

  <table class="table table-bordered">
    <thead>
      <tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Stopień</th><th>Akcje</th></tr>
    </thead>
    <tbody>
    <?php
      $stmt = $pdo->query("SELECT * FROM prowadzacy");
      foreach ($stmt as $row) {
          echo "<tr>
                  <td>{$row['prowadzacy_id']}</td>
                  <td>{$row['imie']}</td>
                  <td>{$row['nazwisko']}</td>
                  <td>{$row['stopien_prowadzacy']}</td>
                  <td>
                    <a href='edit.php?id={$row['prowadzacy_id']}' class='btn btn-warning btn-sm'>Edytuj</a>
                    <a href='delete.php?id={$row['prowadzacy_id']}' class='btn btn-danger btn-sm'>Usuń</a>
                  </td>
                </tr>";
      }
    ?>
    </tbody>
  </table>
</body>
</html>
