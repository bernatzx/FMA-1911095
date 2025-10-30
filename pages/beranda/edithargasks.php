<?php include_once "../../header.php" ?>

<div class="flex items-center justify-between mb-6 font-medium">
  <div class="flex flex-col">
    <span class="text-2xl">
      Harga SKS
    </span>
    <span class="text-gray-400">
      Ubah harga sks
    </span>
  </div>
  <div>
    <button onclick="window.location.href='./'" type="button"
      class="bg-opacity-90 gap-2 px-5 py-2 bg-gray-700 hover:bg-gray-800 text-sm text-white rounded-lg">
      <i class="fas fa-arrow-left"></i>
      <span>
        Kembali
      </span>
    </button>
  </div>
</div>
<div class="flex justify-center">
  <form class="w-[600px] border space-y-3 rounded-lg p-6 shadow" id="form-data">
    <div>
      <div class="font-medium text-sm mb-2">
        Nilai :
      </div>
      <div class="flex items-center gap-2">
        <span class="text-xl">RP.</span>
        <input name="nilai" required value="<?= $hargasks ?>"
          class="border border-gray-300 bg-gray-200 rounded-sm outline-none p-2 w-full" type="number">
      </div>
    </div>
    <div id="err-box" class="hidden font-medium text-sm flex items-center gap-2 p-2 bg-red-400 text-red-800 rounded-sm">
      <i class="fas fa-circle-info"></i>
      <span id="err-msg" class="flex-auto"></span>
      <div id="close-btn">
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
  const form = document.getElementById('form-data');
  const errBox = document.getElementById('err-box');
  const errMsg = document.getElementById('err-msg');
  const closeBtn = document.getElementById('close-btn');

  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      errBox.classList.toggle('hidden');
      return;
    })
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const res = await fetch('pros.php', {
        method: "POST",
        body: formData,
      });
      if (!res.ok) throw new Error("Terjadi kesalahan server");
      const result = await res.json();
      if (result.success) {
        window.location.href = "./";
        alert(result.msg);
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

<?php include_once "../../footer.php"; ?>