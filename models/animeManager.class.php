<?php
require_once __DIR__."\..\models/model.class.php";
require_once __DIR__."\..\models/anime.class.php";

class AnimeManager extends Model{
    private $listeAnime;

    public function ajoutAnime($anime){
        $this->listeAnime[]=$anime;
    }


    public function getListeAnime(){return $this->listeAnime;}
    


    public function chargementListeAnime(){
        // appelle connexion à la bdd
        $req=$this->getBdd()->prepare("SELECT * FROM anime");
        // on execute req
        $req->execute();

        $mesAnimes=$req->fetchAll(PDO::FETCH_ASSOC);

        $req->closeCursor();


        foreach($mesAnimes as $anime){
            // genere livre de la classe Livre
            $l=new Anime($anime["idAnime"],$anime["nom"],$anime["dateAnime"],$anime["auteur"],$anime["descriptionAnime"],$anime["imageAnime"]);
            $this->ajoutAnime($l);
        }
    }



    public function getAnimeById($idAnime){
        for($i=0;$i<count($this->listeAnime);$i++){
            if($this->listeAnime[$i]->getIdAnime() == $idAnime){
                return $this->listeAnime[$i];
            }
        }
    }



    public function ajoutAnimeBd($nom,$dateAnime,$auteur,$descriptionAnime,$imageAnime){
        $req="INSERT INTO anime (nom,dateAnime,auteur,descriptionAnime,imageAnime)
        value (:nom,:dateAnime,:auteur,:descriptionAnime,:imageAnime)";
        // connexion à bd
        $stmt=$this->getBdd()->prepare($req);
        // on met en lien la req avec ce qu'il y a dans la bd
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR); //PDO::PARAM_STR sert à securiser le type de données
        $stmt->bindValue(":dateAnime",$dateAnime);
        $stmt->bindValue(":auteur",$auteur,PDO::PARAM_STR);
        $stmt->bindValue(":descriptionAnime",$descriptionAnime,PDO::PARAM_STR);
        $stmt->bindValue(":imageAnime",$imageAnime,PDO::PARAM_STR);
        // sert à executer requete et a ajouter données à la bdd
        $resultat=$stmt->execute();
        // ferme connexion abdd
        $stmt->closeCursor();

        // si requete fonctionne 
        if($resultat>0){
            // on ajoute le Anime a la classe Anime
            $anime=new Anime($this->getBdd()->lastInsertId(),$nom,$dateAnime,$auteur,$descriptionAnime,$imageAnime);
            // ajoute Anime au tableau de Anime
            $this->ajoutAnime($anime);
        }
    }




    public function suppressionAnimeBd($idAnime){
        //  il est interdit de faire une concatenation avec $id, pour la securité
        $req="DELETE from anime where idAnime= :idAnime";
        // connexion à bd
        $stmt=$this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime",$idAnime,PDO::PARAM_INT);
        // sert à executer requete et a ajouter données à la bdd
        $resultat=$stmt->execute();
        // ferme connexion abdd
        $stmt->closeCursor();

        // si requete fonctionne 
        if($resultat>0){
            // on supprime le livre au tableau de livre
            $anime=$this->getAnimeById($idAnime);
            unset($anime);
        }
    }




    public function modificationAnimeBD($idAnime,$nom,$dateAnime,$auteur,$descriptionAnime,$imageAnime){
        $req = "UPDATE anime
        set nom = :nom, dateAnime = :dateAnime,auteur = :auteur,descriptionAnime = :descriptionAnime,imageAnime = :imageAnime
        where idAnime = :idAnime";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnime",$idAnime,PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":dateAnime",$dateAnime);
        $stmt->bindValue(":auteur",$auteur,PDO::PARAM_STR);
        $stmt->bindValue(":descriptionAnime",$descriptionAnime,PDO::PARAM_STR);
        $stmt->bindValue(":imageAnime",$imageAnime,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $this->getAnimeById($idAnime)->setNom($nom);

            $this->getAnimeById($idAnime)->setdateAnime($dateAnime);
            $this->getAnimeById($idAnime)->setAuteur($auteur);
            $this->getAnimeById($idAnime)->setDescriptionAnime($descriptionAnime);
            $this->getAnimeById($idAnime)->setImageAnime($imageAnime);

        }
    }

}