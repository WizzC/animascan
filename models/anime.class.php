<?php
class Anime{
    private $idAnime;
    private $nom;
    private $dateAnime;
    private $auteur;
    private $descriptionAnime;
    private $imageAnime;

    public function __construct($idAnime,$nom,$dateAnime,$auteur,$descriptionAnime,$imageAnime)
    {
        $this->idAnime=$idAnime;
        $this->nom=$nom;
        $this->dateAnime=$dateAnime;
        $this->auteur=$auteur;
        $this->descriptionAnime=$descriptionAnime;
        $this->imageAnime=$imageAnime;
    }

    public function getIdAnime(){return $this->idAnime;}
    public function setIdAnime($idAnime){$this->idAnime=$idAnime;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom=$nom;}

    public function getDateAnime(){return $this->dateAnime;}
    public function setDateAnime($dateAnime){$this->dateAnime=$dateAnime;}

    public function getAuteur(){return $this->auteur;}
    public function setAuteur($auteur){$this->auteur=$auteur;}

    public function getDescriptionAnime(){return $this->descriptionAnime;}
    public function setDescriptionAnime($descriptionAnime){$this->descriptionAnime=$descriptionAnime;}

    public function getImageAnime(){return $this->imageAnime;}
    public function setImageAnime($imageAnime){$this->imageAnime=$imageAnime;}
}

?>