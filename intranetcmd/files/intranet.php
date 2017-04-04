<?php
  session_start();
  include_once 'miscelania.php';
  include_once 'config.php';
  include_once 'conectBD.php';
  $fitxer_lang = fLanguaje();
  include_once '../lang/'.$fitxer_lang;
  
  function insertCmdBD($_iduser) {
      foreach ($_SESSION["cmd"] as $k => $v) { 
        $query = sprintf('INSERT INTO comandes (user_id,comanda) VALUES (%d,"%s");',$_iduser,$v);
        mysql_query($query) or
              die ( exit('Error al insertar les comandes a BD :' .mysql_error()) );
     }
  }
  
  function selectCmdExec($_idComanda){
      $query_cmd = sprintf('SELECT comanda FROM comandes '
                            . 'WHERE id=%d AND resultat_comanda IS NULL;',$_idComanda);
      $resq_cmd = mysql_query($query_cmd) or die (exit('Error Seleccio : '. mysql_error()));
      if (mysql_num_rows($resq_cmd) != 0){
         $dades = mysql_fetch_assoc($resq_cmd);
         $comanda = $dades["comanda"];
      }else{
         return null;
     }
     return $comanda;     
  }
  
  function updateCmd($_idComanda,$_comanda){
      $query_upd = sprintf('UPDATE comandes'
                            .' SET resultat_comanda="%s"'
                                .' WHERE id=%d;',shell_exec($_comanda),$_idComanda);
      mysql_query($query_upd) or 
            die (exit('Error a l\'executar la comanda: '.mysql_error())); 
  }
  
 if (isset($_GET["LOGOUT"])){
    $_SESSION = array();
    setcookie(session_name(), '',time(), '/'); //elimina la cookie de la sessió
    session_destroy();
    header('Location: error.php?LOGOUT');
    //header("location:../index.php");
    exit();
}  
 
 if (isset($_SESSION["user"]) ){
     $id_user = $_SESSION["id_user"];
     $user = $_SESSION["user"];
     $rol = $_SESSION["rol"]; 
 }else{
     header ('location:error.php');
     exit();
 }
    
 if (isset($_POST["saved_cmd"]) and !empty($_POST["command"])){
     $_SESSION["cmd"][] = $_POST["command"];            
 }
 
 $html_content_cmd = '';
 if (isset($_POST["saved_cmd"]) and empty($_POST["command"])){
     $html_content_cmd = '<br/><br/><br/>'.'<h2>'.INVALID_CMD.'</h2>';   
 }
 
 if(isset($_GET["UNSET"])){
     unset($_SESSION["cmd"]);
 } 
 
 if (isset($_GET["SAVED"])){  
     $conn = connServer();
     selectBD($conn);
     insertCmdBD($id_user);
     connClosed();
     unset($_SESSION["cmd"]);
 }
 
 if(isset($_GET["id"])){
     $id_comanda = $_GET["id"];
     $conn = connServer();
     selectBD($conn);
     $cmd_exec = selectCmdExec($id_comanda);
     if ($cmd_exec == null){
         $html_content_cmd ='<br/><h2>'.ERROR_ID_CMD.'</h2>';
     }else{
         updateCmd($id_comanda, $cmd_exec);  
     }
     connClosed();
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Intranet M9</title>
        <link rel="stylesheet" href="../css/estils_intranet.css" media="screen"  type="text/css" />
    </head>
    <body> 
        <div id="toplogo">
           <?php include 'top.php'; ?>   
        </div>
        <div id="content">
            <div id="maincontent">
              <?php 
                  include 'content.php'; 
                  echo $html_content_cmd;  
              ?>
            </div>
            <div id="leftcontent">
                <?php include 'menu.php'; ?>
            </div>
        </div>
        <div id="footer">
            <?php include 'bottom.php'; ?> 
        </div>
    </body>   
</html>





