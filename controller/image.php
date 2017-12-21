<?php
include 'controller.php';

class image extends controller
{

    public function get_show_list_dir()
    {
        if ($this->checkAuthor()) {

            $dirs = array_filter(glob("../uploads/*"), 'is_dir');
            $folders = [];
            foreach ($dirs as $dir) {
                $folder_name = explode("/", $dir)[2];
                $folders[] = $folder_name;
            }

            echo json_encode($folders);
        }
    }

    public function get_show_list_image()
    {
        if ($this->checkAuthor()) {

            $dir = $this->par;
            $folders = [];
            if ($dir == '') {

                echo json_encode($folders);
                return;
            }

            $dirs = glob("{../uploads/$dir/*.jpg,../uploads/$dir/*.jpeg,../uploads/$dir/*.png,../uploads/$dir/*.gif}", GLOB_BRACE);
            foreach ($dirs as $dir_s) {
                $folders[] = substr($dir_s, 3, strlen($dir_s) - 1);
            }

            echo json_encode($folders);
        }

    }

    public function post_remove_pic()
    {
        if ($this->checkAuthor()) {

            $url = "../" . $_POST["path"];
            if (file_exists($url)) {
                echo $this->getResult(true, '');
                unlink($url);
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }

    }

    public function post_upload_img()
    {
        if ($this->checkAuthor()) {

            /* echo '<pre>';
               print_r($_FILES["upImg"]);
               echo '</pre>';*/
            if (isset($_FILES["upImg"]) && !empty($_FILES["upImg"])) {
                $file = $_FILES["upImg"];
                $num_file = count($file["name"]);
                for ($i = 0; $i < $num_file; $i++) {
                    if (!empty($file["name"][$i])) {
                        if ($file["size"][$i] > 10 * 1024 * 1024) {
                            echo "Hình thứ $i quá lớn";
                            break;
                        } else {
                            $type = pathinfo($file["name"][$i])["extension"];
                            $type = strtolower($type);
                            $newname = $this->randomStr() . ".$type";
                            $dir = "../uploads/" . $_POST["selDir"] . "/$newname";
                            //  echo $dir;
                            //    echo $file["tmp_name"];
                            copy($file["tmp_name"][$i], $dir);
                        }
                    }
                }
                echo 'Thêm thành công, đợi trong giây lát!';
                echo "<script>  setTimeout(function() { location.href='../" . $_POST["url"] . "';  },100);    </script>";


            }
        }

    }

    public function post_add_photo()
    {
        if ($this->checkAuthor()) {

            if (empty($_POST["txtpic"])) {
                echo $this->getResult(false, 'Chưa chọn hình');
                return;
            }
            $rs = $this->DB[$_POST["tb"] . "_photos"]->add([
                "url" => $_POST["txtpic"],
                $_POST["tb"] . "_id" => $_POST["id"]
            ]);
            if ($rs > 0) {
                echo $this->getResult(true, 'Thành công');
            } else {
                echo $this->getResult(false, 'Lỗi');
            }
        }
    }

    public function get_del_photo()
    {
        if ($this->checkAuthor()) {

            if (isset($_GET["tb"]) && isset($_GET["id"]) && !empty($_GET["tb"]) && !empty($_GET["id"]) && isset($_GET["ctx_id"]) && !empty($_GET["ctx_id"])) {
                $rs = $this->DB[$_GET["tb"] . "_photos"]->remove($_GET["id"]);
                header('Location: ../admin/add-photo.php?tb=' . $_GET["tb"] . '&id=' . $_GET["ctx_id"]);

            }

        }
    }

    public function get_crop_image()
    {
        if ($this->checkAuthor()) {
            $crop = json_decode($this->par);
            $path_info = pathinfo($crop->src_img->src);

            $TYPE = [
                "jpg" => "jpeg",
                "jpeg" => "jpeg",
                "png" => "png",
                "gif" => "gif",
            ];
            $funcName = $TYPE[$path_info["extension"]];
            $imagecreate = "imagecreatefrom" . $funcName;
            $imageexport = "image" . $funcName;

            /*  echo '<pre>';
               print_r($crop);
               echo '</pre>';*/
            //  echo $crop->src_img;

            $des_img = imagecreatetruecolor($crop->w, $crop->h);
            $src_img = $imagecreate('../' . $crop->src_img->src);

            imagecopyresampled($des_img, $src_img, 0, 0, $crop->x, $crop->y, $crop->w, $crop->h, $crop->w, $crop->h);
            $newName = $this->randomStr() . "_" . $crop->w . "-" . $crop->h . "." . $path_info["extension"];
            if ($crop->del_src === '1') {
                if (file_exists('../' . $crop->src_img->src)) {
                    unlink('../' . $crop->src_img->src);
                    $newName = $path_info["basename"];
                }
            }
            $imageexport($des_img, "../" . $path_info["dirname"] . "/$newName");

            echo 'Thành công';
        }
    }
}
