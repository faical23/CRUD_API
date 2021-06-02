<?php
$dbhost ='localhost' ;
$dbname='reservation hotel';
$username = 'root';
$password = '';
$dsn = "mysql:host={$dbhost};dbname={$dbname}";
        try {
            $dbh = new PDO($dsn, $username, $password ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(Exception $e) {
             echo "Connection failed: " . $e->getMessage();
        }