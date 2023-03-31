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
  $acumulador = 0;
  foreach($numeros as $numero){
    $acumulador += $numero;
  }
  return $promedio = $acumulador / count($numeros);
}

function mostrarSuperanPromedio($numeros,$promedio){
  foreach ($numeros as $posicion => $numero) {
    if($numero > $promedio){
      echo "El número : $numero , posición: $posicion, supera al promedio: $promedio" . PHP_EOL;
    }
  }
}
function buscarMenor($numeros){
  $menor = null;
  $posicion = 0;
  foreach($numeros as $posicionN => $numero){
    if ($posicion == 0){
      $menor = $numero;
      $posicion++;
    }else if($numero < $menor){
      $menor = $numero;
      $posicion = $posicionN;
    }
  }
  echo ("Número = $menor, posición = $posicion");
}

function verificarDescendiente ($numeros){
  $esMayor = false;
  $numeroAnterior = null;
  $cont = 0;
  foreach ($numeros as $posicion => $numero) {
    if($posicion == 0){
      $numeroAnterior = $numero;
    }else{
      $esMayor = ($numero > $numeroAnterior) ? true : false;
    }
    if($posicion != 0 && $esMayor == false){
      break;
    }
  }
  return $esMayor;  
}
$numeros = [];
cargarArray($numeros);
mostrarSuperanPromedio($numeros, $promedio = calcularPromedio($numeros));
if($descendiente = verificarDescendiente($numeros)){
  echo "Sus números estan ordenados en forma descendiente." .PHP_EOL; 
}
buscarMenor($numeros);