<?php
include 'controller.php';

class admin extends controller
{
    public function get_exit()
    {
        session_start();
        if (isset($_SESSION["US_LOGIN"])) {
            unset($_SESSION["US_LOGIN"]);
        }
        header('Location: ../admin/');
    }

    public function get_user_info()
    {
        session_start();
        $user = $this->DB["user"]->get_by_mail($_SESSION["US_LOGIN"]["mail"]);
        echo json_encode($user);
    }

    public function post_login()
    {

        if ($_POST["txt_mail"] == null || $_POST["txt_pass"] == null) {
            echo $this->getResult(false, 'Dữ liêu trống');
        } else {
            $user = $this->DB["user"]->get_by_mail($_POST["txt_mail"]);
            /*  echo '<pre>';
              print_r($pars->txt_mail);
              echo '</pre>';*/
            if ($user === '') {
                echo $this->getResult(false, 'Tên đăng nhập sai');
            } else {
                if ($user["pass"] == md5($_POST["txt_pass"])) {
                    session_start();
                    $_SESSION["US_LOGIN"] = [
                        "mail" => $_POST["txt_mail"],
                        "id" => $user["id"],
                    ];
                    echo $this->getResult(true, 'Thành công');
                } else {
                    echo $this->getResult(false, 'Mật khẩu sai');
                }
            }
        }
    }

    public function post_reset_pass()
    {
/*
        if ($_POST["txt_mail"] == null) {
            echo $this->getResult(false, 'Dữ liêu trống');
        } else {
            $user = $this->DB["user"]->get_by_mail($_POST["txt_mail"]);

            if ($user === '') {
                echo $this->getResult(false, 'Mail này không tồn tại');
            } else {
                $token = $this->randomStr();
                session_start();
                $_SESSION["token"] = $token;
                $reset_link = __ROOT_URI . __ROOT_DIR . "/admin/config/request.php?c=admin&c=create_new_pass&token=$token&mail=" . $_POST["txt_mail"];

                include '../phpmailer/PHPMailerAutoload.php';
                $mail = new PHPMailer();
             $mail->isSMTP();
                $mail->SMTPAuth =true;
                $mail->SMTPSecure='ssl';
                $mail->Host='smtp.gmail.com';
                $mail->Port='465';

                $mail->isHTML(true);
                $mail->Username='phucsang0utb@gmail.com';
                $mail->Password='Space0time0newUtb';
                $mail->setFrom('phucsang0utb@gmail.com');
                $mail->Subject = "Tạo mới mật khẩu";
                $mail->Body = "Để tạo mới mật khẩu vui lòng vào link này: $reset_link";
                $mail->addAddress($_POST["txt_mail"]);

                if($mail->send()){

                }else {
                    echo  $mail->ErrorInfo;


                }
            }
        }*/
    }
    public function get_create_new_pass() {
        /*    if($this->is_exist($_GET["token"]) && $this->is_exist($_GET["mail"])){
                session_start();
                if(!$this->is_exist( $_SESSION["token"] )) {
                    echo 'Link này đã hết hạn !';
                }else {
                    $user = $this->DB["user"]->get_by_mail($_GET["txt_mail"]);
                    if($user === ''){

                    }else {
                        $new_pass =substr( $this->randomStr(),0,5);
                        $new_pass = md5($new_pass);
                        $this->DB["user"]->update($user["id"],[
                            "pass"=>$new_pass
                        ]);
                        echo 'Mật khẩu mới là : '.$new_pass;
                    }
                }
            }*/
    }

