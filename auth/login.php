<?php require_once '../conf.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SI Pendaftaran dan Pembayaran SP</title>
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
                <!-- FORM -->
                <form class="space-y-4 font-medium">
                    <div>
                        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800"
                            type="text" name="" placeholder="Masukkan NPM" id="">
                    </div>
                    <div>
                        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800"
                            type="password" name="" placeholder="Kata Sandi" id="">
                    </div>
                    <div>
                        <input
                            class="bg-opacity-90 p-3 w-full cursor-pointer bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg"
                            type="button" value="Masuk">
                    </div>
                </form>
                <div class="mt-3 font-medium text-sm text-center">
                    <span class="text-gray-500">
                        Belum punya akun?
                    </span>
                    <span onclick="window.location.href='reg.php'"
                        class="text-gray-800 hover:text-blue-700 hover:underline cursor-pointer">Daftar</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>