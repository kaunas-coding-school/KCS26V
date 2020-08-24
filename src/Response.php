<?php

namespace KCS;

class Response
{
    public static function printHtml(array $message)
    {
        echo "Vardas: " . $message['name'] . "<br>";
        echo "El. pastas: " . $message['email'] . "<br>";
        echo "Zinute: " . $message['message'] . "<br>";
        echo "Data: " . $message['created_at'] . "<br>";
    }

    public function printJson(array $message)
    {
        echo json_encode($message);
    }
}
