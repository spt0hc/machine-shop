<?php
include 'config.php';
try {
    $db = new PDO("mysql:host=localhost;dbname=lfbxgfjhosting_machine_shop", "lfbxgfjhosting_hanhnguyen", "Space0time0db");
    $db->exec("set names utf8");
} catch (PDOException $e) {

    echo $e->getMessage();
    exit();
}