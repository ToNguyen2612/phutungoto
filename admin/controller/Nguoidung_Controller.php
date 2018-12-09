<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/Nguoidung.php';
class Nguoidung_Controller extends Controller{
    public $table = "tbl_nguoidung";
    public function indexAction(){
        $ngdung = new Nguoidung();

        $condition = "1";
        $nguoidung = $ngdung->select($this->table,$condition);
        $this->view->load('tbl_nguoidung/index', ['nguoidung' => $nguoidung]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $ngdung = new Nguoidung();
        $errors = array();
        if(isset($_POST['btn_submit'])){
            $hoten = $_POST['txt_hoten'];
            $sdt = $_POST['txt_sdt'];
            $email = $_POST['txt_email'];
            $diachi = $_POST['txt_diachi'];
            $tendn = $_POST['txt_tendn'];
            $matkhau = $_POST['txt_matkhau'];

            $record = array("hoten" => $hoten,"sdt" => $sdt,"email"=>$email,
                "diachi"=>$diachi,"tendangnhap"=>$tendn,"matkhau"=>$matkhau);
            $conditions = array("tendangnhap" => $tendn);

            $check = $ngdung->select($this->table,$conditions);
            if($check  > 0){
                array_push($errors,"Tên đăng nhập đã tồn tại <br>");
            }else{
                $ngdung->insert($this->table,$record);
                header('Location: index.php?c=nguoidung&a=index');
            }

        }

        $this->view->load('tbl_nguoidung/create', ['errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $ngdung = new Nguoidung();

        $id = $_GET["id"];
        $conditions = array("id_user" => "$id");
        $nguoidung = $ngdung->select($this->table,$conditions);
        if(isset($_POST['btn_submit'])){
            $hoten = $_POST['txt_hoten'];
            $sdt = $_POST['txt_sdt'];
            $email = $_POST['txt_email'];
            $diachi = $_POST['txt_diachi'];
            $tendn = $_POST['txt_tendn'];
            $matkhau = $_POST['txt_matkhau'];

            $record = array("hoten" => $hoten,"sdt" => $sdt,"email"=>$email,
                "diachi"=>$diachi,"tendangnhap"=>$tendn,"matkhau"=>$matkhau);

            $ngdung->update($this->table,$record,$conditions);

            header('Location: index.php?c=nguoidung&a=index');            }

        $this->view->load('tbl_nguoidung/update', ['nguoidung' => $nguoidung]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $ngdung = new Nguoidung();
        $id = $_GET["id"];
        $conditions = array("id_user" => "$id");
        $ngdung->delete($this->table,$conditions);
        $ngdung->select($this->table,$conditions);

        header('Location: index.php?c=nguoidung&a=index');
    }

}

