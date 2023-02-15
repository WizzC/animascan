<?php
require_once __DIR__."\..\models/model.class.php";
require_once __DIR__."\..\models/users.class.php";

class UsersManager extends Model{
    private $listeUser;

    public function ajoutUser($user){
        $this->listeUser[]=$user;
    }

    public function getListeUser(){return $this->listeUser;}
    
    public function chargementListeUser(){
        // appelle connexion à la bdd
        $req=$this->getBdd()->prepare("SELECT * FROM users");
        // on execute req
        $req->execute();

        $mesUsers=$req->fetchAll(PDO::FETCH_ASSOC);

        $req->closeCursor();


        foreach($mesUsers as $user){
            // genere livre de la classe Livre
            $l=new Users($user["idUsers"],$user["roleUsers"],$user["pseudo"],$user["email"],$user["passwordUsers"]);
            $this->ajoutUser($l);
        }
    }

    public function getUserById($id){
        for($i=0;$i<count($this->listeUser);$i++){
            if($this->listeUser[$i]->getId() === $id){
                return $this->listeUser[$i];
            }
        }
    }
    public function ajoutUsersBD($pseudo,$email,$passwordUsers){
        $req=("INSERT INTO users SET roleUsers = 1,pseudo = :pseudo,email = :email,passwordUsers = :passwordUsers ");
        $passwordUsers = password_hash($_POST['passwordUsers'],PASSWORD_BCRYPT);
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":pseudo",$pseudo,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":passwordUsers",$passwordUsers,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }
}