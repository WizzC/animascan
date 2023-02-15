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
        <td class="align-middle"><a href="<?= URL ?>listeScan/m/<?= $scan[$i]->getIdScan() ?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"> 
            <form action="<?= URL ?>listeScan/s/<?= $scan[$i]->getIdScan() ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le scan ?')" method="POST">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor ?>
</table>
<a href="<?= URL ?>listeScan/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content=ob_get_clean();
$titre="Les anime de la bibliothèque";
require "template.php";
?>