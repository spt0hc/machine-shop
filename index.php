<?php
$heads[] = function (){
    include 'css/new-products-style.html';
    include 'css/list-products-style.html';
};
$rd["content"] = function (){
    include 'layout/main-content.php';
};

$foots[] = function (){
   include 'js/list-product-js.php';
}
?>

<?php include 'layout/customer-layout.php' ?>