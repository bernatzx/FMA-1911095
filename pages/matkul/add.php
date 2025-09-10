<?php include_once '../../header.php'; ?>
<div class="flex items-center justify-between mb-6 font-medium">
    <div class="flex flex-col">
        <span class="text-2xl">
            Mata Kuliah SP
        </span>
        <span class="text-gray-400">
            Tambah Data Mata Kuliah Semester Pendek
        </span>
    </div>
    <div>
        <button onclick="window.location.href='index.php'" type="button"
            class="bg-opacity-90 gap-2 px-5 py-2 bg-gray-700 hover:bg-gray-800 text-sm text-white rounded-lg">
            <i class="fas fa-arrow-left"></i>
            <span>
                Kembali
            </span>
        </button>
    </div>
</div>
<div class="flex justify-center">
    <div class="w-[600px] border rounded-lg p-6 shadow">
        <div class="mb-6">
            <div class="font-medium text-sm mb-2">
                Kode MK :
            </div>
            <input class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" type="text">
        </div>
        <div class="mb-6">
            <div class="font-medium text-sm mb-2">
                Mata Kuliah :
            </div>
            <input class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" type="text">
        </div>
        <div class="mb-6">
            <div class="font-medium text-sm mb-2">
                SKS :
            </div>
            <input class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" type="number" min="1" max="4">
        </div>
        <div class="float-right">
            <button class="bg-opacity-90 gap-2 px-5 py-2 bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg" type="button">
                <i class="fas fa-add"></i>
                <span>
                    Tambah
                </span>
            </button>
        </div>
    </div>
</div>
<?php include_once '../../footer.php'; ?>