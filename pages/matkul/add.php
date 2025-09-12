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
    <form class="w-[600px] border rounded-lg p-6 shadow space-y-3" id="addMK">
        <input type="hidden" name="action" value="addMK">
        <div class="">
            <div class="font-medium text-sm mb-2">
                Kode MK :
            </div>
            <input name="kode" class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" required
                type="text">
        </div>
        <div class="">
            <div class="font-medium text-sm mb-2">
                Mata Kuliah :
            </div>
            <input name="nama" class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" required
                type="text">
        </div>
        <div class="">
            <div class="font-medium text-sm mb-2">
                SKS :
            </div>
            <input name="sks" class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" required
                type="number" min="1" max="4">
        </div>
        <div id="errorBox"
            class="hidden font-medium text-sm flex items-center gap-2 p-2 bg-red-400 text-red-800 rounded-sm">
            <i class="fas fa-circle-info"></i>
            <span id="errorMsg" class="flex-auto"></span>
            <div id="closeErrorBoxBtn">
                <i class="cursor-pointer fas fa-times"></i>
            </div>
        </div>
        <div class="float-right">
            <button class="bg-opacity-90 gap-2 px-5 py-2 bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg"
                type="submit">
                <i class="fas fa-add"></i>
                <span>
                    Tambah
                </span>
            </button>
        </div>
    </form>
</div>

<script>
    const form = document.getElementById('addMK');
    const errorBox = document.getElementById('errorBox');
    const errorMsg = document.getElementById('errorMsg');
    const closeErrorBoxBtn = document.getElementById('closeErrorBoxBtn');

    if (closeErrorBoxBtn) {
        closeErrorBoxBtn.addEventListener('click', () => {
            errorBox.classList.toggle('hidden');
        })
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const kode = formData.get('kode');
        const nama = formData.get('nama');
        const sks = formData.get('sks');
        if (!kode || !nama || !sks) {
            errorMsg.textContent = 'Semua field wajib diisi.';
            errorBox.classList.remove('hidden');
            return;
        }

        try {
            const res = await fetch("pros.php", {
                method: 'POST',
                body: formData
            })
            const data = await res.json();
            if (data.success) {
                window.location = <?= base('pages/matkul/') ?>;
            } else {
                errorMsg.textContent = data.msg;
                errorBox.classList.remove('hidden');
            }
        } catch (error) {
            errorMsg.textContent = 'Terjadi kesalahan koneksi ke server.';
            errorBox.classList.remove('hidden');
        }
    })
</script>

<?php include_once '../../footer.php'; ?>