<?php
include_once 'config.php';
include_once 'conectBD.php';
include_once 'miscelania.php';
$fitxer_lang = flanguaje();
include_once '../lang/'.$fitxer_lang;

function checkUser($_newUser){
    $query = sprintf('SELECT id FROM usuaris WHERE nom="%s";',$_newUser);
    $res = mysql_query($query) or die (exit('Error Seleccio : '. mysql_error()));
    return $res;
}

function createNewUser($_newUser,$_pass,$_rol){
    $query = sprintf('INSERT INTO usuaris (nom,clau,administrador) VALUES ("%s","%s",%d);',$_newUser,md5($_pass),$_rol);
    mysql_query($query) or 
          die (exit("Error al insertar l'usuari a la BD : ".mysql_error())); 
}

$html_msg = '';
if (isset($_POST["submit"])){
         if ( !empty($_POST["newuser"]) && !empty($_POST["pass"]) ){          
            $newUser = $_POST["newuser"];
            $pass = $_POST["pass"];
            $rol = $_POST["rol"];
        
            $conn = connServer();
            selectBD($conn);
            $res_query = checkUser($newUser); 
        
            if (mysql_num_rows($res_query) > 0 ) {
                $html_msg = '<h2 style=text-align:center;>'. USER . $newUser. CREATE_ERROR .'</h2><br/> ';
            }else{
                createNewUser($newUser, $pass, $rol); 
                $html_msg = '<h2 style=text-align:center;>-'. USER . $newUser . CREATE_OK .'-</h2><br/> ';
            }
            connClosed();
        }else{ 
            $html_msg = '<h2 style=text-align:center;>'.USER_PASS_INVALID.'</h2><br/>';
        }  
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Users</title>
        <link rel="stylesheet" href="../css/estils_login.css" media="screen" type="text/css" />
    </head>
    <body>
        <?php echo $html_msg; ?>
        <div id="content">
            <h2>
                <?php echo CREATE_USERS; ?>
            </h2>
            <form name=="createuser" action="creausuari.php" method="POST" >
                <input type="text" name="newuser" value="" />
                <input type="password" name="pass" value="" />
                    <span style="font:16px bold;"><?php echo ADMIN;?></span>
                <select name="rol" size="1">
                    <option value="0" selected="selected"><?php echo NO;?></option>
                    <option value="1"><?php echo YES;?></option>     
                </select>
                <br/>
                <input type="submit" name="submit" value="<?php echo CREATE;?>" />    
            </form>
            <div id="footer">
                <a href="../index.php"><span style="font:18px bold;"><?php echo BACK;?></span></a>
            </div>
        </div>
     </body>
</html>
