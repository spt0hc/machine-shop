<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
    //include $__ROOT_DIR.'css/admin/edit-product-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/edit-accessory.php';

};

$foots[] = function (){
    global $__ROOT_DIR;

    include $__ROOT_DIR.'js/admin/edit-accessory-js.php';
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>