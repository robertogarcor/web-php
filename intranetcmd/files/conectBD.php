<?php

function connServer(){
    $conn = mysql_connect(SERVER, USERBD, PASS) or 
                  die (exit('Connexio Fallida: '.mysql_error()));
    return $conn;
}

function selectBD($con) {
     mysql_select_db(BD,$con) or 
              die (exit('Error al connectar amb la BD: '.mysql_error()));   
}

function connClosed(){
    mysql_close();
}



?>

