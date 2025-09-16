<?php
require_once '../../conf.php';
require_once '../../dompdf/autoload.inc.php';

if (!VALID() || !ISMHS()) {
    header("Location: " . base());
    exit;
}

use Dompdf\Dompdf;
use Dompdf\Options;

$id_MHS = $_SESSION['userData']['id_user'];
$namapengguna = $_SESSION['userData']['nama'];
$npm = $_SESSION['userData']['npm'];

$idKRS = isset($_GET['id']) ? intval($_GET['id']) : 0;

$q = mysqli_query($hub, "SELECT COUNT(*) AS total_mk, SUM(d.harga) AS total_harga, k.tanggal_bayar, m.kode, m.nama, d.sks
    FROM tb_krs_detail d 
    JOIN tb_mk m ON d.id_mk = m.id_mk
    JOIN tb_krs k on d.id_krs = k.id_krs
    WHERE d.id_krs = '$idKRS' AND k.id_user = '$id_MHS'");

$data = mysqli_fetch_assoc($q);
$tanggal = date("d-m-y", strtotime($data['tanggal_bayar']));
$total_harga = number_format($data['total_harga'], 0, ',', '.');

$html = "
    <div style='text-align: center;'>
        <div style='font-weight: bold; text-transform: uppercase; font-size: 22px;'>bukti pembayaran</div>
        <div style='text-transform: capitalize; font-weight: 600; font-size: 16px;'>semester pendek (SP) informatika</div>
    </div>
    <div style='margin: 5px 0;'>Nama: " . htmlspecialchars($namapengguna) . "</div>
    <div style='margin: 5px 0;'>NPM: " . htmlspecialchars($npm) . "</div>
    <div style='margin: 5px 0;'>Total Mata Kuliah: $data[total_mk]</div>
    <hr style='border: 0; border-top: 1px dashed #aaa; margin: 8px 0;'>
    <div style='margin: 5px 0;'>Tanggal Lunas: $tanggal</div>
    <div style='margin: 5px 0;'>Total Harga: Rp.$total_harga</div>
    <hr style='border: 0; border-top: 1px dashed #aaa; margin: 8px 0;'>
    <div style='text-align: center;'>
        Terima Kasih
        <br>
        <i>Harap simpan bukti ini.</i>
    </div>
";

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'DejaVu Sans');
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

ob_clean();
$dompdf->stream("KWITANSI-SP_$namapengguna.pdf", ["Attachment" => true]);
exit;
