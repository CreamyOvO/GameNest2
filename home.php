<?php
session_start();
?>

<?php
include "includes/koneksi.php";

$query = mysqli_query($conn, "SELECT 
  g.id_game,
  g.nama_game,
  g.cover_image,
  (
    SELECT ge.nama_genre
    FROM game_genre gg
    JOIN genres ge ON gg.id_genre = ge.id_genre
    WHERE gg.id_game = g.id_game
    LIMIT 1
  ) AS genre
FROM games g
LIMIT 9");
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
    <title>Beranda</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/home2.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
        <div id="header">
            <nav>
                <div id="logo">
                    <img src="./Home-Assets/logo.svg" alt="">
                </div>
                <div id="navbar">
                    <a href="#">Beranda</a>
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
            
            <header>
                <div id="gambarbg"></div>
                <div id="gradientbg"></div>
                <div id="linedist"></div>
                <img src="Home-Assets/h1.svg" alt="">
                <p>Macam-Macam Game ada disini loh!, Coba Rasakan sendiri menemukan game sekarang Jauh lebih mudah tanpa Buka tutup berbagai macam Platform Penyedia Game!</p>
                <div id="buttoncari">
                    <span>Cari</span>
                </div>
            </header>
        </div>
        <div id="hero1">
            <img id="ornamen1" src="Home-Assets/ornamen1.svg" alt="">
            <img class="star" id="star1" src="Home-Assets/star1.svg" alt="">
            <img class="star" id="star2" src="Home-Assets/star1.svg" alt="">
            <img class="blocky" id="blocky1" src="Home-Assets/blocky1.svg" alt="">
            <img class="blocky" id="blocky2" src="Home-Assets/blocky1.svg" alt="">
            <img class="blocky" id="blocky3" src="Home-Assets/blocky1.svg" alt="">
            <img class="blocky" id="blocky4" src="Home-Assets/blocky1.svg" alt="">
            <div id="gradasi2"></div>
            <div id="bintik1"></div>
            <h3>Berbagai Macam Game Library Lintas Perangkat</h3>
            <div id="card1">
                <img class="gambar" src="Home-Assets/card1.svg" alt="">
                <img class="gambar" src="Home-Assets/card2.svg" alt="">
                <img class="gambar" src="Home-Assets/card3.svg" alt="">
            </div>
        </div>
        <img id="ornamen3" src="Home-Assets/ornamen2.svg" alt="">
        <div id="content">

            <div class="topgame">
                <div id="title3">
                    <h3 class="title">Game Populer</h3>
                    <p>Game yang sering dicari saat Ini</p>
                </div>

                <div class="topgame-list">
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <div class="game-card">

                            <div class="frame">
                                <img src="Uploads/<?= $row['cover_image'] ?>">
                            </div>

                            <h4><?= $row['nama_game'] ?></h4>
                            <p><?= $row['genre'] ?></p>

                        </div>
                    <?php } ?>
                </div>

            </div>
            <div id="lainnya">
                <a href="#">
                    <span>Lihat Lainnya</span>
                </a>
            </div>
            <img id="ornamen4" src="Home-Assets/ornamen3.svg" alt="">
            <div class="learn">
                <div id="interact">
                    <h3>Pengen Buat Game Sendiri?</h3>
                    <p>Tapi gak tau mulai darimana?. Tenang aja, disini juga terdapat Roadmap untuk menjadi game developer dan juga beberapa kursus gratis loh!</p>
                    <div id="see">
                        <a href="#">Lihat</a>
                    </div>
                </div>
                <img src="Home-Assets/promosi.svg" alt="">
            </div>
            <img id="ornamen5" src="Home-Assets/ornamen4.svg" alt="">
            <div id="title5">
                <h3 class="faq-title">Pertanyaan Umum</h3>
                <p>Apa sih yang membuat kamu Bertanya tanya?</p>
            </div>
            <div class="pertanyaan-list">
                <div class="pertanyaan">
                    <div class="header">
                        <h3>Apa Itu Gamenest?</h3>
                        <img src="Home-Assets/arrow1.svg" class="arrow">
                    </div>
                    <div class="jawaban">
                        Gamenest adalah platform digital yang dirancang sebagai tempat untuk mencari, menjelajahi, dan menemukan berbagai jenis game dari berbagai platform dalam satu tempat yang terorganisir. Pengguna dapat melihat informasi lengkap tentang game seperti genre, deskripsi, visual, hingga rekomendasi game populer yang sedang banyak dicari.

                        Selain sebagai katalog game, Gamenest juga bertujuan menjadi pusat eksplorasi bagi para gamer, baik yang ingin menemukan game baru maupun yang ingin mengetahui lebih dalam tentang game tertentu. Dengan tampilan yang interaktif dan sistem yang terstruktur, Gamenest memudahkan pengguna dalam mencari game sesuai minat mereka tanpa harus berpindah-pindah platform.
                    </div>
                </div>
                <div class="pertanyaan">
                    <div class="header">
                        <h3>Tersedia Fitur Apa Saja?</h3>
                        <img src="Home-Assets/arrow1.svg" class="arrow">
                    </div>
                    <div class="jawaban">
                        Gamenest menyediakan berbagai fitur utama yang membantu pengguna dalam menemukan dan mengeksplorasi game dengan lebih mudah. Salah satunya adalah fitur pencarian dan kategori, di mana pengguna dapat melihat game berdasarkan genre, popularitas, atau rekomendasi tertentu.
                    </div>
                </div>
                <div class="pertanyaan">
                    <div class="header">
                        <h3>Apakah Gamenest Punya Semua Game Yang Ada?</h3>
                        <img src="Home-Assets/arrow1.svg" class="arrow">
                    </div>
                    <div class="jawaban">
                        Gamenest tidak selalu memiliki semua game yang ada di dunia, karena jumlah game yang tersedia sangat banyak dan terus berkembang setiap waktu. Namun, Gamenest berusaha untuk menyediakan koleksi game yang relevan, populer, dan sering dicari oleh pengguna agar tetap up-to-date.
                    </div>
                </div>
                <div class="pertanyaan">
                    <div class="header">
                        <h3>Apakah Gamenest Berbayar?</h3>
                        <img src="Home-Assets/arrow1.svg" class="arrow">
                    </div>
                    <div class="jawaban">
                        Gamenest pada dasarnya dapat digunakan secara gratis oleh pengguna untuk mencari dan melihat informasi tentang berbagai game yang tersedia. Pengguna tidak perlu membayar untuk mengakses fitur utama seperti browsing game, melihat detail, atau menjelajahi kategori.

                        Namun, di masa depan, tidak menutup kemungkinan adanya fitur tambahan atau layanan premium, seperti rekomendasi personal berbasis AI, fitur favorit, atau akses eksklusif tertentu yang mungkin memerlukan akun atau biaya tambahan.
                    </div>
                </div>
            </div>
            <div id="more2">
                <h3>Lebih Banyak</h3>
                <img src="Home-Assets/arrow1.svg" alt="">
            </div>
        </div>
    </body>
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
    <script src="js/faq.js"></script>
    <script src="Js/navbar.js"></script>
</html>