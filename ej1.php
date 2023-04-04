<?php
/*1. Cargar un vector con N números reales y, a pedido del usuario: mostrar los números 
que superan al promedio y su posición, verificar si los elementos del vector se hallan 
ordenados en forma descendente, muestre el mínimo con su posición.*/



function crearRespuesta(){
  do{
    $respuesta = readline("Desea continuar? Si/no: ");
  }while(strcmp($respuesta,"si")!=0 && strcmp($respuesta,"no")!=0);
  return $respuesta = (strcmp($respuesta,"si")==0) ? true : false;
}

function crearNumeroValidado(){
  do{
    $n = readline("Ingrese un número: ");
    echo PHP_EOL;
  }while(!is_numeric($n));
  $n = (int) $n;
  return $n;
}
function cargarArray(&$array){
  do {
    $n = crearNumeroValidado();
    array_push($array, $n);
    $respuesta = crearRespuesta();
  } while ($respuesta);
} 

function calcularPromedio($numeros){
  return $promedio = array_sum($numeros) / count($numeros);
}

function mostrarSuperanPromedio($numeros,$promedio){
  foreach ($numeros as $posicion => $numero) {
    if($numero > $promedio){
      echo "El número : $numero , posición: $posicion, supera al promedio: $promedio" . PHP_EOL;
    }
  }
}
function buscarMenor($numeros){
  $menor = min($numeros);
  $minimos = array_keys($numeros,$menor,true);
  foreach ($minimos as $posicionEncontrada) {
    echo "Menor: $menor, Posición = $posicionEncontrada".PHP_EOL;
  }
}

function verificarDescendiente($numeros){
  $numerosAux = $numeros;
  rsort($numeros);
  $ascendente = ($numerosAux == $numeros)? true : false;
  if($ascendente){
    echo "El orden es descendiente." . PHP_EOL;
  }else{
    echo "El orden no es descendiente." . PHP_EOL;
  }
}
$numeros = [];
cargarArray($numeros);
mostrarSuperanPromedio($numeros, $promedio = calcularPromedio($numeros));
verificarDescendiente($numeros);
buscarMenor($numeros);