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
      echo("<h3>Le nouveau patient " . $_GET['nom'] ." ". $_GET['prenom'] . " a été ajouté </h3>");
      echo("<div class='card mt-3' style='width: 18rem;'>");
      echo("<ul class='list-group list-group-flush'>");
      echo("<li class='list-group-item'>Nom = " . $_GET['nom']  . "</li>");
      echo("<li class='list-group-item'>Prénom = " . $_GET['prenom']  . "</li>");
      echo("<li class='list-group-item'>Adresse = " . $_GET['adresse'] . "</li>");
      echo("</ul>");
      echo ("</div>");
      echo ("</div>");
  } else {
      echo("<h3 class='mt-3'>Problème d'insertion du patient</h3>");
  }
  ?>


  <div class="container mt-3">
      <a href="router2.php?action=patientReadAll">
    <button type="button" class="btn btn-primary">
    Liste des patients
    </button>
    </a>
</div>

<?php
include $root . '/app/view/fragment/fragmentFooter.html';
?>
