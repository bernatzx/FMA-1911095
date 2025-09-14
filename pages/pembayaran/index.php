<?php include_once "../../header.php"; ?>

<div class="flex items-center justify-between mb-6 font-medium">
    <div class="flex flex-col">
        <span class="text-2xl">
            Pembayaran
        </span>
        <span class="text-gray-400">
            Laporan Pembayaran Semester Pendek
        </span>
    </div>
    <div>
        <a href="" class="bg-gray-300 hover:bg-gray-400 hover:text-gray-600 text-gray-500 text-sm px-3 py-2 rounded-lg">
            <i class="fas fa-refresh"></i>
        </a>
    </div>
</div>
<div class="overflow-auto rounded-lg shadow">
    <table class="w-full">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-20">No.</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-48">NPM Mahasiswa</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left">Nama Mahasiswa</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-24">Total SKS</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-24">Tagihan</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-24">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-3 tracking-wider text-sm text-gray-700">1</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">07351811072</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">Andika Sukardi</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">8</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">Rp.1.000.000</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">
                    <span class="uppercase rounded-lg bg-yellow-300 text-yellow-600 font-medium py-1 px-2 bg-opacity-50">Pending</span>
                </td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-3 tracking-wider text-sm text-gray-700">2</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">07351811072</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">Andika Sukardi</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">8</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">Rp.800.000</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">
                    <span class="uppercase rounded-lg bg-green-300 text-green-600 font-medium py-1 px-2 bg-opacity-50">Selesai</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include_once "../../footer.php"; ?>