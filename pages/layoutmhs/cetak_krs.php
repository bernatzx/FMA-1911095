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

// Mulai HTML PDF dengan inline style
$html = "
<div style='font-family: DejaVu Sans, sans-serif; font-size:10pt;'>
  <div style='text-align:center; font-weight:bold;'>
    <table width='100%' style='margin-bottom:10px;'>
      <tr>
        <td width='70'>
          <img src='" . base('assets/img/tutwuri-logo.png') . "' width='70'>
        </td>
        <td style='text-align:center;'>
          <p style='margin:0;'>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET,</p>
          <p style='margin:0;'>DAN TEKNOLOGI UNIVERSITAS KHAIRUN</p>
          <p style='margin:0;'>FAKULTAS TEKNIK</p>
        </td>
        <td width='70'>
          <img src='" . base('assets/img/unkhair-logo.png') . "' width='70'>
        </td>
      </tr>
    </table>

    <div style='border-top:1px solid black; border-bottom:3px solid black; margin-bottom:10px;'></div>

    <div style='padding:10px 0;'>
      <h3 style='margin:0;'>KARTU RENCANA STUDI (KRS)</h3>
      <p style='margin:0;'>PROGRAM STUDI INFORMATIKA</p>
    </div>
  </div>

  <div style='margin:0 0 0 0;'>
    <div style='padding-bottom:10px;'>
      <table width='100%' style='border-collapse:collapse; font-size:10pt;'>
        <tr>
          <td width='120'>NAMA MAHASISWA</td>
          <td>: " . htmlspecialchars($namapengguna) . "</td>
        </tr>
        <tr>
          <td>NPM</td>
          <td>: " . htmlspecialchars($npm) . "</td>
        </tr>
      </table>
    </div>

    <table width='100%' style='border-collapse:collapse; font-size:10pt; text-align:center;'>
      <thead>
        <tr style='background:#f0f0f0;'>
          <th style='border:1px solid black; padding:5px;'>No.</th>
          <th style='border:1px solid black; padding:5px;'>KODE MK</th>
          <th style='border:1px solid black; padding:5px;'>NAMA MATA KULIAH</th>
          <th style='border:1px solid black; padding:5px;'>JMLH. SKS</th>
        </tr>
      </thead>
      <tbody>";

$totalSks = 0;
$maxRows = 10; // Jumlah baris yang selalu ingin ditampilkan
$rows = [];    // Simpan semua row data dulu

if ($q && mysqli_num_rows($q) > 0) {
  $no = 1;
  while ($row = mysqli_fetch_assoc($q)) {
    $rows[] = $row;
    $totalSks += $row['sks'];
  }
}

// Loop untuk menampilkan data + baris kosong jika kurang dari $maxRows
for ($i = 0; $i < $maxRows; $i++) {
  if (isset($rows[$i])) {
    $html .= "<tr>
            <td style='border:1px solid black; padding:5px;'>" . ($i + 1) . "</td>
            <td style='border:1px solid black; padding:5px;'>" . htmlspecialchars($rows[$i]['kode']) . "</td>
            <td style='border:1px solid black; padding:5px; text-align:left;'>" . htmlspecialchars($rows[$i]['nama']) . "</td>
            <td style='border:1px solid black; padding:5px;'>" . (int) $rows[$i]['sks'] . "</td>
        </tr>";
  } else {
    // Baris kosong
    $html .= "<tr>
            <td style='border:1px solid black; padding:5px;'>" . ($i + 1) . "</td>
            <td style='border:1px solid black; padding:5px;'>&nbsp;</td>
            <td style='border:1px solid black; padding:5px;'>&nbsp;</td>
            <td style='border:1px solid black; padding:5px;'>&nbsp;</td>
        </tr>";
  }
}


// Baris jumlah SKS
$html .= "<tr>
        <td colspan='3' style='border:1px solid black; padding:5px; text-align:center; font-weight:bold;'>JUMLAH SKS</td>
        <td style='border:1px solid black; padding:5px; text-align:center; font-weight:bold;'>$totalSks</td>
    </tr>
      </tbody>
    </table>

    <div style='width: 100%; padding: 0 40px; font-size:9pt; margin-top: 40px; clear: both;'>

      <!-- Blok Kiri -->
      <div style='float: left; width: 45%; text-align: left;'>
        <p>Koord. Program Studi</p>
        <div style='margin-top: 60px; font-weight: bold;'>
          <p style='text-decoration: underline; margin: 0;'>Rosihan, S.T., M.Cs.</p>
          <p style='margin: 0;'>NIP.197607192010121001</p>
        </div>
      </div>

      <!-- Blok Kanan -->
      <div style='float: right; width: 45%;'>
        <div style='margin: 0 auto; text-align: center; display: block;'>
          <p>Ternate, 7 Juli 2023</p>
          <p>Mahasiswa</p>
          <div style='margin-top: 60px; font-weight: bold;'>
            <p style='text-decoration: underline; margin: 0;'>" . htmlspecialchars($namapengguna) . "</p>
            <p style='margin: 0;'>NPM. " . htmlspecialchars($npm) . "</p>
          </div>
        </div>
      </div>

    </div>
    <div style='clear: both;'></div>


    <div style='font-size:9pt; margin-top:40px;'>
      <div style='font-weight:bold;'>Distribusi KRS:</div>
      <ol style='margin:0;'>
        <li>BAAKPSI</li>
        <li>Fakultas</li>
        <li>Prog. Studi</li>
        <li>Mahasiswa</li>
        <li>Penasehat Akademik</li>
      </ol>
    </div>
  </div>
</div>
";

// Inisialisasi Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'DejaVu Sans'); // Untuk mendukung karakter UTF-8
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Bersihkan output buffer jika ada
if (ob_get_length())
  ob_end_clean();

// Stream PDF ke browser
$filename = "KRS-SP_" . preg_replace('/\s+/', '_', $namapengguna) . ".pdf";
$dompdf->stream($filename, ["Attachment" => true]);
exit;
