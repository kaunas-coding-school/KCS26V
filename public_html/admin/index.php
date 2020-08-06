<?php
// Šią kodo dalį talpiname kiekviename puslapyje kurį norime apsaugoti

// Visuomet pirma startuojam sesija
session_start();

if (isset($_SESSION['ar_prisijunges']) && $_SESSION['ar_prisijunges'] === true) {
    echo "Slapta INFO";
} else {
    // Nukreipia lankytoją į prisijungimo skriptą
    header("Location: /loginForm.php?neprisijunges=true");
}
?>
