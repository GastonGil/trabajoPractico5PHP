<?php
/*
3. Mediante un menú de opciones realizar el siguiente programa modular: 
a) Cargar un vector hasta que el operador no quiera ingresar más datos, validar que 
se ingresen números enteros impares. 
b) Mostrar  un mensaje que muestre si los datos del vector están repetidos o no. 
c) Contar y mostrar cuántos valores K hay en el vector. 
d) Calcular y mostrar el promedio de los datos del vector. 
e) Mostrar a opción del operador: la posición de los datos y los datos que superan 
el promedio o aquellos que no lo hacen
*/
function crearRespuesta(&$respuesta){
  do{
    $respuesta = readline("Desea continuar? Si/no: ");
  }while(strcmp($respuesta,"si")!=0 && strcmp($respuesta,"no")!=0);
  $respuesta = (strcmp($respuesta,"si")==0) ? true : false;
}
function crearOpcion(&$opcion){
  do{
    echo "1-Cargar vector.".PHP_EOL;
    echo "2-Validar si los datos están repetidos.".PHP_EOL;
    echo "3-Buscar valores K.".PHP_EOL;
    echo "4-Ver el promedio de los valores.".PHP_EOL;
    echo "5-Ver datos que superan el promedio".PHP_EOL;
    echo "6-Ver datos que no superan el promedio".PHP_EOL;
    echo "7-Fin".PHP_EOL;
    $opcion = readline();
    if($opcion == 7){
    echo "Fin del programa.".PHP_EOL;
    }
  }while($opcion < 1 || $opcion > 7);
}
function crearNumeroValidado(){
  do{
    do{
      $n = readline("Ingrese un número: ");
      echo PHP_EOL;
    }while(!is_numeric($n));
    $n = (int) $n;
    if($n % 2 == 0){
      echo "El número = $n es par. Vuelva a ingresar." . PHP_EOL;
    }
  }while($n % 2 == 0);
  return $n;
}
function cargarArray(&$array){
  do {
    $n = crearNumeroValidado();
    array_push($array, $n);
    crearRespuesta($respuesta);
  } while ($respuesta);
}

function validarRepetidos($numeros){
  if(count($numeros)>count(array_unique($numeros))){
    echo "Hay datos repetidos." .PHP_EOL;
  }else{
    echo "No hay datos repetidos." .PHP_EOL;
  }
}

function calcularPromedio($numeros){
  return $promedio = array_sum($numeros) / count($numeros);
}

function buscarDatosMayorAPromedio($numeros, $promedio){
  foreach ($numeros as $posicion => $numero) {
    if($numero > $promedio){
      echo "El número $numero, posición $posicion > $promedio" . PHP_EOL;
    }
  }
}

function buscarDatosMenorAPromedio($numeros, $promedio){
  foreach ($numeros as $posicion => $numero) {
    if($numero < $promedio){
      echo "El número $numero, posición $posicion < $promedio" . PHP_EOL;
    }
  }
}

function buscarValoresK($numeros){
  $contador = 0;
  $k = crearNumeroValidado();
  foreach ($numeros as $posicion => $numero) {
    if($numero == $k){
      echo "El número $numero, posición $posicion = $k" . PHP_EOL;
      $contador++;
    }
  }
}

$numeros = [];
do {
  crearOpcion($opcion);
  switch ($opcion) {
    case '1':
      cargarArray($numeros);
      break;
    case '2':
      validarRepetidos($numeros);
      break;
    case '3':
      buscarValoresK($numeros);
      break;
    case '4':
      echo $promedio = calcularPromedio($numeros);
      break;
    case '5':
      buscarDatosMayorAPromedio($numeros,calcularPromedio($numeros));
      break;
    case '6':
      buscarDatosMenorAPromedio($numeros,calcularPromedio($numeros));
      break;
  }
} while ($opcion != 7);