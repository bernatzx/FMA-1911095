<?php
require_once '../conf.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim(mysqli_real_escape_string($hub, $_POST['nama']));
    $sandi = trim(mysqli_real_escape_string($hub, $_POST['sandi']));

    $sql = mysqli_query($hub, "SELECT * FROM tb_user WHERE nama = '$nama' LIMIT 1") or die(mysqli_error($hub));
    $data = mysqli_fetch_assoc($sql);

    if ($data && password_verify($sandi, $data['kata_sandi'])) {
        $_SESSION['valid'] = true;
        $_SESSION['userData'] = $data;
        echo json_encode([
            'success' => true
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'msg' => 'Nama Pengguna atau Kata Sandi Salah!'
        ]);
    }
}