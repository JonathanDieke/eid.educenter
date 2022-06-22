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
