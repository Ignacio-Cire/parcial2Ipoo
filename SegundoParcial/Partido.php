<?php
class Partido{
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //OBSERVADORES
    public function setidpartido($idpartido){
         $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }


 public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
 public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }



 public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }


 public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }




     public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
      public function getCoefBase(){
        return $this->coefBase;
    }



public function __toString(){
        //string $cadena
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena."\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
          $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }



        /**En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5 y es aplicado a la cantidad de
    goles y a la cantidad de jugadores de cada equipo. Es decir:
    coef = 0,5 * cantGoles * cantJugadores donde cantGoles : es la cantidad de goles; cantJugadores : es la
    cantidad de jugadores. */

    /**5. Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido por el
coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. Redefinir dicho
método según corresponda. */

    public function  coeficientePartido(){
        $cantGolesEq1= $this->getCantGolesE1();//cantidad de goles
        $cantGolesEq2= $this->getCantGolesE2();
        $cantJugEqu1= $this->getObjEquipo1()->getCantJugadores(); //cantidad de jugadores
        $cantJugEqu2= $this->getObjEquipo2()->getCantJugadores();
        $coefBase=$this->getCoefBase();
        $coef1= $coefBase * $cantGolesEq1* $cantJugEqu1;
        $coef2= $coefBase * $cantGolesEq2* $cantJugEqu2;

        return ['equipo1' => $coef1, 'equipo2' => $coef2];
    }

        /**Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un
    partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos
    equipos. */

    public function darEquipoGanador() {
        $golesEquipo1 = $this->getCantGolesE1();  // Asegúrate de usar $this-> para llamar a métodos del objeto
        $golesEquipo2 = $this->getCantGolesE2();
        $equipoGanador = [];  // Inicializa como array vacío
        $equipo1 = $this->getObjEquipo1();
        $equipo2 = $this->getObjEquipo2();
    
        if ($golesEquipo1 > $golesEquipo2) {
            $equipoGanador[] = $equipo1;  // Añade equipo 1 al array
        } elseif ($golesEquipo1 < $golesEquipo2) {
            $equipoGanador[] = $equipo2;  // Añade equipo 2 al array
        } else {
            // En caso de empate, añade ambos equipos
            $equipoGanador[] = $equipo1;
            $equipoGanador[] = $equipo2;
        }
    
        return $equipoGanador;  // Retorna el array, que puede tener uno o dos elementos
    }



}


