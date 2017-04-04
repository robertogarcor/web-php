<?php
//comprova l'idioma seleccionat
function flanguaje(){
    if (isset($_COOKIE["idioma"])){
        $idioma = $_COOKIE["idioma"];
    }else {
        $idioma = "";
    } 
    switch ($idioma){
        case "catala" : 
            $fitxer_lang = "cat.php";
            break;
        case "angles" :
            $fitxer_lang = "en.php";
            break;
        default :
            $fitxer_lang = "cat.php";
            break;
    }
return $fitxer_lang;
}

//comprova la selecció del idioma
function sel_idioma() {
    if (isset($_COOKIE["idioma"])){
        $idioma = $_COOKIE["idioma"];
    }else {
        $idioma = "";
    }  
    return $idioma;
}



?>
