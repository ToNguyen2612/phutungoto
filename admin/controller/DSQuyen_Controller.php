<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/DSQuyen.php';
require PATH_APPLICATION . '/model/NhomNguoiDung.php';

class DSQuyen_Controller extends Controller{
    public $table = "tbl_dsquyen";
    public function indexAction(){
        $dsquyens = new DSQuyen();

        $sql = "Select * from tbl_dsquyen as dsq
        Join tbl_nhomnguoidung as nhomnd
        On dsq.kieunguoidung_id = nhomnd.id_nhomnd
        order by dsq.menu";
        $dsquyen = $dsquyens->getData($sql);

        $this->view->load('tbl_dsquyen/index', ['dsquyen' => $dsquyen]);
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

//            die($kieunguoidung_id);

            if ($_POST['kieuquyen']==null || $kieunguoidung_id = "") {
                array_push($errors,"Bạn cần điền đầy đủ thông tin <br>");
            }else{
                foreach ($_POST['kieuquyen'] as $kieuquyen) {
                    $record = array("menu" => $menu,"kieuquyen"=>$kieuquyen,"kieunguoidung_id" => $kieunguoidung_id);
                    $dsquyens->insert($this->table,$record);
                }
            }
//                header('Location: index.php?c=dsquyen&a=index');
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
            if ($_POST['kieuquyen']==null || $kieunguoidung_id = "") {
                array_push($errors,"Bạn cần điền đầy đủ thông tin <br>");
            }else{
                foreach ($_POST['kieuquyen'] as $kieuquyen) {
                    $record = array("menu" => $menu,"kieuquyen"=>$kieuquyen,"kieunguoidung_id" => $kieunguoidung_id);
                    $dsquyens->update($this->table,$record,$conditions);
                }
                header('Location: index.php?c=dsquyen&a=index');
            }

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

        header('Location: index.php?c=dsquyen&a=index');
    }

}

