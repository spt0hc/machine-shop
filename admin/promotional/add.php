<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
  //  include $__ROOT_DIR.'css/admin/add-service-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/add-promotional.php';
};

$foots[] = function (){

}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>