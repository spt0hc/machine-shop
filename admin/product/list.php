<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'css/admin/list-product-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/list-product.php';
};

$foots[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/admin/list-product-js.html';
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>