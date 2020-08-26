<?php

namespace KCS;

class ResponseHandler
{
    public static function printHtml(string $string): void
    {
        echo $string;
    }

    public static function printJson(array $message): void
    {
        echo json_encode($message);
    }
}
