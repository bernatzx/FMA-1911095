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

$q = mysqli_query($hub, "SELECT m.kode, m.nama, d.sks
    FROM tb_krs_detail d 
    JOIN tb_mk m ON d.id_mk = m.id_mk 
    WHERE d.id_krs = '$idKRS' AND d.id_krs IN (
        SELECT id_krs FROM tb_krs WHERE id_user = '$id_MHS'
    )");

$html = "
<div style='font-size: 28px; font-weight: 600; text-align:center'>Kartu Rencana Studi (KRS)</div>
<div style='text-align:center; font-size: 22px;'>Kartu Rencana Studi (KRS)</div>
<p>Nama: " . htmlspecialchars($namapengguna) . "</p>
<p>NPM: " . htmlspecialchars($npm) . "</p>
<table border='1' cellspacing='0' cellpadding='6' width='100%'>
<thead>
<tr>
    <th>Kode MK</th>
    <th>Nama MK</th>
    <th>SKS</th>
</tr>
</thead>
<tbody>";

$totalSks = 0;

if ($q && mysqli_num_rows($q) > 0) {
    while ($row = mysqli_fetch_assoc($q)) {
        $html .= "<tr>
            <td>" . htmlspecialchars($row['kode']) . "</td>
            <td>" . htmlspecialchars($row['nama']) . "</td>
            <td>" . (int)$row['sks'] . "</td>
        </tr>";
        $totalSks += $row['sks'];
    }
} else {
    $html .= "<tr><td colspan='4' align='center'>Data tidak ditemukan</td></tr>";
}

$html .= "</tbody>
<tfoot>
<tr>
    <td colspan='2'><b>Total</b></td>
    <td><b>$totalSks</b></td>
</tr>
</tfoot>
</table>
";

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'DejaVu Sans');
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

ob_clean();
$dompdf->stream("KRS_$namapengguna.pdf", ["Attachment" => true]);
exit;
