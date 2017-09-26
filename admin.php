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
            <?php 
                if (isset($_GET['level'])) {
                    echo "if ({$_GET['level']} == '1') {
                        $('#level1').show();}
                    else if ({$_GET['level']} == '2') {
                        $('#level2').show();}
                    else if ({$_GET['level']} == '3') {
                        $('#level3').show();}";
                }
            ?>

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


            $(".level").on('click', '.change', function () {
                var id = $(this).attr("id");
                if ($("#"+id+"form").is(":hidden")) {
                    $(".form").hide();
                    $("#"+id+"form").slideDown();
                } else { $(".form").slideUp(); }
            }); // SHOW/HIDE FROM FOR EACH LINE IN TABLE




            /*$(".submit").click(function () {
                var levelArr = $(this).closest("section").attr('id').split("level");
                var level = levelArr[1];
                var idArr = $(this).closest("form").attr('id').split("form");
                var id = idArr[0];
                var date = $(this).siblings(".date").val();
                var place = $(this).siblings(".place").val();
                var price = $(this).siblings(".price").val();
                $.ajax({
                    type: 'POST',
                    url: 'assets/php_assets/admin_save.php',
                    data: {
                        date: date,
                        place: place,
                        price: price,
                        level: level,
                        id: id
                    },
                    success: function () {
                        $("#level"+level+" table").load("assets/php_assets/level_all.php?level="+level);
                    },
                    error: function () {
                        alert("error");
                    }
                });
            });*/

            


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
        $level->level_all('1');
    ?></table>
    </section>
    <!-- END OF TABLE LEVEL 1 -->



    <!-- START OF TABLE LEVEL 2 -->
    <section id="level2" class="level"><table>
        <?php
            $level->level_all('2');
        ?></table>
    </section>
    <!-- END OF TABLE LEVEL 2 -->



    <!-- START OF TABLE LEVEL 3 -->
    <section id="level3" class="level"><table>
        <?php
            $level->level_all('3');
        ?></table>
    </section>
    <!-- END OF TABLE LEVEL 3 -->
    <a href="index.php">to Level 1</a>
</body>
</html>