    //
    public function get_get_page_info()
    {
        if ($this->checkAuthor()) {
            function getServerMemoryUsage($getPercentage = true)
            {
                $memoryTotal = null;
                $memoryFree = null;

                if (stristr(PHP_OS, "win")) {
                    // Get total physical memory (this is in bytes)
                    $cmd = "wmic ComputerSystem get TotalPhysicalMemory";
                    @exec($cmd, $outputTotalPhysicalMemory);

                    // Get free physical memory (this is in kibibytes!)
                    $cmd = "wmic OS get FreePhysicalMemory";
                    @exec($cmd, $outputFreePhysicalMemory);

                    if ($outputTotalPhysicalMemory && $outputFreePhysicalMemory) {
                        // Find total value
                        foreach ($outputTotalPhysicalMemory as $line) {
                            if ($line && preg_match("/^[0-9]+\$/", $line)) {
                                $memoryTotal = $line;
                                break;
                            }
                        }

                        // Find free value
                        foreach ($outputFreePhysicalMemory as $line) {
                            if ($line && preg_match("/^[0-9]+\$/", $line)) {
                                $memoryFree = $line;
                                $memoryFree *= 1024;  // convert from kibibytes to bytes
                                break;
                            }
                        }
                    }
                } else {
                    if (is_readable("/proc/meminfo")) {
                        $stats = @file_get_contents("/proc/meminfo");

                        if ($stats !== false) {
                            // Separate lines
                            $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
                            $stats = explode("\n", $stats);

                            // Separate values and find correct lines for total and free mem
                            foreach ($stats as $statLine) {
                                $statLineData = explode(":", trim($statLine));

                                //
                                // Extract size (TODO: It seems that (at least) the two values for total and free memory have the unit "kB" always. Is this correct?
                                //

                                // Total memory
                                if (count($statLineData) == 2 && trim($statLineData[0]) == "MemTotal") {
                                    $memoryTotal = trim($statLineData[1]);
                                    $memoryTotal = explode(" ", $memoryTotal);
                                    $memoryTotal = $memoryTotal[0];
                                    $memoryTotal *= 1024;  // convert from kibibytes to bytes
                                }

                                // Free memory
                                if (count($statLineData) == 2 && trim($statLineData[0]) == "MemFree") {
                                    $memoryFree = trim($statLineData[1]);
                                    $memoryFree = explode(" ", $memoryFree);
                                    $memoryFree = $memoryFree[0];
                                    $memoryFree *= 1024;  // convert from kibibytes to bytes
                                }
                            }
                        }
                    }
                }

                if (is_null($memoryTotal) || is_null($memoryFree)) {
                    return null;
                } else {
                    if ($getPercentage) {
                        return (100 - ($memoryFree * 100 / $memoryTotal));
                    } else {
                        return array(
                            "total" => $memoryTotal,
                            "free" => $memoryFree,
                        );
                    }
                }
            }

            //ram
            $RAM = getServerMemoryUsage(false);
            $RAM = [
                "total" => ($RAM["total"] / 1024) / 1024,
                "free" => ($RAM["free"] / 1024) / 1024,
                "unit" => "MB",
            ];
            $RAM["per_used"] = round((($RAM["total"] - $RAM["free"]) / $RAM["total"]) * 100);
            //disk
            $DISK = [
                "total" => ((disk_total_space("/") / 1024) / 1024) / 1024,
                "free" => ((disk_free_space("/") / 1024) / 1024) / 1024,
                'unit' => "GB",
            ];
            $DISK["per_used"] = round((($DISK["total"] - $DISK["free"]) / $DISK["total"]) * 100);
            //order count
            $order_count = count($this->DB["order"]->gets_all());
            //counter
            $accs=$this->DB["count_access"]->gets_all();
            $counter=0;
            foreach ($accs as $acc){
                $counter +=$acc["count"];
            }

            echo json_encode([
                "DISK" => $DISK,
                "RAM" => $RAM,
                "ORDER_COUNTER" => $order_count,
                "ACCESS_COUNTER" => $counter,
            ]);
        }
    }

    public function get_list_products()
    {
        if ($this->checkAuthor()) {
            $page = $this->par;
            $row = 10;
            $list = $this->DB["product"]->gets_page_all($page, $row);
            foreach ($list as $k => $item) {
                $list[$k]["category"] = $this->DB["category"]->get_all($item["category_id"])["name"];
            }
            echo json_encode([
                "list" => $list,
                "cur_page" => $page,
                "total_page" => ceil(count($this->DB["product"]->gets_all()) / $row)
            ]);
        }
    }

    public function get_get_list_order()
    {
        if ($this->checkAuthor()) {
            $page = $this->par;
            $row = 10;
            $list = $this->DB["order"]->gets_page_all($page, $row);
            echo json_encode([
                "list" => $list,
                "cur_page" => $page,
                "total_page" => ceil(count($this->DB["order"]->gets_all()) / $row)
            ]);
        }
    }

