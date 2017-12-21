<?php

$heads[] = function () {
    include '../css/admin/index-style.html';
};
$rd["content"] = function () {
    include '../layout/admin/index.php';
};

$foots[] = function () {
    include '../js/admin/page-info.php';
    echo "<script>
            $(function() {
                   height_per_width({x:1,y:1},$('.total-access-user'),true);
                   height_per_width({x:1,y:1},$('.total-customer-order'),true);
            });
           </script>";
}
?>

<?php include '../layout/admin/admin-layout.php' ?>