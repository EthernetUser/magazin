<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=magazin_shop', 'root', '');
} catch(PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}