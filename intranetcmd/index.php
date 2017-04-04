<?php
 include_once 'files/miscelania.php';
 $fitxer_lang = flanguaje();
 include_once 'lang/'.$fitxer_lang;
 
 $html_lang = '';
 $idioma = sel_idioma();
     if ($idioma == ""){
        $html_lang = '
             <select name="languaje" size="1" >'
             .'<option value="catala" selected="selected">'.LANG_CATALA.'</option>'
             .'<option value="angles">'.LANG_INGLISH.'</option>'
             .'</select>';
     }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login?</title>
        <link rel="stylesheet" href="css/estils_login.css" media="screen" type="text/css" />
    </head>
    <body> 
       <div id="content">
            <?php echo "<h1>".WELCOME."</h1>"; ?>
            <form name="frmLogin" action="files/logincheck.php" method="POST">
                <input type="text" name="user" />
                <br/>
                <input type="password" name="pass" />
                <br/>
                <?php echo $html_lang;?>
                <br/>
                <input type="submit" value="Login" name="login" >
            </form>
           <h3 style="padding:0px; margin:0px; line-height:0px;"><a href="files/creausuari.php"><?php echo REGISTER;?></a></h3>
           <br/><br/>
            <div id="footer">
                <div id="autor">
                    <span><?php echo AUTHOR ?>: Roberto Garcia</span>
                </div>
           </div>
       </div>
    </body>
</html>

