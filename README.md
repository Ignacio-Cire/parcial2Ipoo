# parcial2Ipoo

FACULTAD DE INFORMÁTICA
CÁTEDRA INTRODUCCIÓN POO
Segundo Parcial IPOO 2024
PARTE 1
A continuación presentamos un diagrama de clases de las clases que se encuentran implementadas en la
carpeta SegundoParcial .
En el diagrama se visualiza una relación entre la clase Partido y la clase Equipo, la cual se lee: un partido
referencia a 2 Equipos. A su vez la clase Equipo tiene como referencia su Categoría.
PARTE 2
Se desea modelar un torneo donde se juegan partidos de básquetbol o fútbol. El torneo cuenta con una colección
de partidos y entrega premios a los ganadores de cada partido.
En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5 y es aplicado a la cantidad de
goles y a la cantidad de jugadores de cada equipo. Es decir:
coef = 0,5 * cantGoles * cantJugadores donde cantGoles : es la cantidad de goles; cantJugadores : es la
cantidad de jugadores.
Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la
categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) . A continuación se presenta una tabla en la
que se detalla los valores por defecto de cada coeficiente aplicado a una categoría de un partido fútbol:
Categoría de los equipos
Coef_Menores Coef_juveniles Coef_Mayores
0,13 0,19 0,27
Por otro lado, si se trata de un partido de basquetbol se almacena la cantidad de infracciones de manera tal que
al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la
cantidad de infracciones. Es decir:
coef = coeficiente_base_partido - (coef_penalización*cant_infracciones);
Realizar las siguientes implementaciones:
1. Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del
premio. Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.
2. Implementar la jerarquía de herencia que crea necesaria para modelar los Partidos.
3. Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un
partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos
equipos.
4. Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la
clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se
FACULTAD DE INFORMÁTICA
CÁTEDRA INTRODUCCIÓN POO
trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase
Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los
2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser
registrado ese partido en el torneo.
5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el
coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. Redefinir dicho
método según corresponda.
6. Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se
trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los
equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los
objetos de los equipos encontrados.
7. Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo
donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave
es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado
para el torneo.
(premioPartido = Coef_partido * ImportePremio)
Completar el script TestTorneo y:
1. Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000.
2. Completar el script testTorneo.php y:
a. crear 3 objetos partidos de Básquet con la siguiente información:
idPartido Fecha Equipo 1 Goles E1 Equipo 2 Goles E2 Infracciones
11 2024-05-05 $objE7 80 $objE8 120 7
12 2024-05-06 $objE9 81 $objE10 110 8
13 2024-05-07 $objE11 115 $objE12 85 9
b. Crear 3 objetos partidos de Fútbol con la siguiente información
idPartido Fecha Equipo 1 Goles E1 Equipo 2 Goles E2
14 2024-05-07 $objE1 3 $objE2 2
15 2024-05-08 $objE3 0 $objE4 1
16 2024-05-09 $objE5 2 $objE6 3
3. Completar el script testTorneo.php para invocar al método :
a. ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la cantidad de
equipos del torneo.
b. ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad
de equipos del torneo.
c. ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de
equipos del torneo.
d. darGanadores(‘basquet’) y visualizar el resultado.
e. darGanadores(‘futbol’) y visualizar el resultado.
f. calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.
4. Realizar un echo del objeto Torneo creado en (1).
