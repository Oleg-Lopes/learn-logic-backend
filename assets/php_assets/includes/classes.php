<?php
    class level {
        public function setName($name){$this->name=$name;}
        public function getName(){return $this->name;}
        public function setSName($sname){$this->sname=$sname;}
        public function getSName(){return $this->sname;}
        public function setPersnmr($persnmr){$this->persnmr=$persnmr;}
        public function getPersnmr(){return $this->persnmr;}
        public function setTel($tel){$this->tel=$tel;}
        public function getTel(){return $this->tel;}
        public function setEmail($email){$this->email=$email;}
        public function getEmail(){return $this->email;}
        public function setFirm($firm){$this->firm=$firm;}
        public function getFirm(){return $this->firm;}
        public function setComment($comment){$this->comment=$comment;}
        public function getComment(){return $this->comment;}

        function level_15($level) {
            include "conn.php";
            $req = $db->prepare("SELECT * FROM {$level}_ ORDER BY id DESC LIMIT 2");
            $req->execute();
            $this->show_level($req, $level);
        }
        
        function level_all($level) {
            include "conn.php";
            $req = $db->prepare("SELECT * FROM {$level}_ ORDER BY id DESC");
            $req->execute();
            $this->show_level($req, $level);
        }

        function show_level($req, $level) {
            while ($data=$req->fetch()) {
                echo "
                <div class='tr'>
                    <span class='td'>{$data['date']}</span>
                    <span class='td'>{$data['place']}</span>
                    <span class='td'>{$data['price']}</span>
                    <span class='td'><button id='{$data['id']}' class='boka' style='background:green'>Boka</button></span>
                </div>
                <form action='assets/php_assets/sendmail.php?level={$level}&id={$data['id']}' method='post' class='form tr' id='{$data['id']}form'>
                    <span class='td'><input name='name' type='text' placeholder='Förnamn*' required></span>
                    <span class='td'><input name='sname' type='text' placeholder='Efternan*' required></span>
                    <span class='td'><input name='persnmr' type='number' placeholder='yymmddnnnn*' required></span>
                    <span class='td'><input name='tel' type='number' placeholder='0123456789*' required></span>
                    <span class='td'><input name='email' type='email' placeholder='Email*' required></span>
                    <span class='td'><input name='firm' type='text' placeholder='Företag'></span>
                    <span class='td'><textarea name='comment' placeholder='Övrigt'></textarea></span>
                    <span class='td'><input name='submit' type='submit' value='BOKA'></span>
                </form>";
            }
        }

        function boka($level, $id) {
            $name = $this->getName();
            $sname = $this->getSName();
            $persnmr = $this->getPersnmr();
            $tel = $this->getTel();
            $email = $this->getEmail();
            $firm = $this->getFirm();
            $comment = $this->getComment();

            include "includes/conn.php";
            $req = $db->prepare("SELECT * FROM {$level}_ WHERE id = '{$id}' ORDER BY id DESC");
            $req->execute();
            $data=$req->fetch();

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

            $textToClient = "
                <h1>Nivå: {$level}</h1>
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
                <strong>Övrigt: </strong>{$comment}<br>
            ";

            $textToFirm = "
                <h1>Nivå: {$level}</h1>
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
                <strong>Övrigt: </strong>{$comment}<br>
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
            ";
            /*if (mail($email, "Tack för bokning!", $textToClient, $headers) && mail("pokskok@yandex.ru", "En ny bokning!", $textToFirm, $headers)) {
            */    $req = $db->prepare("INSERT INTO clients (name, persnmr, level, place, ddate, info) VALUES ('$name $sname', '$persnmr', '$level', '{$data['place']}', '".date('Y-m-d')."', '$info')");
                $req->execute();
                header ("location: ../../index.php?tack");
            /*}
            else {
                header ("location: ../../index.php?fel");
            }*/
        }
    }

    class admin_level {
        public function setDate($date){$this->date=$date;}
        public function getDate(){return $this->date;}
        public function setPlace($place){$this->place=$place;}
        public function getPlace(){return $this->place;}
        public function setPrice($price){$this->price=$price;}
        public function getPrice(){return $this->price;}

        function level_all($level) {
            include "conn.php";
            $req = $db->prepare("SELECT * FROM {$level}_");
            $req->execute();

            echo "
                <form action='assets/php_assets/admin_add.php?level={$level}' method='post' class='formAdd tr' id='formAdd'>
                    <span class='td'><input name='date' type='date' required></span>
                    <span class='td'><input name='place' type='text' placeholder='Plats' required></span>
                    <span class='td'><input name='price' type='number' placeholder='Pris' required></span>
                    <span class='td'><input name='submit' type='submit' value='ADD'></span>
                </form>
            ";

            while ($data=$req->fetch()) {
                echo "
                <div class='tr'>
                    <span class='td'>{$data['date']}</span>
                    <span class='td'>{$data['place']}</span>
                    <span class='td'>{$data['price']}</span>
                    <span class='td'><button id='{$level}_{$data['id']}' class='change'>ÄNDRA</button></span>
                    <span class='td'><a href='assets/php_assets/admin_delete.php?level={$level}&id={$data['id']}'><button>TA BORT</button></a></span>
                </div>

                <form action='assets/php_assets/admin_save.php?level={$level}&id={$data['id']}' method='post' class='form tr' id='{$level}_{$data['id']}form'>
                    <span class='td'><input name='date' type='date' value='{$data['date']}' required></span>
                    <span class='td'><input name='place' type='text' value='{$data['place']}' required></span>
                    <span class='td'><input name='price' type='number' value='{$data['price']}' required></span>
                    <span class='td'><input name='submit' type='submit' value='SAVE'></span>
                </form>";
            }
        }

        function save($level, $id) {
            include "conn.php";
            $date = $this->getDate();
            $place = $this->getPlace();
            $price = $this->getPrice();
            
            $req = $db->prepare("UPDATE {$level}_ SET date = '$date', place = '$place', price = '$price' WHERE id = $id");
            $req->execute();

            header("location: ../../admin.php?level={$level}");
        }

        function delete($level, $id) {
            include "conn.php";
            
            $req = $db->prepare("DELETE FROM {$level}_ WHERE id = $id");
            $req->execute();

            header("location: ../../admin.php?level={$level}");

        }

        function add($level) {
            include "conn.php";
            $date = $this->getDate();
            $place = $this->getPlace();
            $price = $this->getPrice();
            
            $req = $db->prepare("INSERT INTO {$level}_ (date, place, price) VALUES ('{$date}', '{$place}', '{$price}')");
            $req->execute();

            header("location: ../../admin.php?level={$level}");

        }
    }