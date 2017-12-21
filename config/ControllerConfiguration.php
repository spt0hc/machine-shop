<?php
namespace config;
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/20/2017
 * Time: 8:18 PM
 */

class ControllerConfiguration
{
    private $col_name = null;
    private $ac_name = null;
    private $controllers=null;
    private $dirname=null;
    public function __construct($dir)
    {
        $this->dirname = $dir;
        $this->config();
    }
    private function config(){
        $controllers = [];
        foreach (glob($this->dirname."controller/*.php") as $path) {
            $col_n = pathinfo($path)["filename"];
            $controllers[$col_n] = $path;

        }
        $this->controllers=$controllers;
    }

    public function get($controller, $action)
    {
        if (!isset($controller) || !isset($action) || empty($controller) || empty($action)) {
            echo 'Wrong Action-1';
            return;
        }
        $this->ac_name = $action;
        $this->col_name = $controller;
        if (isset($this->controllers[$this->col_name])) {//lấy controller từ request,
            require_once $this->controllers[$this->col_name];//nếu controller tồn tại thì include vào
            $col = new $this->col_name($this->dirname);//khởi tạo controller
            if (method_exists($col, "get_" . $this->ac_name)) {//kiểm tra action có tồn tại ko
                if (!isset($_GET["par"]) || empty($_GET["par"])) {
                    $col->par = null;//giá trị mặc định của tham số request là null
                } else {
                    $col->par = $_GET["par"];//lưu lại tham số request
                }

                $col->{"get_" . $this->ac_name}();//thực thi action
            } else {
                echo 'Wrong Action-2';
            }
        }else {
            echo 'Wrong Action-3';
        }
    }

    public function post($controller, $action)
    {
        if (!isset($controller) || !isset($action) || empty($controller) || empty($action)) {
            echo 'Wrong Action';
            return;
        }
        $this->ac_name = $action;
        $this->col_name = $controller;
        if (isset($this->controllers[$this->col_name])) {//lấy controller từ request,
            require_once $this->controllers[$this->col_name];//nếu controller tồn tại thì include vào
            $col = new $this->col_name($this->dirname);//khởi tạo controller
            if (method_exists($col, "post_" . $this->ac_name)) {//kiểm tra action có tồn tại ko
                if (!isset($_POST["par"]) || empty($_POST["par"])) {
                    $col->par = null;//giá trị mặc định của tham số request là null
                } else {
                    $col->par = $_POST["par"];//lưu lại tham số request
                }

                $col->{"post_" . $this->ac_name}();//thực thi action
            } else {
                echo 'Wrong Action';
            }
        }else {
            echo 'Wrong Action';
        }
    }
}

