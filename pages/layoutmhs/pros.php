<?php
require_once '../../conf.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'msg' => 'Metode tidak diizinkan.']);
    exit;
}

$action = $_POST['action'] ?? '';
switch ($action) {
    case 'kontrakMk':
        $idMhs = intval($_SESSION['userData']['id_user'] ?? 0);
        $kode = json_decode($_POST['kodeMk'] ?? '[]', true);
        $totalSks = intval($_POST['totalSks'] ?? 0);
        $totalHarga = intval($_POST['totalHarga'] ?? 0);

        if (empty($kode)) {
            echo json_encode([
                'success' => false,
                'msg' => 'Anda belum memilih mata kuliah.'
            ]);
            exit;
        }
        if ($totalSks > 9) {
            echo json_encode([
                'success' => false,
                'msg' => 'Peringatan: SKS yang dipilih melebihi batas maksimal (9 SKS)!'
            ]);
            exit;
        } else {
            mysqli_query($hub, "INSERT INTO tb_krs (id_user, status_krs, total_sks, total_harga) VALUES ('$idMhs', 'confirm', '$totalSks', '$totalHarga')") or die(mysqli_error($hub));
            $idKrs = mysqli_insert_id($hub);
            foreach ($kode as $k) {
                $q = mysqli_query($hub, "SELECT id_mk, sks FROM tb_mk WHERE kode = '$k'") or die(mysqli_error($hub));
                $mk = mysqli_fetch_assoc($q);
                $idMk = $mk['id_mk'];
                $sks = $mk['sks'];
                $harga = $sks * 300000;

                mysqli_query($hub, "INSERT INTO tb_krs_detail (id_krs, id_mk, sks, harga) VALUES ('$idKrs', '$idMk', '$sks', '$harga')") or die(mysqli_error($hub));
            }
            echo json_encode(['success' => true]);
        }
        break;
    case 'bayar':
        $idkrs = intval($_POST['id'] ?? 0);
        if ($idkrs <= 0) {
            echo json_encode([
                'success' => false,
                'msg' => 'ID tidak valid'
            ]);
        } else {
            mysqli_query($hub, "UPDATE tb_krs SET status_krs = 'lunas' WHERE id_krs = '$idkrs'") or die(mysqli_error($hub));
            echo json_encode(['success' => true]);
        }
        break;
    default:
        echo json_encode(['success' => false, 'msg' => 'Aksi tidak dikenali.']);
        break;
}