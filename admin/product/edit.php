<?php
$__ROOT_DIR = '../../';
$id_popups[] =[
    "id"=>"choose-pic",
    "render"=>function(){
        global $__ROOT_DIR;
        include $__ROOT_DIR.'layout/admin/partial/choose-pic.php';
    }
];
$heads[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'css/admin/image-manager-style.html';

};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/edit-product.php';

};

$foots[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/admin/pics-popup-js.php';
    include $__ROOT_DIR.'js/admin/edit-product-js.php';
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>