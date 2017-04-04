<?php

function logout(){
    if (isset ($_GET['logout'])){
        echo "<p class='ok'>Vas a cerrar la sesion, quieres guardar los cambios en un fichero diccionario antes de salir?</p>";
        echo "<form method='POST' action='intranet.php'/>";
        echo "<div>";
            echo "<input type='submit' name='logout' value='SI'/>";
            echo "<input type='submit' name='logout' value='NO'/>";
        echo "</div>";
        echo "</form>";
    }
}
?>
