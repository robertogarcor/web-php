<?php

function contentSearch(){
    if (isset($_GET['search'])){ 
        echo "<form method='POST' action='intranet.php'>
            <fieldset>
            <div>
                <label for='pespanol'>Palabra Español:</label>
                <input type='text' name='pespanol' id='pespanol' placeholder='Introduce palabra' required />  
            </div>
            <div>
                <input type='submit' name='search' value='Buscar Palabla'/>
            </div>
            </fieldset>
        </form>";
    }
}

?>