    public function get_get_list_order_details()
    {
        if ($this->checkAuthor()) {
            $order_id = $this->par;
            $order = $this->DB["order"]->get_all($order_id);
            if (!empty($order_id)) {
                $total_cost = $order["total_cost"];
                $list = $this->DB["order_detail"]->gets_by_order($order_id);
                /* echo '<pre>';
                 print_r($list);
                 echo '</pre>';*/
                foreach ($list as $k => $item) {
                    $pr = $this->DB["product"]->get_all($item["product_id"]);
                    $list[$k]["product_name"] = $pr["name"];
                    $list[$k]["product_thumbnail"] = $pr["thumbnail"];
                }
                echo json_encode([
                    "list" => $list,
                    "total_cost" => $total_cost,
                ]);
            } else {
                echo json_encode([]);
            }
        }
    }

    public function get_set_active_product()
    {
        if ($this->checkAuthor()) {
            $par = json_decode($this->par);
            $rs = $this->DB["product"]->update($par->id, [
                "is_active" => $par->ac
            ]);
            //  echo $rs ."-". $par->ac;
            if ($rs != 0) {
                $this->getResult(true, '');
            } else {
                $this->getResult(false, '');
            }
        }
    }

    public function get_list_cats_sel()
    {
        if ($this->checkAuthor())
            echo json_encode($this->DB["category"]->gets_all());
    }

    public function get_list_cats()
    {
        if ($this->checkAuthor()) {
            $page = $this->par;
            $row = 10;
            $list = $this->DB["category"]->gets_page_all($page, $row);

            echo json_encode([
                "list" => $list,
                "cur_page" => $page,
                "total_page" => ceil(count($this->DB["category"]->gets_all()) / $row)
            ]);
        }
    }

    public function get_list_services()
    {
        if ($this->checkAuthor()) {
            $page = $this->par;
            $row = 10;
            $list = $this->DB["service"]->gets_page_all($page, $row);
            echo json_encode([
                "list" => $list,
                "cur_page" => $page,
                "total_page" => ceil(count($this->DB["service"]->gets_all()) / $row)
            ]);
        }
    }

    public function get_set_active_service()
    {
        if ($this->checkAuthor()) {
            $par = json_decode($this->par);
            $rs = $this->DB["service"]->update($par->id, [
                "is_active" => $par->ac
            ]);
            //  echo $rs ."-". $par->ac;
            if ($rs != 0) {
                $this->getResult(true, '');
            } else {
                $this->getResult(false, '');
            }
        }
    }

    //Remove Product
    public function post_del_product()
    {
        if ($this->checkAuthor()) {

            if ($_POST["id"] == "" || !is_numeric($_POST["id"])) {
                echo $this->getResult(false, "Thất bại");
                return;
            }
            $rs = $this->DB['product']->remove($_POST["id"]);
            if ($rs == 0) {
                echo $this->getResult(false, "Thất bại" . $rs);
                return;
            }
            echo $this->getResult(true, "Thành công");

        }
    }

    public function post_del_cat()
    {
        if ($this->checkAuthor()) {

            if ($_POST["id"] == "" || !is_numeric($_POST["id"])) {
                echo $this->getResult(false, "Thất bại");
                return;
            }
            $rs = $this->DB['category']->remove($_POST["id"]);
            if ($rs == 0) {
                echo $this->getResult(false, "Thất bại" . $rs);
                return;
            }
            echo $this->getResult(true, "Thành công");

        }
    }

    public function post_del_service()
    {
        if ($this->checkAuthor()) {

            if ($_POST["id"] == "" || !is_numeric($_POST["id"])) {
                echo $this->getResult(false, "Thất bại");
                return;
            }
            $rs = $this->DB['service']->remove($_POST["id"]);
            if ($rs == 0) {
                echo $this->getResult(false, "Thất bại" . $rs);
                return;
            }
            echo $this->getResult(true, "Thành công");
        }
    }

