<?php
$heads[] = function (){
    include 'css/new-products-style.html';
};
$rd["content"] = function () {
?>
    <div style="margin-top: 10px;padding: 20px" class="soft-box">
        <p style="font-size:30px;text-align:center">Giới thiệu</p>
        <p ng-bind-html="shop_info.des | rawHtml"> </p>
    </div>

    <?php
    include  'layout/new-products.html';
};

?>
<?php include 'layout/customer-layout.php' ?>