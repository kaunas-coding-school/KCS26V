<?php

use KCS\RequestHandler;
use KCS\Router;

require_once __DIR__.'/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::DEBUG));

try {
    $request = new RequestHandler();
    $router = new Router();
    $router->add(\KCS\Controller\MessageController::class);
    $router->handleRequest($request);
} catch (PDOException $e) {
    $message = $e->getMessage();
    echo "Connection failed: ".$message;
    $log->warning($message);
    die();
} catch (\InvalidArgumentException $exception) {
    $message = $exception->getMessage();
    echo $message;
    $log->error($message);
} catch (\Throwable $exception) {
    echo 'Kilo klaida arba truksta duomenų';
    $log->error($exception->getMessage());
}
