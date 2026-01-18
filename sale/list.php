<?php require_once '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Lista sal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h2>Sale</h2>
  <a href="create.php" class="btn btn-primary mb-3">Dodaj nową salę</a>

  <table class="table table-bordered">
    <thead>
      <tr><th>ID</th><th>Nazwa</th><th>Akcje</th></tr>
    </thead>
    <tbody>
    <?php
      $stmt = $pdo->query("SELECT * FROM sale");
      while ($row = $stmt->fetch()) {
          echo "<tr>
                  <td>{$row['sale_id']}</td>
                  <td>{$row['nazwa']}</td>
                  <td>
                    <a href='edit.php?id={$row['sale_id']}' class='btn btn-warning btn-sm'>Edytuj</a>
                    <a href='delete.php?id={$row['sale_id']}' class='btn btn-danger btn-sm'>Usuń</a>
                  </td>
                </tr>";
      }
    ?>
    </tbody>
  </table>
</body>
</html>
