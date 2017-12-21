<script>

    app.controller("edit_service", function ($scope, $http) {

        <?php
        if(!isset($_GET["id"]) || empty($_GET["id"]))
            $d = -1;
        else
            $d = $_GET["id"];
        ?>

        new getList("admin", "get_service", "service",<?php echo $d?>).action= function (res) {
         
          $scope.price=res.data.price;
            $('.text-binding').on('input',function () {
                var tg = $(this).data('target');
                var pr = formatMoney($(this).val());
                $scope.$apply(function () {
                    $scope[tg] = pr;
                })
            });
             CKEDITOR.instances["txtdes"].setData(res.data.des);
        };



    });
</script>