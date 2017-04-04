<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'config.php';

//$file = "dicci.txt";
//$extensio = substr($file, -4);
//$nomfile = substr($file, 0, -4);


if (isset($_POST['login'])){
    if (isset($_POST['iduser']) &&  $_POST['iduser'] == USER && (isset($_POST['pass']) && $_POST['pass'] == PASS)){
        session_start();
        $file = $_POST['iduser'].".txt";
        $_SESSION['iduser'] = $_POST['iduser'];
        if (file_exists($file)){
            try {
                $fr = fopen($file, "rb");
                while(feof($fr) == false){
                    $adatos = fgetcsv($fr,",");
                    $_SESSION[$file][$adatos[0]] = $adatos[1];
                }
            } catch (Exception $e) {
                throw new Exception(print $e->getMessage());           
            } finally {
                fclose($file); 
            }
        } else {
            touch($file);
            $_SESSION[$file] = array();
        }
        $_SESSION['fitxer'] = $file;
        //$_SESSION['diccionario'] = ["perro"=>"god","gato"=>"cat","volar"=>"fly"];
        header("location:intranet.php?LOGIN");
    } else {
        exit('Error de Credenciales');
    }
} else {
    header("location:index.php");
}