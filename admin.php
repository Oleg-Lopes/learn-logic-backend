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
    <script src="https://use.fontawesome.com/433d64420a.js"></script>
    <script src="assets/scripts/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <title>Admin</title>
    <script>
        $(document).ready(function () {
            <?php // SHOW THE LIST YOU OPERATED WITH LAST
                if (isset($_GET['level'])) {
                    echo "if ({$_GET['level']} == '1') {
                        $('#level1').show();}
                    else if ({$_GET['level']} == '2') {
                        $('#level2').show();}
                    else if ({$_GET['level']} == '3') {
                        $('#level3').show();}";
                }
            ?> // SHOW THE LIST YOU OPERATED WITH LAST



            $("#nav_level_1").click(function () { // SHOW/HIDE LISTS
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
            }); // SHOW/HIDE LISTS



            $(".table").on('click', '.change', function () { // SHOW/HIDE FROM FOR EACH LINE IN LIST
                var id = $(this).attr("id");
                if ($("#"+id+"form").is(":hidden")) {
                    $(".form").hide();
                    $("#"+id+"form").css('display', 'table-row');
                } else { $(".form").hide(); }
            }); // SHOW/HIDE FROM FOR EACH LINE IN LIST

            sortDir = new Array();
            sortDir[0] = "date";
            sortDir[1] = "place";
            sortDir[2] = "price";
            $(".table").on('click', '.th', function () {
                var sortLevel = $(this).attr("class").split("th"); // LEVEL [2]
                var sortId = $(this).attr("id").split("sort"); // sort after [1]
                var num = jQuery.inArray(sortId[1], sortDir);
                if (num > -1) { // min to max sort
                    $("#level"+sortLevel[2]+" .table").load("assets/php_assets/admin_sort.php?level="+sortLevel[2]+"&sort="+sortId[1], function () {
                        $(".fa-caret-down").hide();
                        $("#caretdown"+sortId[1]).toggle();
                        sortDir = ['date', 'place', 'price']; // next click for all min to max sort
                        sortDir[num] = 0; // next click for this max to min sort
                    });
                } else { // max to min sort
                    $("#level"+sortLevel[2]+" .table").load("assets/php_assets/admin_sort_desc.php?level="+sortLevel[2]+"&sort="+sortId[1], function () {
                        $(".fa-caret-down").hide();
                        $("#caretup"+sortId[1]).toggle();
                        sortDir = ['date', 'place', 'price']; // next click for all min to max sort
                    });
                }
            });
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
    


    <!-- START OF LIST LEVEL 1 -->
    <section id="level1" class="level"><div class="table">
    <?php
        $level->level_all('1');
    ?></div>
    </section>
    <!-- END OF LIST LEVEL 1 -->



    <!-- START OF LIST LEVEL 2 -->
    <section id="level2" class="level"><div class="table">
        <?php
            $level->level_all('2');
        ?></div>
    </section>
    <!-- END OF LIST LEVEL 2 -->



    <!-- START OF LIST LEVEL 3 -->
    <section id="level3" class="level"><div class="table">
        <?php
            $level->level_all('3');
        ?></div>
    </section>
    <!-- END OF LIST LEVEL 3 -->
    <a href="index.php">to Level 1</a>
</body>
</html>