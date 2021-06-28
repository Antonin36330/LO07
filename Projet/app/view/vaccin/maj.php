<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    ?>
  <div class="container mt-5">
    <h3>Modifier un vaccin</h3>
    <form class="mt-3" role="form" method='get' action='router2.php'>
            <input type="hidden" name='action' value='vaccinMaj2'>
              <select class="form-control" multiple aria-label="multiple select example" id='vaccin' name='vaccin' >
                  <?php
                  foreach ($vaccins as $vaccin) {
                      printf("<option name='vaccin' value= '%s'>%s : %s ; Doses : %s</option>", $vaccin->getId(), $vaccin->getId(), $vaccin->getLabel(), $vaccin->getDoses());
                  }
                  ?>
              </select>

            <br>
            <label class="form-label"  for="doses">Dose : </label><br/><input class="form-control" type="number" name='doses' id='doses' value=''placeholder="Nombre de doses" min='1'>

        <button class="mt-3 btn btn-primary" type="submit">Modifier la dose</button>
    </form>
  </div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
