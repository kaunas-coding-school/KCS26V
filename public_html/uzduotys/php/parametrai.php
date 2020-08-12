<?php

class Zinute {
    public $prisistatymas = 'Sveiki visi, aš esu ';
    public function prisistatyti($vardas)
    {
        return $this->prisistatymas.$vardas;
    }
}
$manoZinute = New Zinute();
echo $manoZinute->prisistatyti('Tautvydas');
