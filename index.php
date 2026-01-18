<?php
require_once 'includes/db.php';
require_once 'includes/header.php';

// statystyki
$counts = [
  'grupy' => $pdo->query("SELECT COUNT(*) FROM grupy_studenckie")->fetchColumn(),
  'zajecia' => $pdo->query("SELECT COUNT(*) FROM zajecia")->fetchColumn(),
  'prowadzacy' => $pdo->query("SELECT COUNT(*) FROM prowadzacy")->fetchColumn(),
  'rozklad' => $pdo->query("SELECT COUNT(*) FROM rozklad_zajec")->fetchColumn()
];
?>

<h1 class="text-center mb-4">🎓 System Zarządzania Rozkładem Zajęć</h1>

<div class="row mb-4">
  <div class="col-md-3"><div class="alert alert-primary text-center"><strong><?= $counts['grupy'] ?></strong><br>Grupy</div></div>
  <div class="col-md-3"><div class="alert alert-success text-center"><strong><?= $counts['zajecia'] ?></strong><br>Zajęcia</div></div>
  <div class="col-md-3"><div class="alert alert-warning text-center"><strong><?= $counts['prowadzacy'] ?></strong><br>Prowadzący</div></div>
  <div class="col-md-3"><div class="alert alert-danger text-center"><strong><?= $counts['rozklad'] ?></strong><br>Wpisy w rozkładzie</div></div>
</div>

<style>
.card-hover:hover {
  transform: scale(1.03);
  transition: 0.3s ease;
  box-shadow: 0 0 15px rgba(0,0,0,0.15);
}
</style>

<div class="row g-4">
  <?php
  $cards = [
    ['href' => 'grupy_studenckie/list.php', 'title' => '👥 Grupy Studenckie', 'desc' => 'Zarządzaj grupami.', 'color' => 'primary'],
    ['href' => 'prowadzacy/list.php', 'title' => '👨‍🏫 Prowadzący', 'desc' => 'Zarządzaj wykładowcami.', 'color' => 'success'],
    ['href' => 'sale/list.php', 'title' => '🏫 Sale', 'desc' => 'Lista pomieszczeń.', 'color' => 'info'],
    ['href' => 'zajecia/list.php', 'title' => '📚 Zajęcia', 'desc' => 'Rodzaje i przypisania.', 'color' => 'warning'],
    ['href' => 'terminy_zajec/list.php', 'title' => '🗓️ Terminy', 'desc' => 'Kiedy i o której.', 'color' => 'secondary'],
    ['href' => 'rozklad_zajec/list.php', 'title' => '📅 Rozkład', 'desc' => 'Pełny harmonogram.', 'color' => 'danger']
  ];
  foreach ($cards as $c): ?>
    <div class="col-md-4">
      <a href="<?= $c['href'] ?>" class="text-decoration-none text-dark">
        <div class="card card-hover border-<?= $c['color'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $c['title'] ?></h5>
            <p class="card-text"><?= $c['desc'] ?></p>
          </div>
        </div>
      </a>
    </div>
  <?php endforeach; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
