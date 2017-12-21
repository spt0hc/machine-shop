<?php
include 'controller.php';

class home extends controller
{


    /* public function get_get_logo()
     {
         header('Content-Type: image/jpeg');
         $url = $this->DB["about"]->gets()[0]["logo"];
         header("Location: ../$url");
     }*/
    public function get_shop_info()
    {
        //    error_reporting(E_ALL);
        //ini_set('display_errors', 1);
        echo json_encode($this->DB["about"]->gets()[0]);
    }

    public function get_categories()
    {
        echo json_encode($this->DB["category"]->gets());
    }

    public function get_sliders()
    {
        echo json_encode($this->DB["header_slider"]->gets());
    }

    public function get_services()
    {
        //  ini_set('display_errors', 1);
        echo json_encode($this->DB["service"]->gets());
    }

    public function get_new_products()
    {
        //    error_reporting(E_ALL);
// ini_set('display_errors', 1); 
        $row = $this->par;
        echo json_encode($this->DB["product"]->get_by_order_limit("date", "DESC", $row));
    }

    public function get_list_products()
    {
        //     error_reporting(E_ALL);
        //ini_set('display_errors', 1);

        $page = $this->par;
        echo json_encode($this->DB["product"]->gets_page($page, 8));
    }

    public function get_list_products_by_cat()
    {
        $par = json_decode($this->par);
        echo json_encode($this->DB["product"]->gets_page_by_cat($par->page, 9, $par->cat));
    }

    public function get_product()
    {
        $id = $this->par;
        $pr = $this->DB["product"]->get($id);
        if (!empty($pr))
            $pr["photos"] = $this->DB["product_photos"]->get_by_product($id);
        echo json_encode($pr);
    }

    public function get_service()
    {
        $id = $this->par;
        $pr = $this->DB["service"]->get($id);
        if (!empty($pr))
            $pr["photos"] = $this->DB["service_photos"]->get_by_service($id);
        echo json_encode($pr);
    }

    public function get_list_searchs()
    {
        $q = preg_replace("#'|\"#", '', $this->par);
        $q = $this->removeUnicode($q);
        if ($q != '') {
            $qs = explode(" ", $q);
        } else {
            $qs[0] = $q;
        }
        echo json_encode($this->DB["product"]->get_products_by_name($qs));
    }

    //
    public function get_get_list_accessary()
    {
        $page = $this->par;
        echo json_encode($this->DB["accessary"]->gets_page($page, 6));
    }

    public function get_get_list_promotional()
    {
        $page = $this->par;
        echo json_encode($this->DB["promotional"]->gets_page($page, 6));
    }

    public function post_submit_order()
    {
        $orders = json_decode($_POST["orders"]);

        /*        echo '<pre>';
                print_r($_POST);
                echo '</pre>';
        */
        if (!isset($_POST["addr"]) || empty($_POST["addr"])) {
            echo $this->getResult(false, "Địa chỉ trống !");
            return;
        }
        if (!isset($_POST["phone"]) || empty($_POST["phone"])) {
            echo $this->getResult(false, "Địện thoại trống !");
            return;
        }
        /*
        echo '<pre>';
        print_r($orders);
        echo '</pre>';*/
        $order_tb = $this->DB["order"];
        $order_detail_tb = $this->DB["order_detail"];

        /*
                echo '<pre>';
                print_r($order_tb->gets());
                echo '</pre>';
                */
        $order_tb->add([
            "address" => $_POST["addr"],
            "phone" => $_POST["phone"],
        ]);
        $id = $order_tb->get_last_id();
        $total_cost = 0;
        foreach ($orders as $order) {
            $price = $order->price - $order->price * ($order->price_off / 100);
            $order_detail_tb->add([
                "order_id" => $id,
                "product_id" => $order->id,
                "amount" => $order->amount,
                "price" => $price,
                "cost" => $price * $order->amount,
            ]);
            $total_cost += $price * $order->amount;
        }
        $order_tb->update($id, [
            "total_cost" => $total_cost
        ]);
        echo $this->getResult(true, 'Thành công');
    }

    public function post_count_access()
    {
        function get_client_ip()
        {
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if (getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if (getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if (getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if (getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if (getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }

        $client_ip = get_client_ip();

        $access = $this->DB["count_access"]->gets_access_by_ip($client_ip);
        if (count($access) == 0) {
            $this->DB["count_access"]->add([
                'ip' => $client_ip,
            ]);
            session_start();
            $_SESSION["ACCESS"] = true;
        } else {
            session_start();
            if (!isset($_SESSION["ACCESS"]) || $_SESSION["ACCESS"] == false) {
                $this->DB["count_access"]->update($access[0]["id"], [
                    'count' => $access[0]["count"] + 1,
                ]);
                $_SESSION["ACCESS"] = true;
            }
        }
    }
    //
    public function get_get_appearance()
    {
        echo json_encode($this->DB["appearance"]->gets_all());
    }

}
