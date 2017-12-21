<?php
function call_action($method)
{
    global  $col_name, $ac_name;
    if (empty($col_name) || empty($ac_name)) {
        return;
    }

    include 'config.php';

    if (isset($controllers[$col_name])) {//lấy controller từ request,
        include $controllers[$col_name];//nếu controller tồn tại thì include vào
        $col = new $col_name();//khởi tạo controller
       if (method_exists($col, $method . $ac_name)) {//kiểm tra action có tồn tại ko
            if (!isset($_REQUEST["par"]) || empty($_REQUEST["par"])) {
                $col->par = null;//giá trị mặc định của tham số request là null
            }
            else {
                $col->par = $_REQUEST["par"];//lưu lại tham số request
            }

           $col->{$method . $ac_name}();//thực thi action
        } else {
            echo 'Wrong Action';
        }
      //  echo $col_name ."-".$ac_name;

    }
}


//gọi ra controller và action tương ứng
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET["c"]) && isset($_GET["ac"])) {
        $col_name = $_GET["c"];
        $ac_name = $_GET["ac"];

        call_action("get_");
    }
} else {
    if (isset($_POST["c"]) && isset($_POST["ac"])) {
        $col_name = $_POST["c"];
        $ac_name = $_POST["ac"];

        call_action("post_");

    }
}