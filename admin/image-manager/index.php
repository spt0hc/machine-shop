<?php
$__ROOT_DIR = '../../';

$heads[] = function (){
    global $__ROOT_DIR;
   include $__ROOT_DIR.'css/admin/image-manager-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/image-manager.php';
};

$foots[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/admin/image-manager-js.php';

}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>