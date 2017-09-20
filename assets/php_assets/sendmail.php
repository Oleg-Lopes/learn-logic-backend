<?php
    include "includes/conn.php";
    include "includes/classes.php";

    $level = new level();
    $level->setName($_POST['name']);
    $level->setSName($_POST['sname']);
    $level->setPersnmr($_POST['persnmr']);
    $level->setTel($_POST['tel']);
    $level->setEmail($_POST['email']);

    if (empty($_POST['firm'])) {
        $level->setFirm("Ingen");
    }
    else {
        $level->setFirm($_POST['firm']);
    }

    if (empty($_POST['comment'])) {
        $level->setComment("Inga");
    } else {
        $level->setComment($_POST['comment']);
    }
    
    $level->boka($_GET['level'], $_GET['id']);