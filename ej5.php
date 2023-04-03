<?php
/*
Realizar un programa que genere aleatoriamente 20 números enteros y los guarde 
en un vector, luego realizar lo siguiente:  
a) Mostrar  los primeros N valores del vector. Validar que N sea válido. 
b) Mostrar  la suma de los valores pares. 
c) Buscar un número dado y mostrar su posición, en caso de  no existir mostrar un 
mensaje de error. 
d) Verificar si el vector se encuentra ordenado en forma ascendente.
*/


function crearOpcion(&$opcion){
  do{
    echo "1-Mostrar la cantidad de los primeros números que desea ver.".PHP_EOL;
    echo "2-Mostrar la suma de los números pares.".PHP_EOL;
    echo "3-Mostrar si existe un número dado y su posición.".PHP_EOL;
    echo "4-Verificar si los números estan en forma ascendente.".PHP_EOL;
    echo "5-Fin".PHP_EOL;
    $opcion = readline();
    if($opcion == 5){
    echo "Fin del programa.".PHP_EOL;
    }
  }while($opcion < 1 || $opcion > 5);
}
function cargarNumerosRandom(&$numeros){
  for ($i=0; $i < 20; $i++) {
    array_push($numeros, (int) mt_rand());
  }
}
function crearNumeroValidado(){
  do{
    $n = readline("Ingrese un número: ");
    echo PHP_EOL;
  }while(!is_numeric($n));
  $n = (int) $n;
  return $n;
}
function mostrarPrimerosNs($numeros){
  $n = crearNumeroValidado();
  for ($i=0; $i < $n; $i++) {
    echo "Posición: ".$i ." número: $numeros[$i]" .PHP_EOL;
  }
}
function mostrarSumaPares($numeros){
  $acumulador = 0;
  foreach($numeros as $numero){
    if ($numero % 2 == 0) {
      $acumulador += $numero;
    }  
  }
  echo "La suma de los pares es: $acumulador" . PHP_EOL;
}
function mostrarNumeroDado($numeros){
  $n = crearNumeroValidado();
  $encontrados = array_keys($numeros,$n,true);
  if(count($encontrados)==0){
    echo "No se encontro ningún número identico al ingresado" . PHP_EOL;
  }else{
    foreach ($encontrados as $posicionEncontrada) {
      echo "Se encontro el número $n en la posición: $posicionEncontrada".PHP_EOL;
    }
  }
}

function verificarOrdenAscendente($numeros){
  $numerosAux = $numeros;
  sort($numeros);
  $ascendente = ($numerosAux == $numeros)? true : false;
  if($ascendente){
    echo "El orden es ascendente." . PHP_EOL;
  }else{
    echo "El orden no es ascendente." . PHP_EOL;
  }
}


$numeros = [];
cargarNumerosRandom($numeros);
do {
  crearOpcion($opcion);
  switch ($opcion) {
    case '1':
      mostrarPrimerosNs($numeros);
      break;
    case '2':
      mostrarSumaPares($numeros);
      break;
    case '3':
      mostrarNumeroDado($numeros);
      break;
    case '4':
      verificarOrdenAscendente($numeros);
      break;
  }
} while ($opcion != 5);