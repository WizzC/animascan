<?php
session_start(); // démarre une session PHP
ob_start(); // démarre un tampon de sortie pour stocker le contenu généré par le script dans une variable
?>
<div class="container ">

  <?php
  for ($i = 0; $i < count($anime); $i++) : ?>
  <?php
  if($anime[$i]->getIdAnime() % 2 == 0){
  ?>
    <div class="container d-flex justify-content-center m-0 mb-5" style="width:30vh;">
      <img style="height: 200px;" src="public/image/<?= $anime[$i]->getImageAnime() ?>">
      <div class=" p-0">
        <a class="rounded border border-dark p-2 mt-5 mb-5 text-center text-black d-flex justify-content-center" style="background-color: #BA5C12;" href="<?= URL ?>listeAnime/l/<?= $anime[$i]->getIdAnime() ?>"><?= $anime[$i]->getNom() ?></a>
      </div>

    </div>
  <?php }
  else{
    ?>
    <div class="container d-flex justify-content-center m-0 mb-5" style="width:30vh;">
      
      <div class=" p-0">
        <a class="rounded border border-dark p-2 mt-5 mb-5 text-center text-black d-flex justify-content-center" style="background-color: #BA5C12;" href="<?= URL ?>listeAnime/l/<?= $anime[$i]->getIdAnime() ?>"><?= $anime[$i]->getNom() ?></a>
      </div>
<img style="height: 200px;" src="public/image/<?= $anime[$i]->getImageAnime() ?>">
    </div>
  <?php
  }
  endfor ?>
</div>
<?php
$content = ob_get_clean(); // met le contenu stocké dans la variable $content
$titre = "Anime";
require "template.php"; // appelle un template pour afficher le contenu
?>