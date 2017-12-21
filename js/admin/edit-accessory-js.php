<script>

    app.controller("edit_accessory", function ($scope, $http) {
     //   alert(1);


        <?php
            if(!isset($_GET["id"]) || empty($_GET["id"]))
                $d = -1;
            else
                $d = $_GET["id"];
        ?>

       new getList("admin", "get_accessory", "accessory",<?php echo $d?>).action= function (res) {
          // console.log(res.data);
            CKEDITOR.instances["txtdes"].setData(res.data.des);
       };
        $(function () {
            $('.text-binding').on('input',function () {
                var tg = $(this).data('target');
                $('.'+tg).text(formatMoney($(this).val()));
            });
        });

    });
</script>