<?php

class Studentas
{
    public $vardas;
    private $pavarde;
    private $grupe;
    private $asmensKodas;

    public function __construct($vardas = null, $pavarde = null, $grupe = null, $asmensKodas = null)
    {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->grupe = $grupe;
        $this->asmensKodas = $asmensKodas;
    }

    /**
     * @return mixed|null
     */
    public function getVardas()
    {
        return $this->vardas;
    }

    /**
     * @param mixed|null $vardas
     */
    public function setVardas($vardas): void
    {
        $this->vardas = $vardas;
    }

    /**
     * @return mixed|null
     */
    public function getPavarde()
    {
        return $this->pavarde;
    }

    /**
     * @param mixed|null $pavarde
     */
    public function setPavarde($pavarde): void
    {
        $this->pavarde = $pavarde;
    }

    /**
     * @return mixed|null
     */
    public function getGrupe(): Grupe
    {
        return $this->grupe;
    }

    /**
     * @param mixed|null $grupe
     */
    public function setGrupe(Grupe $grupe): void
    {
        $this->grupe = $grupe;
    }

    /**
     * @return mixed|null
     */
    public function getAsmensKodas()
    {
        return $this->asmensKodas;
    }

    /**
     * @param mixed|null $asmensKodas
     */
    public function setAsmensKodas($asmensKodas): void
    {
        $this->asmensKodas = $asmensKodas;
    }


}