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
    header("Location: hw_index.php");
    exit();
}
?>