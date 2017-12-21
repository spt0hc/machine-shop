<?php
require_once '../_autoload.php';
$config = new config\ControllerConfiguration("../");
//gọi ra controller và action tương ứng
$c = isset($_REQUEST["c"]) ? $_REQUEST["c"] : null;
$ac = isset($_REQUEST["ac"]) ? $_REQUEST["ac"] : null;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $config->get($c, $ac);
} else {
    $config->post($c, $ac);
}