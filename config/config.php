<?php
//đọc tất cả các controller
$controllers = [];
foreach (glob("../controller/*.php") as $path) {
    $col_n = pathinfo($path)["filename"];
    $controllers[$col_n] = $path;

}

