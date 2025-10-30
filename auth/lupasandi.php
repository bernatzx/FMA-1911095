<?php
$label = 'Lupa Sandi';
include_once 'authH.php' ?>

<form class="space-y-4 font-medium" id="form-data">
  <input type="hidden" name="action" value="cekemail">
  <div>
    <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="text" name="email"
      placeholder="Email Pengguna">
  </div>
  <div>
    <button
      class="bg-opacity-90 p-3 w-full cursor-pointer bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg"
      type="submit">Verifikasi Email</button>
  </div>
</form>
<div id="err-box"
  class="hidden mt-3 font-medium text-sm flex items-center gap-2 p-2 bg-red-400 text-red-800 rounded-sm">
  <i class="fas fa-circle-info"></i>
  <span id="err-msg" class="flex-auto"></span>
  <div id="close-btn">
    <i class="cursor-pointer fas fa-times"></i>
  </div>
</div>

<script>
  const form = document.getElementById('form-data');
  const errBox = document.getElementById('err-box');
  const errMsg = document.getElementById('err-msg');
  const closeBtn = document.getElementById('close-btn');
  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      errBox.classList.toggle('hidden');
    })
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(form);

    const email = formData.get('email').trim();
    if (!email) {
      errMsg.textContent = 'Fieldnya tidak boleh kosong';
      errBox.classList.remove('hidden');
      return;
    }

    try {
      const res = await fetch('auth.php', {
        method: 'POST',
        body: formData
      });
      if (!res.ok) throw new Error("Terjadi kesalahan server");
      const result = await res.json();
      if (result.success) {
        window.location.href = `reset.php?email=${email}`;
      } else {
        errMsg.textContent = result.msg;
        errBox.classList.remove('hidden');
        return;
      }
    } catch (err) {
      console.error(err);
    }
  })
</script>

<?php include_once 'authF.php' ?>