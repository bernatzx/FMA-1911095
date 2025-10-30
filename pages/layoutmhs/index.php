<?php
require_once '../../conf.php';
if (!VALID() || !ISMHS()) {
    header("Location: " . base());
    exit;
}
$id_MHS = $_SESSION['userData']['id_user'];
$qkrs = mysqli_query($hub, "SELECT id_krs, status_krs, total_sks, total_harga FROM tb_krs WHERE id_user = '$id_MHS'") or die(mysqli_error($hub));
if (mysqli_num_rows($qkrs) > 0) {
    $dataKRS = mysqli_fetch_assoc($qkrs);
    $statusKRS = $dataKRS['status_krs'];
    $totalsks = $dataKRS['total_sks'];
    $totalharga = $dataKRS['total_harga'];
}
$namapengguna = $_SESSION['userData']['nama'];
$npm = $_SESSION['userData']['npm'];
$email = $_SESSION['userData']['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM INFORMASI PENDAFTARAN DAN PEMBAYARAN MATA KULIAH SEMESTER PENDEK</title>
    <script src="<?= base('assets/js/tailwindcss.js') ?>"></script>
</head>

<body>
    <nav class="flex justify-between p-4 shadow-md border-b-2 w-full start-0 fixed top-0 z-20 bg-white">
        <div class="flex font-bold cursor-pointer" onclick="window.location.href='<?= base() ?>'">
            <div class="text-[45px] leading-[1]">
                <span>S</span>
            </div>
            <div class="flex text-2xl flex-col leading-[0.9]">
                <span>emester</span>
                <span>Pendek</span>
            </div>
        </div>
        <div class="flex items-center text-sm gap-4 text-gray-800">
            <div>
                <i class="fa-regular fa-user"></i>
            </div>
            <div class="">
                <div><?= htmlspecialchars($namapengguna) ?></div>
            </div>
            <div class="px-2 rounded-md bg-gray-100 font-medium">
                Mahasiswa
            </div>
            <div onclick="window.location.href='<?= base('auth/logout.php') ?>'"
                class="hover:bg-gray-100 gap-3 cursor-pointer flex items-center text-center text-gray-800 border py-1 px-2 rounded-md shadow-sm">
                <i class="fas fa-arrow-right-from-bracket"></i>
                <div>Logout</div>
            </div>
        </div>
    </nav>

    <div class="font-medium w-[800px] m-auto mt-[100px]">
        <div class="border p-8 rounded-lg shadow">
            <div class="text-xl mb-4">
                <i class="fas fa-graduation-cap"></i>
                Profil Mahasiswa
            </div>
            <div class="flex justify-between">
                <div>
                    <span class="text-sm text-gray-400">
                        Nama Lengkap
                    </span>
                    <br>
                    <?= htmlspecialchars($namapengguna) ?>
                </div>
                <div>
                    <span class="text-sm text-gray-400">
                        NPM
                    </span>
                    <br>
                    <?= htmlspecialchars($npm) ?>
                </div>
                <div>
                    <span class="text-sm text-gray-400">
                        Email
                    </span>
                    <br>
                    <?= htmlspecialchars($email) ?>
                </div>
            </div>
        </div>

        <!-- SESI PILIH DAN PRATINJAU -->
        <div class="py-6 <?= (mysqli_num_rows($qkrs) > 0) ? 'hidden' : '' ?>">
            <div class="gap-2 text-gray-800 flex items-center">
                <div class="text-xs">
                    Mata Kuliah Semester Pendek yang tersedia
                </div>
                <div class="border-t flex-grow"></div>
            </div>
            <div class="text-xs my-6 text-right">
                <i class="fas fa-circle-info"></i>
                <span>1 SKS Rp.<?= number_format($hargasks, 0, ',', '.') ?></span>
            </div>

            <!-- TABEL MK TERSEDIA -->
            <div class="mb-6 rounded-lg shadow border">
                <table class="w-full" id="tabelMk">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-left tracking-wider w-36">Kode MK</th>
                            <th class="p-3 text-left tracking-wider">Mata Kuliah</th>
                            <th class="p-3 text-left tracking-wider w-20">SKS</th>
                            <th class="p-3 text-left tracking-wider w-20">Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($hub, "SELECT * FROM tb_mk") or die(mysqli_error($hub));
                        if (mysqli_num_rows($sql) > 0) {
                            while ($row = mysqli_fetch_assoc($sql)) { ?>
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="p-3 tracking-wider"><?= $row['kode'] ?></td>
                                    <td class="p-3 tracking-wider"><?= $row['nama'] ?></td>
                                    <td class="p-3 tracking-wider"><?= $row['sks'] ?></td>
                                    <td class="p-3 tracking-wider">
                                        <input type="checkbox" class="pilih">
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="4" align="center" class="text-medium text-gray-400 p-3 text-s">Data Kosong!
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- TABEL PRATINJAU -->
            <div class="gap-2 text-gray-800 flex items-center">
                <div class="border-t flex-grow"></div>
                <div class="text-xs">
                    Pratinjau
                </div>
                <div class="border-t flex-grow"></div>
            </div>
            <div class="my-6">
                <div id="warn" class="mb-3 text-red-600 font-medium hidden"></div>
                <table class="w-full" id="tabelPra">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-left tracking-wider w-36">Kode MK</th>
                            <th class="p-3 text-left tracking-wider">Mata Kuliah</th>
                            <th class="p-3 text-left tracking-wider w-20">SKS</th>
                            <th class="p-3 text-left tracking-wider w-20">Harga</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot class="bg-gray-100 font-semibold border-t-2">
                        <tr>
                            <td class="p-3 tracking-wider" colspan="2">Total</td>
                            <td class="p-3 tracking-wider" id="totalSks">0</td>
                            <td class="p-3 tracking-wider" id="totalHarga">0</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="py-3">
                    <button id="confBtn" type="submit"
                        class=" disabled:bg-opacity-30 flex gap-2 items-center p-2 hover:bg-opacity-100 bg-opacity-60 rounded-md bg-green-500 text-green-800 float-right">
                        <i class="fas fa-check"></i>
                        <div>Konfirmasi</div>
                    </button>
                </div>
            </div>
        </div>

        <!-- SESI BAYAR -->
        <div class="py-6 mb-6 <?= ($statusKRS === 'confirm' || $statusKRS === 'lunas') ? '' : 'hidden' ?>">
            <div class="gap-2 text-gray-800 flex items-center mb-6">
                <div class="border-t flex-grow"></div>
                <div class="text-xs">
                    Daftar MK Semester Pendek yang Anda Kontrak
                </div>
                <div class="border-t flex-grow"></div>
            </div>
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-left tracking-wider w-36">Kode MK</th>
                        <th class="p-3 text-left tracking-wider">Mata Kuliah</th>
                        <th class="p-3 text-left tracking-wider w-20">SKS</th>
                        <th class="p-3 text-left tracking-wider w-48">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idKRS = $dataKRS['id_krs'];
                    $q = mysqli_query($hub, "SELECT m.kode, m.nama, d.sks, d.harga FROM tb_krs_detail d JOIN tb_mk m ON d.id_mk = m.id_mk WHERE d.id_krs = '$idKRS'") or die(mysqli_error($hub));
                    if (mysqli_num_rows($q) > 0) {
                        while ($row = mysqli_fetch_assoc($q)) { ?>
                            <tr class="odd:bg-white even:bg-gray-50">
                                <td class="p-3 tracking-wider"><?= $row['kode'] ?></td>
                                <td class="p-3 tracking-wider"><?= $row['nama'] ?></td>
                                <td class="p-3 tracking-wider"><?= $row['sks'] ?></td>
                                <td class="p-3 tracking-wider">Rp.<?= number_format($row['harga'], 0, ',', '.') ?></td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
                <tfoot class="bg-gray-100 font-semibold border-t-2">
                    <tr>
                        <td class="p-3 tracking-wider" colspan="2">Total</td>
                        <td class="p-3 tracking-wider"><?= $totalsks ?></td>
                        <td class="p-3 tracking-wider">Rp.<?= number_format($totalharga, 0, ',', '.') ?></td>
                    </tr>
                </tfoot>
            </table>
            <div class="py-3">
                <?php
                if ($statusKRS === 'confirm') { ?>
                    <button onclick="bayar(<?= $dataKRS['id_krs'] ?>)" type="submit"
                        class="flex gap-2 items-center p-2 hover:bg-opacity-100 bg-opacity-60 rounded-md bg-green-500 text-green-800 float-right">
                        <i class="fas fa-credit-card"></i>
                        <div>Bayar</div>
                    </button>
                <?php } elseif ($statusKRS === 'lunas') { ?>
                    <div class="flex float-right items-center gap-2">
                        <a href="cetak_krs.php?id=<?= $dataKRS['id_krs'] ?>" target="_blank" type="submit"
                            class="flex gap-2 items-center p-2 hover:bg-opacity-100 bg-opacity-60 rounded-md bg-green-500 text-green-800">
                            <i class="fas fa-print"></i>
                            <div>Cetak KRS</div>
                        </a>
                        <a href="cetak_bukti.php?id=<?= $dataKRS['id_krs'] ?>"
                            class="flex gap-2 items-center bg-gray-300 p-2 rounded-md text-gray-600">
                            <i class="fas fa-receipt"></i>
                            <div>Cetak Bukti</div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="<?= base('assets/js/all.min.js') ?>"></script>
    <script>
        const confBtn = document.getElementById("confBtn");
        const tbodyPra = document.querySelector("#tabelPra tbody");
        const totalSksE1 = document.getElementById("totalSks");
        const totalHargaE1 = document.getElementById("totalHarga");
        const warnE1 = document.getElementById("warn");

        confBtn.addEventListener("click", async (e) => {
            e.preventDefault();

            let mkTerpilih = [];
            document.querySelectorAll("#tabelMk .pilih:checked").forEach(c => {
                const row = c.closest('tr');
                const code = row.querySelectorAll('td')[0].textContent.trim();
                mkTerpilih.push(code);
            })

            const formData = new FormData()
            formData.append('action', 'kontrakMk');
            formData.append('kodeMk', JSON.stringify(mkTerpilih));
            formData.append('totalSks', totalSksE1.textContent.trim());
            formData.append('totalHarga', totalHargaE1.textContent.replace(/\D/g, '').trim());
            try {
                const res = await fetch('pros.php', {
                    method: 'POST',
                    body: formData
                })
                const data = await res.json();
                if (data.success) {
                    location.reload();
                } else {
                    warnE1.textContent = data.msg;
                    warnE1.classList.remove("hidden");
                }
            } catch (error) {
                alert('Terjadi kesalahan server');
            }

        })

        async function bayar(idkrs) {
            if (!confirm('Anda akan membayarnya?')) return;
            const formData = new FormData();
            formData.append('action', 'bayar');
            formData.append('id', idkrs);
            try {
                const res = await fetch('pros.php', {
                    method: 'POST',
                    body: formData
                })
                const data = await res.json();
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.msg);
                }
            } catch (error) {
                alert('Terjadi kesalahan server');
            }
        }

        function rupiahFormatter(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(angka);
        }

        function updatePratinjau() {
            tbodyPra.innerHTML = "";
            let total = 0;
            let totalHarga = 0;

            document.querySelectorAll("#tabelMk .pilih:checked").forEach(c => {
                const row = c.closest("tr");
                const cells = row.querySelectorAll("td");
                const kode = cells[0].textContent;
                const mk = cells[1].textContent;
                const sks = parseInt(cells[2].textContent);
                const harga = sks * <?= $hargasks ?>;

                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td class="p-3 tracking-wider">${kode}</td>
                    <td class="p-3 tracking-wider">${mk}</td>
                    <td class="p-3 tracking-wider">${sks}</td>
                    <td class="p-3 tracking-wider">${rupiahFormatter(harga)}</td>
                `;
                tbodyPra.appendChild(tr);
                total += sks;
                totalHarga += harga;
            });
            totalSksE1.textContent = total;
            totalHargaE1.textContent = rupiahFormatter(totalHarga);

            if (total <= 9) {
                warnE1.classList.add("hidden");
            }
        }

        document.querySelectorAll("#tabelMk .pilih").forEach(cb => {
            cb.addEventListener("change", updatePratinjau);
        });
    </script>
</body>

</html>