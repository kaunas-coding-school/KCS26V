<?php declare(strict_types=1);

require_once __DIR__ . '/../src/DbConnect.php';


$host = 'db';
$user = 'devuser';
$password = 'devpass';
$db = 'kcs_db';

\KCS\DbConnect::tikrintiPrisijungima($host, $user, $password, $db);
