<?php
session_start();
ob_start()
?>
<form method="POST" action="<?= URL ?>listeAnime/mv" enctype="multipart/form-data">

    <div class="form-group">
        <label for="nom">nom :</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $anime->getNom()?>">

    </div>
    <div class="form-group">
        <label for="date">date :</label>
        <input type="date" class="form-control" id="dateAnime" name="dateAnime" value="<?= $anime->getDateAnime()?>">
    </div>
    <div class="form-group">
        <label for="auteur">auteur :</label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $anime->getAuteur()?>">

    </div>
    <div class="form-group">
        <label for="description">description :</label>
        <input type="text" class="form-control" id="descriptionAnime" name="descriptionAnime" value="<?= $anime->getDescriptionAnime()?>">

    </div>
    <h3>Image : </h3>
    <img class="w-25" src="<?= URL ?>public/image/<?=$anime->getImageAnime()?>" >
    <div class="form-group">
        <label for="image" class="form-label">Changer l'image :</label>
        <input class="form-control-file" type="file" id="imageAnime" name="imageAnime">
    </div>
    <input type="hidden" name="identifiant" value="<?=$anime->getIdAnime();?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


<?php
$twitter = "public/image/Twitter.png";
$instagram = "public/image/instagram.png";
$content = ob_get_clean();
$titre = "Modification du anime : ".$anime->getIdAnime();
require "template.php";
?>