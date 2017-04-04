<?php
if (!isset($_SESSION["user"])){
       header ('Location:error.php');
       exit();
}
    
echo '<h1>'.WELCOME_INTRANET.'</h1>';

?>
