<?php
require_once __DIR__."\..\models/usersManager.class.php";
class UsersController {
    private $usersManager;

    public function __construct(){

        $this->usersManager=new UsersManager;
        $this->usersManager->chargementListeUser();
    }
    public function afficherConnexion(){
        require __DIR__."\../views/connexion.view.php";
    }
    public function afficherInscription(){
        require __DIR__."\../views/inscription.view.php";
    }
    public function ajoutUsersValidation(){
        
        // ajouter le Anime en bdd
        $this->usersManager->ajoutUsersBD($_POST["pseudo"],$_POST["email"],$_POST["passwordUsers"]);

        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Ajout Réalisé"
        ];
        // redirige lutilisateur vers la pages des animes
        header("Location: ".URL."inscription");
    }
}