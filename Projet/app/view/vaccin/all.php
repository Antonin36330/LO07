<?php

require($root . '/app/view/fragment/fragmentHeader.html');
?>
<body>
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    ?>
<div class="container mt-5">
  <h3>Liste des vaccins disponibles</h3>
  <table class="table table-striped table-bordered">
      <thead>
      <tr>
          <th scope="col">id</th>
          <th scope="col">label</th>
          <th scope="col">dose</th>
      </tr>
      </thead>
      <tbody>
      <?php
      foreach ($vaccins as $vaccin) {
          printf("<tr><td>%d</td><td>%s</td><td>%d</td></tr>", $vaccin->getId(),
              $vaccin->getLabel(), $vaccin->getDoses());
      }
      ?>
      </tbody>
  </table>
</div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
