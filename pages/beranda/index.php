<?php include_once "../../header.php" ?>

<div class="space-y-4 divide-y-2">
    <div class="font-medium">
        Hallo, <?= $_SESSION['userData']['nama'] ?>
    </div>
    <div class="flex pt-4 justify-center">
        <div class="w-[800px]">
            <div class="font-medium text-lg mb-3">
                Selamat Datang Di Dashboard Admin/Staf TU
            </div>
            <?php foreach ($menu as $key => $k) {
                foreach ($k as $l) { ?>
                    <div class="mb-3">
                        <a href="<?= $l['url'] ?>"
                            class="hover:bg-gray-100 flex gap-2 font-medium items-center border-2 p-2 rounded-md">
                            <i class="text-gray-800 <?= $l['icon'] ?> text-[36px] fa-fw"></i>
                            <div class="flex-1">
                                <div class="text-gray-900">
                                    <?= $l['label'] ?>
                                </div>
                                <div class="text-xs text-gray-500">
                                    <?= $l['sublabel'] ?>
                                </div>
                            </div>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php }
            } ?>
            <div class="border p-6 rounded-lg shadow flex justify-between">
                <div class="text-xl">
                    <span class="font-semibold">RP.</span>
                    <?= number_format($hargasks, 0, ',', '.') ?>/<span class="text-xs font-medium">SKS</span>
                </div>
                <div class="bg-gray-500 text-white px-2 py-1 rounded-md shadow-md hover:bg-gray-600">
                    <a href="edithargasks.php"><i class="text-sm fas fa-pencil"></i> Ubah</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "../../footer.php"; ?>