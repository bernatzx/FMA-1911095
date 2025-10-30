<?php
require_once '../../conf.php';
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'POST':
    $nilai = isset($_POST['nilai']) ? floatval($_POST['nilai']) : null;
    if ($nilai !== null) {
      mysqli_query($hub, "UPDATE tb_hargasks SET nilai = '$nilai'") or die(mysqli_error($hub));
      echo json_encode(['success' => true, 'msg' => 'Harga per sks berhasil diubah']);
    } else {
      echo json_encode(['success' => false, 'msg' => 'Nilai tidak valid']);
    }
    break;

  default:
    echo json_encode(['success' => false, 'msg' => 'Metode tidak diizinkan.']);
    break;
}