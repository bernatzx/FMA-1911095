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
    <div class="relative flex h-screen">
        <nav class="p-6 flex flex-col bg-gray-200 w-64 border-r shadow-lg">
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
                <div class="flex-auto flex-col font-medium">
                    <?php
                    ?>
                    <div
                        class="flex items-center p-2 rounded-md hover:shadow-sm hover:text-white hover:bg-blue-400 <?= $berandaAktif ? 'bg-blue-400 text-white shadow-sm' : '' ?>">
                        <a href="<?= $berandaUrl ?>">Beranda</a>
                    </div>
                    <?php
                    foreach ($menu as $judul => $items) {
                        echo '<div class="flex items-center my-2">
                                <div class="text-gray-400">' . $judul . '</div>
                                <div class="border-t border-gray-300 ml-2 flex-grow"></div>
                            </div>';

                        foreach ($items as $men) {
                            $u = (strpos($halamanAktif, $men["url"]) === 0);

                            echo '<a href="' . $men['url'] . '" 
                                    class="flex items-center p-2 rounded-md hover:shadow-sm hover:text-white hover:bg-blue-400 ' . ($u ? 'bg-blue-400 text-white shadow-sm' : '') . '">
                                    <div>' . $men['label'] . '</div>
                                </a>';
                        }
                    }
                    ?>

                </div>
                <div>
                    user
                </div>
            </div>
        </nav>
        <div class="content">