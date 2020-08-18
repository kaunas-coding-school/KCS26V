<?php

require_once __DIR__ . '/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::DEBUG));
//
//function tikrintiSkaiciu($skaicius) {
//    if (!is_numeric($skaicius)){
//        throw new Exception('Perduotas parametras nera skaicius');
//    }
//    if($skaicius > 1) {
//        throw new Exception('Skaičius privalo būti mažesnis už 1');
//    }
//}
//
//try {
//    $skaicius = $_GET['nr'] ? (int) $_GET['nr'] : 0;
//    tikrintiSkaiciu($skaicius);
//    echo 'Jei matote šį pranešimą, skaičius yra mažesnis už vienetą';
//
//} catch(Exception $exception) {
//    echo 'Atsiprasome nutiko klaida';
//    $log->error('Skaiciau tikrinimo klaida', ['message' => $exception->getMessage()]);
//}

$obj = new \KCS\ObjektoKlase('Jonas');
echo "<hr>";

try {
    $request = new \KCS\RequestHandler();
    var_dump($request->gautiUzklausosDuoemnis());
    var_dump($request->gautiUzklausosMetoda());
} catch (\InvalidArgumentException $exception) {
    $message = $exception->getMessage();
    echo $message;
    $log->error($message);
} catch (\Throwable $exception) {
    echo 'Kilo klaida arba truksta duomenų';
    $log->error($exception->getMessage());
}


