<?php
$__ROOT_DIR = '../../';
$heads[] = function (){
    global $__ROOT_DIR;
  //  include $__ROOT_DIR.'css/admin/add-service-style.html';
};
$rd["content"] = function (){
    global $__ROOT_DIR;
    include $__ROOT_DIR.'layout/admin/add-accessory.php';
};

$foots[] = function (){
    echo "  <script>
                    $(function () {
                        $('.text-binding').on('input',function () {
                           var tg = $(this).data('target');
                           $('.'+tg).text(formatMoney($(this).val()));
                        });
                    });
                </script>";
}
?>

<?php include $__ROOT_DIR.'layout/admin/admin-layout.php' ?>