<?php

class Skaiciuotuvas
{
    public $a, $b;

    public function __construct($c, $d)
    {
        $this->a = $c;
        $this->b = $d;
    }
}
class Sudeti extends Skaiciuotuvas
{
    public function skaiciuoti()
    {
        return $this->a + $this->b;
    }
}
class Atimti extends Skaiciuotuvas
{
    public function skaiciuoti() {
        return $this->a - $this->b;
    }
}
class Dauginti extends Skaiciuotuvas
{
    public function skaiciuoti() {
        return $this->a * $this->b;
    }
}
class Dalinti extends Skaiciuotuvas
{
    public function skaiciuoti() {
        return $this->a / $this->b;
    }
}

echo (new Sudeti(12,6))->skaiciuoti()."<br>"; // Rodys 18
echo (new Atimti(12,6))->skaiciuoti()."<br>"; // Rodys 72
echo (new Dauginti(12,6))->skaiciuoti()."<br>"; // Rodys 6
echo (new Dalinti(12,6))->skaiciuoti(); // Rodys 2
