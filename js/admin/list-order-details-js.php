<script>
    app.controller("list-order-details", function ($scope, $http) {


        $scope.formatMoney = function(x){
            return formatMoney(x);
        };
        <?php
            if(isset($_GET["order_id"]) && !empty($_GET["order_id"]) && is_numeric($_GET["order_id"]))
                $order_id = $_GET["order_id"];
            else
                $order_id = -1;
        ?>

        function getOrders(order_id) {
            new getList("admin", "get_list_order_details", "list_order_details", order_id).action = function (res) {
                    //console.log(res.data)
            };
        }
        getOrders('<?php echo $order_id ?>');

    });

</script>