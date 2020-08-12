<?php

include 'Car.php';
include 'Studentas.php';
include 'Grupe.php';

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


$kcsGrupe = new Grupe('KCS26V', 33);

$stud1 = new Studentas;
$stud1->vardas = 'Jonas';

$stud2 = new Studentas('Petras', 'Petraitis', $kcsGrupe, 50101010101);

$stud3 = new Studentas();
$stud3->setVardas('Ona');
$stud3->setPavarde('Oniene');
$stud3->setGrupe($kcsGrupe);
$stud3->setAsmensKodas(49012120101);

$studentai = [$stud1, $stud2, $stud3];

$naujiStudentai = [
    ['Rita', 'Ritaite', $kcsGrupe, 60202020001],
    ['Zigmas', 'Zigmaitis', $kcsGrupe, 50303030001],
    ['Kazys', 'Kaziunis', $kcsGrupe, 50403030001],
];

var_dump($studentai);

foreach ($naujiStudentai as $studentas) {
    $stud = new Studentas($studentas[0],$studentas[1],$studentas[2],$studentas[3]);
    $studentai[] = $stud;
}

var_dump($studentai);
echo '<hr>';

echo $studentai[1]->getGrupe()->getPavadinimas();
echo $studentai[1]->getGrupe();

foreach ($studentai as $studentas) {
    $lytis = ceil($studentas->getAsmensKodas() / 10000000000);
    if ($lytis % 2 !== 0){
        $vyr[] = $studentas;
    } else {
        $mot[] = $studentas;
    }
}

var_dump($vyr);
var_dump($mot);