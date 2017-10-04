<?php
    include "includes/conn.php";
    include "includes/classes.php";

    $level = new level();

    if (empty($_POST['firm'])) {
        $firm = "Ingen";
    } else {
        $firm = $_POST['firm'];
    }

    if (empty($_POST['comment'])) {
        $comment = "Inga";
    } else {
        $comment = $_POST['comment'];
    }
    
    $level->boka($_GET['level'], $_GET['id'], $_POST['name'], $_POST['sname'], $_POST['persnmr'], $_POST['tel'], $_POST['email'], $firm, $comment, date("d-m-Y"));