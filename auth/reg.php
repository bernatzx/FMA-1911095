<?php 
$label = "Daftar";
include_once 'authH.php';
?>

<form class="space-y-4 font-medium">
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="text" name=""
            placeholder="Masukkan NPM" id="">
    </div>
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="password" name=""
            placeholder="Kata Sandi" id="">
    </div>
    <div>
        <input class="w-full bg-gray-200 rounded-md p-3 outline-none font-medium text-gray-800" type="password" name=""
            placeholder="Konfirmasi Kata Sandi" id="">
    </div>
    <div>
        <input
            class="bg-opacity-90 p-3 w-full cursor-pointer bg-green-700 hover:bg-green-800 text-sm text-white rounded-lg"
            type="button" value="Daftar">
    </div>
</form>
<div class="mt-3 font-medium text-sm text-center">
    <span class="text-gray-500">
        Sudah punya akun?
    </span>
    <span onclick="window.location.href='login.php'"
        class="text-gray-800 hover:text-blue-700 hover:underline cursor-pointer">Masuk</span>
</div>

<?php include_once 'authF.php' ?>