<?php
session_start();
ob_start() ?>

<div class="row p-5">
  <div class="col-4 p-5">
    <img src="<?= URL ?>public/image/<?= $anime->getImageAnime() ?>" style="height: 50vh;">
  </div>
  <div class="col-8" style="background-color: white;">
    <figure>
      <blockquote class="blockquote">
        <p><?= $anime->getDescriptionAnime() ?></p>
      </blockquote>
      <figcaption class="blockquote-footer">
        <?= $anime->getDateAnime() ?> <cite title="Source Title"><?= $anime->getAuteur() ?></cite>
      </figcaption>
    </figure>
  </div>
</div> 
<div class="d-flex justify-content-center">
<table class="table text-center m-5" style="width: 50%;">
<tr class="table-light">
    <th>Saison</th>
    <th>Nom de l'arc</th>
    <th>Chapitre</th>
    <th>Tomes</th>
    <th>Episodes</th>


</tr>
<?php 
for($i=0;$i<count($scan);$i++): 
  if($scan[$i]->getidAnime()== $anime->getIdAnime()){
?>
  
<tr class="table-light">
    <td class="align-middle"><?= $scan[$i]->getSaison() ?></td>
    <td class="align-middle"><?= $scan[$i]-> getNomArc() ?></td>
    <td class="align-middle"><?= $scan[$i]-> getChapitre() ?></td>
    <td class="align-middle"><?= $scan[$i]->getTomes() ?></td>
    <td class="align-middle"><?= $scan[$i]->getEpisodes() ?></td>


</tr>
<?php } endfor ?>
</table>
</div>

<?php

$content = ob_get_clean();
$titre = $anime->getNom();
require_once "template.php";
?>