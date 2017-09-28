<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new admin_level();
    $level->save($_GET['level'], $_GET['id'], $_POST['date'], $_POST['place'], $_POST['price']);