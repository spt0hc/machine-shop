<?php
if (!isset($__ROOT_DIR)){
    $__ROOT_DIR = '../';
}
session_start();
if(!isset($_SESSION["US_LOGIN"]) || empty($_SESSION["US_LOGIN"])){
        header('Location: '.$__ROOT_DIR.'admin/login.php');
}

/*$id_popups[] =[
    "id"=>"shop-cart",
    "render"=>function(){
        include 'layout/shopping-cart.html';
    }
];*/
$heads[] = function () {
    echo '<script src="admin/ckeditor/ckeditor.js"></script>';

    global $__ROOT_DIR;
    include $__ROOT_DIR.'css/admin/header-menu-style.html';
    include $__ROOT_DIR.'css/admin/admin-container-style.html';
    include $__ROOT_DIR.'css/admin/controls-menu-style.html';

};
$rd["body"] = function () {
    global $__ROOT_DIR;
    echo '<div ng-controller="admin">';
    include $__ROOT_DIR.'layout/admin/partial/header-menu.php';
    include $__ROOT_DIR.'layout/admin/admin-container.php';
    echo '</div>';
};
$foots[] = function () {
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/admin/admin-layout-js.php';
    include $__ROOT_DIR.'js/admin/controls-menu-js.html';
};
?>


<?php
include $__ROOT_DIR . 'layout/main-layout.php';
?>
