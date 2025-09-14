<?php include_once "../../header.php"; ?>

<div class="flex items-center justify-between mb-6 font-medium">
    <div class="flex flex-col">
        <span class="text-2xl">
            Pendaftaran
        </span>
        <span class="text-gray-400">
            Laporan Pendaftaran Semester Pendek
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
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-48">Nama Mahasiswa</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left">Mata Kuliah</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-24">Total SKS</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-3 tracking-wider text-sm text-gray-700">1</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">07351811072</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">Andika Sukardi</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">
                    <div>Linux</div>
                    <div>Komunikasi Data</div>
                    <div>Bahasa Inggris</div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include_once "../../footer.php"; ?>