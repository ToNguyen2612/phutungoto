<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/Xuatxu.php';
class Xuatxu_Controller extends Controller{
    public $table = "tbl_xuatxu";
    public function indexAction(){
        $xx = new Xuatxu();

        $condition = "1";
        $xuatxu = $xx->select($this->table,$condition);
        $this->view->load('tbl_xuatxu/index', ['xuatxu' => $xuatxu]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $xx = new Xuatxu();
        $errors = array();
        if(isset($_POST['btn_submit'])){
            $quocgia= $_POST['txt_quocgia'];
            $record = array("quocgia" => $quocgia);
            $conditions = array("quocgia" => $quocgia);

            $check = $xx->select($this->table,$conditions);
            if($check  > 0){
                array_push($errors,"Quốc gia đã tồn tại <br>");
            }else{
                $xx->insert($this->table,$record);
                header('Location: index.php?c=xuatxu&a=index');
            }

        }

        $this->view->load('tbl_xuatxu/create', ['errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $xx = new Xuatxu();

        $id = $_GET["id"];
        $conditions = array("id" => "$id");
        $xuatxu = $xx->select($this->table,$conditions);
        if(isset($_POST['btn_submit'])){
            $quocgia= $_POST['txt_quocgia'];

            $record = array("quocgia" => $quocgia);
            $xx->update($this->table,$record,$conditions);

            header('Location: index.php?c=xuatxu&a=index');            }

        $this->view->load('tbl_xuatxu/update', ['xuatxu' => $xuatxu]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $xx = new Xuatxu();
        $id = $_GET["id"];
        $conditions = array("id" => "$id");
        $xx->delete($this->table,$conditions);
        $xx->select($this->table,$conditions);

        header('Location: index.php?c=xuatxu&a=index');
    }

}

