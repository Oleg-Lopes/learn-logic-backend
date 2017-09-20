<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new admin_level();
    
    $level->delete($_GET['level'], $_GET['id']);