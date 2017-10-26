<?php /*
    include "assets/php_assets/includes/classes.php";
    $csv = new csv();
    $csv->csv();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#card").click(function() {
                $("#card").flip();
            });
        });
    </script>
    <style>
        #card div {
            width: 200px;
            height: 200px;
            background: red;
            color: #fff;
        }
        .back {
            /* display: none; */
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div id="card">
        <div class="front">FRooooooooooooooooONT</div>
        <div class="back">BaaaaaaaaaaaaaaaaaACK</div>
    </div>
</body>
</html>