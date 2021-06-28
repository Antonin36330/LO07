<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

    <body>
<?php
include $root . '/app/view/fragment/fragmentMenu.html';
?>
  <?php
  if ($results !== -1) {
      echo ("<div class='container mt-3'>");
      echo("<h3>Le nouveau vaccin " . $_GET['label'] . " a été ajouté </h3>");
      echo("<div class='card mt-3' style='width: 18rem;'>");
      echo("<ul class='list-group list-group-flush'>");
      echo("<li class='list-group-item'>id = " . $results . "</li>");
      echo("<li class='list-group-item'>Label = " . $_GET['label']  . "</li>");
      echo("<li class='list-group-item'>Doses = " . $_GET['doses'] . "</li>");
      echo("</ul>");
      echo ("</div>");
      echo ("</div>");
  } else {
      echo("<h3 class='mt-3'>Problème d'insertion du vaccin</h3>");
  }
  ?>


  <div class="container mt-3">
      <a href="router2.php?action=vaccinReadAll">
    <button type="button" class="btn btn-primary">
    Liste des vaccins
    </button>
    </a>
</div>

<?php
include $root . '/app/view/fragment/fragmentFooter.html';
?>
