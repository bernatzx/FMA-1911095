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
        <a href="" class="bg-gray-300 hover:text-gray-600 hover:bg-gray-400 text-gray-500 text-sm px-3 py-2 rounded-lg">
            <i class="fas fa-refresh"></i>
        </a>
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
            <?php
            $no = 1;
            $sql = mysqli_query($hub, "SELECT * FROM tb_user WHERE level = 'mhs'") or die(mysqli_error($hub));
            if (mysqli_num_rows($sql) > 0) {
                while ($row = mysqli_fetch_assoc($sql)) { ?>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $no++ ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $row['npm'] ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $row['nama'] ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="3" align="center" class="text-medium text-gray-400 p-3 text-sm">Data Kosong!</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once "../../footer.php"; ?>