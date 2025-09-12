<?php
require_once '../conf.php';
session_unset();
session_destroy();
header("Location: " . base());
exit;