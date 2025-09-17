<?php
$label = "Daftar";
include_once 'authH.php';
?>

<form class="space-y-4 font-medium" id="regForm">
    <input type="hidden" name="action" value="reg">
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="text" name="nama"
            placeholder="Nama Pengguna" required>
    </div>
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="text" name="npm"
            placeholder="Masukkan NPM" required>
    </div>
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="text" name="email"
            placeholder="Email" required>
    </div>
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="password"
            name="sandi" placeholder="Kata Sandi" required>
    </div>
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="password"
            name="konfirmasi" placeholder="Konfirmasi Kata Sandi" required>
    </div>
    <div>
        <button
            class="bg-opacity-90 p-3 w-full cursor-pointer bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg"
            type="submit">Daftar</button>
    </div>
</form>
<div id="errorBox"
    class="hidden mt-3 font-medium text-sm flex items-center gap-2 p-2 bg-red-400 text-red-800 rounded-sm">
    <i class="fas fa-circle-info"></i>
    <span id="errorMsg" class="flex-auto"></span>
    <div id="closeErrorBoxBtn">
        <i class="cursor-pointer fas fa-times"></i>
    </div>
</div>
<div class="mt-3 font-medium text-sm text-center">
    <span class="text-gray-500">
        Sudah punya akun?
    </span>
    <span onclick="window.location.href='login.php'"
        class="text-gray-800 hover:text-blue-700 hover:underline cursor-pointer">Masuk</span>
</div>

<script>
    const form = document.getElementById('regForm');
    const errorBox = document.getElementById('errorBox');
    const errorMsg = document.getElementById('errorMsg');
    const closeErrorBoxBtn = document.getElementById('closeErrorBoxBtn');

    if (closeErrorBoxBtn) {
        closeErrorBoxBtn.addEventListener('click', () => {
            errorBox.classList.toggle('hidden');
        });
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        const nama = formData.get('nama').trim();
        const npm = formData.get('npm').trim();
        const email = formData.get('email');
        const sandi = formData.get('sandi');
        const konfirmasi = formData.get('konfirmasi');

        if (!nama || !npm || !sandi || !konfirmasi || !email) {
            errorMsg.textContent = 'Semua field wajib diisi.';
            errorBox.classList.remove('hidden');
            return;
        }

        if (sandi !== konfirmasi) {
            errorMsg.textContent = 'Konfirmasi sandi tidak cocok.';
            errorBox.classList.remove('hidden');
            return;
        }

        try {
            const res = await fetch("auth.php", {
                method: 'POST',
                body: formData
            });
            const data = await res.json();
            if (data.success) {
                window.location = '<?= base() ?>';
            } else {
                errorMsg.textContent = data.msg;
                errorBox.classList.remove('hidden');
            }
        } catch (error) {
            errorMsg.textContent = 'Terjadi kesalahan koneksi ke server.';
            errorBox.classList.remove('hidden');
        }
    });
</script>

<?php include_once 'authF.php' ?>