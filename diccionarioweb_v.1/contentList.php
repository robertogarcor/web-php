<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function contentList(){
    if (isset($_GET['list'])){
        echo "<h2>DIRECTORIO DE PALABRAS</h2>";
      
        if (count($_SESSION[$_SESSION['fitxer']]) > 0) { 
            $listaPalabras = "<table>"
                                . "<tr>"
                                    . "<th>Español</th>"
                                    . "<th>Ingles</th>"
                                . "</tr>";
            foreach ($_SESSION[$_SESSION['fitxer']] as $pe=>$pi){
                $listaPalabras .= "<tr>"
                                    . "<td>$pe</td>"
                                    . "<td>$pi</td>"
                                . "</tr>";                              
            }
            $listaPalabras .= "</table>"; 
            echo $listaPalabras;
        } else { 
            print "<p class='ok'>No hay palablas en el diccionario.</p>";  
		}

	}

}
?>
