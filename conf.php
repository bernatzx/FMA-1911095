<?php
$hub = mysqli_connect("localhost", "root", "", "db_farhat");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
function VALID()
{
    return isset($_SESSION['valid']) && $_SESSION['valid'] === true;
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
$menu = [
    "Data" => [
        ["url" => base('pages/matkul/'), "label" => "Mata Kuliah SP"],
        ["url" => base('pages/mhs/'), "label" => "Mahasiswa"],
    ],
    "Laporan" => [
        ["url" => base('pages/pendaftaran'), "label" => "Pendaftaran"],
        ["url" => base('pages/pembayaran'), "label" => "Pembayaran"],
    ]
];