<?php include_once "../../header.php"; ?>

<div class="flex items-center justify-between mb-6 font-medium">
    <div class="flex flex-col">
        <span class="text-2xl">
            Mata Kuliah SP
        </span>
        <span class="text-gray-400">
            Data Mata Kuliah Semester Pendek
        </span>
    </div>
    <div>
        <button onclick="window.location.href='add.php'" type="button" class="bg-opacity-90 gap-2 px-5 py-2 bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg">
            <i class="fas fa-add"></i>
            <span>
                Tambah MK
            </span>
        </button>
    </div>
</div>
<div class="overflow-auto rounded-lg shadow">
    <table class="w-full">
        <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-20">No.</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-24">Kode MK</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left">Mata Kuliah</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-20">SKS</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-24"><i class="fas fa-gear"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-3 tracking-wider text-sm text-gray-700">1</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">097GU2</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">Linux</td>
                <td class="p-3 tracking-wider text-sm text-gray-700">2</td>
                <td class="p-3 tracking-wider text-sm text-gray-700 font-medium flex gap-2">
                    <button type="button" class="bg-yellow-200 py-1 px-2 bg-opacity-60 hover:bg-opacity-100 rounded-lg text-yellow-800 flex items-center gap-1">
                        <i class="fas fa-pencil"></i>
                        <span>Ubah</span>
                    </button>
                    <button type="button" class="bg-red-200 py-1 px-2 bg-opacity-60 hover:bg-opacity-100 rounded-lg text-red-800 flex items-center gap-1">
                        <i class="fas fa-trash"></i>
                        <span>Hapus</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include_once "../../footer.php"; ?>