<?php
/*
2. Hacer un módulo que cargue un vector con N valores enteros al azar pertenecientes 
al intervalo [100,999] que no estén repetidos, validados por el módulo.
*/

function crearRespuesta(&$respuesta){
  do{
    $respuesta = readline("Desea continuar? Si/no: ");
  }while(strcmp($respuesta,"si")!=0 && strcmp($respuesta,"no")!=0);
  $respuesta = (strcmp($respuesta,"si")==0) ? true : false;
}
function cargarNumerosRandom(&$numeros){
  do {
    $n = mt_rand(100, 999);
    $existe = false;
    foreach ($numeros as $numero) {
      if ($n == $numero) {
        $existe = true;
        break;
      }
    }
    if (!$existe) {
      array_push($numeros, $n);
    }
    crearRespuesta($respuesta);
  } while ($respuesta);
}
$numeros = [];
cargarNumerosRandom($numeros);
foreach ($numeros as $numero) {
  echo $numero .PHP_EOL;
} 