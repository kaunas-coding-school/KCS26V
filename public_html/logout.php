<?php

// Visuomet pirma startuojam sesija
session_start();

// Sunaikinus sesiją, išvalomas kintamasis $ _SESSION, tokiu būdu atjungiant vartotoją
// Tai taip pat įvyksta automatiškai, uždarius naršyklę

setcookie('prisiminti_slaptazodi', null, time() - 3600);
setcookie('userName', null, time() - 3600);

session_destroy();
header("Location: /loginForm.php");

?>
