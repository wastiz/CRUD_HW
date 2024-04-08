<h2 class="text-center">Avaleht - Sirvi kogu tabelit</h2>
<?php
    // Lisame siia leheküljendamise
    include 'paginate.php';
    // sql lause, päring ja if lause
    $sql = 'SELECT * FROM simple ORDER BY added DESC LIMIT '.$start.', '.$maxPerPage;
    $res = $database->dbGetArray($sql);
    if($res !== FALSE) {
        //$database->show($res);

?>

<table class="table table-hover table-bordered">
    <thead>
        <tr class="text-center">
            <th>Nimi</th>
            <th>Sünniaeg</th>
            <th>Palk</th>
            <th>Pikkus</th>
            <th>Lisatud</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($res as $key=>$val) {
            $date = new DateTime($val['birth']);
            $birth = $date->format('d.m.Y');
            $dateTime = new DateTime($val['added']);
            $added = $dateTime->format('d.m.Y H:i:s');

        ?>
        <tr>
            <td><?php echo $val['name']; ?></td>
            <td class="text-center"><?php echo $birth; ?></td>
            <td class="text-end"><?php echo $val['salary']; ?></td>
            <td class="text-end"><?php echo $val['height']; ?></td>
            <td class="text-end"><?php echo $added; ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
} else {
?>
    <div class="alert alert-danger">Sobivaid kirjeid ei leitud</div>
<?php
}
?>