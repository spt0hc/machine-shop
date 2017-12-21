<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
  include $__ROOT_DIR.'css/admin/list-cat-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/list-cat.php';
};

$foots[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/admin/list-cat-js.html';
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>