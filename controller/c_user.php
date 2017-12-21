<?php
include 'controller.php';

class c_user extends controller
{
    public function post_change_avatar(){
            if($this->checkAuthor()){
                if(!isset($_POST["txt-thumbnail"]) || empty($_POST["txt-thumbnail"])){
                    echo $this->getResult(false,'Chưa chọn hình');
                    return;
                }
                $rs = $this->DB["user"]->update($_SESSION["US_LOGIN"]["id"],[
                    "avatar"=>$_POST["txt-thumbnail"]
                ]);
                if($rs > 0){
                    echo $this->getResult(true,'Thành công');
                }else {
                    echo $this->getResult(false,'Lỗi');
                }
            }
    }
    public function post_change_info(){
        if($this->checkAuthor()){
            if(!isset($_POST["txt-name"]) || empty($_POST["txt-name"])){
                echo $this->getResult(false,'Tên trống');
                return;
            }
            if(!isset($_POST["txt-mail"]) || empty($_POST["txt-mail"])){
                echo $this->getResult(false,'Mail trống');
                return;
            }
            $rs = $this->DB["user"]->update($_SESSION["US_LOGIN"]["id"],[
                "name"=>$_POST["txt-name"],
                "mail"=>$_POST["txt-mail"],
            ]);
            if($rs > 0){
                echo $this->getResult(true,'Thành công');
            }else {
                echo $this->getResult(false,'Lỗi');
            }
        }
    }
    public function post_change_pass(){
        if($this->checkAuthor()){
            if(!isset($_POST["txt-pass"]) || empty($_POST["txt-pass"])){
                echo $this->getResult(false,'Xin nhập mật khẩu cũ');
                return;
            }
            $user = $this->DB["user"]->get_by_pass(md5($_POST["txt-pass"]));
            if(empty($user)){
                echo $this->getResult(false,'Mật khẩu cũ không đúng');
                return;
            }
            if(!isset($_POST["txt-new-pass"]) || empty($_POST["txt-new-pass"])){
                echo $this->getResult(false,'Mật khẩu  trống');
                return;
            }
            if(!isset($_POST["txt-re-new-pass"]) || empty($_POST["txt-re-new-pass"])){
                echo $this->getResult(false,'Mật khẩu  trống');
                return;
            }
            if($_POST["txt-new-pass"] !=$_POST["txt-re-new-pass"]){
                echo $this->getResult(false,'Xác nhận mật khẩu không khớp');
                return;
            }

            $rs = $this->DB["user"]->update($_SESSION["US_LOGIN"]["id"],[
                "pass"=>md5($_POST["txt-new-pass"])
            ]);
            if($rs > 0){
                echo $this->getResult(true,'Thành công');
            }else {
                echo $this->getResult(false,'Lỗi');
            }
        }
    }

}
