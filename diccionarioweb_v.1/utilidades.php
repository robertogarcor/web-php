<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function mensaje($mensaje,$palabra){
    switch ($mensaje) {
        case "okNewp" :
            $mensaje = "<p class='ok'>Borrada la palabra " . $palabra ."</p>";
            break;
        case 'errorDelp' :
            $mensaje = "<p class='error'>No existe la palabra " . $palabra ."</p>";
    }
    return $mensaje;
}


?>