<?php
/*
4. Realizar un programa que permita cargar los resultados de un examen, para los 
objetivos que se buscan NO es necesario ingresar el nombre ni los demás datos de 
los alumnos. El programa debe realizar, mediante un menú de opciones, las siguientes 
operaciones: 
a) Cargar las notas hasta que el operador no quiera ingresar más datos, validar 
que las notas estén en el intervalo [1, 10]. Si el valor ingresado NO es válido 
mostrar un mensaje de error y volver a solicitarlo hasta que el valor sea correcto 
(utilice un sub algoritmo para esta validación). 
b) Mostrar  las notas y el orden en que fueron ingresadas. 
c) Mostrar  el Promedio de las notas ingresadas. 
d) Mostrar  las notas que superan al  promedio y su posición. 
e) Calcular cual  fue la nota máxima obtenida y mostrar cuantos alumnos la obtuvieron. 
f) Solicitar una nota y  mostrar cuantos alumnos la obtuvieron. 
g) Mostrar el porcentaje de alumnos que obtuvieron la nota máxima y el 
porcentaje de alumnos que obtuvieron la nota mínima. 
h) Salir 
Consideración: para poder realizar cualquiera de las opciones (entre la opción 2 a la 7), debe 
verificar que el vector se encuentre cargado, en caso contrario mostrar el mensaje "Debe 
cargar las notas antes de realizar esta operación". 
También debe limpiar la pantalla cada vez que se termine de procesar una opción
*/

function crearRespuesta(&$respuesta){
  do{
    $respuesta = readline("Desea continuar? Si/no: ");
  }while(strcmp($respuesta,"si")!=0 && strcmp($respuesta,"no")!=0);
  $respuesta = (strcmp($respuesta,"si")==0) ? true : false;
}


function crearOpcion(&$opcion){
  do{
    echo "1-Cargar notas.".PHP_EOL;
    echo "2-Mostrar notas y orden de ingreso.".PHP_EOL;
    echo "3-Mostrar promedio de notas.".PHP_EOL;
    echo "4-Mostrar notas que superan el promedio y posición de ingreso.".PHP_EOL;
    echo "5-Mostrar nota máxima y cantidad de alumnos que la superaron.".PHP_EOL;
    echo "6-Mostrar porcentajes de alumnos que obtuvieron la máxima y la mínima.".PHP_EOL;
    echo "7-Mostrar cuantos obtuvieron una nota a ingresar." . PHP_EOL;
    echo "8-Fin".PHP_EOL;
    $opcion = readline();
    if($opcion == 8){
    echo "Fin del programa.".PHP_EOL;
    }
  }while($opcion < 1 || $opcion > 8);
}


function crearNotaValidada(){
  do{
    do{
      $n = readline("Ingrese una nota: ");
      echo PHP_EOL;
    }while(!is_numeric($n));
    $n = (int) $n;
    if($n < 1 || $n > 10){
      echo "La nota ingresada debe estar entre 1 y 10" . PHP_EOL;
    }
  }while($n < 1 || $n > 10);
  return $n;
}

function cargarArray(&$array){
  do {
    $n = crearNotaValidada();
    array_push($array, $n);
    crearRespuesta($respuesta);
  } while ($respuesta);
}

function mostrarNotas($notas){
  foreach ($notas as $posicion => $nota) {
    echo "Nota : $nota, Posición : " . $posicion + 1 . PHP_EOL;
  }
}

function calcularPromedio($notas){
  $acumulador = 0;
  foreach($notas as $nota){
    $acumulador += $nota;
  }
  $promedio = $acumulador / count($notas);
  echo "El promedio es: $promedio" . PHP_EOL;
  return $promedio;
}

function buscarDatosMayorAPromedio($notas, $promedio){
  foreach ($notas as $posicion => $nota) {
    if ($nota > $promedio) {
      echo "La nota : $nota, posición: ".$posicion+1 ." > $promedio" . PHP_EOL;
    }
  }
}

function notaMaxima($notas){
  $notaMaxima = 0;
  foreach ($notas as $nota) {
    $notaMaxima = ($nota>$notaMaxima)? $nota : $notaMaxima;
  }
  return $notaMaxima;
}

function mostrarSuperaronNotaMaxima($notas){
  $notaMaxima = notaMaxima($notas);
  echo "Nota máxima: $notaMaxima " .PHP_EOL;
  $contador = 0;
  foreach ($notas as $nota){
    $contador = ($nota == $notaMaxima) ? $contador + 1 : $contador;
  }
  echo "La cantidad que superaron la nota máxima es: $contador" . PHP_EOL;
}

function notaMinima($notas){
  $notaMinima = null;
  foreach ($notas as $posicion => $nota) {
    $notaMinima = ($posicion == 0)? $nota : (($nota<$notaMinima)? $nota : $notaMinima);
  }
  return $notaMinima;
}

function mostrarPorcentajesNotas($notas){
  $contadorMaximas = 0;
  $contadorMinimas = 0;
  $notaMaxima = notaMaxima($notas);
  $notaMinima = notaMinima($notas);
  foreach($notas as $nota){
    if($nota == $notaMaxima){
      $contadorMaximas++;
    } else if ($nota == $notaMinima) {
      $contadorMinimas++;
    }  
  }
  echo "El porcentaje de máximas es: %" . $contadorMaximas * 100 / count($notas) .PHP_EOL;
  echo "El porcentaje de minimas es: %" . $contadorMinimas * 100 / count($notas) .PHP_EOL;
}

function buscarIgual($notas,$notaABuscar){
  $contador = 0;
  foreach ($notas as $nota) {
    if ($nota == $notaABuscar) {
      $contador++;
    }
  }
  echo "$contador alumnos obtuvieron: $notaABuscar" . PHP_EOL;  
}

function validarArrayCargado($array){
  return $estaCargado = (count($array) == 0)?false:true;
}

$notas = [];
do {
  if(!validarArrayCargado($notas)){
    cargarArray($notas);
  }
  crearOpcion($opcion);
  switch ($opcion) {
    case '1':
      cargarArray($notas);
      break;
    case '2':
      mostrarNotas($notas);
      break;
    case '3':
      calcularPromedio($notas);
      break;
    case '4':
      buscarDatosMayorAPromedio($notas,$promedio = calcularPromedio($notas));
      break;
    case '5':
      mostrarSuperaronNotaMaxima($notas);
      break;
    case '6':
      mostrarPorcentajesNotas($notas);
      break;
    case '7':
      buscarIgual($notas,crearNotaValidada());
      break;
  }
} while ($opcion != 8);