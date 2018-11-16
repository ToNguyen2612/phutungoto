<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/Dongxe.php';
require PATH_APPLICATION . '/model/Hangxe.php';

class Dongxe_Controller extends Controller{
    public $table = "tbl_dongxe";
    public function indexAction(){
        $dongxe = new Dongxe();

        $sql = "Select * from tbl_dongxe as dx
        Join tbl_hangxe as hx
        On dx.id_hangxe = hx.id";

        $dongxes = $dongxe->getData($sql);

        $this->view->load('tbl_dongxe/index', ['dongxes' => $dongxes]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $dongxe = new Dongxe();
        $hangxe= new Hangxe();
        $hx = $hangxe->getData("Select * from tbl_hangxe");
        $errors = array();
        if(isset($_POST['btn_submit'])){
            $ten = $_POST['txt_ten'];
            $id_hangxe = $_POST['sl_hangxe'];
            $namsx=$_POST['txt_namsx'];
            $record = array("ten_dx" => $ten,"id_hangxe"=>$id_hangxe,"namsx" => $namsx);
            $conditions = array("ten" => $ten);

            $check = $dongxe->select($this->table,$conditions);
            if($check  > 0){
                array_push($errors,"Dòng xe đã tồn tại <br>");
            }else{
                $dongxe->insert($this->table,$record);
                header('Location: index.php?c=dongxe&a=index');

            }

        }

        $this->view->load('tbl_dongxe/create', ['hx' => $hx,'errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $dongxe = new Dongxe();
        $hangxe= new Hangxe();

        $id = $_GET["id"];
        $conditions = array("id_dongxe" => "$id");
        $dx = $dongxe->select($this->table,$conditions);
        $hx = $hangxe->getData("Select * from tbl_hangxe");

        if(isset($_POST['btn_submit'])){
            $ten = $_POST['txt_ten'];
            $id_hangxe = $_POST['sl_hangxe'];
            $namsx=$_POST['txt_namsx'];
            $record = array("ten_dx" => $ten,"id_hangxe"=>$id_hangxe,"namsx" => $namsx);
            $dongxe->update($this->table,$record,$conditions);

            header('Location: index.php?c=dongxe&a=index');
        }

        $this->view->load('tbl_dongxe/update', ['dx'=>$dx,'hx' => $hx]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $dongxe = new Dongxe();
        $id = $_GET["id"];
        $conditions = array("id_dongxe" => "$id");
        $dongxe->delete($this->table,$conditions);
        $dongxe->select($this->table,$conditions);

        header('Location: index.php?c=dongxe&a=index');            }

}

