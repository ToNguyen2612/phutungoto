<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/Chitiet.php';
class Chitiet_Controller extends Controller{
    public $table = "tbl_chitiet";
    public function indexAction(){
        $ct = new Chitiet();

        $condition = "1 order by tbl_chitiet.tenbophan";
        $chitiet = $ct->select($this->table,$condition);
        $this->view->load('tbl_chitiet/index', ['chitiet' => $chitiet]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $ct = new Chitiet();
        $errors = array();
        if(isset($_POST['btn_submit'])){
            $chitietbp = $_POST['txt_chitiet'];
            $ten = $_POST['txt_ten'];
            $record = array("chitietbophan" => $chitietbp,"tenbophan" => $ten);
            $conditions = array("chitietbophan" => $chitietbp);

            $check = $ct->select($this->table,$conditions);
            if($check  > 0){
                array_push($errors,"Chi tiết bộ phận đã tồn tại <br>");
            }else{
                $ct->insert($this->table,$record);
                header('Location: index.php?c=chitiet&a=index');
            }

        }

        $this->view->load('tbl_chitiet/create', ['errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $ct = new Chitiet();

        $id = $_GET["id"];
        $conditions = array("id_chitiet" => "$id");
        $chitiet = $ct->select($this->table,$conditions);
        if(isset($_POST['btn_submit'])){
            $chitietbp = $_POST['txt_chitiet'];
            $ten = $_POST['txt_ten'];

            $record = array("chitietbophan" => $chitietbp,"tenbophan" => $ten);

            $ct->update($this->table,$record,$conditions);

            header('Location: index.php?c=chitiet&a=index');            }

        $this->view->load('tbl_chitiet/update', ['chitiet' => $chitiet]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $ct = new Chitiet();
        $id = $_GET["id"];
        $conditions = array("id_chitiet" => "$id");
        $ct->delete($this->table,$conditions);
        $ct->select($this->table,$conditions);

        header('Location: index.php?c=chitiet&a=index');
    }

}

