<?php
/**Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del
premio. Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía. */


class Torneo {
    private $nombre;
    private $colObjPartidos;
    private $importePremio;

    public function __construct($nombre, $importePremio) {
        $this->nombre = $nombre;
        $this->colObjPartidos = [];
        $this->importePremio = $importePremio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getColObjPartidos() {
        return $this->colObjPartidos;
    }

    public function agregarPartido($partido) {
        $this->colObjPartidos[] = $partido;
    }

    public function __toString() {
        $cadena = "Torneo: " . $this->getNombre() . "\n";
        $cadena .= "Partidos:\n";
        foreach ($this->colObjPartidos as $partido) {
            $cadena .= $partido . "\n";
        }
        return $cadena;
    }

        /**Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la
    clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se
    trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase
    Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los
    2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser
    registrado ese partido en el torneo. */

    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) {
        // Variables para almacenar la categoría y la cantidad de jugadores de cada equipo
        $categoriaEquipo1 = $OBJEquipo1->getObjCategoria()->getDescripcion();
        $categoriaEquipo2 = $OBJEquipo2->getObjCategoria()->getDescripcion();
        $jugadoresEquipo1 = $OBJEquipo1->getCantJugadores();
        $jugadoresEquipo2 = $OBJEquipo2->getCantJugadores();
    
        // Validación de misma categoría y cantidad de jugadores
        if ($categoriaEquipo1 === $categoriaEquipo2 && $jugadoresEquipo1 === $jugadoresEquipo2) {  
            if ($tipoPartido === "futbol") {
                $partido = new PartidoFutbol($OBJEquipo1, $OBJEquipo2, $fecha);
            } elseif ($tipoPartido === "basquetbol") {
                $partido = new PartidoBasquetbol($OBJEquipo1, $OBJEquipo2, $fecha);
            } 
    
            // Agregar el partido creado a la colección de partidos del torneo
            $this->colObjPartido[] = $partido;
        } else {
            // Si no cumplen los requisitos, no se crea el partido y se retorna null o se maneja de alguna otra forma
            $partido=null;
        }
    
        // Retorno del partido creado (si se creó) o null (si no se creó)
        return $partido;
    }


        /**Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se
    trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los
    equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los
    objetos de los equipos encontrados. */

    public function darGanadores($deporte) {
        $colObjPartidos = $this->getColObjPartidos();
        $colEquiposEncontrados = [];
    
        foreach ($colObjPartidos as $objPartido) {
            // Verificar si el partido es de basquetbol y el deporte pasado es "basquetbol"
            if ($objPartido instanceof PartidoBasquet && $deporte === "basquetbol") {
                // Obtener el equipo ganador del partido
                $equipoGanador = $objPartido->darEquipoGanador();
                
                // Agregar el equipo ganador a la colección
                $colEquiposEncontrados[] = $equipoGanador;
            }
            
            // Verificar si el partido es de fútbol y el deporte pasado es "futbol"
            if ($objPartido instanceof PartidoFutbol && $deporte === "futbol") {
                // Obtener el equipo ganador del partido
                $equipoGanador = $objPartido->darEquipoGanador();
                
                // Agregar el equipo ganador a la colección
                $colEquiposEncontrados[] = $equipoGanador;
            }
        }
    
        return $colEquiposEncontrados;
    }

        /**Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo
    donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador; y la otra clave
    es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado
    para el torneo.
    (premioPartido = Coef_partido * ImportePremio) */

    public function calcularPremioPartido($OBJPartido){
        $coeficientePartido = $OBJPartido->coeficientePartido();
        $equipoGanador = $OBJPartido->darEquipoGanador();
        $importePremio = $this->getImportePremio; // Suponiendo que $importePremio es una propiedad de la clase Torneo
    
        // Calcular el premio del partido
        $premioPartido = $coeficientePartido * $importePremio;
    
        // Creo el arreglo asociativo con el equipo ganador y el premio del partido
        $premioEquipoGanador = [
            'equipoGanador' => $equipoGanador,
            'premioPartido' => $premioPartido
        ];
    
        return $premioEquipoGanador;
    }
    
    
}