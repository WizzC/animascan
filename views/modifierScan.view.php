<?php
session_start();
ob_start()
?>
<form method="POST" action="<?= URL ?>listeScan/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="saison">saison :</label>
        <input type="number" class="form-control" id="saison" name="saison" value="<?= $scan->getSaison()?>">
    </div>
    <div class="form-group">
        <label for="nomArc">nomArc :</label>
        <input type="text" class="form-control" id="nomArc" name="nomArc" value="<?= $scan->getNomArc()?>">
    </div>
    <div class="form-group">
        <label for="chapitre">chapitre :</label>
        <input type="text" class="form-control" id="chapitre" name="chapitre" value="<?= $scan->getChapitre()?>">
    </div>
    <div class="form-group">
        <label for="tomes">tomes :</label>
        <input type="text" class="form-control" id="tomes" name="tomes" value="<?= $scan->getTomes()?>">
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Changer l'image :</label>
        <input class="form-control-file" type="file" id="imageAnime" name="imageAnime">
    </div>
    <div class="form-group">
        <label for="idAnime">idAnime :</label>
        <input type="text" class="form-control" id="idAnime" name="idAnime" value="<?= $scan->getIdAnime()?>">
    </div>
    
    
    <input type="hidden" name="identifiantScan" value="<?=$scan->getIdScan();?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>


<?php

$content = ob_get_clean();
$titre = "Modification du anime : ".$scan->getIdScan();
require "template.php";
?>