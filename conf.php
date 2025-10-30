<?php
session_start();

$hub = mysqli_connect("localhost", "root", "", "db_farhat");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
function VALID()
{
    return isset($_SESSION['valid']) && $_SESSION['valid'] === true;
}
function ISADMIN()
{
    return isset($_SESSION['userData']) && $_SESSION['userData']['level'] === 'admin';
}
function ISMHS()
{
    return isset($_SESSION['userData']) && $_SESSION['userData']['level'] === 'mhs';
}
function base($url = null)
{
    $base = 'http://localhost/farhat';
    if ($url != null) {
        return $base . '/' . $url;
    } else {
        return $base;
    }
}
$halamanAktif = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$berandaUrl = base('pages/beranda/');
$berandaAktif = ($halamanAktif === $berandaUrl);
$sl_matkul = 'Mengelola data mata kuliah yang tersedia pada Semester Pendek';
$sl_mhs = 'Mengelola data mahasiswa pada Semester Pendek';
$sl_daftar = 'Melihat dan mengelola laporan pendaftaran Semester Pendek';
$sl_bayar = 'Melihat dan mengelola laporan pembayaran Semester Pendek';
$menu = [
    "Data" => [
        ["url" => base('pages/matkul/'), "label" => "Mata Kuliah SP", 'sublabel' => $sl_matkul, 'icon' => 'fas fa-book'],
        ["url" => base('pages/mhs/'), "label" => "Mahasiswa", 'sublabel' => $sl_mhs, 'icon' => 'fas fa-address-book'],
    ],
    "Laporan" => [
        ["url" => base('pages/pendaftaran'), "label" => "Pendaftaran", 'sublabel' => $sl_daftar, 'icon' => 'fas fa-rectangle-list'],
        ["url" => base('pages/pembayaran'), "label" => "Pembayaran", 'sublabel' => $sl_bayar, 'icon' => 'fas fa-money-bill'],
    ]
];

$sql = mysqli_query($hub, "SELECT nilai FROM tb_hargasks LIMIT 1") or die(mysqli_error($hub));
if (mysqli_num_rows($sql) > 0) {
    $data = mysqli_fetch_array($sql);
    $hargasks = $data['nilai'];
}