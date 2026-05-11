<?php
session_start();
include "koneksi.php";

$email = $_POST['email'];
$password = md5($_POST['password']); // Next time MD5 ganti pake hash fa

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

$data = mysqli_fetch_assoc($query);

if ($data) {

    // simpan session
    $_SESSION['user_id'] = $data['id_pengguna'];
    $_SESSION['role'] = $data['role'];
    

    // cek role
    if ($data['role'] == 'admin') {
        header("Location: ../Admin/dashboard.php");
    } else {
        header("Location: user/dashboard.php");
    }

} else {
    echo "Email atau password salah";
}
?>