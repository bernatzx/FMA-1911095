<?php require_once '../../conf.php' ?>

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
        <div class="flex font-bold">
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
                <a href="" class="py-1 px-2 hover:bg-red-500 hover:text-white bg-opacity-70 rounded-full">
                    <i class="fas fa-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="font-medium w-[800px] m-auto mt-[100px]">
        <div class="text-gray-800">
            Selamat Datang, Farhat
        </div>
        <div class="my-[100px] text-center text-2xl">
            SISTEM INFORMASI PENDAFTARAN DAN PEMBAYARAN MATA
            KULIAH SEMESTER PENDEK
            (Studi kasus : Prodi Informatika Universitas Khairun Ternate)
        </div>
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
        <div class="my-6 rounded-lg shadow border">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-left tracking-wider w-36">Kode MK</th>
                        <th class="p-3 text-left tracking-wider">Mata Kuliah</th>
                        <th class="p-3 text-left tracking-wider w-20">SKS</th>
                        <th class="p-3 text-left tracking-wider w-20">Pilih</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">2</td>
                        <td class="p-3 tracking-wider">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">3</td>
                        <td class="p-3 tracking-wider">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">2</td>
                        <td class="p-3 tracking-wider">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">2</td>
                        <td class="p-3 tracking-wider">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">2</td>
                        <td class="p-3 tracking-wider">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">2</td>
                        <td class="p-3 tracking-wider">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider">287HJJS5</td>
                        <td class="p-3 tracking-wider">Linux</td>
                        <td class="p-3 tracking-wider">2</td>
                        <td class="p-3 tracking-wider">
                            <input type="checkbox" name="" id="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- PRATINJAU -->
        <div class="gap-2 text-gray-800 flex items-center">
            <div class="border-t flex-grow"></div>
            <div class="text-xs">
                Pratinjau
            </div>
            <div class="border-t flex-grow"></div>
        </div>
        <div class="my-6">
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
                    <i class="fas fa-check"></i>
                    <div>Konfirmasi</div>
                </button>
            </div>
        </div>

        <!-- SESI BAYAR -->
        <div class="py-6">
            <div class="gap-2 text-gray-800 flex items-center mb-6">
                <div class="border-t flex-grow"></div>
                <div class="text-xs">
                    Lunas
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
</body>

</html>