<?php
    $server = 'localhost';
    $database = 'learnlogic';
    $username = 'root';
    $password = '';
    try{
        $db = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);
        }
    catch(exception $e){
        die("ERROR : ".$e->getMessage());
    }