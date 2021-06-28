<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>
<body>
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    ?>
<div class="container mt-5">
  <h3>Liste des patients</h3>
  <table class="table table-striped table-bordered">
      <thead>
      <tr>
          <th scope="col">id</th>
          <th scope="col">nom</th>
          <th scope="col">prénom</th>
          <th scope="col">adresse</th>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($results as $patient) {
          printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $patient->getId(),
              $patient->getNom(),$patient->getPrenom(), $patient->getAdresse());
      }
      ?>
      </tbody>
  </table>
</div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
