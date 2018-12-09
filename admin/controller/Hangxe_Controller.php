<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/Hangxe.php';
class Hangxe_Controller extends Controller{
    public $table = "tbl_hangxe";
    public function indexAction(){
        $hangxe = new Hangxe();
        $condition = "1";
        $hangxes = $hangxe->select($this->table,$condition);
        $this->view->load('tbl_hangxe/index', ['hangxes' => $hangxes]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $hangxe = new Hangxe();
        $errors = array();
        if(isset($_POST['btn_submit'])){
            $ten = $_POST['txt_ten'];
            $logo = 'public/uploads/'.$_FILES["image_logo"]['name'];
            move_uploaded_file($_FILES["image_logo"]["tmp_name"], $logo);
            $nuocsx=$_POST['txt_nuocsx'];
            $record = array("ten" => $ten,"logo"=>$logo,"nuocsx" => $nuocsx);
            $conditions = array("ten" => $ten);

                $check = $hangxe->select($this->table,$conditions);
                if($check  > 0){
                    array_push($errors,"Hãng xe đã tồn tại <br>");
                }else{
                    $hangxe->insert($this->table,$record);
                    header('Location: index.php?c=hangxe&a=index');
                }

        }

        $this->view->load('tbl_hangxe/create', ['errors' => $errors]);
        // Show view
        $this->view->show();
    }

    public function updateAction(){

        $hangxe = new Hangxe();

        $id = $_GET["id"];
        $conditions = array("id" => "$id");
        $hx = $hangxe->select($this->table,$conditions);

        if(isset($_POST['btn_submit'])){
            $ten = $_POST['txt_ten'];
            $logo = 'public/uploads/'.$_FILES["image_logo"]['name'];
            move_uploaded_file($_FILES["image_logo"]["tmp_name"], $logo);
            $nuocsx=$_POST['txt_nuocsx'];
            $record = array("ten" => $ten,"logo"=>$logo,"nuocsx" => $nuocsx);

            $hangxe->update($this->table,$record,$conditions);

            header('Location: index.php?c=hangxe&a=index');            }

        $this->view->load('tbl_hangxe/update', ['hx' => $hx]);
        // Show view
        $this->view->show();
    }

    public function deleteAction()
    {
        $hangxe = new Hangxe();
        $id = $_GET["id"];
        $conditions = array("id" => "$id");
        $hangxe->delete($this->table,$conditions);
        $hangxe->select($this->table,$conditions);

        header('Location: index.php?c=hangxe&a=index');            }

}

