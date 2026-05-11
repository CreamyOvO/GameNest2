<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Masuk</title>
    <link rel="stylesheet" href="css/auth.css">
    </head>
    <body>
        <div class="container">
            <div id="pindahbox">
                <h3>Belum Punya Akun?</h3>
                <a href="#" id="toggleBtn">Daftar</a>
            </div>
            <div class="signup">
                <h3 id="title1">Buat Akun Baru</h3>
                <form action="">
                <label for="email">Email:</label>
                <input type="mail" id="email" name="email" class="input1">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="input1">
                <label for="konfpassword">Konfirmasi Password:</label>
                <input type="password" id="konfpassword" name="konfpassword" class="input1">
                <label class="checkbox-wrap">
                <input type="checkbox">
                <span class="checkmark"></span>
                <p>Saya Menyetujui Syarat Syarat yang Berlaku</p>
                </label>
                <input type="submit" name="daftar" id="daftar" value="Daftar">
                <p id="title3">Atau Daftar Menggunakan</p>
                <div id="sosmed">
                    <div class="fb"></div>
                    <div class="google"></div>
                    <div class="xs"></div>
                </div>
                </form>
            </div>
            <div class="signin">
                <h3 id="title2">Masuk Kembali</h3>
                <form action="includes/login.php" method="POST">
                <label for="email">Email:</label>
                <input type="mail" id="email" name="email" class="input1">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="input1">
                <input type="submit" name="masuk" id="masuk" value="Masuk">
                <p id="title4">Atau Daftar Menggunakan</p>
                <div id="sosmed2">
                    <div class="fb"></div>
                    <div class="google"></div>
                    <div class="xs"></div>
                </div>
                </form>
            </div>
        </div>
    </body>
    <script src="Js/auth.js"></script>
</html>