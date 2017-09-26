<?php
    include "assets/php_assets/includes/classes.php";
    $level = new admin_level();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <title>Admin</title>
    <script src="assets/scripts/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function () {
            <?php // SHOW THE LEVEL YOU OPERATED WITH LAST
                if (isset($_GET['level'])) {
                    echo "if ({$_GET['level']} == '1') {
                        $('#level1').show();}
                    else if ({$_GET['level']} == '2') {
                        $('#level2').show();}
                    else if ({$_GET['level']} == '3') {
                        $('#level3').show();}";
                }
            ?> // SHOW THE LEVEL YOU OPERATED WITH LAST



            $("#nav_level_1").click(function () { // SHOW/HIDE TABLES WITH LEVELS
                if ($("#level1").is(":hidden")) {
                    $(".level").hide();
                    $("#level1").show();
                } else { $("#level1").toggle(); }
            });
            $("#nav_level_2").click(function () {
                if ($("#level2").is(":hidden")) {
                    $(".level").hide();
                    $("#level2").show();
                } else { $("#level2").toggle(); }
            });
            $("#nav_level_3").click(function () {
                if ($("#level3").is(":hidden")) {
                    $(".level").hide();
                    $("#level3").show();
                } else { $("#level3").toggle(); }
            }); // SHOW/HIDE TABLES WITH LEVELS



            $(".level").on('click', '.change', function () { // SHOW/HIDE FROM FOR EACH LINE IN TABLE
                var id = $(this).attr("id");
                if ($("#"+id+"form").is(":hidden")) {
                    $(".form").hide();
                    $("#"+id+"form").css('display', 'table-row');
                } else { $(".form").hide(); }
            }); // SHOW/HIDE FROM FOR EACH LINE IN TABLE
        });
    </script>
</head>
<body>
    <!-- START OF NAVIGATION THROUGH LEVELS -->
    <nav><ul>
            <li id="nav_level_1">Level 1</li>
            <li id="nav_level_2">Level 2</li>
            <li id="nav_level_3">Level 3</li>
        </ul></nav>
    <!-- END OF NAVIGATION THROUGH LEVELS -->
    


    <!-- START OF TABLE LEVEL 1 -->
    <section id="level1" class="level"><div class="table">
    <?php
        $level->level_all('1');
    ?></div>
    </section>
    <!-- END OF TABLE LEVEL 1 -->



    <!-- START OF TABLE LEVEL 2 -->
    <section id="level2" class="level"><div class="table">
        <?php
            $level->level_all('2');
        ?></div>
    </section>
    <!-- END OF TABLE LEVEL 2 -->



    <!-- START OF TABLE LEVEL 3 -->
    <section id="level3" class="level"><div class="table">
        <?php
            $level->level_all('3');
        ?></div>
    </section>
    <!-- END OF TABLE LEVEL 3 -->
    <a href="index.php">to Level 1</a>
</body>
</html>