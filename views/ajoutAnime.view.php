<?php
session_start();
ob_start()
?>

<form method="POST" action="<?= URL ?>listeAnime/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" class="form-control" id="nom" name="nom">

    </div>
    <div class="form-group">
        <label for="date">date :</label>
        <input type="date" class="form-control" id="dateAnime" name="dateAnime">
    </div>
    <div class="form-group">
        <label for="auteur">auteur :</label>
        <input type="text" class="form-control" id="auteur" name="auteur">
    </div>
    <div class="form-group">
        <label for="description">description :</label>
        <input type="text" class="form-control" id="descriptionAnime" name="descriptionAnime">
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Image :</label>
        <input class="form-control-file" type="file" id="imageAnime" name="imageAnime">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Ajout d'un manga";
require "template.php";
?>