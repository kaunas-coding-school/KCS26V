<?php

include 'Car.php';
echo "<br>";

$automobilis = new Car(2);

$automobilis->greitis = '50km/h';

$automobilis->piltiKura(50);
echo "<br>Liko kuro: " . $automobilis->gautiKuroLikuti() . " litru<br>";
$automobilis->vaziuoti(60); // Automobilis važiuoja 50km/h greičiu
echo "<br>Liko kuro: " . $automobilis->gautiKuroLikuti() . " litru<br>";
$automobilis->vaziuoti(30); // Automobilis važiuoja 50km/h greičiu
echo "<br>Liko kuro: " . $automobilis->gautiKuroLikuti() . " litru<br>";

$greitis = 55;
$atstumas = 20;
echo "<br>Sanaudos vaziuojant {$atstumas}km atstuma {$greitis}km/h greiciu bus: "
    . $automobilis->gautiKuroSanaudos($greitis, $atstumas)
    . " litru";

echo "<br>Liko kuro: " . $automobilis->gautiKuroLikuti() . " litru<br>";
echo "<br>Rida: " . $automobilis->gautiRida(); // 75
