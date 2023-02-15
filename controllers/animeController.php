<?php
require_once __DIR__."\..\models/animeManager.class.php";

class AnimeController {
    private $animeManager;

    public function __construct(){

        $this->animeManager=new AnimeManager();
        $this->animeManager->chargementListeAnime();
    }
    public function afficherListeAnime(){
       
        $anime=$this->animeManager->getListeAnime();
        require __DIR__."\../views/anime.view.php";
        
    }
    public function afficherAnime($idAnime){
   
        return $this->animeManager->getAnimeById($idAnime);
        

    }

    public function afficherAccueil(){
       
        $anime=$this->animeManager->getListeAnime();
        require __DIR__."\../views/accueil.view.php";
        
    }
    public function ajoutAnime(){
        require __DIR__."\../views/ajoutAnime.view.php";
    }

    public function ajoutAnimeValidation(){
        // charge image
        $file=$_FILES["imageAnime"];
        // ajouter image au image public
        $repertoire="public/image/";
        $nomImageAjoute= $this->ajoutImage($file,$repertoire);
        // ajouter le Anime en bdd
        $this->animeManager->ajoutAnimeBd($_POST["nom"],$_POST["dateAnime"],$_POST["auteur"],$_POST["descriptionAnime"],$nomImageAjoute);

        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Ajout Réalisé"
        ];
        // redirige lutilisateur vers la pages des animes
        header("Location: ".URL."listeAnime");
    }

    private function ajoutImage($file, $dir){

        // si la personne a oublier choisir un fichier
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        // sil y a pas de dossier on le cree
        // 0777 ce sont des droit
        if(!file_exists($dir)) mkdir($dir,0777);

        // recup extension fichier
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        // ajout numero fichier generer aleatoire (eviter dooublons)
        $random = rand(0,99999);
        // genere nom fichier
        $target_file = $dir.$random."_".$file['name'];

        // verifie si bien une image
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        // verifie extension
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        // verifie si existe pas deja
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        // verifie taille
        if($file['size'] > 50000000)
            throw new Exception("Le fichier est trop gros");
        // si pas reusssi a ajouter image
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        //  si functionne dit nom image qui a été ajouter
        else return ($random."_".$file['name']);
    }
    public function suppressionAnime($idAnime){
        $nomImage= $this->animeManager->getAnimeById($idAnime)->getImage();
        // retire l'image de mon dossier
        unlink("public/image/".$nomImage);
        // supprime ds bdd
        $this->animeManager->suppressionAnimeBd($idAnime);
        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Supression Réalisé"
        ];
        // redirige lutilisateur vers la pages des Animes
        header("Location: ".URL."listeAnime");
    }
    public function modificationAnime($idAnime){
        $anime=$this->animeManager->getAnimeById($idAnime);
        require __DIR__."\../views/modifierAnime.view.php";
    }
    public function modificationAnimeValidation(){
        $imageActuelle = $this->animeManager->getAnimeById((int)$_POST['identifiant'])->getImageAnime();

       
        $file = $_FILES['imageAnime'];

        if($file['size']>0){
            unlink("public/image/".$imageActuelle);
            $repertoire="public/image/";
            $nomImageTooAdd= $this->ajoutImage($file,$repertoire);
        }
        else{
            $nomImageTooAdd = $imageActuelle;
        }

        $this->animeManager->modificationAnimeBD((int)$_POST['identifiant'],$_POST["nom"],$_POST["dateAnime"],$_POST["auteur"],$_POST["descriptionAnime"],$nomImageTooAdd);



        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Modification Réalisé"
        ];
        header("Location: ".URL."listeAnime");
    }
    
}
function debug($variable){
        echo '<pre>' . print_r($variable,true) . '</pre>';
    }
    