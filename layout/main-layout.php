<?php

include $__ROOT_DIR . 'web-config.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<!-- Head -->
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111323016-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-111323016-1');
    </script>

     <!--SEO-->
    <meta name="description" content="Với 10 năm kinh nghiệm trong ngành cơ điện lạnh, ĐIỆN LẠNH THÚC TUYỀN đã cung cấp hầu hết dịch vụ vệ sinh , sữa chữa , tháo lắp , thay phụ kiện máy lạnh , đồ điện lạnh gia dụng cho các hộ gia đình, tòa nhà, văn phòng công ty … Cụ thể hóa bằng việc sữa chữa , lắp đặt theo yêu cầu của quý khách hàng với mức giá rẻ và có thời hạn bảo hành dài hạn. ĐIỆN LẠNH THÚC TUYỀN chuyên cung cấp: 

- Thiết kế - Thi công

- Lắp đặt - Bảo trì

- Hệ thống lạnh dân dụng

- Hỗ trợ tư vấn">
    <meta name="Abstract" content="Dịch vụ sửa chữ">
    <meta name="Author" content="Dịch vụ sửa chữa">
    <?php
      $keywords='điện lạnh,điện lạnh mộng tuyền,máy lạnh,máy lạnh mộng tuyền,dịch vụ,dịch vụ mộng tuyền,sửa chữa,sửa chữa mộng tuyền,khuyến mãi,điện máy lạnh khuyến mãi,điện máy lạnh,điện máy lạnh mộng tuyền';
      $keywords .=",".removeUnicode($keywords);
    ?>
    <meta name="keywords" content="<?php echo $keywords?>">
    <!--end SEO-->

    <link id="favicon" rel="shortcut icon" href="/favicon.ico">
    <title>Shop điện lạnh</title>
    <!-- Meta-Tags -->
    <base href="<?php echo __ROOT_URI?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- //Meta-Tags -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
    <!-- Bootstrap-CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- //Custom-StyleSheet-Links -->

    <!-- Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Serif:400,700" type="text/css" media="all">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css" media="all">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500" type="text/css"
          media="all">
    <!-- //Fonts -->

    <!-- Font-Awesome-File-Links -->
    <!-- TTF -->
    <link rel="stylesheet" href="css/lib/fonts/fontawesome-webfont.ttf" type="text/css" media="all">

    <?php
    foreach ($heads as $vl) {
        $vl();
    }
    ?>
    <script>
        function formatMoney(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
    </script>
</head>
<!-- //Head -->


<!-- Body -->


<body ng-app="myweb">
<?php
if (isset($id_popups)) {
    foreach ($id_popups as $vl) {
       include $__ROOT_DIR . 'layout/popups.php';
    }
}
?>
<?php
render("body");
?>



<?php
if (!isset($not_show_footer) || $not_show_footer == false)
    include $__ROOT_DIR . 'layout/footer.html';
?>

<!-- Default-JavaScript -->
<script src="js/lib/jquery-2.2.3.js"></script>
<!-- Default-JavaScript -->
<script src="js/lib/jquery.cookie.js"></script>
<script src="js/lib/bootstrap.min.js"></script>
<!-- Default-JavaScript -->
<script src="js/lib/angularjs.min.js"></script>
<script>
    $(function () {
        $('.btn-popup').click(function () {
            var tg = $(this).data('target');
            $('#' + tg).fadeToggle();
            $('.btn-popup').data('current-click',$(this).data('this'));

        });
        $('.popup .close-s').click(function () {
            $('.popup').fadeOut();
        });
    });

    function h_per_w(per, ob, is_lineheight) {

        var width = ob.width();
        var height = per.y * width / (per.x * 1.0);
        if (typeof is_lineheight !== "undefined") {
            if (is_lineheight) {
                ob.css({
                    'line-height': height + 'px'
                });
            }
        }
        ob.css({
            'height': height + 'px'
        });
    }

    function height_per_width(per, ob, is_lineheight) {

        h_per_w(per, ob, is_lineheight);

        $(window).resize(function () {
            h_per_w(per, ob, is_lineheight);
        });
    }

    function getRequest(controller, action) {
        return 'config/request.php?c=' + controller + '&ac=' + action;
    }
    function getPostRequest(controller, action,par) {
        return "c="+controller+"&ac="+action+"&"+par;
    }
</script>
<script>
    var app = angular.module("myweb", []);

</script>
<?php
$c = count($foots) - 1;
foreach ($foots as $k=>$vl) {
    $foots[$c - $k ]();
}
?>

</body>