    //
    public function post_add_product()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }
            if (empty($_POST["txtthumbnail"])) {
                echo $this->getResult(false, 'Chưa chọn hình');
                return;
            }
            $cat = $this->DB["category"]->get_all($_POST["txtcat"]);
            if (empty($cat)) {
                echo $this->getResult(false, 'Loại không hợp lệ');
                return;
            }
            $rs = $this->DB["product"]->add([
                "name" => $_POST["txtname"],
                "des" => $_POST["txtdes"],
                "price" => $_POST["txtprice"],
                "price_off" => $_POST["txtprice_off"],
                "thumbnail" => $_POST["txtthumbnail"],
                "category_id" => $_POST["txtcat"],
                "model" => $_POST["txtmodel"],
                "made_in" => $_POST["txtmade_in"],
                "tag" => $this->normal_for_url($_POST["txtname"]),
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }
    }

    public function post_add_service()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }
            if (empty($_POST["txtthumbnail"])) {
                echo $this->getResult(false, 'Chưa chọn hình');
                return;
            }

            $rs = $this->DB["service"]->add([
                "name" => $_POST["txtname"],
                "des" => $_POST["txtdes"],
                "price" => $_POST["txtprice"],
                "thumbnail" => $_POST["txtthumbnail"],
                "tag" => $this->normal_for_url($_POST["txtname"]),

            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }
    }

    public function post_add_cat()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }


            $rs = $this->DB["category"]->add([
                "name" => $_POST["txtname"],
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }
    }

    //
    public function post_edit_product()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }
            if (empty($_POST["txtthumbnail"])) {
                echo $this->getResult(false, 'Chưa chọn hình');
                return;
            }
            $cat = $this->DB["category"]->get_all($_POST["txtcat"]);
            if (empty($cat)) {
                echo $this->getResult(false, 'Loại không hợp lệ');
                return;
            }
            $rs = $this->DB["product"]->update($_POST["txtid"], [
                "name" => $_POST["txtname"],
                "des" => $_POST["txtdes"],
                "price" => $_POST["txtprice"],
                "price_off" => $_POST["txtprice_off"],
                "thumbnail" => $_POST["txtthumbnail"],
                "category_id" => $_POST["txtcat"],
                "model" => $_POST["txtmodel"],
                "made_in" => $_POST["txtmade_in"],
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }
    }

    public function get_get_product()
    {
        if ($this->checkAuthor()) {

            $id = $this->par;
            $pr = $this->DB["product"]->get_all($id);
            if (!empty($pr))
                $pr["photos"] = $this->DB["product_photos"]->get_by_product($id);
            echo json_encode($pr);
        }
    }

    public function post_edit_service()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }
            if (empty($_POST["txtthumbnail"])) {
                echo $this->getResult(false, 'Chưa chọn hình');
                return;
            }

            $rs = $this->DB["service"]->update($_POST["txtid"], [
                "name" => $_POST["txtname"],
                "des" => $_POST["txtdes"],
                "price" => $_POST["txtprice"],
                "thumbnail" => $_POST["txtthumbnail"],

            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }

    }

    public function get_get_service()
    {
        if ($this->checkAuthor()) {

            $id = $this->par;
            $pr = $this->DB["service"]->get_all($id);
            echo json_encode($pr);
        }
    }

    public function post_edit_cat()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }


            $rs = $this->DB["category"]->update($_POST["txtid"], [
                "name" => $_POST["txtname"],
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }
    }

    public function get_get_cat()
    {
        if ($this->checkAuthor()) {

            $id = $this->par;
            $pr = $this->DB["category"]->get_all($id);
            echo json_encode($pr);
        }
    }

    public function get_get_list_photo()
    {
        if ($this->checkAuthor()) {

            $par = json_decode($this->par);
            $tb = $par->tb;
            $id = $par->id;
            $list = $this->DB[$tb . "_photos"]->{"get_by_$tb"}($id);
            echo json_encode($list);
        }

    }

    public function get_get_list_slider()
    {
        if ($this->checkAuthor()) {

            $list = $this->DB["header_slider"]->gets_all();
            echo json_encode($list);
        }

    }

    public function post_modified_slider()
    {
        if ($this->checkAuthor()) {

            $sliders = json_decode($_POST["p"]);
            /* echo '<pre>';
             print_r($sliders);
             echo '</pre>';*/
            foreach ($sliders as $slider) {
                if (!empty($slider->url)) {
                    $this->DB["header_slider"]->update($slider->id, [
                        "url" => $slider->url
                    ]);
                }
            }


        }

    }

    //info
    public function post_edit_info()
    {
        if ($this->checkAuthor()) {

            if (!isset($_POST["id"]) || empty($_POST["id"]) || !is_numeric($_POST["id"])) {
                echo $this->getResult(false, 'Lỗi');
                return;
            }
            if (!isset($_POST["logo"]) || empty($_POST["logo"])) {
                echo $this->getResult(false, 'Logo trống');
                return;
            }
            if (!isset($_POST["txtname"]) || empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }
            if (!isset($_POST["txtphone"]) || empty($_POST["txtphone"])) {
                echo $this->getResult(false, 'Điện thoại trống');
                return;
            }
            if (!isset($_POST["txtaddr"]) || empty($_POST["txtaddr"])) {
                echo $this->getResult(false, 'Địa chỉ trống');
                return;
            }
            if (!isset($_POST["editor"]) || empty($_POST["editor"])) {
                echo $this->getResult(false, 'Mô tả trống');
                return;
            }
            $rs = $this->DB["about"]->update($_POST["id"], [
                "des" => $_POST["editor"],
                "logo" => $_POST["logo"],
                "shop_name" => $_POST["txtname"],
                "phone" => $_POST["txtphone"],
                "addr" => $_POST["txtaddr"],
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }

        }

    }
//appearance
    public function post_edit_appearance()
    {
        if ($this->checkAuthor()) {

            if (!isset($_POST["id"]) || empty($_POST["id"]) || !is_numeric($_POST["id"])) {
                echo $this->getResult(false, 'Lỗi');
                return;
            }
            if (!isset($_POST["logo"]) || empty($_POST["logo"])) {
                echo $this->getResult(false, 'ICON trống');
                return;
            }
            if (!isset($_POST["title_on_tab"]) || empty($_POST["title_on_tab"])) {
                echo $this->getResult(false, 'Tiêu đề trống');
                return;
            }

            $rs = $this->DB["appearance"]->update($_POST["id"], [
                "title_on_tab" => $_POST["title_on_tab"],
                "icon_on_tab" => $_POST["logo"],
                "background" => $_POST["background"],
                "background_color" => $_POST["background_color"],
                "menu_background_color" => $_POST["menu_background_color"],
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }

        }

    }
    //
    public function post_add_accessory()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }
            if (empty($_POST["editor"])) {
                echo $this->getResult(false, 'Mô tả trống');
                return;
            }
            $rs = $this->DB["accessary"]->add([
                "name" => $_POST["txtname"],
                "des" => $_POST["editor"],
                "price" => $_POST["txtprice"],
                "unit" => $_POST["txtunit"],
                "capacity" => $_POST["txtcapacity"],
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }

    }

    public function get_get_accessory()
    {
        if ($this->checkAuthor()) {

            $id = $this->par;
            echo json_encode($this->DB["accessary"]->get_all($id));
        }
    }

    public function post_edit_accessory()
    {
        if ($this->checkAuthor()) {

            if (isset($_POST["txtid"]) && !empty($_POST["txtid"])) {
                if (!isset($_POST["txtname"]) || empty($_POST["txtname"])) {
                    echo $this->getResult(false, 'Tên trống');
                    return;
                }
                if (!isset($_POST["editor"]) || empty($_POST["editor"])) {
                    echo $this->getResult(false, 'Mô tả trống');
                    return;
                }
                $rs = $this->DB["accessary"]->update($_POST["txtid"], [
                    "name" => $_POST["txtname"],
                    "des" => $_POST["editor"],
                    "price" => $_POST["txtprice"],
                    "unit" => $_POST["txtunit"],
                    "capacity" => $_POST["txtcapacity"],
                ]);
                if ($rs > 0) {
                    echo $this->getResult(true, 'Thành công');
                } else {
                    echo $this->getResult(false, 'Lỗi');
                }
            }
        }

    }

    public function post_del_accessory()
    {
        if ($this->checkAuthor()) {

            if (isset($_POST["id"]) && !empty($_POST["id"])) {

                $rs = $this->DB["accessary"]->remove($_POST["id"]);
                if ($rs > 0) {
                    echo $this->getResult(true, 'Thành công');
                } else {
                    echo $this->getResult(false, 'Lỗi');
                }
            }
        }

    }

    //
    public function post_del_promotional()
    {
        if ($this->checkAuthor()) {

            if (isset($_POST["id"]) && !empty($_POST["id"])) {
                $rs = $this->DB["promotional"]->remove($_POST["id"]);
                if ($rs > 0) {
                    echo $this->getResult(true, 'Thành công');
                } else {
                    echo $this->getResult(false, 'Lỗi');
                }
            }

        }
    }

    public function post_add_promotional()
    {
        if ($this->checkAuthor()) {

            if (!isset($_POST["txtname"]) || empty($_POST["txtname"])) {
                echo $this->getResult(false, 'Tên trống');
                return;
            }
            if (!isset($_POST["editor"]) || empty($_POST["editor"])) {
                echo $this->getResult(false, 'Mô tả trống');
                return;
            }

            $rs = $this->DB["promotional"]->add([
                "title" => $_POST["txtname"],
                "des" => $_POST["editor"],
            ]);

            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
            /*echo '<pre>';
            print_r($_POST);
            echo '</pre>';*/
        }

    }

    public function get_get_promotional()
    {
        if ($this->checkAuthor()) {

            $id = $this->par;
            echo json_encode($this->DB["promotional"]->get_all($id));
        }
    }

    public function post_edit_promotional()
    {
        if ($this->checkAuthor()) {

            if (isset($_POST["txtid"]) && !empty($_POST["txtid"])) {
                if (!isset($_POST["txtname"]) || empty($_POST["txtname"])) {
                    echo $this->getResult(false, 'Tên trống');
                    return;
                }
                if (!isset($_POST["editor"]) || empty($_POST["editor"])) {
                    echo $this->getResult(false, 'Mô tả trống');
                    return;
                }
                $rs = $this->DB["promotional"]->update($_POST["txtid"], [
                    "title" => $_POST["txtname"],
                    "des" => $_POST["editor"],
                ]);
                if ($rs > 0) {
                    echo $this->getResult(true, 'Thành công');
                } else {
                    echo $this->getResult(false, 'Lỗi');
                }
            }
        }

    }

    //del order
    public function post_del_order()
    {
        if ($this->checkAuthor()) {
            if (isset($_POST["id"]) && !empty($_POST["id"])) {
                $rs = $this->DB["order"]->remove($_POST["id"]);
                if ($rs > 0) {
                    echo $this->getResult(true, 'Thành công');
                } else {
                    echo $this->getResult(false, 'Thất bại');
                }
            }
        }
    }

    public function post_del_order_details()
    {
        if ($this->checkAuthor()) {
            if (isset($_POST["id"]) && !empty($_POST["id"])) {
                $order_id =$this->DB["order_detail"]->gets_by_product($_POST["id"])[0]["order_id"];
                $rs = $this->DB["order_detail"]->remove_by_product($_POST["id"]);
                //   echo $_POST["id"];
                if ($rs > 0) {
                    $total=$this->DB["order_detail"]->get_total_cost($order_id);
                    $this->DB["order"]->update($order_id,[
                        "total_cost"=>$total
                    ]);
                    echo $this->getResult(true, 'Thành công');
                } else {
                    echo $this->getResult(false, 'Thất bại');
                }
            }
        }
    }
    public function post_submit_order(){
        if($this->checkAuthor()){
            if(!$this->is_exist($_POST["id"])){
                echo $this->getResult(false,'Lỗi');
                return;
            }else {
              $rs = $this->DB["order"]->update($_POST["id"],[
                    "is_submit"=>'1'
                ]);
              if($rs > 0){
                  echo $this->getResult(true,'Thành công');
              }else {
                  echo $this->getResult(false,'Lỗi');
              }
            }
        }
    }
}

