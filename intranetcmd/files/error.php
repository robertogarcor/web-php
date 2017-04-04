<?php 
include 'miscelania.php';
$fitxer_lang = flanguaje();
include '../lang/'.$fitxer_lang;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error!</title>
        <link rel="stylesheet" href="../css/estils_login.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="content">
            <?php
                if(isset($_GET["ERROR_LOGIN"])){
                   print '<h2>'.NOT_USER_PASS_CORRECT.'</h2>';
                }
                else if (isset ($_GET["LOGOUT"])){
                   print '<h2>'.ERROR_LOGOUT.'</h2>'; 
                }else{ 
                   print '<h2>'.ERROR_NOT_LOGIN.'</h2>';
                }
                print '<h2><a href="../index.php">'.BACK.'</a></h2>'. '<br/>';
           ?>  
        </div>          
    </body>
</html>
