<?php
require_once '../conf.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'msg' => 'Metode tidak diizinkan.']);
    exit;
}

$action = $_POST['action'] ?? '';
switch ($action) {
    case 'resetsandi':
        $email = trim(mysqli_real_escape_string($hub, $_POST['email']));
        $sandiBaru = trim(mysqli_real_escape_string($hub, $_POST['sandi-baru']));
        $konfirmasi = trim(mysqli_real_escape_string($hub, $_POST['konfirmasi-sandi']));

        if ($sandiBaru !== $konfirmasi) {
            echo json_encode(['success' => false, 'msg' => 'Konfirmasi sandi tidak cocok.']);
            exit;
        }

        $cek = mysqli_query($hub, "SELECT * FROM tb_user WHERE email = '$email'") or die(mysqli_error($hub));
        if (!$email || mysqli_num_rows($cek) <= 0) {
            echo json_encode(['success' => false, 'msg' => 'Pengguna tidak ditemukan']);
            break;
        } else {
            $hashSandi = password_hash($sandiBaru, PASSWORD_DEFAULT);
            mysqli_query($hub, "UPDATE tb_user SET kata_sandi = '$hashSandi' WHERE email = '$email' LIMIT 1") or die(mysqli_error($hub));
            echo json_encode(['success' => true, 'msg' => 'Sandi berhasil direset']);
        }
        break;
    case 'cekemail':
        $email = trim(mysqli_real_escape_string($hub, $_POST['email']));
        $sql = mysqli_query($hub, "SELECT * FROM tb_user WHERE email = '$email' LIMIT 1") or die(mysqli_error($hub));
        if (mysqli_num_rows($sql) > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'msg' => 'Pengguna tidak ditemukan']);
        }
        break;
    case 'login':
        $nama = trim(mysqli_real_escape_string($hub, $_POST['nama']));
        $sandi = mysqli_real_escape_string($hub, $_POST['sandi']);

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
        break;
    case 'reg':
        $nama = trim(mysqli_real_escape_string($hub, $_POST['nama']));
        $npm = trim(mysqli_real_escape_string($hub, $_POST['npm']));
        $email = mysqli_real_escape_string($hub, $_POST['email']);
        $sandi = mysqli_real_escape_string($hub, $_POST['sandi']);
        $konfirmasi = mysqli_real_escape_string($hub, $_POST['konfirmasi']);

        if ($sandi !== $konfirmasi) {
            echo json_encode(['success' => false, 'msg' => 'Konfirmasi sandi tidak cocok.']);
            exit;
        }

        $check = mysqli_query($hub, "SELECT * FROM tb_user WHERE npm = '$npm' LIMIT 1") or die(mysqli_error($hub));
        if (mysqli_num_rows($check) > 0) {
            echo json_encode(['success' => false, 'msg' => 'Npm tersebut telah terdaftar.']);
        } else {
            $passENC = password_hash($sandi, PASSWORD_DEFAULT);
            mysqli_query($hub, "INSERT INTO tb_user (npm, nama, email, kata_sandi, level) VALUES ('$npm', '$nama', '$email', '$passENC', 'mhs')") or die(mysqli_error($hub));

            $data = [
                'npm' => $npm,
                'nama' => $nama,
                'email' => $email,
                'level' => 'mhs'
            ];
            $_SESSION['valid'] = true;
            $_SESSION['userData'] = $data;

            echo json_encode(['success' => true]);
        }
        break;
    default:
        echo json_encode(['success' => false, 'msg' => 'Aksi tidak dikenali.']);
        break;
}