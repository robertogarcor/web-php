<?php

//if (!isset ($_SESSION['iduser']) && isset($_GET['LOGOUT'])) {
function desconexion() {
    echo "<p class='ok'>Has salido de la sesion correctament.  Pulsa el Boton para volver a la pantalla de Login</p>";
    echo "<form action='index.php' method='POST'/>";
        echo "<input type='submit' name='desconexion' value='Salir'/>";  
    echo "</form>";
    
    }
//} 
    

?>
