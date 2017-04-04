<?php
session_start();
include_once 'config.php';
include_once 'conectBD.php';

function saveCookie(){
    if ($_POST["languaje"]){
       $lang = $_POST["languaje"];
       setcookie("idioma", $lang, time()+3600, "/" );  
    }
}

function queryCheckLogin($_user,$_pass){ 
    $query = sprintf('SELECT * FROM usuaris WHERE nom="%s" AND clau="%s";',$_user,$_pass);       
    $res = mysql_query($query) or die (exit('Error Seleccio : '. mysql_error()));
    return $res;
}
          
function checkPostValues(){
    if (!isset($_POST["login"])){
       header('Location:error.php');
       exit();     
    }   
    if (!isset($_POST["user"])){
       header('Location:error.php');
       exit();
    }
    
    $user = $_POST["user"];
    $pass = md5($_POST["pass"]);
    $conn = connServer();
    selectBD($conn);

    $res_query = queryCheckLogin($user,$pass);
    if (mysql_num_rows($res_query) > 0 ){
        $dades = mysql_fetch_assoc($res_query);
        $_SESSION["id_user"] = $dades["id"];
        $_SESSION["user"] = $dades["nom"];
        $_SESSION["rol"] = $dades["administrador"];  
        saveCookie();
        connClosed();
        header('Location:intranet.php');
    } else {
        header('Location:error.php?ERROR_LOGIN');
    }
}  

checkPostValues();

?>

