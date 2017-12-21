<script>
    app.controller("service-details",function ($scope,$http) {
        new getList("home", "service", "service",<?php  if (isset($_GET["id"])) echo $_GET["id"]; else echo -1;?>).action = function (res) {

          //console.log(res.data);
            if(!$.isEmptyObject(res.data)) {
                res.data.warning = function () {
                    return '';
                };
                res.data.width_wrap = res.data.photos.length * (200 + 10);
                //    res.data.pri = res.data.price - res.data.price*res.data.price_off ;

                //  res.data.price = formatMoney(res.data.price);
                //res.data.pri = formatMoney(res.data.pri);
            }else {
                res.data.warning = function () {
                    return 'Sản phẩm không tồn tại !';
                };
            }
        };

    });
</script>