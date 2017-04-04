<?php 
    function showCommandUser(){
            if (isset($_SESSION["cmd"])){
                print '<div><table border="1" align="center" style=text-align:left;>'; 
                   foreach ($_SESSION["cmd"] as $k => $v){
                       print '<tr>'.
                                '<td>'.$k.'</td>'.
                                '<td>'.$v.'</td>'.
                             '</tr>';
                  }
                       print '<tr>'.      
                                '<td><a href="intranet.php?SAVED">'.LINK_SAVED_CMD.'</a></td>'.
                                '<td><a href="intranet.php?UNSET">'.LINK_UNSET_CMD.'</a></td>';
                             '</tr>';
                 print '</table></div>';         
           }else{
               print '<h2>'.CMD_NO_FOUND.'</h2>';
           }          
    }
    
    
    if(!isset($_SESSION["user"])){
         header('Location:error.php');
         exit();
    }
    
    echo '<h2>'.SHOW_CMD_TITLE.'</h2><br/>';
    showCommandUser();

?>