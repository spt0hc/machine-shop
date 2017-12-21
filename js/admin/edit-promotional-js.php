<script>

    app.controller("edit-promotional", function ($scope, $http) {
     //   alert(1);


        <?php
            if(!isset($_GET["id"]) || empty($_GET["id"]))
                $d = -1;
            else
                $d = $_GET["id"];
        ?>

       new getList("admin", "get_promotional", "promotional",<?php echo $d?>).action= function (res) {
          // console.log(res.data);
            CKEDITOR.instances["txtdes"].setData(res.data.des);
       };
    });
</script>