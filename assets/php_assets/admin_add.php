<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new admin_level();
    
    $level->setDate($_POST['date']);
    $level->setPlace($_POST['place']);
    $level->setPrice($_POST['price']);
    
    $level->add($_GET['level']);