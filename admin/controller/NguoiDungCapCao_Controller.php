<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/NguoiDungCapCao.php';
require PATH_APPLICATION . '/model/NhomNguoiDung.php';

class NguoiDungCapCao_Controller extends Controller{
    public $table = "tbl_ngdungcapcao";
    public function indexAction(){
        $ndcc = new NguoiDungCapCao();

        $sql = "Select * from tbl_ngdungcapcao as ndcc
        Join tbl_nhomnguoidung as nhomnd
        On ndcc.id_role = nhomnd.id_nhomnd";

        $ndccs = $ndcc->getData($sql);

        $this->view->load('tbl_nguoidungcapcao/index', ['ndccs' => $ndccs]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $ndcc = new NguoiDungCapCao();
        $nhomnd= new NhomNguoiDung();
        $nhomnds = $nhomnd->getData("Select * from tbl_nhomnguoidung");
        $errors = array();
        if(isset($_POST['btn_submit'])){

            $ten = $_POST['txt_ten'];
            $sdt=$_POST['txt_sdt'];
            $email=$_POST['txt_email'];
            $diachi=$_POST['txt_diachi'];
            $tendn=$_POST['txt_tendn'];
            $matkhau=$_POST['txt_matkhau'];
            $id_role = $_POST['sl_nhomnd'];

            $record = array("hoten" => $ten,"sdt"=>$sdt,"email" => $email,
                "diachi" => $diachi,"tendangnhap" => $tendn,"matkhau" => $matkhau,"id_role" =>$id_role);
            $conditions = array("hoten" => $ten);

            $check = $ndcc->select($this->table,$conditions);
            if($check  > 0){
                array_push($errors,"Tên đã tồn tại <br>");
            }else{
                $ndcc->insert($this->table,$record);
//                var_dump($ndcc);die;
                header('Location: index.php?c=nguoidungcapcao&a=index');
            }

        }

        $this->view->load('tbl_nguoidungcapcao/create', ['nhomnds' => $nhomnds,'errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $ndccs = new NguoiDungCapCao();
        $nhomnds= new NhomNguoiDung();

        $id = $_GET["id"];
        $conditions = array("id_ndcc" => "$id");
        $ndcc = $ndccs->select($this->table,$conditions);
        $nhomnd = $nhomnds->getData("Select * from tbl_nhomnguoidung");

        if(isset($_POST['btn_submit'])){
            $ten = $_POST['txt_ten'];
            $sdt=$_POST['txt_sdt'];
            $email=$_POST['txt_email'];
            $diachi=$_POST['txt_diachi'];
            $tendn=$_POST['txt_tendn'];
            $matkhau=$_POST['txt_matkhau'];
            $id_role = $_POST['sl_nhomnd'];

            $record = array("hoten" => $ten,"sdt"=>$sdt,"email" => $email,
                "diachi" => $diachi,"tendangnhap" => $tendn,"matkhau" => $matkhau,"id_role" =>$id_role);
            $ndccs->update($this->table,$record,$conditions);

            header('Location: index.php?c=nguoidungcapcao&a=index');
        }

        $this->view->load('tbl_nguoidungcapcao/update', ['ndcc'=>$ndcc,'nhomnd' => $nhomnd]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $ndccs = new NguoiDungCapCao();
        $id = $_GET["id"];
        $conditions = array("id_ndcc" => "$id");
        $ndccs->delete($this->table,$conditions);
        $ndccs->select($this->table,$conditions);

        header('Location: index.php?c=nguoidungcapcao&a=index');            }

}

