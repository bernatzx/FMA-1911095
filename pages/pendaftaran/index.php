<?php include_once "../../header.php"; ?>

<div class="flex items-center justify-between mb-6 font-medium">
    <div class="flex flex-col">
        <span class="text-2xl">
            Pendaftaran
        </span>
        <span class="text-gray-400">
            Laporan Pendaftaran Semester Pendek
        </span>
    </div>
    <div>
        <a href="" class="bg-gray-300 hover:bg-gray-400 hover:text-gray-600 text-gray-500 text-sm px-3 py-2 rounded-lg">
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
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-48">Nama Mahasiswa</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left">Mata Kuliah</th>
                <th class="p-3 text-sm font-semibold tracking-wider text-left w-24">Total SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $q = mysqli_query($hub, "SELECT u.npm, u.nama, k.id_krs, k.total_sks FROM tb_krs k JOIN tb_user u ON k.id_user = u.id_user") or die(mysqli_error($hub));
            if (mysqli_num_rows($q) > 0) {
                while ($r = mysqli_fetch_assoc($q)) { ?>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $no++ ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $r['npm'] ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $r['nama'] ?></td>
                        <td class="p-3 tracking-wider text-sm text-gray-700">
                            <?php
                            $idkrs = $r['id_krs'];
                            $mk = mysqli_query($hub, "SELECT m.nama AS nama_mk FROM tb_krs_detail d JOIN tb_mk m ON d.id_mk = m.id_mk WHERE id_krs = '$idkrs'") or die($hub);
                            if (mysqli_num_rows($mk) > 0) {
                                while ($m = mysqli_fetch_assoc($mk)) {
                                    echo "<div>$m[nama_mk]</div>";
                                }
                            }
                            ?>
                        </td>
                        <td class="p-3 tracking-wider text-sm text-gray-700"><?= $r['total_sks'] ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5" align="center" class="text-medium text-gray-400 p-3 text-sm">Belum ada data pendaftaran!
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

<?php include_once "../../footer.php"; ?>