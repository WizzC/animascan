<?php
require_once __DIR__."\..\models/scanManager.class.php";
class ScanController {
    private $scanManager;

    public function __construct(){

        $this->scanManager=new scanManager();
        $this->scanManager->chargementListeScan();
    }
    public function afficherListeScan(){
       
        $scan=$this->scanManager->getListeScan();
        require __DIR__."\../views/scan.view.php";
        
    }

    public function afficherScanAnime(){
        
        return $this->scanManager->getListeScan();


    }
    public function afficherScan(){
        require __DIR__."\../views/scan.view.php";
    }
    public function ajoutScan(){
        require __DIR__."\../views/ajoutScan.view.php";
    }
    public function ajoutScanValidation(){
        
        // ajouter le scan en bdd
        $this->scanManager->ajoutScanBD($_POST["saison"],$_POST["nomArc"],$_POST["chapitre"],$_POST["tomes"],$_POST["episodes"],$_POST["idAnime"]);

        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Ajout Réalisé"
        ];
        // redirige lutilisateur vers la pages des animes
        header("Location: ".URL."listeScan");
    }
    public function suppressionScan($id){
        // supprime ds bdd
        $this->scanManager->suppressionScanBd($id);
        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Supression Réalisé"
        ];
        // redirige lutilisateur vers la pages des scans
        header("Location: ".URL."listeScan");
    }
    public function modificationScan($id){
        $scan=$this->scanManager->getScanById($id);
        require __DIR__."\../views/modifierScan.view.php";
    }
    public function modificationScanValidation(){

        $this->scanManager->modificationScanBD((int)$_POST['identifiantScan'],$_POST["saison"],$_POST["nomArc"],$_POST["chapitre"],$_POST["tomes"],$_POST["episodes"],$_POST["idAnime"]);
        $_SESSION['alert']= [
            "type"=> "success",
            "msg"=> "Modification Réalisé"
        ];
        header("Location: ".URL."listeScan");
    }
    
}
