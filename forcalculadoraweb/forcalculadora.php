<?php

/* 
 *Modelo de operaciones form calculadora web
 *Autor : Roberto Garcia
 *Fecha : 21/02/2016 
 * 
 */

$numero1=0;
$numero2=0;
$operacionBasica="";
$cResultados="";
$operacionAvanzada="";

if (isset ($_POST["submit"])) {
    if ( (isset ($_POST["num1"]) && (isset($_POST["num2"]) && ($_POST["num2"]) != "0") && (isset ($_POST["op"]))) )  {
        $numero1= $_POST["num1"];
        $numero2= $_POST["num2"];
        $operacionBasica=$_POST["op"];
        //Lamada a Funcio operacionesBasicas
        $resOperacionBasica = operacionesBasicas($numero1,$numero2,$operacionBasica);
        $cResultados = $cResultados . "La operacion $operacionBasica de los numeros"
                                    . " $numero1 y $numero2 es igual a $resOperacionBasica"."<br/>";
        if (isset ($_POST["opv"][0]) && $_POST["opv"][0] == "raizCuadrada" ) {
            //Lamada a Funcio operacionRaiz
            $resOperacionRaiz = operacionRaiz($resOperacionBasica);
            $operacionAvanzada = $_POST["opv"][0];
            $cResultados .= "La operacion $operacionAvanzada de $operacionBasica $numero1 y $numero2"
                         . " = $resOperacionBasica es igual a $resOperacionRaiz"."<br/>" ;
        }
        if (isset ($_POST["opv"][1]) && $_POST["opv"][1] == "potencia" ) {
            //Lamada a Funcio operacionPotencia
            $resOperacionPotencia = operacionPotencia($numero1,$numero2);
            $operacionAvanzada = $_POST["opv"][1];
            $cResultados .= "La operacion $operacionAvanzada de la base $numero1 y el exponente $numero2"
                         . " es igual a $resOperacionPotencia"."<br/>" ;
        }
    } else { 
      $cResultados .= "<p class='error'>Introduce los datos correctamente en el Formulario Calculadora</p>"; 
    }
} else {
   $cResultados .= "<p class='error'>Introduce los datos correctamente en el Formulario Calculadora</p>"; 
}      
   
function operacionesBasicas($num1,$num2,$op){
    switch ($op){
       case "sumar":
            //Operacion Sumar
           $resOperacion=$num1+$num2;
            break;
       case "restar":
            //Operacion Restar
           $resOperacion=$num1-$num2;
            break;
       case "multiplicar":
           //Operacion Multiplicar
           $resOperacion=$num1*$num2;
            break;
       case "dividir":
            //Operacion Dividir
           $resOperacion=$num1/$num2;
            break;
    }    
    return $resOperacion;
}

function operacionPotencia($num1,$num2){
    $resPotencias = pow($num1, $num2);
    return $resPotencias;
}

function operacionRaiz($num){
    return sqrt($num);  
}


header("location:index.php?resultados=".$cResultados);

?>
