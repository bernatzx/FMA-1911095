<?php
include_once '../../header.php';
$id = intval($_GET['id'] ?? 0);
$sql = mysqli_query($hub, "SELECT * FROM tb_mk WHERE id_mk = '$id'") or die($hub);
$data = mysqli_fetch_assoc($sql);
?>
<div class="flex items-center justify-between mb-6 font-medium">
    <div class="flex flex-col">
        <span class="text-2xl">
            Mata Kuliah SP
        </span>
        <span class="text-gray-400">
            Ubah Data Mata Kuliah Semester Pendek
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
    <form class="w-[600px] border space-y-3 rounded-lg p-6 shadow" id="editMK">
        <input type="hidden" name="action" value="editMK">
        <input type="hidden" name="id" value="<?= $data['id_mk'] ?>">
        <div>
            <div class="font-medium text-sm mb-2">
                Kode MK :
            </div>
            <input name="kode" required value="<?= $data['kode'] ?>"
                class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" type="text">
        </div>
        <div>
            <div class="font-medium text-sm mb-2">
                Mata Kuliah :
            </div>
            <input name="nama" required value="<?= $data['nama'] ?>"
                class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" type="text">
        </div>
        <div>
            <div class="font-medium text-sm mb-2">
                SKS :
            </div>
            <input name="sks" required value="<?= $data['sks'] ?>"
                class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" type="number" min="1"
                max="4">
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
            <button
                class="bg-opacity-60 gap-2 px-5 py-2 bg-yellow-200 hover:bg-opacity-100 text-sm text-yellow-800 rounded-lg"
                type="submit">
                <i class="fas fa-pencil"></i>
                <span>
                    Ubah
                </span>
            </button>
        </div>
    </form>
</div>

<script>
    const form = document.getElementById('editMK');
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
            const res = await fetch('pros.php', {
                method: 'POST',
                body: formData,
            })
            const data = await res.json();
            if (data.success) {
                window.location = '<?= base("pages/matkul") ?>';
            } else {
                errorMsg.textContent = data.msg;
                errorBox.classList.remove('hidden');
            }
        } catch (error) {
            errorMsg.textContent = 'Terjadi kesalahan server.';
            errorBox.classList.remove('hidden');
        }
    })
</script>
<?php include_once '../../footer.php'; ?>