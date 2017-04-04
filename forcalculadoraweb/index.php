
<!--
Formulario Calculadora Web
Autor: Roberto Garcia
-->

<?php

if (isset ($_GET["resultados"])) {
    $cResultados=$_GET["resultados"];
} else {
    $cResultados="Introduce los datos correctamente en el Formulario Calculadora";
}
?>        
        
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Calculadora Web</title>
        <link rel="stylesheet" type="text/css" href="css/miestilo.css"/>
    </head>
    <body>
	<section id="interface">
		<header>
			<h2>FORMULARIO CALCULADORA WEB</h2>
		</header>
		<form name="form" method="POST" action="forcalculadora.php">
                <fieldset>
                    <legend>Form Calculator Web</legend>
		<div>
                    <label>Numero1:</label>
                    <input type="number" name="num1" min="0" required/>
		</div>
		<div>
                    <label>Numero2:</label>
                    <input type="number" name="num2" min="1" required/>
		</div>
                    <fieldset>
                        <legend>Operaciones Basicas</legend>
                        <div>
                            <label for="sumar">Sumar</label>
                            <input type="radio" name="op" value="sumar" id="sumar" required >
                            <label for="restar">Restar</label>
                            <input type="radio" name="op" value="restar" id="restar" required >
                        </div>
                        <div>
                            <label for="">Multplicar</label>
                            <input type="radio" name="op" value="multiplicar" required />
                            <label for="">Dividir</label>
                            <input type="radio" name="op" value="dividir" required />
                        </div>
                        </fieldset>
                    <fieldset>
                        <legend>Operaciones Avanzadas</legend>
                        <div>
                            <label for="raiz">Raiz Cuadrada</label>
                            <input type="checkbox" name="opv[]" value="raizCuadrada" id="raiz" >
                            <label for="potencia">Potencia</label>
                            <input type="checkbox" name="opv[]" value="potencia" id="potencia" >
                        </div>
                    </fieldset>
                    <div>
                        <input type="submit" name="submit" value="Calcular Operacion"/>
                    </div>
                </fieldset>
		</form>
	</section>
	<section id="resultado">
		<header>
			<h2>:RESULTADOS:</h2>
		</header>
		<?php
                  echo $cResultados;
                ?>
	</section> 
</body>
</html>
