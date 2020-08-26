<?php

namespace KCS\Controller;

use KCS\Manager\MessageManager;
use KCS\RequestHandler;
use KCS\ResponseHandler;

class MessageController implements ControllerInterface
{
    private MessageManager $manager;

    public function __construct()
    {
        $this->manager = new MessageManager();
    }

    public function get(?RequestHandler $request): void
    {
        if (isset($request) && $request->gauti('id')) {
            $rez = $this->manager->get((int)$request->gauti('id'));
            $html = "Vardas: ".$rez['name']."<br>
                    El. pastas: ".$rez['email']."<br>
                    Zinute: ".$rez['message']."<br>
                    Data: ".$rez['created_at']."<hr>";
        } else {
            $rez = $this->manager->getAll();
            foreach ($rez as $message) {
                $html .= "Vardas: ".$message['name']."<br>
                    El. pastas: ".$message['email']."<br>
                    Zinute: ".$message['message']."<br>
                    Data: ".$message['created_at']."<hr>";
            }
        }

        ResponseHandler::printHtml($html); // Galima spausdinti kaip HTML'a
//        ResponseHandler::printJson($rez); // Arba galime spauisdinti JSON formatu
    }

    public function post(?RequestHandler $request)
    {
        if (!isset($request)) {
            throw new \Exception('Missing request data');
        }

        if (!$request->gauti('vardas')) {
            throw new \InvalidArgumentException('Nenurodytas Vardas');
        }

        if (!$request->gauti('elpastas')) {
            throw new \InvalidArgumentException('Nenurodytas el pastas');
        }

        if (!$request->gauti('msg')) {
            throw new \InvalidArgumentException('Nera zinutes');
        }

        $this->manager->create(
            $request->gauti('vardas'),
            $request->gauti('elpastas'),
            $request->gauti('msg')
        );

        $last_id = $this->manager->getRepository()->lastInsertId();
        $html = "Iterpem duomenis. Iraso ID: $last_id";

        ResponseHandler::printHtml($html);
    }

    public function patch(?RequestHandler $request)
    {
        if (!isset($request)) {
            throw new \Exception('Missing request data');
        }

        if (!$request->gauti('id')) {
            throw new \InvalidArgumentException('Nenurodytas ID');
        }

        if (!$request->gauti('vardas')) {
            throw new \InvalidArgumentException('Nenurodytas Vardas');
        }

        if (!$request->gauti('elpastas')) {
            throw new \InvalidArgumentException('Nenurodytas el pastas');
        }

        if (!$request->gauti('msg')) {
            throw new \InvalidArgumentException('Nera zinutes');
        }

        $this->manager->atnaujinti(
            $request->gauti('id'),
            $request->gauti('vardas'),
            $request->gauti('elpastas'),
            $request->gauti('msg')
        );

        $html = "Sekmingai atnaujinta zinute";

        ResponseHandler::printHtml($html);
    }

    public function delete(?RequestHandler $request)
    {
        if (isset($request) && $request->gauti('id')) {
            $this->manager->salinti((int)$request->gauti('id'));
        }
        ResponseHandler::printHtml('Sekmingai pasalintas irasas');
    }
}