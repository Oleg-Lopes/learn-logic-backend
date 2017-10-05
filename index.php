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
    <title>Level 1</title>
    <script src="https://use.fontawesome.com/433d64420a.js"></script>
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/scripts/jquery-3.2.1.min.js"></script>
    <script src="assets/scripts/jquery-ui.min.js"></script>
    <script src="assets/scripts/index-scripts.js"></script>
    <script>
        $(document).ready(function () {
            <?php // SHOW THE LIST YOU OPERATED WITH LAST
                if (isset($_GET['level']) && ($_GET['level']) > 0 && ($_GET['level']) < 4) {
                    echo "$('#level-'+{$_GET['level']}).show();";
                }
            ?> // SHOW THE LIST YOU OPERATED WITH LAST
        });
    </script>
</head>
<body>
    <!-- START OF NAVIGATION THROUGH LEVELS -->
    <nav><ul>
            <li id="nav-level-1" class="nav-level">Level 1</li>
            <li id="nav-level-2" class="nav-level">Level 2</li>
            <li id="nav-level-3" class="nav-level">Level 3</li>
        </ul></nav>
    <!-- END OF NAVIGATION THROUGH LEVELS -->
    


    <!-- START OF LIST LEVEL 1 -->
    <section id="level-1" class="level"><div class="table">
        <?php
            $level->level_15('1');
        ?></div>
        <button id="showall1" class="showall">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 1 -->



    <!-- START OF LIST LEVEL 2 -->
    <section id="level-2" class="level"><div class="table">
        <?php
            $level->level_15('2');
        ?></div>
        <button id="showall2" class="showall">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 2 -->



    <!-- START OF LIST LEVEL 3 -->
    <section id="level-3" class="level"><div class="table">
        <?php
            $level->level_15('3');
        ?></div>
        <button id="showall3" class="showall">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 3 -->



    <!-- START OF THX BOX -->
    <?php
        if (isset($_GET['tack'])) {
            echo "<h2>TACK FOR DIN BOKNING!</h2>";
        }
        if (isset($_GET['fel'])) {
            echo "<h2>NÅT FICK FEL!</h2>";
        }
    ?>
    <!-- END OF THX BOX -->

    <a href="admin.php?level=1">ADMIN</a>
</body>
</html>