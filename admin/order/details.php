<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'css/admin/list-order-details-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/order-details.php';
};

$foots[] = function (){
    global $__ROOT_DIR;
   include $__ROOT_DIR.'js/admin/list-order-details-js.php';
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>