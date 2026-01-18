<?php require_once '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Rozkład zajęć</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h2>Rozkład zajęć</h2>
  <a href="create.php" class="btn btn-primary mb-3">Dodaj do rozkładu</a>

  <table class="table table-bordered">
    <thead>
      <tr><th>Zajęcia</th><th>Grupa</th><th>Prowadzący</th><th>Sala</th><th>Dzień</th><th>Godzina</th><th>Akcje</th></tr>
    </thead>
    <tbody>
    <?php
      $sql = "SELECT rz.id_rozkladu, z.nazwa_zajecia, g.grupa_nazwa,
                     CONCAT(p.imie, ' ', p.nazwisko) AS prowadzacy,
                     s.nazwa AS sala, t.dzien_tygodnia, t.godzina_start
              FROM rozklad_zajec rz
              JOIN zajecia z ON rz.zajecia_id = z.id_zajecia
              JOIN grupy_studenckie g ON rz.grupa_id = g.grupa_id
              JOIN prowadzacy p ON rz.prowadzacy_id = p.prowadzacy_id
              JOIN sale s ON rz.sala_id = s.sale_id
              JOIN terminy_zajec t ON rz.id_terminu = t.id_terminu";
      $stmt = $pdo->query($sql);
      foreach ($stmt as $row) {
          echo "<tr>
                  <td>{$row['nazwa_zajecia']}</td>
                  <td>{$row['grupa_nazwa']}</td>
                  <td>{$row['prowadzacy']}</td>
                  <td>{$row['sala']}</td>
                  <td>{$row['dzien_tygodnia']}</td>
                  <td>{$row['godzina_start']}</td>
                  <td>
                    <a href='edit.php?id={$row['id_rozkladu']}' class='btn btn-warning btn-sm'>Edytuj</a>
                    <a href='delete.php?id={$row['id_rozkladu']}' class='btn btn-danger btn-sm'>Usuń</a>
                  </td>
                </tr>";
      }
    ?>
    </tbody>
  </table>

</body>
</html>
