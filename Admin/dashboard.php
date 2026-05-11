<?php

include '../Includes/koneksi.php';

$totalUser = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$user = mysqli_fetch_assoc($totalUser);

$totalGame = mysqli_query($conn, "SELECT COUNT(*) AS total FROM games");
$game = mysqli_fetch_assoc($totalGame);

$totalEngine = mysqli_query($conn, "SELECT COUNT(*) AS total FROM game_engine");
$engine = mysqli_fetch_assoc($totalEngine);

$totalKursus = mysqli_query($conn, "SELECT COUNT(*) AS total FROM kursus");
$kursus = mysqli_fetch_assoc($totalKursus);

?>
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboardadmin.css">
</head>
<body>
    <div id="atas">
        <aside>
            <a href="../home.php"><img src="dashboard-assets/logo.svg" alt="Logo" id="logo"></a>
            <p>Main Menu</p>
            <div id="section">
                <a href="dashboard.php" class="sect" id="select1">
                    <img src="dashboard-assets/dashboard.svg">
                    <h3>Dashboard</h3>
                </a>
                <a href="game-library-editor.php" class="sect" >
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
                <h1>Dashboard</h1>
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
            <div id="halaman">
                <div class="board">
                    <div class="atas1">
                        <h3>Total User</h3>
                        <img src="dashboard-assets/user.svg" alt="user">
                    </div>
                    <div class="bawah1">
                        <h1><?php echo $user['total']; ?></h1>
                        <p>Active User</p>
                    </div>
                </div>
                <div class="board">
                    <div class="atas1">
                        <h3>Total Game</h3>
                        <img src="dashboard-assets/gameL.svg" alt="gameL">
                    </div>
                    <div class="bawah1">
                        <h1><?php echo $game['total']; ?></h1>
                        <p>Game In Library</p>
                    </div>
                </div>
                <div class="board">
                    <div class="atas1">
                        <h3>Total Game Engine</h3>
                        <img src="dashboard-assets/gameE.svg" alt="gameE" id="gameE">
                    </div>
                    <div class="bawah1">
                        <h1><?php echo $engine['total']; ?></h1>
                        <p>Game Engine In Library</p>
                    </div>
                </div>
                <div class="board">
                    <div class="atas1">
                        <h3>Total Course</h3>
                        <img src="dashboard-assets/kursus.svg" alt="course" id="kursus">
                    </div>
                    <div class="bawah1">
                        <h1><?php echo $kursus['total']; ?></h1>
                        <p>Course Available</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
</body>
</html>