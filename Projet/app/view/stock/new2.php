<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <?php
  include $root . '/app/view/fragment/fragmentMenu.html';
  ?>




  <div class="container mt-3">

    <?php
    if ($results['code'] === 1) {
      $name = $results['result'];
      echo ("<div class='container mt-3'>");
      echo("<h3>Le nouveau stock pour le centre : '$name' a été ajouté</h3>");
    } else if ($results['code'] == 2) {
      $name = $results['result'];
      echo("<h3>Les stocks pour le centre : '$name' ont été modifié</h3>");
    } else if ($results['code'] == 3) {
      echo("<h3>Aucun stock n'a été ajouté car vous n'avez pas rentré de doses</h3>");
    } else {
      echo("<h3>Problème d'insertion / modification des stocks</h3>");
    }

    ?>

    <a href="router2.php?action=centreReadAll">
      <button type="button" class="mt-3 btn btn-primary">
        Liste des centres
      </button>
    </a>
  </div>

  <?php

  include $root . '/app/view/fragment/fragmentFooter.html';
  ?>
