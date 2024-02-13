<?php
session_start();
ob_start();
if(!empty($_SESSION['alert'])):
?>
<div class="alert alert-<?=$_SESSION['alert']['type']?>" role="alert">
<?=$_SESSION['alert']['msg']?>
</div>
<?php 
unset($_SESSION['alert']);
endif;?>
<table class="table text-center">
    <tr class="table-light">
        <th>Saison</th>
        <th>Nom de l'arc</th>
        <th>Chapitre</th>
        <th>Tomes</th>
        <th>Episodes</th>
        <th>IdAnime</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    for($i=0;$i<count($scan);$i++): ?>
    <tr class="table-light">
        <td class="align-middle"><?= $scan[$i]->getSaison() ?></td>
        <td class="align-middle"><?= $scan[$i]-> getNomArc() ?></td>
        <td class="align-middle"><?= $scan[$i]-> getChapitre() ?></td>
        <td class="align-middle"><?= $scan[$i]->getTomes() ?></td>
        <td class="align-middle"><?= $scan[$i]->getEpisodes() ?></td>
        <td class="align-middle"><?= $scan[$i]->getidAnime() ?></td>
        <td class="align-middle"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="<?= $scan[$i]->getIdScan()?>">Modifier</button></td>
        <td class="align-middle"> 
            <form action="<?= URL ?>listeScan/s/<?= $scan[$i]->getIdScan() ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le scan ?')" method="POST">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor ?>
</table>
<a href="<?= URL ?>listeScan/a" class="btn btn-success d-block">Ajouter</a>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= URL ?>listeScan/mv" enctype="multipart/form-data">
          <div class="mb-3">
          <label for="saison">saison :</label>
            <input type="number" class="form-control" id="saison" name="saison" value="1">
          </div>
          <div class="mb-3">
          <label for="nomArc">nomArc :</label>
        <input type="text" class="form-control" id="nomArc" name="nomArc" value="<?= $scan[2]->getNomArc()?>">
          </div>
          <div class="mb-3">
          <label for="chapitre">chapitre :</label>
        <input type="text" class="form-control" id="chapitre" name="chapitre" value="<?= $scan[2]->getChapitre()?>">
          </div>
          <div class="mb-3">
          <label for="tomes">tomes :</label>
        <input type="text" class="form-control" id="tomes" name="tomes" value="<?= $scan[2]->getTomes()?>">
          </div>
          <div class="mb-3">
            <label for="episodes">episodes :</label>
        <input type="text" class="form-control" id="episodes" name="episodes" value="<?= $scan[2]->getEpisodes()?>">
    </div>
    <div class="mb-3">
        <label for="idAnime">idAnime :</label>
        <input type="text" class="form-control" id="idAnime" name="idAnime" value="<?= $scan[2]->getIdAnime()?>">
    </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="identifiant" value="<?=$scan[2]->getIdScan();?>">
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>
<?php
$content=ob_get_clean();
$titre="Les anime de la bibliothèque";
require "template.php";
?>