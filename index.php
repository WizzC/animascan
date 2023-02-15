<?php 
define("URL",str_replace("index.php","",(isset($_SERVER["HTTPS"])?"https":"http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once __DIR__."\controllers/animeController.php";
$animeController=new AnimeController;

require_once __DIR__."\controllers/usersController.php";
$usersController=new UsersController;

require_once __DIR__."\controllers/scanController.php";
$scanController=new ScanController;

try{
    if(empty($_GET["page"])){
        require __DIR__."\views/accueil.view.php";
    }
    else{
        $url=explode("/",filter_var($_GET["page"],FILTER_SANITIZE_URL));

        switch($url[0]){
            case"accueil" : 
                $animeController->afficherAccueil();

            break;
            case"connexion":
                $usersController->afficherConnexion();
            break;
            case"logout" : require "views/logout.php";
            break;
            case"inscription":
                if(empty($url[1])){
                $usersController->afficherInscription();
            }elseif($url[1]==="ic"){
                $usersController->ajoutUsersValidation();
            }else{
                throw new Exception("La page n'existe pas");
            }
                
            break;
            case"listeAnime" :
                if(empty($url[1])){
                    $animeController->afficherListeAnime();
                    
                }else if($url[1]==="l"){
                    
                    $anime = $animeController->afficherAnime((int)$url[2]);
                    $scan = $scanController->afficherScanAnime();
                    require __DIR__."/views/afficherAnime.view.php";
                    
                   
                    
                }else if($url[1]==="a"){
                    $animeController->ajoutAnime();
                }else if($url[1]==="m"){
                    $animeController->modificationAnime((int)$url[2]);
                }else if($url[1]==="s"){
                    $animeController->suppressionAnime((int)$url[2]);
                }else if($url[1]==="av"){
                    $animeController->ajoutAnimeValidation();
                }elseif($url[1]==="mv"){
                    $animeController->modificationAnimeValidation();
             }else{
                    throw new Exception("La page n'existe pas");
                }break;
                case"listeScan" :
                        if(empty($url[1])){
                            $scanController->afficherListeScan();
                        }else if($url[1]==="a"){
                            $scanController->ajoutScan();
                        }else if($url[1]==="m"){
                            $scanController->modificationScan((int)$url[2]);
                        }else if($url[1]==="s"){
                            $scanController->suppressionScan((int)$url[2]);
                        }else if($url[1]==="av"){
                            $scanController->ajoutScanValidation();
                        }elseif($url[1]==="mv"){
                            $scanController->modificationScanValidation();
                     }else{
                            throw new Exception("La page n'existe pas");
                        }
            break;
            default : throw new Exception("La page n'existe pas");
        }
    }
}catch(Exception $e){  
    echo $e->getMessage();
}
