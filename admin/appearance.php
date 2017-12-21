<?php

$id_popups[] =[
    "id"=>"choose-pic",
    "render"=>function(){
        global $__ROOT_DIR;
        include $__ROOT_DIR.'layout/admin/partial/choose-pic.php';
    }
];
$heads[] = function (){
    include '../css/admin/image-manager-style.html';

};
$rd["content"] = function (){
    include '../layout/admin/appearance.php';
};

$foots[] = function (){
    include '../js/admin/pics-popup-js.php';
    include '../js/admin/appearance-js.php';
}
?>

<?php include '../layout/admin/admin-layout.php' ?>