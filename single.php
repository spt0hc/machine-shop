<?php
$heads[] = function (){
    include 'css/new-products-style.html';
    include 'css/product-details-style.html';
};
$rd["content"] = function (){
    include 'layout/single-content.php';
};
$foots[] = function (){
    echo "<script>
            $(function() {
              height_per_width({x:1,y:1},$('.product-details .large-pic'));
            //select pic large
                $('body').on('click','.product-details .other-pics > div img',function(){
                    $('.product-details .large-pic img').attr('src',this.src);
                });              
            });
        </script>";

    include 'js/product-detail-js.php';
}
?>
<?php include 'layout/customer-layout.php' ?>