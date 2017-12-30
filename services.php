<?php
$heads[] = function (){
    include 'css/list-services-style.html';
};
$rd["content"] = function (){
    include 'layout/list-services.html';
};
$foots[] = function (){
    include 'js/list-services-js.php';
}
?>

<?php include 'layout/customer-layout.php' ?>