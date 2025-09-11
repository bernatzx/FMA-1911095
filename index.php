<?php
require_once "conf.php";

if (!VALID()) {
    header("Location: " . base('auth/'));
} 
?>

Berhasil