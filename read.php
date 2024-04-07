<?php
$res = false; // Algselt pole mingit infot
// Kas otsingu nuppu on vajutatud
if(isset($_POST['submit'])) {
    $phrase = $_POST['phrase'];
    if(strlen(trim($phrase)) > 1) {
        $sql = 'SELECT * FROM simple WHERE name LIKE "%'.$phrase.'%"';
        $res = $database->dbGetArray($sql);
        // $database->show($res); Testiks!
    }
}
?>
<div class="container">
    <div class="row">


        <div class="col-sm-8 mx-auto">
            <h3 class="text-center">Read - Otsi kasutajat nime baasil</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=read" method="POST" class="mb-2">
                <div class="row mb-2">
                    <label for="phrase" class="col-sm-2 form-label mt-2 fw-bold">Otsingu fraas</label>
                    <div class="col">
                        <input type="text" name="phrase" value="<?php echo isset($_POST['submit']) ? $_POST['phrase'] : '#'; ?>" id="phrase" onclick="clearField();" class="form-control" required placeholder="Nimi">
                    </div>
                    <div class="col-2">
                        <input type="submit" name="submit" value="Otsi tulemusi" class="btn btn-primary form-control">
                    </div>
                </div>
            </form>

            <?php
            // if lause kas leiti midagi
            if ($res !== false) {
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nimi</th>
                        <th>Sünniaeg</th>
                        <th>Palk</th>
                        <th>Pikkus</th>
                        <th>Lisatud</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // foreach-loop algus
                    foreach($res as $key=>$val) {
                        $date = new DateTime($val['birth']);
                        $birth = $date->format('d.m.Y');
                        $dateTime = new DateTime($val['added']);
                        $added = $dateTime->format('d.m.Y H:i:s');
                    ?>
                    <tr>
                        <td><?php echo $val['name']; ?></td>
                        <td><?php echo $birth; ?></td>
                        <td class="text-end"><?php echo $val['salary']; ?></td>
                        <td class="text-end"><?php echo $val['height']; ?></td>
                        <td><?php echo $added; ?></td>
                    </tr>
                    <?php
                    // foreach-loop lõpp
                    }
                    ?>
                </tbody>
            </table>
            <?php
            // if lause lõpp
            }
            ?>

        </div>

    </div>
</div>