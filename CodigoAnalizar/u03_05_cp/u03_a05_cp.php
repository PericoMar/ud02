<?php

/**
 * Clase CuentaBancaria
 */
 
class CuentaBancaria {

    /**
     * Atributos de la clase. Todos encapsulados.
     */

    private $usuario;
    private $pin;

    //Representa el total de entradas que tuvo la cuenta (array).
    private $entradas;

    //Representa el total de salidas que tuvo la cuenta (array).
    private $salidas;
    //Representa el saldo actual de la cuenta.
    private $saldo;

    /**
     * Constructor de la clase. Recibe el usuario y el pin.
     * Se escribe como una funcion pero con nombre __construct.
     * 
     * @param string $usuario
     * @param string $pin
     */

    public function __construct($usuario, $pin) {
        $this->usuario=$usuario;
        $this->pin=$pin;
        $this->entradas=array();
        $this->salidas=array();
        $this->saldo=0;
    }

    /**
     * Metodos de la clase
     * 
     * @param string $pin
     */

    public function cambiaPin($pin) {
        $this->pin=$pin;
    }

    /**
     * Funcion que valida si el usuario y el pin introducidos por parametros
     * equivalen a los de la instancia.
     * 
     * @param string $usuario
     * @param string $pin
     */
    public function validaUsuario($usuario, $pin) {
        if($this->usuario==$usuario && $this->pin==$pin) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Añade la cantidad que entra (pasado por parametro) en el array
     * de entradas y actualiza el saldo. 
     * 
     * @param float $cantidad
     */

    public function ingresar($cantidad) {
        $this->entradas[]=$cantidad;
        $this->saldo=$this->saldo+$cantidad;
    }

    /**
     * Si se dispone de la cantidad que se quiere sacar, se añade la cantidad
     * en el array de salidas y se actualiza el saldo.
     * Si no se dispone de la cantidad, se devuelve false.
     * 
     * @param float $cantidad
     */

    public function sacar($cantidad) {
        if($cantidad > $this->saldo) {
            return false;
        }
        else {
            $this->salidas[]=$cantidad;
            $this->saldo=$this->saldo-$cantidad;
            return true;
        }
    }

    /**
     * Getters de la clase
     */

    public function getSaldo() {
        return $this->saldo;
    }
    public function getEntradas() {
        return $this->entradas;
    }
    public function getSalidas() {
        return $this->salidas;
    }
}

/**
 * Pruebas de la clase
 */


// Creamos una instancia de la clase CuentaBancaria.
$cuenta=new CuentaBancaria("Fidel","1234");

/**  Si metemos correctamente los parametros usuario y pin en la funcion validaUsuario.
 * Se muestra el saldo actual, se ingresan 100€ y se sacan 80€.
 * Como se pudo sacar de la cuenta se muestra el saldo actual y se muestran las entradas y salidas.
 * Si no se pudo sacar de la cuenta, se muestra un mensaje de error.
 */

if($cuenta->validaUsuario("Fidel","1234")) {
    echo "usuario válido <br/>";
    echo "Saldo actual: ".$cuenta->getSaldo()."<br/>";
    $cuenta->ingresar(100);
    echo "Se han ingresado 100€, saldo actual: ".$cuenta->getSaldo()."€<br/>";
    if($cuenta->sacar(80)) {
        echo "Se han sacado 80€, saldo actual: ".$cuenta->getSaldo()."€<br/>";
        echo "<h3>Listado entradas</h3>";
        foreach($cuenta->getEntradas() as $entrada) {
            echo "Entrada: $entrada <br/>";
        }
        echo "<h3>Listado salidas</h3>";
        foreach($cuenta->getSalidas() as $salida) {
            echo "Salida: $salida <br/>";
        }
    }
    else {
        echo "No tienes suficiente dinero en la cuenta";
    }
}
else {
    echo "usuario no válido";
}
?>
