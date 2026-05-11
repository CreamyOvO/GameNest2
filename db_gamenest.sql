-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2026 at 04:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gamenest`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id_game` int(11) NOT NULL,
  `nama_game` varchar(100) DEFAULT NULL,
  `tanggal_rilis` date DEFAULT NULL,
  `developer` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `ukuran_game` varchar(50) DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  `id_rating_umur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id_game`, `nama_game`, `tanggal_rilis`, `developer`, `publisher`, `deskripsi`, `cover_image`, `ukuran_game`, `mode`, `id_rating_umur`) VALUES
(1, 'Until Then', '2024-07-03', 'Maximum Entertainment', 'Polychroma Games', 'Sebuah game petualangan naratif bergaya pixel art yang berlatar di dunia pasca-bencana. Ceritanya mengikuti Mark Borja, seorang siswa SMA yang menavigasi kehidupan sekolah, hubungan pertemanan, dan trauma masa lalu, sambil mengungkap misteri tentang sifat realitas yang mulai retak.', 'until-then.png', 'Sekitar 2 GB - 4 GB', 'Single_Player', 4),
(2, 'Cold Front', '2022-07-21', 'itch.io / racheldrawsthis', 'racheldrawsthis (Studio Investigrave)', 'Game horor psikologis yang menceritakan dua teman masa kecil, Augustine dan Winnie, yang terjebak dalam badai salju misterius di bulan Juli saat sedang dalam perjalanan terakhir sebelum Winnie pindah kuliah. Ceritanya mengeksplorasi ketakutan, kecemburuan, dan masalah komunikasi di antara mereka.', 'cold-front.webp', 'Sekitar 600 MB - 900 MB', 'Single-Player', 4),
(3, 'A Space For The Unbound', '2023-01-19', 'Toge Productions / Chorus Worldwide', 'Mojiken Studio', 'Berlatar di pedesaan Indonesia tahun 90-an, game ini menceritakan perjalanan Atma dan Raya dalam menghadapi akhir masa SMA mereka. Mereka memiliki kekuatan supernatural untuk masuk ke dalam pikiran orang lain (Spacedive) guna membantu mengatasi masalah emosional dan trauma, sambil mengungkap misteri tentang dunia yang terancam hancur.', 'asftu.jpeg', 'Sekitar 3 GB', 'Single-Player', 3),
(4, 'The Freak Circus', '2025-06-17', 'Self-published / itch.io', 'Neko Bueno', 'Kamu berperan sebagai pekerja kafe yang secara tidak sengaja bertemu dengan Pierrot, seorang anggota sirkus yang pendiam dan obsesif. Obsesi Pierrot memicu persaingan berbahaya dengan rival panggungnya, Harlequin. Di balik pertunjukan sirkus yang tampak menghibur, tersimpan rahasia gelap, teror, dan obsesi yang mematikan.', 'tfc.png', 'Sekitar 500 MB - 1 GB', 'Single-Player', 5),
(5, 'MiSide', '2024-12-10', 'IndieArk, Shochiku', 'AIHASTO', 'Game ini dimulai dengan pemain yang mengunduh aplikasi mobile berisi karakter virtual bernama Mita. Tak lama, pemain terseret masuk ke dalam dunia game tersebut dan harus berinteraksi dengan Mita yang obsesif. Game ini menggabungkan visual 2D chibi dengan eksplorasi 3D orang pertama yang penuh ketegangan.', 'miside.jpg', 'Sekitar 2 GB', 'Single-Player', 5),
(6, 'Undertale', '2015-09-15', 'Toby Fox / 8-4', 'Toby Fox', 'Kamu berperan sebagai seorang anak manusia yang jatuh ke Underground, dunia bawah tanah yang dipenuhi monster. Game ini unik karena kamu bisa memilih untuk bertarung (Genocide route), berteman dengan monster (Pacifist route), atau campuran keduanya (Neutral route). Pilihanmu secara permanen mempengaruhi dunia dan karakter di dalamnya.', 'undertale.png', 'sekitar 200 MB - 500 MB', 'Single-Player', 3),
(7, 'Guardian Tales', '2020-07-28', 'Kakao Games, Kong Studios', 'Kong Studios', 'Kamu berperan sebagai \"Guardian\" baru di Kerajaan Kanterbury yang sedang diserang oleh musuh bernama \"Invaders\". Game ini penuh dengan teka-teki lingkungan, pertarungan real-time, dan ratusan referensi (parody) ke budaya pop dan game klasik. Meskipun grafisnya lucu, ceritanya dikenal memiliki momen-momen emosional yang cukup berat.', 'gt.jpg', 'Sekitar 3 GB - 5 GB', 'Single-Player, Multiplayer', 3),
(8, 'Life Is Strange', '2015-01-30', 'Square Enix', 'Dontnod Entertainment', 'Menceritakan petualangan Max Caulfield, seorang siswi fotografi yang menemukan bahwa ia memiliki kemampuan untuk memutar balik waktu. Bersama sahabat lamanya, Chloe Price, mereka menyelidiki hilangnya seorang siswi bernama Rachel Amber sambil menghadapi konsekuensi berbahaya dari perubahan masa lalu (efek kupu-kupu) di kota fiksi Arcadia Bay.', 'lis.jpg', 'Sekitar 10 GB - 15 GB', 'Single-Player', 4),
(9, 'Little Misfortune', '2019-09-18', 'Killmonday Games', 'Killmonday Games', 'Mengisahkan Misfortune Ramirez Hernandez, seorang gadis berusia 8 tahun yang imajinatif. Dipandu oleh suara misterius di kepalanya bernama \"Mr. Voice\", ia berkelana ke dalam hutan untuk mencari \"Kebahagiaan Abadi\" sebagai hadiah untuk ibunya. Game ini penuh dengan dilema moral di mana pilihanmu menentukan nasib tragis atau manis bagi karakter di sekitarnya.', 'littlemft.jpg', 'Sekitar 2 GB - 3 GB', 'Single-Player', 4),
(10, 'Honkai: Star Rail', '2023-04-26', 'HoYoverse', 'mihoyo/HoYoverse', 'Kamu berperan sebagai \"Trailblazer\" yang terbangun dengan Stellaron (benda misterius penghancur planet) di dalam tubuh. Bersama kru Astral Express, kamu melakukan perjalanan melintasi galaksi menaiki kereta luar angkasa untuk menyegel Stellaron dan mengungkap rahasia di balik dewa-dewa kosmik yang disebut Aeon.', 'hsr.webp', 'Sekitar 20 GB - 35 GB (Mobile) / 35 GB - 50 GB (PC', 'Single-Player, Multiplayer', 3),
(11, 'Fears to Fathom: Home Alone', '2021-07-02', 'Rayll.', 'Rayll.', 'Game horor episodik berbasis antologi di mana setiap episodenya merupakan adaptasi dari kisah nyata yang dikirimkan oleh para pemain. Episode 1 menceritakan tentang Miles, seorang remaja berusia 14 tahun yang sendirian di rumah saat orang tuanya sedang bekerja, dan ia menyadari ada orang asing yang menyelinap masuk ke dalam rumahnya.', 'ftf1.jpg', 'Sekitar 500 MB - 1 GB', 'Single-Player', 4),
(12, 'Zenless Zone Zero', '2024-07-04', 'HoYoverse', 'HoYoverse', 'Berlatar di kota metropolitan pasca-apokaliptik bernama New Eridu. Kamu berperan sebagai seorang \"Proxy\"—profesional yang memandu orang-orang menjelajahi dimensi berbahaya bernama Hollows. Game ini fokus pada pertarungan aksi cepat (hack and slash) dan eksplorasi labirin menggunakan sistem layar TV yang unik.', 'zzz.png', 'Sekitar 20 GB - 25 GB / 50 GB - 57 GB', 'Single-Player, Multiplayer', 3),
(13, 'Sonic Forces', '2017-11-07', 'SEGA', 'Sonic Team', 'Dunia telah dikuasai oleh Dr. Eggman dengan bantuan musuh baru yang misterius bernama Infinite. Kamu akan bermain sebagai Sonic (Modern), Sonic (Classic), dan yang paling unik, \"Avatar\" (karakter kustom buatanmu sendiri) untuk memimpin perlawanan dan merebut kembali dunia.', 'sf.webp', 'Sekitar 18 GB - 20 GB', 'Single-Player', 2),
(14, 'Hollow Knight', '2017-02-24', 'Team Cherry', 'Team Cherry', 'Kamu berperan sebagai Knight, seorang ksatria kecil tak bernama yang menjelajahi sisa-sisa kerajaan bawah tanah Hallownest yang luas dan runtuh. Game ini fokus pada eksplorasi non-linear, pertarungan bos yang sangat menantang, serta pengungkapan sejarah gelap kerajaan tersebut melalui detail lingkungan dan karakter-karakter unik.', 'hk.webp', 'Sekitar 9 GB', 'Single-Player', 2),
(15, 'Hollow Knight: Silksong', '2025-09-04', 'Team Cherry', 'Team Cherry', 'Kamu berperan sebagai Hornet, putri pelindung Hallownest, yang diculik dan dibawa ke kerajaan asing bernama Pharloom. Berbeda dengan Knight di game pertama, Hornet bergerak lebih cepat, bisa berbicara, dan menggunakan berbagai alat serta jebakan. Kamu harus mendaki menuju puncak kerajaan untuk mengungkap alasan mengapa kamu dibawa ke sana dan menghadapi ancaman baru yang bertema sutra dan musik.', 'hkss.jpg', 'sekitar 10 GB - 15 GB', 'Single Player', 2),
(16, 'Five Nights at Freddy\'s: Security Breach', '2021-12-16', 'ScottGames / Steel Wool Studios', 'Steel Wool Studios', 'Berbeda dari seri klasik, game ini bertipe free-roam. Kamu bermain sebagai Gregory, seorang anak laki-laki yang terjebak di dalam Freddy Fazbear\'s Mega Pizzaplex. Bersama Glamrock Freddy yang menjadi pelindungmu, kamu harus bertahan hidup dari kejaran animatronic lain (Roxanne, Chica, Monty) dan penjaga malam bernama Vanessa hingga jam 6 pagi.', 'fnafsb.png', 'Sekitar 70 GB - 80 GB', 'Single-Player', 3);

