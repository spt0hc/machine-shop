<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
  include $__ROOT_DIR.'css/admin/list-service-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/list-service.php';
};

$foots[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/admin/list-service-js.html';
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>