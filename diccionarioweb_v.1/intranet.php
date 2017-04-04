<?php 
require_once 'header.php';
require_once 'nav.php';
require_once 'contentNew.php';
require_once 'contentList.php';
require_once 'contentDelete.php';
require_once 'contentUpdate.php';
require_once 'contentSearch.php';
require_once 'logout.php';
require_once 'desconexion.php';
session_start();

$html_mensaje ="";

function cerrarSesion(){
    $_SESSION = array();
    setcookie(session_name(),'', time(), '/');
    session_destroy();
    desconexion();
    //header('location:desconexion.php?LOGOUT');
    exit();      
}

if(isset($_POST['logout'])) {
    if ($_POST['logout'] == "SI") {
        try {
            $fw = "";
            //forma 1
            foreach ($_SESSION[$_SESSION['fitxer']] as $key=>$val) {
                $fw .= $key.",".$val.PHP_EOL;   
            }
            file_put_contents($_SESSION['fitxer'], $fw);
        } catch (Exception $e){
            throw new Exception(print $e->getMessage());          
        } finally {
            cerrarSesion();  
        }                   
    } else {
        cerrarSesion();
    }
}



if (isset ($_POST['nuevoS'])){
    if (isset ($_POST['pespanol']) && isset ($_POST['pingles'])) {
        $_SESSION[$_SESSION['fitxer']][$_POST['pespanol']] = $_POST['pingles'];
        $html_mensaje = "<p class='ok'>Nueva palabra ". "\"".$_POST['pespanol'] ."\""." insertada correctamente."."</p>";
    } 
}

if (isset($_POST['nuevoF'])) {
    if (isset ($_POST['pespanol']) && isset ($_POST['pingles'])) {
        
    }
}

if (isset ($_POST['delete']) && isset($_POST['pespanol'])){
   if (array_key_exists($_POST['pespanol'], $_SESSION[$_SESSION['fitxer']])){
       unset($_SESSION[$_SESSION['fitxer']][$_POST['pespanol']]);
       $html_mensaje = "<p class='ok'>Borrada la palabra ". "\"".$_POST['pespanol'] ."\""." correctamente."."</p>";
       
   } else {
       $html_mensaje = "<p class='error'>No existe la palabra ". "\"".$_POST['pespanol']."\""." introducida."."</p>";
         
   }
}

if (isset ($_POST['search']) && isset($_POST['pespanol'])){
   foreach ($_SESSION[$_SESSION['fitxer']] as $key=>$valor) {
     if ($key == $_POST['pespanol']){
        header("location:intranet.php?update&pupdate=$_POST[pespanol]&valor=$valor");
        exit();   
        } else {
           $html_mensaje = "<p class='error'>No existe la palabra ". "\"".$_POST['pespanol']."\""." introducida."."</p>";   
        }  
    }
}

if (isset ($_POST['update']) && isset($_POST['pespanol']) && isset($_POST['pingles'])){
    foreach ($_SESSION[$_SESSION['fitxer']] as $key => $valor) {
        if ($key == $_POST['pespanol']) {
            $_SESSION[$_SESSION['fitxer']][$key] = $_POST['pingles'];
            $html_mensaje = "<p class='ok'>Actualizada la palabra ". "\"".$_POST['pespanol'] ."\""." correctamente."."</p>";
        }else{
			$html_mensaje = "<p class='error'>No existe la palabra ". "\"".$_POST['pespanol']."\""." introducida."."</p>"; 
		} 
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Diccionario Web</title>
    <link rel="stylesheet" href="css/miestilo.css" type="text/css"/>
</head>
<body>
    <header>
         <?php mostrarheader(); ?> 
    </header>
    <nav>
       <?php  mostrarNav(); ?>
    </nav>  
    <section id="content">
        <?php 
            if (isset($_GET['new'])) {
                contentNew();
            }  
            if (isset($_GET['delete'])){
                contentDelete();
            }    
            if (isset($_GET['list'])){
                 contentList(); 
            }
            if (isset($_GET['search'])){
                contentSearch();
            } else if (isset($_GET['update'])){
                contentUpdate();
            }
            if (isset($_GET['logout'])) {
                logout();    
            }
        ?> 
    </section>
    <section id="mensaje">
            <?php  
                if ($html_mensaje != null){
                    echo $html_mensaje;
                }
            ?>
    </section>
</body>
</html>