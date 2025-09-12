<?php
require_once "conf.php";

if (!VALID()) {
    header("Location: " . base('auth/'));
    exit;
} else {
    if (ISADMIN()) {
        header("Location: " . base('pages/beranda/'));
        exit;
    } elseif (ISMHS()) {
        header("Location: " . base('pages/layoutmhs/'));
        exit;
    } else {
        exit;
    }
}
?>