<?php
/**Se desea modelar un torneo donde se juegan partidos de básquetbol o fútbol. El torneo cuenta con una colección
de partidos y entrega premios a los ganadores de cada partido. */


class PartidoBasquet extends Partido {
    private $cuartos; // Número de cuartos en el partido
    private $CantInfracciones;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cuartos, $CantInfracciones) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cuartos = $cuartos;
    }

    public function getCuartos() {
        return $this->cuartos;
    }

    public function setCuartos($cuartos) {
        $this->cuartos = $cuartos;
    }

    public function getCantInfracciones(){
        return $this->CantInfracciones;
    }

    public function setCantInfracciones ($cantInfracciones){
        $this->cantInfracciones= $cantInfracciones;
    }

    public function __toString() {
        return parent::__toString() . "Cuartos: " . $this->getCuartos() . "\n";
    }

        /**Por otro lado, si se trata de un partido de basquetbol se almacena la cantidad de infracciones de manera tal que
    al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la
    cantidad de infracciones. Es decir:
    coef = coeficiente_base_partido - (coef_penalización*cant_infracciones); */


    public function coeficientePartido() {
        $coefBase = parent::coeficientePartido()(); // Obtener el coeficiente base original de la clase Partido

        $coefPenalizacion = 0.75;
        $penalizacion = $coefPenalizacion * $this->getCantInfracciones();

        return $coefBase - $penalizacion; // Restar la penalización del coeficiente base
    }
}
    


