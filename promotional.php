<?php
session_start();

$heads[] = function (){
    echo "<style>
   .list-promotional{
        margin-top: 10px;
        border-top: 1px solid rgba(128, 128, 128, 0.43);
        padding: 5px;
    }



    .list-promotional > .about > p {
        font-size: 35px;
        width: 260px;
        margin: 0 auto;
        text-align: center;
        color:#ff4040;
    }
    </style>";
   include 'css/list-promotional-style.html';
};
$rd["content"] = function (){
    echo '<div class="list-promotional" >
            <div class="about"><P>Thông tin khuyến mãi</P></div>';
            include 'layout/partial/list-promotional.html';
    echo '</div>';
};

$foots[] = function (){
    include 'js/list-promotional-js.php';
}
?>

<?php include 'layout/customer-layout.php' ?>