-- --------------------------------------------------------

--
-- Table structure for table `game_engine`
--

CREATE TABLE `game_engine` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `pembuat` varchar(100) DEFAULT NULL,
  `tanggal_rilis` date DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_genre`
--

CREATE TABLE `game_genre` (
  `id_game` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_genre`
--

INSERT INTO `game_genre` (`id_game`, `id_genre`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 5),
(3, 6),
(4, 3),
(4, 4),
(4, 9),
(5, 1),
(5, 4),
(5, 10),
(5, 11),
(6, 2),
(6, 11),
(6, 12),
(7, 1),
(7, 13),
(7, 14),
(8, 1),
(8, 6),
(8, 15),
(9, 1),
(9, 7),
(9, 15),
(9, 16),
(10, 1),
(10, 14),
(10, 17),
(10, 18),
(11, 2),
(11, 4),
(11, 19),
(12, 13),
(12, 20),
(12, 21),
(13, 1),
(13, 22),
(13, 23),
(14, 1),
(14, 23),
(14, 24),
(14, 25),
(15, 1),
(15, 23),
(15, 24),
(16, 1),
(16, 26),
(16, 27);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id_genre`, `nama_genre`) VALUES
(1, 'Adventure'),
(2, 'Indie'),
(3, 'Visual Novel'),
(4, 'Psychological Horror'),
(5, 'Slice-of-Life'),
(6, 'Supernatural'),
(7, 'Horror'),
(8, 'Comedy'),
(9, 'Yandere'),
(10, 'Simulation'),
(11, 'RPG'),
(12, 'Bullet Hell'),
(13, 'Action RPG'),
(14, 'Gacha'),
(15, 'Interactive Story'),
(16, 'Dark Comedy'),
(17, 'Turn-Based RPG'),
(18, 'Space Fantasy'),
(19, 'Walking Simulator'),
(20, 'Urban Fantasy'),
(21, 'Roguelike'),
(22, 'Platformer'),
(23, 'Action'),
(24, 'Metroidvania'),
(25, 'Soulslike'),
(26, 'Survival Horror'),
(27, 'Stealth');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `id_platform` int(11) NOT NULL,
  `nama_platform` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`id_platform`, `nama_platform`) VALUES
(1, 'Windows'),
(2, 'Linux'),
(3, 'Macos'),
(4, 'Playstation 5'),
(5, 'Playstation 4'),
(6, 'Playstation 3'),
(7, 'Playstation 2'),
(8, 'Playstation 1'),
(9, 'Nintendo Switch'),
(10, 'Xbox Series X|S'),
(11, 'Xbox One'),
(12, 'Playstation Vita'),
(13, 'Android'),
(14, 'Ios'),
(15, 'Xbox 360');

-- --------------------------------------------------------

--
-- Table structure for table `ratingumur`
--

CREATE TABLE `ratingumur` (
  `id_ratingumur` int(11) NOT NULL,
  `nama_rating` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratingumur`
