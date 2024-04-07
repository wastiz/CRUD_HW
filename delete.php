<?php
// Kas ids on olemas ja kas see on number
if(isset($_GET['ids']) && is_numeric($_GET['ids'])) {
    $sql = 'DELETE FROM simple WHERE id = '.$_GET['ids'];
    if($database->dbQuery($sql)) {
        $success = true;
        $url = $_SERVER['PHP_SELF'].'?page=delete';
        header("Location: ".$url);
    } else {
        $success = false;
        header('Location: index.php?page=delete');
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Delete - Kustuta kirje tabelist</h3>
            <?php
            // Kui toimus kustutamine (faili alguses olev if lause on tõene!)
            if(isset($success) && $success) {
                ?>
                <div class="alert alert-success">
                    Sissekanne on tabelist kustutatud!
                </div>
                <?php
            } else if(isset($success) && !$success) {
                ?>
                <div class="alert alert-danger">
                    Sissekande kustutamisel tekkis tõrge!
                </div>
                <?php
            }

            // Näita tulemust
            // SQL lause, päring ja if lause kas tulemust on
            $sql = 'SELECT * FROM simple ORDER BY added DESC';
            $res = $database->dbGetArray($sql);
            if($res !== false) {
            ?>
                <table class="table table-bordered table-striped table-hover mt-2">
                    <thead class="text-center">
                        <tr>
                            <th>Jrk</th>
                            <th>Nimi</th>
                            <th>Sünniaeg</th>
                            <th>Palk</th>
                            <th>Pikkus</th>
                            <th>Lisatud</th>
                            <th>Tegevus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // foreach-loop algus
                        foreach ($res as $key=>$val) { 
                            $date = new DateTime($val['birth']);
                            $birth = $date->format('d.m.Y');
                            $dateTime = new DateTime($val['added']);
                            $added = $dateTime->format('d.m.Y H:i:s');                           
                        ?>
                            <tr>
                                <td class="text-end"><?php echo ($key + 1); ?>.</td>
                                <td><?php echo $val['name']; ?></td>
                                <td><?php echo $birth; ?></td>
                                <td class="text-end"><?php echo $val['salary']; ?></td>
                                <td class="text-end"><?php echo $val['height']; ?></td>
                                <td><?php echo $added; ?></td>
                                <td class="text-center">
                                    <a href="?page=delete&ids=<?php echo $val['id']; ?>" onclick="if (confirm('Kas oled kindel?')) { return true; } else { return false; }">
                                        <i class="fa-solid fa-trash-can text-danger" title="Delete"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        // foreach-loop lõpp
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            // if lause els osa
            } else {
            ?>
                <p class="text-danger fs-4 text-center fw-bold">Isikuid ei leitud</p>
            <?php
            // if lause lõpp
            }
            ?>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>