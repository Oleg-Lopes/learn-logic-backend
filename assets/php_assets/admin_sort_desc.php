<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new admin_level();
    
    $level->sort_desc($_GET['level'], $_GET['sort']);