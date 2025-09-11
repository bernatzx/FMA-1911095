<?php
$label = 'Masuk';
include_once 'authH.php' ?>

<form class="space-y-4 font-medium" id="loginForm">
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="text" name="nama"
            placeholder="Nama Pengguna" required>
    </div>
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="password"
            name="sandi" placeholder="Kata Sandi" required>
    </div>
    <div>
        <button
            class="bg-opacity-90 p-3 w-full cursor-pointer bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg"
            type="submit">Masuk</button>
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
<div class="font-medium text-sm text-center mt-3">
    <span class="text-gray-500">
        Belum punya akun?
    </span>
    <span onclick="window.location.href='reg.php'"
        class="text-gray-800 hover:text-blue-700 hover:underline cursor-pointer">Daftar</span>
</div>

<script>
    const form = document.getElementById('loginForm');
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
    });

</script>

<?php include_once 'authF.php' ?>