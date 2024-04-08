<?php
// Kas submit nuppu on vajutatud klikiti update-by-id vormil
if(isset($_POST['submit'])) {
    // $database->show($_POST); TEST!
    $id = $_POST['sid'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $salary = $_POST['salary'];
    $height = $_POST['height'];
    if(empty($salary)) {
        $salary = 'NULL';
    }
    if(empty($height)) {
        $height = 'NULL';
    }
    $sql = 'UPDATE simple SET 
            name = '.$database->dbFix($name).',
            birth = '.$database->dbFix($birth).',
            salary = '.$salary.',
            height = '.$height.',
            added = added WHERE id = '.$id;

    // echo $sql; TEST
    if($database->dbQuery($sql)) {
        $success = true;
        $_POST = array();
    } else {
        $success = false;
    }
    header("Location: hw_index.php");
    exit();
}
?>