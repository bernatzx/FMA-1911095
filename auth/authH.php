<?php 
require_once '../conf.php';
if (VALID()) {
    header("Location: ". base());
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $label ?> | SI Pendaftaran dan Pembayaran SP</title>
    <script src="<?= base('assets/js/tailwindcss.js') ?>"></script>
</head>

<body>
    <div class="flex items-center h-screen">
        <div class="border-[3px] border-gray-500 rounded-md shadow-lg w-[420px] m-auto">
            <div class="p-6">
                <!-- LOGO -->
                <div class="flex justify-center">
                    <div class="flex mb-6 items-center font-bold cursor-pointer"
                        onclick="window.location.href='<?= base() ?>'">
                        <div class="text-[86px] leading-[1]">
                            <span>S</span>
                        </div>
                        <div class="flex text-[42px] flex-col leading-[0.9]">
                            <span>emester</span>
                            <span>Pendek</span>
                        </div>
                    </div>
                </div>