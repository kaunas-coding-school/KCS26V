<?php

Class Car {
    public $spalva;
    public $greitis;
    private $rida;
    private $kuroBakas;
    private $darbinisTuris;
    private $litrazas;

    function __construct(int $darbinisTuris)
    {
        $this->darbinisTuris = $darbinisTuris;

        $this->skaiciuotiLitraza();
    }

    public function vaziuoti($minutes): void {
        $laikas = $minutes / 60;
        echo "Automobilis {$laikas}val. važiuoja ". $this->greitis . " greičiu<br>";
        $atstumas = (int)$this->greitis * $laikas;
        $this->gautiKuroSanaudos($this->greitis, $atstumas);
    }

    public function gautiRida(): int {
        return $this->rida;
    }

    public function gautiKuroLikuti(): float
    {
        return $this->kuroBakas;
    }

    public function gautiKuroSanaudos($greitis = 100, $atstumas = 0)
    {
        $sanaudos = $greitis / $this->litrazas / 100 * $atstumas;
        $this->rida += $atstumas;
        $this->kuroBakas -= $sanaudos;
        return $sanaudos;
    }

    public function piltiKura(float $litrai)
    {
        $this->kuroBakas += $litrai;
    }

    public function skaiciuotiLitraza(): void
    {
        $this->litrazas = 6.6 * sqrt($this->darbinisTuris);
    }
}
