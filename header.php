<?php
require_once 'conf.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Pendaftaran dan Pembayaran SP</title>
    <script src="<?= base('assets/js/tailwindcss.js') ?>"></script>
</head>

<body>
    <div class="flex h-screen w-screen">
        <nav class="p-6 flex flex-col bg-gray-200 w-[300px] border-r shadow-lg">
            <div class="flex font-bold ">
                <div class="text-[45px] leading-[1]">
                    <span>S</span>
                </div>
                <div class="flex text-2xl flex-col leading-[0.9]">
                    <span>emester</span>
                    <span>Pendek</span>
                </div>
            </div>
            <div class="flex flex-col flex-auto mt-6">
                <div class="flex-auto flex-col font-medium text-lg">
                    <?php
                    ?>
                    <a href="<?= $berandaUrl ?>">
                        <div
                            class="flex text-gray-800 items-center gap-2 p-2 rounded-md hover:shadow-sm hover:text-white hover:bg-blue-400 <?= $berandaAktif ? 'bg-blue-400 text-white shadow-sm' : '' ?>">
                            <i class="fas fa-gauge fa-fw"></i> Beranda
                        </div>
                    </a>
                    <?php
                    foreach ($menu as $judul => $items) { ?>
                        <div class="flex items-center mt-7 mb-2">
                            <div class="text-gray-400"><?= $judul ?></div>
                            <div class="border-t border-gray-300 ml-2 flex-grow"></div>
                        </div>

                        <?php foreach ($items as $men) {
                            $u = (strpos($halamanAktif, $men["url"]) === 0); ?>
                            <a href="<?= $men['url'] ?>"
                                class="gap-2 text-gray-800 flex items-center p-2 rounded-md hover:shadow-sm hover:text-white hover:bg-blue-400 <?= ($u ? 'bg-blue-400 text-white shadow-sm' : '') ?>">
                                <i class="<?= $men['icon'] ?> fa-fw"></i>
                                <?= $men['label'] ?>
                            </a>
                        <?php }
                    }
                    ?>

                </div>
                <div>
                    <div class="flex gap-2 items-center">
                        <div
                            class="border-[3px] justify-center text-gray-600 border-gray-600 flex items-center rounded-full">
                            <div
                                class="w-10 h-10 flex items-center relative justify-center border-2 border-transparent rounded-full overflow-hidden">
                                <i class="text-[38px] fas fa-user top-1 absolute"></i>
                            </div>
                        </div>
                        <div class="font-medium">
                            <div>Farhat Alkatiri</div>
                            <div class="text-xs">Administrator/Staf Tu</div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="p-6 flex-1">