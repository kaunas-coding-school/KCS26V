<?php

class Skaiciuotuvas {

    public $a, $b;

    public function __construct($c, $d ) {
        $this->a = $c;
        $this->b = $d;
    }
    public function sudeti() {
        return $this->a + $this->b;
    }
    public function atimti() {
        return $this->a - $this->b;
    }
    public function dauginti() {
        return $this->a * $this->b;
    }
    public function dalinti() {
        return $this->a / $this->b;
    }
}

$skaiciotuvas = new Skaiciuotuvas(12, 6);

echo $skaiciotuvas->sudeti()."<br>"; // Rodys 18
echo $skaiciotuvas->dauginti()."<br>"; // Rodys 72
echo $skaiciotuvas->atimti()."<br>"; // Rodys 6
echo $skaiciotuvas->dalinti(); // Rodys 2
