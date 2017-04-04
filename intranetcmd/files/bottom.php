<?php
if (!isset($_SESSION["user"])){
        header ('Location:error.php');
        exit();
}
    
echo '<p>EAC1</p>';
echo '<p>Roberto García (2014)</p>';

?>

