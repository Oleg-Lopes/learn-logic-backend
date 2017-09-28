<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new admin_level();
    $level->add($_GET['level'], $_POST['date'], $_POST['place'], $_POST['price']);