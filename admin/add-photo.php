<?php

$id_popups[] =[
    "id"=>"choose-pic",
    "render"=>function(){
        global $__ROOT_DIR;
        include $__ROOT_DIR.'layout/admin/partial/choose-pic.php';
    }
];
$heads[] = function (){
    include '../css/admin/add-photo-style.html';
    include '../css/admin/image-manager-style.html';
};
$rd["content"] = function (){
    include '../layout/admin/add-photo.html';
};

$foots[] = function (){
   include '../js/admin/add-photo-js.php';
    include '../js/admin/pics-popup-js.php';
}
?>

<?php include '../layout/admin/admin-layout.php' ?>