<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new admin_level();

    $level->setDate($_POST['date']);
    $level->setPlace($_POST['place']);
    $level->setPrice($_POST['price']);

    //$level->save($_POST['level'], $_POST['id']);
    $level->save($_GET['level'], $_GET['id']);
?>