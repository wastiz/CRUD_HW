<?php 
// Siia tuleb suurem ports PHP koodi aga kõik on loogiline
// loe kokku kirjet
$sql = 'SELECT COUNT(id) AS total FROM simple;';
$res = $database->dbGetArray($sql);
//$database ->show($res);
$total = $res[0]['total'];
// Mitmendal lehel oleme
if($total > 0) {
    if(isset($_GET['pg'])) {
        $pg = $_GET['pg'];
    } else {
        $pg = 1;
    }
} else {
    $pg = 1;
}

$totalRows = $total;
$maxPerPage = MAXPERPAGE;
$pageCount = ceil($totalRows / $maxPerPage);
if(empty($pg) || $pg < 1 || $pg > $pageCount) {
    $pg = 1;
}
$nextStart = $pg * $maxPerPage;
$start = $nextStart - $maxPerPage;

// Tee sobilik päring tabelisse. Vaata koodi peale inlcude 'paginate.php' (näiteks homepage.php)

?>
<nav aria-label="Page navigation">
    <ul class="pagination pagination-color justify-content-center">
        <li class="page-item">
            <a class="page-link <?php echo ($pg == 1) ? 'disabled' : null; ?>" href="index.php?pg=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link <?php echo ($pg == 1) ? 'disabled' : null; ?>" href="index.php?pg=<?php echo (($pg - 1) == 0) ? "1" : ($pg -1); ?>" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
            </a>
        </li>
        <?php
        // for-loop algus
            for($x =0; $x < $pageCount; $x++) {
            ?>
            <li class="page-item">
                <a class="page-link <?php echo(($x + 1) == $pg) ? 'active' : null; ?>" href="index.php?pg=<?php echo ($x + 1); ?>"><?php echo ($x + 1); ?></a>
            </li>
            <?php
        // for-loop lõpp
            }
        ?>
        <li class="page-item">
            <a class="page-link <?php echo ($pg == $pageCount) ? 'disabled' : null; ?>" href="index.php?pg=<?php echo (($pg + 1) > $pageCount) ? $pageCount : ($pg +1); ?>" aria-label="Next">
                <span aria-hidden="true">&rsaquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link <?php echo ($pg == $pageCount) ? 'disabled' : null; ?>" href="index.php?pg=<?php echo $pageCount; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
