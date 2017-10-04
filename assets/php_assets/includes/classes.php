<?php
    class level {
        
        function level_15($level) {
            $sql = "SELECT * FROM {$level}_ ORDER BY id DESC LIMIT 2";
            $this->show_level($sql, $level);
        }
        
        function level_all($level) {
            $sql = "SELECT * FROM {$level}_ ORDER BY id DESC";
            $this->show_level($sql, $level);
        }

        function show_level($sql, $level) {
            include "conn.php";
            $req = $db->prepare($sql);
            $req->execute();
            
            while ($data=$req->fetch()) {
                echo "
                <div class='tr'>
                    <span class='td'>{$data['date']}</span>
                    <span class='td'>{$data['place']}</span>
                    <span class='td'>{$data['price']}</span>
                    <span class='td'><button id='{$level}-{$data['id']}-btn-show-form-boka' class='btn-boka' style='background:green'>Boka</button></span>
                </div>
                <form action='assets/php_assets/sendmail.php?level={$level}&id={$data['id']}' method='post' class='tr form-boka' id='{$level}-{$data['id']}-form-boka'>
                    <span class='td'>
                        <input name='name' type='text' placeholder='Förnamn*' required>
                        <input name='sname' type='text' placeholder='Efternan*' required>
                    </span>
                    <span class='td'>
                        <input name='persnmr' type='text' pattern='[0-9]*' placeholder='persnmr. ååmmddnnnn*' required oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'
                        type = 'number'
                        maxlength = '10'>
                        <input name='tel' type='text' pattern='[0-9]*' placeholder='tel. 0700557799*' required>
                    </span>
                    <span class='td'>
                        <input name='email' type='email' placeholder='Email*' required>
                        <input name='firm' type='text' placeholder='Företag'>
                    </span>
                    <span class='td'>
                        <textarea name='comment' placeholder='Övrigt'></textarea>
                        <input name='submit' type='submit' value='BOKA'>
                    </span>
                </form>";
            }
        }

        function boka($level, $id, $name, $sname, $persnmr, $tel, $email, $firm, $comment, $bokdate) {
            include "includes/conn.php";
            $req = $db->prepare("SELECT * FROM {$level}_ WHERE id = '$id'");
            $req->execute();
            $data=$req->fetch();

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

            $textToClient = "
                <h1>TACK FÖR DIN BOKNING!</h1>
                <h2>Nivå: {$level}</h2>
                <br>
                <strong>Plats: </strong>{$data['place']}<br>
                <strong>Datum: </strong>{$data['date']}<br>
                <strong>Pris: </strong>{$data['price']}kr<br><br>

                <strong>Förnamn: </strong>{$name}<br>
                <strong>Efternamn: </strong>{$sname}<br>
                <strong>Personmummer: </strong>{$persnmr}<br>
                <strong>Telefon: </strong>{$tel}<br>
                <strong>Email: </strong>{$email}<br>

                <strong>Firm: </strong>{$firm}<br>
                <strong>Övrigt: </strong>{$comment}<br><br>
                <strong>Boknings datum: </strong>{$bokdate}<br>
            ";

            $textToFirm = "
                <h1>EN NY BOKNING!</h1>
                <h2>Nivå: {$level}</h2>
                <br>
                <strong>Plats: </strong>{$data['place']}<br>
                <strong>Datum: </strong>{$data['date']}<br>
                <strong>Pris: </strong>{$data['price']}kr<br><br>

                <strong>Förnamn: </strong>{$name}<br>
                <strong>Efternamn: </strong>{$sname}<br>
                <strong>Personmummer: </strong>{$persnmr}<br>
                <strong>Telefon: </strong>{$tel}<br>
                <strong>Email: </strong>{$email}<br>

                <strong>Firm: </strong>{$firm}<br>
                <strong>Övrigt: </strong>{$comment}<br><br>
                <strong>Boknings datum: </strong>{$bokdate}<br>
            ";

            $info = "
                Nivå: {$level}
                
                Plats: {$data['place']}
                Datum: {$data['date']}
                Pris: {$data['price']}kr

                Förnamn: {$name}
                Efternamn: {$sname}
                Personmummer: {$persnmr}
                Telefon: {$tel}
                Email: {$email}

                Firm: {$firm}
                Övrigt: {$comment}
                Boknings datum: {$bokdate}
            ";
            if (mail($email, "Tack för din bokning!", $textToClient, $headers) && mail("pokskok@yandex.ru", "En ny bokning!", $textToFirm, $headers)) {
                $req = $db->prepare("INSERT INTO clients (name, persnmr, tel, level, place, price, date, bokdate, info) 
                                    VALUES ('$name $sname', '$persnmr', '$tel', '$level', '{$data['place']}', '{$data['price']}', '{$data['date']}', CURDATE(), '$info')");
                $req->execute();
                header ("location: ../../index.php?tack");
            }
            else {
                header ("location: ../../index.php?fel");
            }
        }
    }

    class admin_level {

        function level_all($level) {
            $sql = "SELECT * FROM {$level}_";
            $this->show_admin_level($sql, $level);
        }

        function sort($level, $sort) {
            $sql = "SELECT * FROM {$level}_ ORDER BY $sort";
            $this->show_admin_level($sql, $level);
        }

        function sort_desc($level, $sort) {
            $sql = "SELECT * FROM {$level}_ ORDER BY $sort DESC";
            $this->show_admin_level($sql, $level);
        }
        
        function show_admin_level($sql, $level) {
            include "conn.php";
            $req = $db->prepare($sql);
            $req->execute();

            // form to add new line
            echo "
                <form action='assets/php_assets/admin_add.php?level={$level}' method='post' class='tr form-add' id='form-add'>
                    <span class='td'><input name='date' type='date' required></span>
                    <span class='td'><input name='place' type='text' placeholder='Plats' required></span>
                    <span class='td'><input name='price' type='number' placeholder='Pris' required></span>
                    <span class='td'><button name='submit' type='submit' style='background:green'>ADD</button></span>
                </form>
                <br>
                <div class='tr'>
                    <span class='th th{$level}' id='sort-date'>DATUM <i id='caret-down-{$level}-date' class='fa fa-caret-down' aria-hidden='true'></i><i id='caret-up-{$level}-date' class='fa fa-caret-up' aria-hidden='true'></i></span>
                    <span class='th th{$level}' id='sort-place'>PLATS <i id='caret-down-{$level}-place' class='fa fa-caret-down' aria-hidden='true'></i><i id='caret-up-{$level}-place' class='fa fa-caret-up' aria-hidden='true'></i></span>
                    <span class='th th{$level}' id='sort-price'>PRIS <i id='caret-down-{$level}-price' class='fa fa-caret-down' aria-hidden='true'></i><i id='caret-up-{$level}-price' class='fa fa-caret-up' aria-hidden='true'></i></span>
                </div>";

            // 2 lines - info and form to change the info
            while ($data=$req->fetch()) {
                echo "
                <div class='tr'>
                    <span class='td'>{$data['date']}</span>
                    <span class='td'>{$data['place']}</span>
                    <span class='td'>{$data['price']}</span>
                    <span class='td'><button id='{$level}-{$data['id']}-btn-change' class='btn-change' style='background:yellow'>ÄNDRA</button></span>
                    <span class='td'><a href='assets/php_assets/admin_delete.php?level={$level}&id={$data['id']}'><button style='background:red'>TA BORT</button></a></span>
                </div>

                <form action='assets/php_assets/admin_save.php?level={$level}&id={$data['id']}' method='post' class='tr form-change' id='{$level}-{$data['id']}-form-change'>
                    <span class='td'><input name='date' type='date' value='{$data['date']}' required></span>
                    <span class='td'><input name='place' type='text' value='{$data['place']}' required></span>
                    <span class='td'><input name='price' type='number' value='{$data['price']}' required></span>
                    <span class='td'><input name='submit' type='submit' value='SAVE'></span>
                </form>";
            }
        }

        function save($level, $id, $date, $place, $price) {
            $sql = "UPDATE {$level}_ SET date = '$date', place = '$place', price = '$price' WHERE id = '$id'";
            $this->sql($sql, $level);
        }

        function delete($level, $id) {            
            $sql = "DELETE FROM {$level}_ WHERE id = '$id'";
            $this->sql($sql, $level);
        }

        function add($level, $date, $place, $price) {
            $sql = "INSERT INTO {$level}_ (date, place, price) VALUES ('$date', '$place', '$price')";
            $this->sql($sql, $level);
        }

        function sql($sql, $level) {
            include "conn.php";
            $req = $db->prepare($sql);
            $req->execute();
            header("location: ../../admin.php?level={$level}");
        }
    }

    class csv {

        function csv() {
            $name = "Oleg";
            $sname = "Lopes";
            $place = "Slussen";
            $FileName = $name."-".$sname."-".date("d-m-Y").".csv";
            header("Content-Type: application/csv");
            header("Content-Disposition: attachment; filename=$FileName");
            $content = "$name\n";
            $content .= "$sname\n";
            $content .= "$place\n";
            echo $content;
            exit();
        }
    }