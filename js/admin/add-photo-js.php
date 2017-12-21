<script>
    app.controller("add_photo",function ($scope,$http) {
        <?php
                $tb="product";
                if(isset($_GET["tb"]) && !empty($_GET["tb"])){
                    $tb=$_GET["tb"];
                }
                $id="-1";
                if(isset($_GET["id"]) && !empty($_GET["id"])){
                    $id=$_GET["id"];
                }
        ?>
       new getList("admin","get_list_photo",'photos',JSON.stringify({
            'tb':'<?php echo $tb ?>',
            'id':'<?php echo $id ?>'
        })).action = function (res) {
            $scope.context_id =   '<?php echo $id ?>';
            $scope.context_tb=   '<?php echo $tb ?>';
        };
    });
</script>