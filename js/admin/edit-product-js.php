<script>

    app.controller("edit_pro", function ($scope, $http) {
     //   alert(1);


        <?php
            if(!isset($_GET["id"]) || empty($_GET["id"]))
                $d = -1;
            else
                $d = $_GET["id"];
        ?>

       new getList("admin", "get_product", "product",<?php echo $d?>).action= function (res) {
         CKEDITOR.instances["txtdes"].setData(res.data.des);
           $scope.price=res.data.price;
           $scope.price_off=res.data.price_off;
           $('.text-binding').on('input',function () {
               var tg = $(this).data('target');
               var pr = formatMoney($(this).val());
               $scope.$apply(function () {
                   $scope[tg] = pr;
               })
           });
            $scope.txtcat =res.data.category_id;
           getList("admin", "list_cats_sel", "cats");
       };

    });
</script>