<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



function contentUpdate(){
    if (isset($_GET['update']) && (isset($_GET['pupdate']) && $_GET['pupdate'] != null ) && isset($_GET['valor'])){
        $pespanol = $_GET['pupdate'];
        $pvalor = $_GET['valor'];
        echo "<h2>ACTUALIZAR PALABRA</h2>";
            echo "<form method='POST' action='intranet.php'>
                <fieldset>
                <div>
                    <label for='pespanol'>Palabla Español:</label>
                    <input type='text' name='pespanol' id='pespanol' value='$pespanol' readonly />  
                </div>
                 <div>
                    <label for='pespanol'>Nueva Palabla Ingles:</label>
                    <input type='text' name='pingles' id='pingles' placeholder='(valor actual) - $pvalor' required />  
                </div>
                <div>
                    <input type='submit' name='update' value='Modificar Palabla'/>
                </div>
                </fieldset>
            </form>";    
     }
}

?>
