<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>
<body>
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    ?>
<div class="container mt-5">
  <h3>Liste des centres disponibles</h3>
  <table class="table table-striped table-bordered">
      <thead>
      <tr>
          <th scope="col">id</th>
          <th scope="col">label</th>
          <th scope="col">adresse</th>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($results as $centre) {
          printf("<tr><td>%d</td><td>%s</td><td>%s</td></tr>", $centre->getId(),
              $centre->getLabel(), $centre->getAdresse());
      }
      ?>
      </tbody>
  </table>
</div>
</body>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
