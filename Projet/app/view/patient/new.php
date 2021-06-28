<?php
require($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>

    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    ?>
    <div class="container mt-5">

    <h3> Ajout d'un patient</h3>
    <form class="mt-3" role="form" method='get' action='router2.php'>
            <input type="hidden" name='action' value='patientCreated'>
            <label class="form-label" for="label">Nom : </label><input class="form-control" type="text" name='nom' id='nom' placeholder="Nom du Patient"  value=''>
            <br>
            <label class="form-label" for="label">Prénom : </label><input class="form-control" type="text" name='prenom' id='prenom' placeholder="Prénom du Patient"  value=''>
            <br>
            <label class="form-label" for="label">Adresse : </label><input class="form-control" type="text" name='adresse' id='adresse' placeholder="Adresse du Centre"  value=''>


        <button class="mt-3 btn btn-primary" type="submit">Ajouter</button>
    </form>
        </div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