--

INSERT INTO `ratingumur` (`id_ratingumur`, `nama_rating`) VALUES
(1, 'PEGI 3'),
(2, 'PEGI 7'),
(3, 'PEGI 12'),
(4, 'PEGI 16'),
(5, 'PEGI 18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `umur` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `genre_favorit` varchar(100) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_pengguna`, `username`, `email`, `password`, `role`, `umur`, `jenis_kelamin`, `genre_favorit`, `foto_profil`, `created_at`) VALUES
(1, 'CreamyWho?', 'sceuwu1140@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'admin', NULL, NULL, NULL, 'phainon.png', '2026-04-17 09:42:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `game_engine`
--
ALTER TABLE `game_engine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_genre`
--
ALTER TABLE `game_genre`
  ADD PRIMARY KEY (`id_game`,`id_genre`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id_platform`);

--
-- Indexes for table `ratingumur`
--
ALTER TABLE `ratingumur`
  ADD PRIMARY KEY (`id_ratingumur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `game_engine`
--
ALTER TABLE `game_engine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `id_platform` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ratingumur`
--
ALTER TABLE `ratingumur`
  MODIFY `id_ratingumur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_genre`
--
ALTER TABLE `game_genre`
  ADD CONSTRAINT `game_genre_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id_genre`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
