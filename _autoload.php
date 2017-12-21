<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/20/2017
 * Time: 9:40 PM
 */
function __autoload($classname)
{
    $root = $_SERVER["DOCUMENT_ROOT"]."/machine-shop";
    $class = str_replace("\\", "/", $classname);
    $filename = "$root/$class.php";
    include_once($filename);
}