<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>

    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    ?>
    <div class="container mt-5">

    <h3> Ajout d'un centre</h3>
    <form class="mt-3" role="form" method='get' action='router2.php'>
            <input type="hidden" name='action' value='centreCreated'>
            <label class="form-label" for="label">Label : </label><input class="form-control" type="text" name='label' id='label' placeholder="Nom du Centre"  value=''>
            <br>
            <label class="form-label" for="doses">Adresse : </label><input class="form-control" type="text" name='adresse' id='adresse'  placeholder="Adresse du Centre" value=''>

        <button class="mt-3 btn btn-primary" type="submit">Ajouter</button>
    </form>
        </div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
