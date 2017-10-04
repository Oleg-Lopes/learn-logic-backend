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
    <script src="assets/scripts/admin-scripts.js"></script>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <title>Admin</title>
    <script>
        $(document).ready(function() {
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
        $level->level_all('1');
    ?></div>
    </section>
    <!-- END OF LIST LEVEL 1 -->



    <!-- START OF LIST LEVEL 2 -->
    <section id="level-2" class="level"><div class="table">
        <?php
            $level->level_all('2');
        ?></div>
    </section>
    <!-- END OF LIST LEVEL 2 -->



    <!-- START OF LIST LEVEL 3 -->
    <section id="level-3" class="level"><div class="table">
        <?php
            $level->level_all('3');
        ?></div>
    </section>
    <!-- END OF LIST LEVEL 3 -->
    <a href="index.php?level=1">to Level 1</a>
</body>
</html>