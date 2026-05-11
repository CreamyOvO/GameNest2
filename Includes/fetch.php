<?php
session_start();
include "koneksi.php";

$limit = 15;
$page = $_GET['page'] ?? 1;
$page = max(1, (int)$page);

$offset = ($page - 1) * $limit;

$where = [];

$countQuery = "
SELECT COUNT(DISTINCT g.id_game) as total
FROM games g
LEFT JOIN game_genre gg ON g.id_game = gg.id_game
";

if (count($where) > 0) {
    $countQuery .= " WHERE " . implode(" AND ", $where);
}

$countResult = mysqli_query($conn, $countQuery);
$totalData = mysqli_fetch_assoc($countResult)['total'];

$totalPage = ceil($totalData / $limit);

$genres = mysqli_query($conn, "SELECT * FROM genres");
$pegi = mysqli_query($conn, "SELECT * FROM ratingumur");

// idk

$query = "
SELECT g.*, GROUP_CONCAT(ge.nama_genre SEPARATOR ', ') as genre
FROM games g
LEFT JOIN game_genre gg ON g.id_game = gg.id_game
LEFT JOIN genres ge ON gg.id_genre = ge.id_genre
";

$where = [];

$search = $_GET['search'] ?? '';
$genreFilter = $_GET['genre'] ?? '';
$pegiVal = $_GET['pegi'] ?? '';
$sort = $_GET['sort'] ?? 'name';

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

$query .= " LIMIT $limit OFFSET $offset";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("ERROR: " . mysqli_error($conn));
}
?>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="game-card">
        <div class="frame">
            <img src="../Uploads/<?= $row['cover_image'] ?>" alt="<?= $row['nama_game'] ?>">
        </div>

        <h4><?= $row['nama_game'] ?></h4>
        <p><?= $row['genre'] ?: 'No Genre' ?></p>
        <div id="actionbut">
            <img src="gamelib-assets/edit.svg" alt="">
            <img src="gamelib-assets/delete.svg" alt="">
        </div>
    </div>
<?php } ?>
<div id="pagination-wrapper">
<div class="pagination">
<?php if ($totalPage > 1): ?>

    <?php if ($page > 1): ?>
        <button onclick="changePage(<?= $page - 1 ?>)">Prev</button>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPage; $i++): ?>
        <button 
            class="<?= $i == $page ? 'active' : '' ?>"
            onclick="changePage(<?= $i ?>)">
            <?= $i ?>
        </button>
    <?php endfor; ?>

    <?php if ($page < $totalPage): ?>
        <button onclick="changePage(<?= $page + 1 ?>)">Next</button>
    <?php endif; ?>

<?php endif; ?>
</div>
</div>