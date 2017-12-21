<?php
session_start();

$heads[] = function (){
    echo "<style>
   .list-accessary {
        margin-top: 10px;
        border-top: 1px solid rgba(128, 128, 128, 0.43);
        padding: 5px;
    }



    .list-accessary > .about > p {
        font-size: 35px;
        width: 32%;
        margin: 0 auto;
        text-align: center;
        color:#ff4040;
    }
    </style>";
    include 'css/list-accessary-style.html';
};
$rd["content"] = function (){
    echo '<div class="list-accessary" >
            <div class="about"><P>Bảng báo giá sửa chữa, thay thế phụ tùng linh kiện chính hãng</P></div>';
            include 'layout/partial/list-accessary.html';
    echo '</div>';
};

$foots[] = function (){
    include 'js/list-accessary-js.php';
}
?>

<?php include 'layout/customer-layout.php' ?>