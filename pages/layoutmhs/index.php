<?php
require_once '../../conf.php';
if (!VALID() || !ISMHS()) {
    header("Location: " . base());
    exit;
}
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
        <div class="flex items-center gap-2">
            <div class="border-[3px] justify-center text-gray-600 border-gray-600 flex items-center rounded-full">
                <div
                    class="w-6 h-6 flex items-center relative justify-center border-2 border-transparent rounded-full overflow-hidden">
                    <i class="text-[22px] fas fa-user top-1 absolute"></i>
                </div>
            </div>
            <div class="font-medium text-gray-800">
                <div>Farhat Alkatiri</div>
            </div>
            <div class="flex items-center text-gray-800">
                <a href="<?= base('auth/logout.php') ?>"
                    class="py-1 px-2 hover:bg-red-500 hover:text-white bg-opacity-70 rounded-full">
                    <i class="fas fa-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="font-medium w-[800px] m-auto mt-[100px]">
        <div class="text-gray-800">
            Selamat Datang, <?=$_SESSION['userData']['nama']?>
        </div>
        <div class="my-[100px] text-center text-2xl">
            SISTEM INFORMASI PENDAFTARAN DAN PEMBAYARAN MATA
            KULIAH SEMESTER PENDEK
            (Studi kasus : Prodi Informatika Universitas Khairun Ternate)
        </div>

        <!-- SESI PILIH DAN PRATINJAU -->
        <div id="sesiPratinjau" class="py-6">
            <div class="gap-2 text-gray-800 flex items-center">
                <div class="text-xs">
                    Pilih Mata Kuliah Semester Pendek yang akan Dikontrak
                </div>
                <div class="border-t flex-grow"></div>
            </div>
            <div class="text-xs my-6 text-right">
                <i class="fas fa-circle-info"></i>
                <span>1 SKS Rp.300.000</span>
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
                    <tbody></tbody>
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
                            <th class="p-3 text-left tracking-wider w-20">Tiuds</th>
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
                    <button id="confBtn"
                        class=" disabled:bg-opacity-30 flex gap-2 items-center p-2 hover:bg-opacity-100 bg-opacity-60 rounded-md bg-green-500 text-green-800 float-right">
                        <i class="fas fa-check"></i>
                        <div>Konfirmasi</div>
                    </button>
                </div>
            </div>
        </div>

        <!-- SESI BAYAR -->
        <div class="py-6 hidden" id="sesiBayar">
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
                        <th class="p-3 text-left tracking-wider w-48">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">2</td>
                        <td class="p-3 tracking-wider">Rp.600.000</td>
                    </tr>
                </tbody>
                <tfoot class="bg-gray-100 font-semibold border-t-2">
                    <tr>
                        <td class="p-3 tracking-wider" colspan="2">Total</td>
                        <td class="p-3 tracking-wider">0</td>
                        <td class="p-3 tracking-wider">0</td>
                    </tr>
                </tfoot>
            </table>
            <div class="py-3">
                <button
                    class="flex gap-2 items-center p-2 hover:bg-opacity-100 bg-opacity-60 rounded-md bg-green-500 text-green-800 float-right">
                    <i class="fas fa-credit-card"></i>
                    <div>Bayar</div>
                </button>
            </div>
        </div>
    </div>

    <script src="<?= base('assets/js/all.min.js') ?>"></script>
    <script>
        const sesiPratinjau = document.getElementById("sesiPratinjau");
        const sesiBayar = document.getElementById("sesiBayar");
        const confBtn = document.getElementById("confBtn");
        sesiBayar.classList.add("hidden");
        confBtn.addEventListener("click", (e) => {
            e.preventDefault();
            sesiPratinjau.classList.add("hidden");
            sesiBayar.classList.remove("hidden");
        })

        const tbodyMk = document.querySelector("#tabelMk tbody");
        const tbodyPra = document.querySelector("#tabelPra tbody");
        const totalSksE1 = document.getElementById("totalSks");
        const totalHargaE1 = document.getElementById("totalHarga");
        const warnE1 = document.getElementById("warn");

        const matkul = [
            { kode: "19827sa", nama: "Linux", sks: "2" },
            { kode: "8sdnjs", nama: "Pemrograman Web", sks: "3" },
            { kode: "8sdnjs", nama: "Pemrograman Web", sks: "3" },
            { kode: "8sdnjs", nama: "Pemrograman Web", sks: "3" },
            { kode: "jksa2UII", nama: "Basis Data", sks: "2" }
        ];
        Array.from(matkul, row => {
            const tr = document.createElement("tr");
            tr.className = "odd:bg-white even:bg-gray-50";
            tr.innerHTML = `
                <td class="p-3 tracking-wider">${row.kode}</td>
                <td class="p-3 tracking-wider">${row.nama}</td>
                <td class="p-3 tracking-wider">${row.sks}</td>
                <td class="p-3 tracking-wider">
                    <input type="checkbox" class="pilih">
                </td>
            `;
            tbodyMk.appendChild(tr);
        })

        function rupiahFormatter(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimunFractionDigits: 0,
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
                const harga = sks * 300000;

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

            if (total > 9) {
                warnE1.textContent = "Peringatan: SKS yang dipilih melebihi batas maksimal (9 SKS)!";
                warn.classList.remove("hidden");
                confBtn.disabled = true;
            } else {
                warnE1.classList.add("hidden");
                confBtn.disabled = false;
            }
        }

        document.querySelectorAll("#tabelMk .pilih").forEach(cb => {
            cb.addEventListener("change", updatePratinjau);
        });
    </script>
</body>

</html>