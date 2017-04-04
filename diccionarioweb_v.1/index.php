<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Diccionario Web</title>
    <link rel="stylesheet" href="css/miestilo.css" type="text/css"/>
</head>
<body>
    <section id="login">
        <h2>DICCIONARI WEB</h2>
        <form action="checkuser.php" method="POST">
             <!-- fieldset -->
                <div>
                    <label for="iduser">User:</label> 
                    <input type="text" name="iduser" id="iduser" />
                </div>
                <div>
                    <label for="pass">Password:</label>
                    <input type="password" name="pass" id="pass" /> 
                </div>
                <div>
                    <input type="submit" name="login" value="LOGIN" />
                </div>
        </form> 
    </section> 
</body>
</html>