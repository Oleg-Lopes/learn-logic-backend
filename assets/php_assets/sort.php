<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new level();
    
    $level->sort($_GET['level'], $_GET['sort']);