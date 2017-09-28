<?php
    include "assets/php_assets/includes/classes.php";
    $level = new level();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Level 1</title>
    <script src="https://use.fontawesome.com/433d64420a.js"></script>
    <script src="assets/scripts/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function () { // SHOW/HIDE LISTS
            $(".nav_level").click(function () {
                var level = $(this).attr("id").split("nav_level_");
                if ($("#level"+level[1]).is(":hidden")) {
                    $(".level").hide();
                    $("#level"+level[1]).show();
                } else { $("#level"+level[1]).toggle(); }
            }); // SHOW/HIDE LISTS



            $(".level").on('click', '.boka', function () { // SHOW/HIDE FORM FOR EACH LINE IN LIST
                var id = $(this).attr("id");
                if ($("#"+id+"form").is(":hidden")) {
                    $(".form").hide();
                    $("#"+id+"form").slideDown();
                } else { $(".form").slideUp(); }
            }); // SHOW/HIDE FORM FOR EACH LINE IN LIST



            $("#showall1").click(function () { // SHOW ALL LINES FOR EACH LIST
                $("#level1 .table").load("assets/php_assets/level_all.php?level=1");
                $(this).hide();
            });
            $("#showall2").click(function () {
                $("#level2 .table").load("assets/php_assets/level_all.php?level=2");
                $(this).hide();
            });
            $("#showall3").click(function () {
                $("#level3 .table").load("assets/php_assets/level_all.php?level=3");
                $(this).hide();
            }); // SHOW ALL LINES FOR EACH LIST
        });
    </script>
</head>
<body>
    <!-- START OF NAVIGATION THROUGH LEVELS -->
    <nav><ul>
            <li id="nav_level_1" class="nav_level">Level 1</li>
            <li id="nav_level_2" class="nav_level">Level 2</li>
            <li id="nav_level_3" class="nav_level">Level 3</li>
        </ul></nav>
    <!-- END OF NAVIGATION THROUGH LEVELS -->
    


    <!-- START OF LIST LEVEL 1 -->
    <section id="level1" class="level"><div class="table">
        <?php
            $level->level_15('1');
        ?></div>
        <button id="showall1">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 1 -->



    <!-- START OF LIST LEVEL 2 -->
    <section id="level2" class="level"><div class="table">
        <?php
            $level->level_15('2');
        ?></div>
        <button id="showall2">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 2 -->



    <!-- START OF LIST LEVEL 3 -->
    <section id="level3" class="level"><div class="table">
        <?php
            $level->level_15('3');
        ?></div>
        <button id="showall3">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 3 -->



    <!-- START OF THX BOX -->
    <?php
        if (isset($_GET['tack'])) {
            echo "<h2>TACK FOR DIN BOKNING!</h2>";
        }
    ?>
    <!-- END OF THX BOX -->

    <a href="admin.php">ADMIN</a>
</body>
</html>