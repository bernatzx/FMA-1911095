<?php include_once "../../header.php"; ?>

<div class="flex items-center justify-between mb-6 font-medium">
    <div class="flex flex-col">
        <span class="text-2xl">
            Mahasiswa
        </span>
        <span class="text-gray-400">
            Data Mahasiswa Semester Pendek
        </span>
    </div>
    <div>
        <button onclick="window.location.href=''" type="button"
            class="bg-opacity-90 gap-2 px-5 py-2 bg-gray-500 hover:bg-green-800 text-sm text-white rounded-lg">
            <i class="fas fa-refresh"></i>
        </button>
    </div>
</div>
<div class="overflow-auto rounded-lg shadow">
    <table class="w-full">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-20">No.</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-48">NPM Mahasiswa</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left">Nama Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-3 tracking-wider text-sm text-gray-700">1</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">07351811072</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">Andika Sukardi</td>
            </tr>
        </tbody>
    </table>
</div>

<?php include_once "../../footer.php"; ?>