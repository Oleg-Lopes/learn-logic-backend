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
    <script src="assets/scripts/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#nav_level_1").click(function () {
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


            $(".level").on('click', '.boka', function () {
                var id = $(this).attr("id");
                if ($("#"+id+"form").is(":hidden")) {
                    $(".form").hide();
                    $("#"+id+"form").slideDown();
                } else { $(".form").slideUp(); }
            }); // SHOW/HIDE FROM FOR EACH LINE IN TABLE

            $("#showall1").click(function () {
                $("#level1 table").load("assets/php_assets/level_all.php?level=1");
                $(this).hide();
            });
            $("#showall2").click(function () {
                $("#level2 table").load("assets/php_assets/level_all.php?level=2");
                $(this).hide();
            });
            $("#showall3").click(function () {
                $("#level3 table").load("assets/php_assets/level_all.php?level=3");
                $(this).hide();
            }); // SHOW ALL LINES FOR EACH TABLE
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
    <section id="level1" class="level"><table>
        <?php
            $level->level_15('1');
        ?></table>
        <button id="showall1">Show all</button>
    </section>
    <!-- END OF TABLE LEVEL 1 -->



    <!-- START OF TABLE LEVEL 2 -->
    <section id="level2" class="level"><table>
        <?php
            $level->level_15('2');
        ?></table>
        <button id="showall2">Show all</button>
    </section>
    <!-- END OF TABLE LEVEL 2 -->



    <!-- START OF TABLE LEVEL 3 -->
    <section id="level3" class="level"><table>
        <?php
            $level->level_15('3');
        ?></table>
        <button id="showall3">Show all</button>
    </section>
    <!-- END OF TABLE LEVEL 3 -->



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