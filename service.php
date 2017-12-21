<?php
$heads[] = function (){
    include 'css/new-products-style.html';
    include 'css/service-style.php';
};
$rd["content"] = function () {
    include 'layout/service.html';
    include  'layout/new-products.html';
};
$foots[] = function (){
    echo "<script>
            $(function() {
            //select pic large
                $('body').on('click','.service .other-pics > div img',function(){
                    $('.service .large-pic img').attr('src',this.src);
                });              
            });
        </script>";
    include 'js/service-detail-js.php';
}
?>
<?php include 'layout/customer-layout.php' ?>