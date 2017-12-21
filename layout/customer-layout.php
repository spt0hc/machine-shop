<?php
$__ROOT_DIR='';
$id_popups[] =[
    "id"=>"shop-cart",
    "render"=>function(){
        include 'layout/shopping-cart.html';
    }
];
$heads[] = function () {
    include 'css/header-style.php';
    include 'css/header-menu-style.php';
    include 'css/header-slider-style.php';
    include 'fullscreen-drag-slider-with-parallax/css/style.php';
    include 'css/service-collection-style.php';
    include 'css/shopping-cart-style.html';
    include 'css/product-item-style.html';
   include 'js/render-product-js.php';
    //scroll top
    echo "
    <style>
    .scroll-top {
        position:fixed;
        bottom: 10px;
        right: 10px;
        z-index: 9999;
        background: #39c;
        width:40px;
        height:40px;
        color:#fff;
        text-align: center;
        line-height: 40px;
        font-size:20px;
        border-radius:100%;
        cursor: pointer;
    }
    </style>
    ";
};
$rd["body"] = function () {
    echo '<div ng-controller="customer">';
    include 'layout/scroll-top.html';
    include 'layout/header.php';
    include 'layout/header-menu.html';
    include 'layout/header-slider.html';
    include 'layout/service-collection.php';
    render("content");
    echo '</div>';
};
$foots[] = function () {
    include 'js/drop-menu-js.html';
    include 'js/customer-layout-js.php';
    include 'js/header-slider-js.html';
    echo "<script>
            $(function() {
                $(window).scroll(function(e) {
                    if( $(window).scrollTop() > 0) {
                        $(\".scroll-top\").fadeIn();
                    }else {
                        $(\".scroll-top\").fadeOut();
                    }
                });
                $(\".scroll-top\").click(function() {
                  $(\"html, body\").animate({ scrollTop: 0 }, \"slow\");
                  return false;
                });  
                //
             //   console.log($('.service-collection .service-item'))
                  height_per_width({x:1,y:1},$('.service-collection .service-item'));
                  height_per_width({x:1,y:1},$('.product-item .thumbnail'));
                  
            });
         </script>";

};
?>


<?php
include 'layout/main-layout.php';
?>
