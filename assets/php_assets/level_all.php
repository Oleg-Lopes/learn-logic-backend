<?php
    include "includes/conn.php";
    include "includes/classes.php";
    
    $level = new level();
    $level->level_all($_GET['level']);