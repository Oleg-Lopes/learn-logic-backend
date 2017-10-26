<?php
    session_start();
    include "assets/php_assets/includes/classes.php";
    $level = new admin_level();
    if(isset($_POST['pass']) && $_POST['pass'] == 'pass') {
        $_SESSION["status"] = true;
    } else if (isset($_POST['ut'])) {
        $_SESSION["status"] = false;
        header("location: admin.php");
    }
    
    if (!isset($_SESSION["status"])) {
        function error_handler(){
            // do noffin
        }
        set_error_handler('error_handler');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://use.fontawesome.com/433d64420a.js"></script>
    <script src="assets/scripts/jquery-3.2.1.min.js"></script>
    <script src="assets/scripts/admin-scripts.js"></script>
    <link rel="stylesheet" href="./assets/css/index.min.css">
    <link rel="stylesheet" href="./assets/css/admin.min.css">
    <title>Admin</title>
    <script>
        $(document).ready(function() {
            $("#pass-input").focus(function() {
                $(this).prop('type', 'password');
            }); // PREVENT AUTOCOMPLETE PASS ON FIRST(only) CLICK

            <?php // SHOW THE LIST YOU OPERATED WITH LAST
                if (isset($_GET['level']) && ($_GET['level']) > 0 && ($_GET['level']) < 5) {
                    echo "$('#level-'+{$_GET['level']}).show(); var level = {$_GET['level']}";
                }
            ?>

            if ($("#level-" + level).is(":visible")) {
                $(".nav-level").css({background:"none"});
                $("#nav-level-"+level).css({background:"red"});
                $("#level-" + level + " div").load("assets/php_assets/level_all.php?admin=true&level=" + level);
            } // SHOW THE LIST YOU OPERATED WITH LAST
        });
    </script>
</head>
<body>
    <form id="login-form" method="POST" action="" autocomplete="off">
        <input id="pass-input" type="text" name="pass" autocomplete="off">
        <input type="submit" value="Logga in">
    </form>
    <form id="logout-form" method="POST" action="" style="display:none">
        <input type="submit" name="ut" value="Logga ut">
    </form>
    <?php 
    if($_SESSION["status"] == true){
        echo '
            <script>
                $(document).ready(function() {
                    $("#login-form").hide();
                    $("#logout-form").show();
                });
            </script>
            <nav>
                <ul>
                    <li id="nav-level-1" class="nav-level">Level 1</li>
                    <li id="nav-level-2" class="nav-level">Level 2</li>
                    <li id="nav-level-3" class="nav-level">Level 3</li>
                    <li id="nav-level-4" class="nav-level">Level 4</li>
                    <li id="nav-level-5" class="nav-level">Level 5</li>
                    <li id="nav-level-6" class="nav-level">Level 6</li>
                </ul>
            </nav> 

            <section id="level-1" class="level">
                <div class="table"></div>
            </section>

            <section id="level-2" class="level">
                <div class="table"></div>
            </section>
            
            <section id="level-3" class="level">
                <div class="table"></div>
            </section>
            
            <section id="level-4" class="level">
                <div class="table"></div>
            </section>
            
            <section id="level-5" class="level">
                <div class="table"></div>
            </section>
            
            <section id="level-6" class="level">
                <div class="table"></div>
            </section>
    ';}
    ?>
</body>
</html>