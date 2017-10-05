<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://use.fontawesome.com/433d64420a.js"></script>
    <script src="assets/scripts/jquery-3.2.1.min.js"></script>
    <script src="assets/scripts/index-scripts.js"></script>
    <title>Document</title>
    <script>
        $(document).ready(function () {
            <?php // SHOW THE LIST YOU OPERATED WITH LAST
                if (isset($_GET['level']) && ($_GET['level']) > 0 && ($_GET['level']) < 4) {
                    echo "$('#level-'+{$_GET['level']}).show();";
                }
            ?> // SHOW THE LIST YOU OPERATED WITH LAST
        });
    </script>
    <style>
        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
            margin: 0;
            padding: 0;
        }

        .table {
            display: table;
            width: 800px;
        }

        .tr {
            display: table-row;
        }

        .td, .th {
            display: table-cell;
            width: 200px;
        }

        .th {
            font-weight: 600;
        }

        .form-boka, .form-change {
            display: none;
        }

        .level {
            display: none;
        }

        ul {
            list-style: none;
        }

        li {
            display: inline-block;
            cursor: pointer;
            padding-left: 100px;
        }

        button {
            width: 100px;
        }
    
    </style>
</head>
<body>
    <nav><ul>
        <li id="nav-level-1" class="nav-level">Level 1</li>
        <li id="nav-level-2" class="nav-level">Level 2</li>
        <li id="nav-level-3" class="nav-level">Level 3</li>
    </ul></nav>
    <!-- END OF NAVIGATION THROUGH LEVELS -->
    


    <!-- START OF LIST LEVEL 1 -->
    <section id="level-1" class="level">
        <div class="table">
            <div class='tr'>
                <span class='th' id='sort-date'>DATUM</span>
                <span class='th' id='sort-place'>PLATS</span>
                <span class='th' id='sort-price'>PRIS</span>
            </div>
            
            <div class='tr'>
                <span class='td'>2017-01-01</span>
                <span class='td'>Slussen</span>
                <span class='td'>10000</span>
                <span class='td'><button id='1-1-btn-show-form-boka' class='btn-boka'>Boka</button></span>
            </div>
            <form action='' method='post' class='tr form-boka' id='1-1-form-boka'>
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
                    <input name='comment' type="text" placeholder='Övrigt'>
                    <input name='submit' type='submit' value='BOKA'>
                </span>
            </form>
            
            <div class='tr'>
                <span class='td'>2018-01-01</span>
                <span class='td'>T-Centralen</span>
                <span class='td'>15000</span>
                <span class='td'><button id='1-2-btn-show-form-boka' class='btn-boka'>Boka</button></span>
            </div>
            <form action='assets/php_assets/sendmail.php?level=1&id=1' method='post' class='tr form-boka' id='1-2-form-boka'>
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
                    <input name='comment' type="text" placeholder='Övrigt'>
                    <input name='submit' type='submit' value='BOKA'>
                </span>
            </form>
        </div>
        <button id="showall1" class="showall">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 1 -->



    <!-- START OF LIST LEVEL 2 -->
    <section id="level-2" class="level">
        <div class="table">
            <div class='tr'>
                <span class='th' id='sort-date'>DATUM</span>
                <span class='th' id='sort-place'>PLATS</span>
                <span class='th' id='sort-price'>PRIS</span>
            </div>
            
            <div class='tr'>
                <span class='td'>2017-01-01</span>
                <span class='td'>Mörby</span>
                <span class='td'>10000</span>
                <span class='td'><button id='2-1-btn-show-form-boka' class='btn-boka'>Boka</button></span>
            </div>
            <form action='assets/php_assets/sendmail.php?level=1&id=1' method='post' class='tr form-boka' id='2-1-form-boka'>
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
                    <input name='comment' type="text" placeholder='Övrigt'>
                    <input name='submit' type='submit' value='BOKA'>
                </span>
            </form>
            
            <div class='tr'>
                <span class='td'>2018-01-01</span>
                <span class='td'>Ropsten</span>
                <span class='td'>15000</span>
                <span class='td'><button id='2-2-btn-show-form-boka' class='btn-boka'>Boka</button></span>
            </div>
            <form action='assets/php_assets/sendmail.php?level=1&id=1' method='post' class='tr form-boka' id='2-2-form-boka'>
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
                    <input name='comment' type="text" placeholder='Övrigt'>
                    <input name='submit' type='submit' value='BOKA'>
                </span>
            </form>
        </div>
        <button id="showall2" class="showall">Show all</button>
    </section>
    <!-- END OF LIST LEVEL 2 -->



    <!-- START OF LIST LEVEL 3 -->
    <section id="level-3" class="level">
        <div class="table">
            <div class='tr'>
                <span class='th' id='sort-date'>DATUM</span>
                <span class='th' id='sort-place'>PLATS</span>
                <span class='th' id='sort-price'>PRIS</span>
            </div>
            
            <div class='tr'>
                <span class='td'>2017-01-01</span>
                <span class='td'>Alvik</span>
                <span class='td'>10000</span>
                <span class='td'><button id='3-1-btn-show-form-boka' class='btn-boka'>Boka</button></span>
            </div>
            <form action='' method='post' class='tr form-boka' id='3-1-form-boka'>
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
                    <input name='comment' type="text" placeholder='Övrigt'>
                    <input name='submit' type='submit' value='BOKA'>
                </span>
            </form>
            
            <div class='tr'>
                <span class='td'>2018-01-01</span>
                <span class='td'>Akeshov</span>
                <span class='td'>15000</span>
                <span class='td'><button id='3-2-btn-show-form-boka' class='btn-boka'>Boka</button></span>
            </div>
            <form action='' method='post' class='tr form-boka' id='3-2-form-boka'>
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
                    <input name='comment' type="text" placeholder='Övrigt'>
                    <input name='submit' type='submit' value='BOKA'>
                </span>
            </form>
        </div>
        <button id="showall3" class="showall">Show all</button>
    </section>
</body>
</html>