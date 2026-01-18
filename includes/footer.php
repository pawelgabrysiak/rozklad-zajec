</div> <!-- /container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// 🔁 Dark Mode
document.getElementById("toggleDark")?.addEventListener("click", function () {
  document.body.classList.toggle("bg-dark");
  document.body.classList.toggle("text-light");
  document.querySelectorAll(".card").forEach(card => {
    card.classList.toggle("bg-dark");
    card.classList.toggle("text-light");
  });
});

// 🧠 Skróty klawiszowe
document.addEventListener('keydown', function(e) {
  if (e.altKey) {
    switch(e.key) {
      case '1': window.location.href = "/grupy_studenckie/list.php"; break;
      case '2': window.location.href = "/zajecia/list.php"; break;
      case '3': window.location.href = "/prowadzacy/list.php"; break;
      case '4': window.location.href = "/sale/list.php"; break;
      case '5': window.location.href = "/rozklad_zajec/list.php"; break;
      case '6': window.location.href = "/terminy_zajec/list.php"; break;
    }
  }
});
</script>

</body>
</html>
