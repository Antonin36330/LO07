<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    ?>
  <div class="container mt-5">
    <h3>Attribuer des vaccins pour un centre</h3>
    <form class="mt-3" role="form" method='get' action='router2.php'>
            <input type="hidden" name='action' value='stockNew2'>
            <label class="form-label"  for="doses">Label : </label><br/>
              <select class="form-control" multiple aria-label="multiple select example" id='stock' name='stock' >
                  <?php
                  foreach ($results['centre'] as $centre) {
                      $label = $centre->getLabel();
                      $id = $centre->getId();
                      echo("<option name='stock_centre' value='$id'>$id : $label</option>");
                  }
                  ?>
              </select>
            <br>
            <?php
            foreach ($results['vaccin'] as $vaccin) {
                $label = $vaccin->getLabel();
                $id = $vaccin->getId();
                echo("<label  class='form-label' for='$id'>$label</label><br /><input type='number' min='1' name='$id'><br /><br />");
            }
            ?>
          </br>
        <button class="btn btn-primary" type="submit">Ajouter les doses</button>
</br></br></br></br></br></br></br></br></br>


    </form>
  </div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
