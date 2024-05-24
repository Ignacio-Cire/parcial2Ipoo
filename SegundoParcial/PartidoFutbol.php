<?php
/**Se desea modelar un torneo donde se juegan partidos de básquetbol o fútbol. El torneo cuenta con una colección
de partidos y entrega premios a los ganadores de cada partido. */


class PartidoFutbol extends Partido {
    private $duracion; // Duración del partido en minutos

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $duracion) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->duracion = $duracion;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function __toString() {
        return parent::__toString() . "Duración: " . $this->getDuracion() . " minutos\n";
    }

            /**Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la
    categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) . A continuación se presenta una tabla en la
    que se detalla los valores por defecto de cada coeficiente aplicado a una categoría de un partido fútbol: */

    public function coeficientePartido() {
        $coefBase = parent::coeficientePartido()(); // Llama al método de la clase padre para calcular el coeficiente base inicial

    
        $categoria1 = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        $categoria2 = $this->getObjEquipo2()->getObjCategoria()->getDescripcion();
    
        // Verificar si ambos equipos están en la misma categoría
        if ($categoria1 === $categoria2) {
            // Procesar el coeficiente base según la categoría
            switch ($categoria1) {
                case 'Menores':
                    $coefBase *= 0.13;
                    break;
                case 'Juveniles':
                    $coefBase *= 0.19;
                    break;
                case 'Mayores':
                    $coefBase *= 0.27;
                    break;
            }
        }
    
        return $coefBase;
    }
    
    
}

