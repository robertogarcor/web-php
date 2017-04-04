<?php

function select_llist_user(){
    $query = sprintf('SELECT id,user_id,comanda '
                           . 'FROM comandes '
                                . 'WHERE user_id = %d '
                                     . 'AND resultat_comanda IS NOT NULL;',$_SESSION["id_user"]);        
    $res = mysql_query($query) or die (exit('Error Seleccio : '. mysql_error()));
    return $res;   
}

function show_llist_user($_resSelect){
    if (mysql_num_rows($_resSelect) != 0){
        print '<ul>';
            while ($row = mysql_fetch_array($_resSelect,MYSQL_BOTH)){
                $comand = $row["comanda"];
                $idCmd = $row["id"];
                print '<li><a href="intranet.php?showCmd='.$idCmd.'">Cmd: '.$comand.'</a></li><br/>';
            }
        print '</ul>'; 
    }  
}

if (!isset($_SESSION["user"]) ){
        header ('Location:error.php');
        exit();        
}

echo '<br/><br/>'.ACCESS_LOGIN.'<br/><br/>';
echo '<b>'.$user.'</b>';
echo ' ';
echo '<a href="intranet.php?LOGOUT">'.'['.CLOSE_SESSION.']'.'</a>';
echo '<br/><br/>';
   
switch ($rol){
    case "0" :
        echo '<a href="intranet.php?askCommand">'.ASK_CMD.'</a><br/>';
        echo '<a href="intranet.php?showCommand">'.SHOW_CMD.'</a>';
        echo '<br/><br/>'.REPORTS_CMD_EXEC.'<br/><br/>';
            $conn = connServer();
            selectBD($conn);
            $res_sel = select_llist_user();
            show_llist_user($res_sel);
            connClosed();
        break;
    case "1" :
        echo '';
        break;
}      

?>
 

