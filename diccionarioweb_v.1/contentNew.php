<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<?php

function contentNew (){
    if (isset($_GET['new'])){
         echo "<h2>NUEVA PALABRA</h2>
              <form method='POST' action='intranet.php'>
                <fieldset>
            <div>
                <label for='pespanol'>Palabla Español:</label>
                <input type='text' name='pespanol' id='pespanol' placeholder='Introduce palabra' required />  
            </div>
            <div>
                <label for='pingles'>Palabla Ingles:</label>
                <input type='text' name='pingles' id='pingles' placeholder='Introduce palabra' required />   
           </div>
            <div>
                <input type='submit' name='nuevoS' value='Guardar Palabra'/>
                <!--<input type='submit' name='nuevoF' value='Guardar Fichero'/>-->
            </div>
         </fieldset>
        </form>";
    } 
}

        
?>
   
