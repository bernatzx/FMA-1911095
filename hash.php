<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plain = $_POST['password'];
    $hash  = password_hash($plain, PASSWORD_DEFAULT);

    echo "<p>Password asli: <b>$plain</b></p>";
    echo "<textarea cols='80' rows='3'>$hash</textarea>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Hash Password</title>
</head>
<body>
    <h2>Generate Hash Password</h2>
    <form method="POST">
        <input type="text" name="password" placeholder="Masukkan password" required>
        <button type="submit">Generate</button>
    </form>
</body>
</html>
