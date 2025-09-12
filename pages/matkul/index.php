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
    <div class="flex gap-2 items-center">
        <a href="" class="bg-gray-300 text-gray-500 text-sm px-3 py-2 rounded-lg">
            <i class="fas fa-refresh"></i>
        </a>
        <button onclick="window.location.href='add.php'" type="button"
            class="bg-opacity-90 gap-2 px-5 py-2 bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg">
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
            <?php
            $no = 1;
            $sqlMK = mysqli_query($hub, "SELECT * FROM tb_mk") or die(mysqli_error($hub));
            if (mysqli_num_rows($sqlMK) > 0) {
                while ($row = mysqli_fetch_assoc($sqlMK)) { ?>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $no++ ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $row['kode'] ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $row['nama'] ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $row['sks'] ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700 font-medium flex gap-2">
                            <button onclick="window.location.href='edit.php?id=<?= $row['id_mk'] ?>'" type="button"
                                class="bg-yellow-200 py-1 px-2 bg-opacity-60 hover:bg-opacity-100 rounded-lg text-yellow-800 flex items-center gap-1">
                                <i class="fas fa-pencil"></i>
                                <span>Ubah</span>
                            </button>
                            <button type="button"
                                onclick="if(confirm('Anda akan menghapus data ini?')){window.location.href='del.php?id=<?= $row['id_mk'] ?>'}"
                                class="bg-red-200 py-1 px-2 bg-opacity-60 hover:bg-opacity-100 rounded-lg text-red-800 flex items-center gap-1">
                                <i class="fas fa-trash"></i>
                                <span>Hapus</span>
                            </button>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5" align="center" class="text-medium text-gray-400 p-3 text-sm">Data Kosong!</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once "../../footer.php"; ?>