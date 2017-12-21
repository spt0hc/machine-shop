<?php
if (!isset($__ROOT_DIR)){
    $__ROOT_DIR = '../';
}
session_start();
if(isset($_SESSION["US_LOGIN"]) && !empty($_SESSION["US_LOGIN"])){
        header('Location: '.$__ROOT_DIR.'admin/');
}
//POPUP

//
$not_show_footer=true;
$heads[] = function (){
    echo "<style>
                body {
                background: #313332;
                }
        </style>";

    global $__ROOT_DIR;
    include $__ROOT_DIR.'css/admin/login-form-style.html';

};
$rd["body"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/partial/login-form.html';
};

$foots[] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'js/admin/submit-form-js.html';
}
?>

<?php include $__ROOT_DIR.'layout/main-layout.php' ?>