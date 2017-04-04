<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function contentDelete(){
    if (isset($_GET['delete'])){
        echo "<h2>BORRAR PALABRA</h2>
        <form method='POST' action='intranet.php'>
            <fieldset>
            <div>
                <label for='pespanol'>Palabla Español:</label>
                <input type='text' name='pespanol' id='pespanol' placeholder='Introduce palabra' required />  
            </div>
            <div>
                <input type='submit' name='delete' value='Eliminar Palabla'/>
            </div>
            </fieldset>
        </form>";
    }
}



?>