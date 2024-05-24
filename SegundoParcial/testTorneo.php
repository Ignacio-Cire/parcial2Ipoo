<?php
include_once "Categoria.php";
include_once "Torneo.php";
include_once "Equipo.php";
include_once "Partido.php";
include_once "PartidoFutbol.php" ;
include_once "PartidoBasquet.php";

// Crear categorías
$catMayores = new Categoria(1, 'Mayores');
$catJuveniles = new Categoria(2, 'Juveniles');
$catMenores = new Categoria(3, 'Menores');

// Crear equipos
$objE1 = new Equipo("Equipo Uno", "Cap.Uno", 1, $catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos", 2, $catMayores);
// Crear más equipos según sea necesario...

// Crear objetos partido de básquet
$objP1 = new Basquet(11, '2024-05-05', $objE7, 80, $objE8, 120, 7);
$objP2 = new Basquet(12, '2024-05-06', $objE9, 81, $objE10, 110, 8);
$objP3 = new Basquet(13, '2024-05-07', $objE11, 115, $objE12, 85, 9);

// Crear objetos partido de fútbol
$objP4 = new Futbol(14, '2024-05-07', $objE1, 3, $objE2, 2);
$objP5 = new Futbol(15, '2024-05-08', $objE3, 0, $objE4, 1);
$objP6 = new Futbol(16, '2024-05-09', $objE5, 2, $objE6, 3);

// Crear objeto Torneo con un importe base del premio de 100.000
$torneo = new Torneo(100000);

// Ingresar los partidos al torneo
$torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
$torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'Basquetbol');
$torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'Basquetbol');

// Visualizar la respuesta y la cantidad de equipos del torneo para cada ingreso de partido
echo "Resultado de ingresarPartido(1): " . $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol') . "\n";
echo "Cantidad de equipos en el torneo: " . count($torneo->getColObjPartidos()) . "\n";

// Más acciones según las instrucciones...

// Realizar un echo del objeto Torneo creado
echo "Estado actual del Torneo: \n";
echo $torneo;
?>



