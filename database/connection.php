<?php
$dbname ="machine-shop";
$user ="root";
$pass ="";
try {
    $db = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
    $db->exec("set names utf8");
} catch (PDOException $e) {

    echo $e->getMessage();
    exit();
}