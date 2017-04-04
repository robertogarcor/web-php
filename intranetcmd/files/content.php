<?php
include_once 'conectBD.php';

function select_cmd_NOT_Execute(){
    $query = sprintf('SELECT comandes.id,user_id,nom,comanda'
                 .' FROM usuaris,comandes'
                    .' WHERE usuaris.id=comandes.user_id'
                        .' AND resultat_comanda IS NULL;');
    $res = mysql_query($query) or die (exit('Error Seleccio : '. mysql_error()));
    return $res;
}

function show_cmd_NOT_Execute($_query){
   if( mysql_num_rows($_query) != 0) {
         print '<div><table border="1" align="center" width=25% style=text-align:left;>';
           while ($row = mysql_fetch_array($_query,MYSQL_BOTH)){
                 $user_cmd = $row["nom"];
                 $cmd = $row["comanda"];
                 $id_cmd= $row["id"];
                      print '<tr>'.
                                '<td>'.$user_cmd.'</td>'.
                                '<td>'.$cmd.'</td>'.
                                '<td><a href="intranet.php?id='.$id_cmd.'">'.EXECUTE_CMD.'</a></td>'.
                            '</tr>';
                       }
          print '</table></div>';
    }else{
        print '<h2>'.RESQUEST_EXEC_CMD_NO_FOUND.'</h2>';
    }    
}

function select_res_cmdId (){
    $query = sprintf('SELECT user_id,resultat_comanda '
                                . 'FROM comandes '
                                    . 'WHERE id="%s" AND user_id=%d;',$_GET["showCmd"],$_SESSION["id_user"]);
    $res = mysql_query($query) or die (exit('Error Seleccio : '. mysql_error()));  
    return $res;
}

function show_res_cmdID($_resSelect){
    if (mysql_num_rows($_resSelect) > 0){
         $llist = mysql_fetch_assoc($_resSelect);
              print '<h2>'.REPORT_CMD_EXEC_ID.$_GET["showCmd"].'</h2>';
              print '<pre>'. $llist["resultat_comanda"] .'</pre>';  
    }else {
              print '<h2>'.NOT_EXIST_REPORT.'</h2>';     
    }   
}

if (!isset($_SESSION["user"]) ){
        header ('Location:error.php');
        exit();
}
switch ($rol){
    case "0":
        echo '<br/>';
        if (isset($_GET["askCommand"]) || isset($_POST["saved_cmd"])){
           include 'form_comandes.php';  
        }
        else if (isset($_GET["showCommand"])){
           include 'veure_comandes.php';
        }
        else if (isset($_GET["showCmd"])){
            $conn = connServer();
            selectBD($conn);
            $res_sel = select_res_cmdId();
            show_res_cmdID($res_sel);
            connClosed();
        }
        else if (isset($_GET["SAVED"])){  
            echo '<br/><h2>'.SAVED_CMD_TITLE.'</h2>';
        }
        else if(isset($_GET["UNSET"])){
            echo '<br/><h2>'.UNSET_CMD_TITLE.'</h2>';
        }
        break;    
    case "1":
        echo '<br/><h2>'.RESQUEST_EXEC_CMD.'</h2><br/>';
            $conn = connServer();
            selectBD($conn);  
            $res_query = select_cmd_NOT_Execute();
            show_cmd_NOT_Execute($res_query);
            connClosed();
        break;     
}

?>




