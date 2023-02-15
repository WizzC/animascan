<?php
session_start();
ob_start()
?>

<form method="POST" action="<?= URL ?>listeScan/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="saison">saison :</label>
        <input type="number" class="form-control" id="saison" name="saison">
    </div>
    <div class="form-group">
        <label for="nomArc">nomArc :</label>
        <input type="text" class="form-control" id="nomArc" name="nomArc">
    </div>
    <div class="form-group">
        <label for="chapitre">chapitre :</label>
        <input type="text" class="form-control" id="chapitre" name="chapitre">
    </div>
    <div class="form-group">
        <label for="tomes">tomes :</label>
        <input type="text" class="form-control" id="tomes" name="tomes">
    </div>
    <div class="form-group">
        <label for="episodes" class="form-label">episodes :</label>
        <input class="form-control" type="text" id="episodes" name="episodes">
    </div>
    <div class="form-group">
        <label for="idAnime" class="form-label">idAnime :</label>
        <input class="form-control" type="number" id="idAnime" name="idAnime">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Ajout d'un manga";
require "template.php";
?>