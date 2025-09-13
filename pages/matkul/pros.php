<?php
require_once '../../conf.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'msg' => 'Metode tidak diizinkan.']);
    exit;
}

$action = $_POST['action'] ?? '';
switch ($action) {
    case 'addMK':
        $kode = trim(mysqli_real_escape_string($hub, $_POST['kode']));
        $nama = trim(mysqli_real_escape_string($hub, $_POST['nama']));
        $sks = trim(mysqli_real_escape_string($hub, $_POST['sks']));

        $check = mysqli_query($hub, "SELECT * FROM tb_mk WHERE (kode = '$kode' AND nama != '$nama') OR (nama = '$nama' AND kode != '$kode')") or die(mysqli_error($hub));
        if (mysqli_num_rows($check) > 0) {
            echo json_encode(['success' => false, 'msg' => 'Kode atau nama mata kuliah telah digunakan oleh data berbeda.']);
        } else {
            mysqli_query($hub, "INSERT INTO tb_mk (kode, nama, sks) VALUES ('$kode', '$nama', '$sks')") or die(mysqli_error($hub));
            echo json_encode(['success' => true]);
        }
        break;
    case 'editMK':
        $id = trim(mysqli_real_escape_string($hub, $_POST['id']));
        $kode = trim(mysqli_real_escape_string($hub, $_POST['kode']));
        $nama = trim(mysqli_real_escape_string($hub, $_POST['nama']));
        $sks = trim(mysqli_real_escape_string($hub, $_POST['sks']));

        mysqli_query($hub, "UPDATE tb_mk SET kode = '$kode', nama = '$nama', sks = '$sks' WHERE id_mk = '$id'") or die(mysqli_error($hub));
        echo json_encode(['success' => true]);
        break;
    case 'delMK':
        $id = intval($_POST['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['success' => false, 'msg' => 'ID tidak valid']);
            exit;
        } else {
            mysqli_query($hub, "DELETE FROM tb_mk WHERE id_mk = '$id'") or die(mysqli_error($hub));
            echo json_encode(['success' => true]);
        }
        break;
    default:
        echo json_encode(['success' => false, 'msg' => 'Aksi tidak dikenali.']);
        break;
}