<?php
$heads[] = function (){
    include 'css/new-products-style.html';
    include 'css/list-search-style.html';
};
$rd["content"] = function (){
    include 'layout/list-search.html';
    include 'layout/new-products.html';
};
$foots[] = function (){
    include 'js/list-search-js.php';
}
?>

<?php include 'layout/customer-layout.php' ?>