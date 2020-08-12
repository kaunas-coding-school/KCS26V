<?php

class Grupe
{
    private $pavadinimas;
    private $trukme;

    public function __construct(string $pavadinimas, int $trukme)
    {
        $this->pavadinimas = $pavadinimas;
        $this->trukme = $trukme;
    }

    public function getPavadinimas(): string
    {
        return $this->pavadinimas;
    }

    public function __toString()
    {
        return $this->pavadinimas . ' - Trukme = ' . $this->trukme . ' dienu';
    }
}