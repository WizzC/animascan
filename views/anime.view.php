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
        <th>Image</th>
        <th>Nom</th>
        <th>Date de sortie</th>
        <th>Auteur</th>
        <th>description</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php 
    for($i=0;$i<count($anime);$i++): ?>
    <tr class="table-light">
        <td class="align-middle"><img src="public/image/<?= $anime[$i]->getImageAnime() ?>" width="100px"></td>
        <td class="align-middle"><a href="<?=URL ?>listeAnime/l/<?= $anime[$i]->getIdAnime() ?>"><?= $anime[$i]->getNom() ?></td>
        <td class="align-middle"><?= $anime[$i]-> getDateAnime() ?></td>
        <td class="align-middle"><?= $anime[$i]-> getAuteur() ?></td>
        <td class="align-middle" width="60%"><?= $anime[$i]->getDescriptionAnime() ?></td>
        <td class="align-middle"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$anime[$i]->getIdAnime()?>" data-bs-whatever="biybib" >Modifier</button></td>
        <td class="align-middle"> 
            <form action="<?= URL ?>listeAnime/s/<?= $anime[$i]->getIdAnime() ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer cet anime ?')" method="POST">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>



<div class="modal fade" id="exampleModal<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= URL ?>listeAnime/mv" >
          <div class="mb-3">
          <label for="nom">nom :</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $anime[$i]->getNom()?>">
          </div>
          <div class="mb-3">
          <label for="date">date :</label>
        <input type="date" class="form-control" id="dateAnime" name="dateAnime" value="<?= $anime[$i]->getDateAnime()?>">
          </div>
          <div class="mb-3">
          <label for="auteur">auteur :</label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $anime[$i]->getAuteur()?>">
          </div>
          <div class="mb-3">
          <label for="description">description :</label>
        <input type="text" class="form-control" id="descriptionAnime" name="descriptionAnime" value="<?= $anime[$i]->getDescriptionAnime()?>">
          </div>
          <div class="mb-3">
          <label for="image" class="form-label">Changer l'image :</label>
        <input class="form-control-file" type="file" id="imageAnime" name="imageAnime">
    </div>
    <div class="mb-3">
        <label for="idAnime">idAnime :<?= $anime[$i]->getIdAnime()?></label>

    </div>
    <input type="hidden" name="identifiant" value="<?=$anime[$i]->getIdAnime();?>">
        <button type="submit" class="btn btn-primary">Valider</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php endfor ?>
</table>
<a href="<?= URL ?>listeAnime/a" class="btn btn-success d-block">Ajouter</a>
<?php
$content=ob_get_clean();
$titre="Les anime de la bibliothèque";
require "template.php";
?>