<?php
session_start();
include "includes/koneksi.php";

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
include "includes/koneksi.php";
?>

<?php
    $avatar = "Uploads/profile/default.png";

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];

        $queryUser = mysqli_query($conn, "SELECT foto_profil FROM users WHERE id_pengguna='$id'");
        $data = mysqli_fetch_assoc($queryUser);

    $path = __DIR__ . "/Uploads/profile/" . $data['foto_profil'];

    if (!empty($data['foto_profil']) && file_exists($path)) {
        $avatar = "Uploads/profile/" . $data['foto_profil'];
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Library</title>
    <link rel="stylesheet" href="css/gamelib.css">
    <link rel="stylesheet" href="css/navbar.css">
    </head>
    <body>
        <div id="bg"></div>
        <div id="header">
            <nav>
                <div id="logo">
                    <img src="./Home-Assets/logo.svg" alt="">
                </div>
                <div id="navbar">
                    <a href="home.php">Beranda</a>
                    <a href="game-library.php">Game Library</a>
                    <a href="#">Game Engine</a>
                    <a href="#">Blog</a>
                    <a href="#">Belajar</a>
                    <a href="#">Lainnya</a>
                    <?php if (isset($_SESSION['role'])): ?>

                    <!-- SUDAH LOGIN -->
                    <div id="profile">
                        <div class="avatar">
                            <img src="<?= $avatar ?>" alt="avatar">
                        </div>

                        <div class="dropdown">
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                            <a href="admin/dashboard.php">Dashboard</a>
                            <?php else: ?>
                            <a href="user/profile.php">Profile</a>
                            <?php endif; ?>

                            <a href="#">Notification</a>
                            <a href="includes/logout.php">Logout</a>
                        </div>
                    </div>

                    <?php else: ?>

                    <!-- BELUM LOGIN -->
                    <div class="auth-btn">
                        <a href="auth.php">Sign In</a>
                    </div>

                    <?php endif; ?>
                </div>
            </nav>
            <img id="ornamen1" src="gamelib-assets/ornamen1.svg" alt="">
            <div id="judul1">
                <img id="star"src="gamelib-assets/star.svg" alt="">
                <img id="love" src="gamelib-assets/love.svg" alt="">
                <img id="cloud" src="gamelib-assets/cloud.svg" alt="">
                <img id="let" src="gamelib-assets/let.svg" alt="">
                <h3>Game Library</h3>
                <h4>Rumahnya para Game Game dari berbagai Platform dan Perangkat ada disini!</h4>
            </div>
        </div>
        <img id="ornamen2" src="gamelib-assets/ornamen2.svg" alt="">
        <form method="GET" action="" class="search-bar" onsubmit="return false;">

            <div class="search-frame">
                <img src="gamelib-assets/search.svg" alt="" id="search1">
                <input type="text" id="search" name="search" placeholder="Cari Games..." autocomplete="off">
            </div>
            <div class="select-frame">
                <img src="gamelib-assets/swrod.svg" alt="" id="sword">
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
                <img src="gamelib-assets/pegi12.svg" alt="" id="pegi1">
                <select id="pegi" name="pegi">
                    <option value="">PEGI</option>
                    <?php while($p = mysqli_fetch_assoc($pegi)) { ?>
                        <option value="<?= $p['id_ratingumur'] ?>">
                            <?= $p['nama_rating'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="select-frame">
                <img src="gamelib-assets/sort.svg" alt="" id="sort1">
                <select id="sort" name="sort">
                    <option value="name">Name (A-Z)</option>
                    <option value="popular">Popular</option>
                </select>
            </div>

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

                </div>

            <?php } ?>

        </div>
        
    </div>
    <footer>
        <div id="kanan">
            <img id="logo2" src="Home-Assets/logo.svg" alt="">
            <div id="sosmed">
                <a href=""><img src="Home-Assets/fb.svg" alt=""></a>
                <a href=""><img src="Home-Assets/tiktok.svg" alt=""></a>
                <a href=""><img src="Home-Assets/yt.svg" alt=""></a>
                <a href=""><img src="Home-Assets/ig.svg" alt=""></a>
            </div>
            <p>Copyright © 2026, GameNest, All Rights Reserved.</p>
        </div>
        <div id="halaman">
            <h3>Halaman Website</h3>
            <a href="#">Homepage</a>
            <a href="#">Game Library</a>
            <a href="#">Game Engine</a>
            <a href="#">Learning</a>
        </div>
        <div id="lainnya4">
            <h3>Lainnya</h3>
            <a href="#">Lapor Bug</a>
            <a href="#">Request Game</a>
            <a href="#">Request Kursus</a>
        </div>
    </footer>
    </body>
    <script src="Js/navbar.js"></script>
    <script src="Js/fetch.js"></script>
</html>