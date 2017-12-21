<script>
    app.controller("product-details", function ($scope, $http) {
        $scope.check_off =  function (price_off) {
            if(price_off > 0){
                return 'Sale off '+price_off + "%";
            }
        }
        new getList("home", "product", "product",<?php if (isset($_GET["id"])) echo $_GET["id"]; else echo -1;?>).action = function (res) {
           // alert(res.data)

            if (!$.isEmptyObject(res.data)) {
                res.data.warning = function () {
                    return '';
                };
                res.data.width_wrap = res.data.photos.length * (200 + 10);

                res.data.pri = res.data.price - res.data.price * (res.data.price_off/100);

                res.data.price = formatMoney(res.data.price);
                res.data.pri = formatMoney(res.data.pri);
            } else {
                res.data.warning = function () {
                        return 'Sản phẩm không tồn tại !';
                    };

            }
        };

    });
</script>
