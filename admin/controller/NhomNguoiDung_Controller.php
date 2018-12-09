<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/NhomNguoiDung.php';
class NhomNguoiDung_Controller extends Controller{
    public $table = "tbl_nhomnguoidung";
    public function indexAction(){
        $nhomnds = new NhomNguoiDung();
        $condition = "1";
        $nhomnd = $nhomnds->select($this->table,$condition);
        $this->view->load('tbl_nhomnguoidung/index', ['nhomnd' => $nhomnd]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $nhomnds = new NhomNguoiDung();
        $errors = array();
        if(isset($_POST['btn_submit'])){
            $ten = $_POST['txt_ten'];
            $record = array("ten" => $ten);
            $conditions = array("ten" => $ten);

            $check = $nhomnds->select($this->table,$conditions);
            if($check  > 0){
                array_push($errors,"Tên nhóm người dùng đã tồn tại <br>");
            }else{
                $nhomnds->insert($this->table,$record);
                header('Location: index.php?c=nhomnguoidung&a=index');
            }

        }

        $this->view->load('tbl_nhomnguoidung/create', ['errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $nhomnds = new NhomNguoiDung();

        $id = $_GET["id"];
        $conditions = array("id_nhomnd" => "$id");
        $nhomnd = $nhomnds->select($this->table,$conditions);
        if(isset($_POST['btn_submit'])){
            $ten = $_POST['txt_ten'];

            $record = array("ten" => $ten);

            $nhomnds->update($this->table,$record,$conditions);

            header('Location: index.php?c=nhomnguoidung&a=index');            }

        $this->view->load('tbl_nhomnguoidung/update', ['nhomnd' => $nhomnd]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $nhomnds = new NhomNguoiDung();
        $id = $_GET["id"];
        $conditions = array("id_nhomnd" => "$id");
        $nhomnds->delete($this->table,$conditions);
        $nhomnds->select($this->table,$conditions);

        header('Location: index.php?c=nhomnguoidung&a=index');            }

}

