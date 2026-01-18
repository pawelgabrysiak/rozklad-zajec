<?php
session_start();
$loggedUser = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Rozkład Zajęć</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">🗂️ Plan Zajęć</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/grupy_studenckie/list.php">Grupy</a></li>
        <li class="nav-item"><a class="nav-link" href="/prowadzacy/list.php">Prowadzący</a></li>
        <li class="nav-item"><a class="nav-link" href="/sale/list.php">Sale</a></li>
        <li class="nav-item"><a class="nav-link" href="/zajecia/list.php">Zajęcia</a></li>
        <li class="nav-item"><a class="nav-link" href="/terminy_zajec/list.php">Terminy</a></li>
        <li class="nav-item"><a class="nav-link" href="/rozklad_zajec/list.php">Rozkład</a></li>
      </ul>
      <div class="d-flex text-white align-items-center">
        <?php if ($loggedUser): ?>
          Zalogowano jako <strong class="ms-2"><?= htmlspecialchars($loggedUser) ?></strong>
          <a href="/logout.php" class="btn btn-outline-light btn-sm ms-3">Wyloguj</a>
        <?php else: ?>
          <a href="/login.php" class="btn btn-outline-light btn-sm">Zaloguj się</a>
        <?php endif; ?>
        <button id="toggleDark" class="btn btn-sm btn-outline-light ms-3">🌗</button>
      </div>
    </div>
  </div>
</nav>

<div class="container">
