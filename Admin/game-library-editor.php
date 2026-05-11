<?php

session_start();
include '../Includes/koneksi.php';

$id_user = $_SESSION['user_id'];

$queryUser = mysqli_query($conn, "SELECT * FROM users WHERE id_pengguna = '$id_user'");
$userData = mysqli_fetch_assoc($queryUser);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Library</title>
    <link rel="stylesheet" href="../css/dashboardadmin.css">
</head>
<body>
    <div id="atas">
        <aside>
            <a href="../home.php"><img src="dashboard-assets/logo.svg" alt="Logo" id="logo"></a>
            <p>Main Menu</p>
            <div id="section">
                <a href="dashboard.php" class="sect">
                    <img src="dashboard-assets/dashboard.svg">
                    <h3>Dashboard</h3>
                </a>
                <a href="game-library-editor.php" class="sect" id="select1">
                    <img src="dashboard-assets/gameL.svg">
                    <h3>Game Library</h3>
                </a>
                <a href="dashboard.php" class="sect" >
                    <img src="dashboard-assets/gameE.svg">
                    <h3>Game Engine</h3>
                </a>
                <a href="dashboard.php" class="sect" >
                    <img src="dashboard-assets/kursus.svg">
                    <h3>Kursus</h3>
                </a>
                <a href="dashboard.php" class="sect" >
                    <img src="dashboard-assets/blog.svg">
                    <h3>Blog</h3>
                </a>
            </div>
        </aside>
        <div id="halaman2">
            <nav>
                <h1>Game Library</h1>
                <div id="navbar">
                    <a href="" id="notif"><img src="dashboard-assets/notif.svg" alt="notif"></a>
                    <div id="profile">
                        <div id="pp"><img src="../Uploads/profile/<?php echo $userData['foto_profil']; ?>" alt=""></div>
                        <div id="data">
                            <h3><?php echo $userData['username']; ?></h3>
                            <p><?php echo $userData['role']; ?></p>
                        </div>
                    </div>
                    <img src="dashboard-assets/arrow.svg" alt="scroll" id="arrow">
                </div>
            </nav>
            <div id="halaman3">

            </div>
    </div>
</body>
</html>