<?php require_once '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Zajęcia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Zajęcia</h2>
  <a href="create.php" class="btn btn-primary mb-3">Dodaj nowe zajęcia</a>

  <table class="table table-bordered">
    <thead>
      <tr><th>ID</th><th>Nazwa</th><th>Rodzaj</th><th>Sala</th><th>Prowadzący</th><th>Akcje</th></tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT z.id_zajecia, z.nazwa_zajecia, z.rodzaj_zajecia,
                     s.nazwa AS sala, CONCAT(p.imie,' ',p.nazwisko) AS prowadzacy
              FROM zajecia z
              JOIN sale s ON z.sala_id = s.sale_id
              JOIN prowadzacy p ON z.prowadzacy_id = p.prowadzacy_id";
      $stmt = $pdo->query($sql);
      while ($row = $stmt->fetch()) {
          echo "<tr>
                  <td>{$row['id_zajecia']}</td>
                  <td>{$row['nazwa_zajecia']}</td>
                  <td>{$row['rodzaj_zajecia']}</td>
                  <td>{$row['sala']}</td>
                  <td>{$row['prowadzacy']}</td>
                  <td>
                    <a href='edit.php?id={$row['id_zajecia']}' class='btn btn-warning btn-sm'>Edytuj</a>
                    <a href='delete.php?id={$row['id_zajecia']}' class='btn btn-danger btn-sm'>Usuń</a>
                  </td>
                </tr>";
      }
    ?>
    </tbody>
  </table>

</body>
</html>
