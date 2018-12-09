<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/Hoadon.php';
require PATH_APPLICATION . '/model/NguoiDung.php';

class Hoadon_Controller extends Controller{
    public $table = "tbl_hoadon";
    public function indexAction(){
        $hoadons = new Hoadon();
        $listhd = $hoadons->select($this->table,'id_khach is null');

        $sql = "Select * from tbl_hoadon as hd
        Join tbl_nguoidung as ngdung
        On hd.id_khach = ngdung.id_user";
        $hoadon = $hoadons->getData($sql);

        $this->view->load('tbl_hoadon/index', ['hoadon' => $hoadon,'listhd'=>$listhd]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $dsquyens = new DSQuyen();
        $nhomnd= new NhomNguoiDung();
        $nhomnds = $nhomnd->getData("Select * from tbl_nhomnguoidung");
        $errors = array();
        if(isset($_POST['btn_submit'])){
            $menu = $_POST['sl_menu'];
            $kieunguoidung_id=$_POST['sl_nhomsdq'];
            if ($_POST['kieuquyen']==null && $kieunguoidung_id = "") {
                array_push($errors,"Bạn cần điền đầy đủ thông tin <br>");
            }else{
                foreach ($_POST['kieuquyen'] as $kieuquyen) {
                    $record = array("menu" => $menu,"kieuquyen"=>$kieuquyen,"kieunguoidung_id" => $kieunguoidung_id);
                    $dsquyens->insert($this->table,$record);
                }
            }
            header('Location: index.php?c=dsquyen&a=index');
        }

        $this->view->load('tbl_dsquyen/create', ['nhomnds' => $nhomnds,'errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $dsquyens = new DSQuyen();
        $nhomnds= new NhomNguoiDung();

        $id = $_GET["id"];
        $conditions = array("id_dsquyen" => "$id");
        $dsquyen = $dsquyens->select($this->table,$conditions);
        $nhomnd = $nhomnds->getData("Select * from tbl_nhomnguoidung");

        if(isset($_POST['btn_submit'])){
            $menu = $_POST['sl_menu'];
            $kieunguoidung_id=$_POST['sl_nhomsdq'];
            if ($_POST['kieuquyen']==null && $kieunguoidung_id = "") {
                array_push($errors,"Bạn cần điền đầy đủ thông tin <br>");
            }else{
                foreach ($_POST['kieuquyen'] as $kieuquyen) {
                    $record = array("menu" => $menu,"kieuquyen"=>$kieuquyen,"kieunguoidung_id" => $kieunguoidung_id);
                    $dsquyens->update($this->table,$record,$conditions);
                }
            }
            header('Location: index.php?c=dsquyen&a=index');
        }

        $this->view->load('tbl_dsquyen/update', ['dsquyen'=>$dsquyen,'nhomnd' => $nhomnd]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $dsquyens = new DSQuyen();
        $id = $_GET["id"];
        $conditions = array("id_dsquyen" => "$id");
        $dsquyens->delete($this->table,$conditions);
        $dsquyens->select($this->table,$conditions);

        header('Location: index.php?c=dsquyen&a=index');            }

}

