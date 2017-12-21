<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
  include $__ROOT_DIR.'css/list-promotional-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/partial/list-promotional.html';
};

$foots[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/list-promotional-js.php';
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>