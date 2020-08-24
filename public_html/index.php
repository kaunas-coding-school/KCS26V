<?php

require_once __DIR__.'/../vendor/autoload.php';

$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::DEBUG));

try {
    $request = new \KCS\RequestHandler();

    $messagesRepo = new \KCS\MessagesRepo();
    $uzklausa = $request->gautiUzklausosDuomenis();

    if ($request->gautiUzklausosMetoda() === 'POST' && !isset($uzklausa['id']) && !isset($uzklausa['del_id'])) {
        $messagesRepo->insert($uzklausa['vardas'], $uzklausa['elpastas'], $uzklausa['msg']);
        $last_id = $messagesRepo->lastInsertId();
        echo "Iterpem duomenis. Iraso ID: $last_id";
        $last_id = $messagesRepo->lastInsertId();
    }

    if ($request->gautiUzklausosMetoda() === 'GET') {
        $messages = $messagesRepo->getAll();
        foreach ($messages as $message) {
            \KCS\Response::printHtml($message);
        }
    }

    if ($request->gautiUzklausosMetoda() === 'POST' && isset($uzklausa['id'])) {
        $messagesRepo->update($uzklausa['id'], $uzklausa['vardas'], $uzklausa['elpastas'], $uzklausa['msg']);
        echo "Sekmingai atnaujinau";
    }

    if ($request->gautiUzklausosMetoda() === 'POST' && isset($uzklausa['del_id'])) {
        $messagesRepo->delete($uzklausa['del_id']);
        echo "Sekmingai pasalinau";
    }

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
