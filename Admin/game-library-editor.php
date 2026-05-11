<?php
session_start();
include "../Includes/koneksi.php";

// ambil dropdown
$genres = mysqli_query($conn, "SELECT * FROM genres");
$pegi = mysqli_query($conn, "SELECT * FROM ratingumur");

// ambil input
$search = $_GET['search'] ?? '';
$genreFilter = $_GET['genre'] ?? '';
$pegiVal = $_GET['pegi'] ?? '';
$sort = $_GET['sort'] ?? 'name';

// base query
$query = "
SELECT g.*, GROUP_CONCAT(ge.nama_genre SEPARATOR ', ') as genre
FROM games g
LEFT JOIN game_genre gg ON g.id_game = gg.id_game
LEFT JOIN genres ge ON gg.id_genre = ge.id_genre
";

$where = [];

if ($search != '') {
    $search = mysqli_real_escape_string($conn, $search);
    $where[] = "g.nama_game LIKE '%$search%'";
}

if ($genreFilter != '') {
    $where[] = "gg.id_genre = " . (int)$genreFilter;
}

if ($pegiVal != '') {
    $where[] = "g.id_rating_umur = " . (int)$pegiVal;
}

if (count($where) > 0) {
    $query .= " WHERE " . implode(" AND ", $where);
}

$query .= " GROUP BY g.id_game";

if ($sort == "popular") {
    $query .= " ORDER BY g.popularity DESC";
} else {
    $query .= " ORDER BY g.nama_game ASC";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("ERROR: " . mysqli_error($conn));
}
?>

<?php
?>

<?php

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
    <link rel="stylesheet" href="../css/gamelibeditor.css">
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
                <form method="GET" action="" class="search-bar" onsubmit="return false;">

                    <div class="search-frame">
                        <img src="../gamelib-assets/search.svg" alt="" id="search1">
                        <input type="text" id="search" name="search" placeholder="Cari Games..." autocomplete="off">
                    </div>
                    <div class="select-frame">
                        <img src="../gamelib-assets/swrod.svg" alt="" id="sword">
                        <select id="genre" name="genre">
                            <option value="">Genre</option>
                            <?php while($g = mysqli_fetch_assoc($genres)) { ?>
                                <option value="<?= $g['id_genre'] ?>">
                                    <?= $g['nama_genre'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="select-frame">
                        <img src="../gamelib-assets/pegi12.svg" alt="" id="pegi1">
                        <select id="pegi" name="pegi">
                            <option value="">PEGI</option>
                            <?php while($p = mysqli_fetch_assoc($pegi)) { ?>
                                <option value="<?= $p['id_ratingumur'] ?>">
                                    <?= $p['nama_rating'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <a href="#"><img src="dashboard-assets/addgame.svg" alt="" id="add"></a>
                </form>
                <div id="listgame">
                    <div class="topgame-list">

                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                            <div class="game-card">

                                <div class="frame">
                                    <img src="../Uploads/<?= $row['cover_image'] ?>" 
                                        alt="<?= $row['nama_game'] ?>">
                                </div>

                                <h4><?= $row['nama_game'] ?></h4>

                                <p><?= $row['genre'] ?: 'No Genre' ?></p>
                                <div id="actionbut">
                                    <img src="gamelib-assets/edit.svg" alt="">
                                    <img src="gamelib-assets/delete.svg" alt="">
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../Js/fetch3.js"></script>
</html>