<?php

/*
 * Web service of products to be consumed by Mobile App 
 */

//Credentials server mysql
//Change values according to needs
define('HOST','127.0.0.1');
define('DB','androidweb');
define('PORT','3306');
define('CHARSET','utf8');
define('USER','root');
define('PASSWORD','');
define('DSN', 'mysql:dbname='. DB .';host='. HOST .';port='. PORT .';charset='. CHARSET .'');

?>