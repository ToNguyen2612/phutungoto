<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

require PATH_APPLICATION . '/model/Phutung.php';
require PATH_APPLICATION . '/model/NguoiDungCapCao.php';
require PATH_APPLICATION . '/model/Chitiet.php';
require PATH_APPLICATION . '/model/Dongxe.php';
require PATH_APPLICATION . '/model/Xuatxu.php';

class Phutung_Controller extends Controller{
    public $table = "tbl_phutung";
    public function indexAction(){
        $pt = new Phutung();

        $sql = "Select * from tbl_phutung as pt
        Join tbl_xuatxu as xx
                On xx.id = pt.id_xuatxu
        join tbl_chitiet as ct 
                On ct.id_chitiet = pt.id_chitiet
        join tbl_ngdungcapcao as ndcc
                On ndcc.id_ndcc = pt.id_nguoidang
        join tbl_dongxe as dx
            On dx.id_dongxe = pt.id_dongxe";

        $phutung = $pt->getData($sql);
        $this->view->load('tbl_phutung/index', ['phutung' => $phutung]);
        // Show view
        $this->view->show();
    }
    public function createAction(){
        $pt = new Phutung();
        $ndcc = new NguoiDungCapCao();
        $xx = new Xuatxu();
        $ct = new Chitiet();
        $dx = new Dongxe();

        $listpt=$pt->getData("Select id_phutung,ten from tbl_phutung");
        $ngdungcapcao = $ndcc->getData("Select * from tbl_ngdungcapcao");
        $xuatxu = $xx->getData("Select * from tbl_xuatxu");
        $chitiet = $ct->getData("Select * from tbl_chitiet");
        $dongxe = $dx->getData("Select * from tbl_dongxe");
        $errors = array();
        if(isset($_POST['btn_submit'])){

            $ten = $_POST['txt_ten'];
            $gia=$_POST['txt_gia'];
            $id_xuatxu=$_POST['sl_xuatxu'];
            $sl_dongxe=$_POST['sl_dongxe'];
            $anh= 'public/uploads/'.$_FILES["anh"]['name'];
            move_uploaded_file($_FILES["anh"]["tmp_name"], $anh);
            $ploai=$_POST['sl_chitiet'];
            $mota=$_POST['txt_mota'];
            $soluong=$_POST['txt_soluong'];
            $url = $_POST['txt_duongdan'];
            $parent_id = $_POST['sl_spcha'];
            $type=$_POST['sl_type'];
            $anhien = @$_POST['cbx_anhien'] && $_POST['cbx_anhien'] == 'on' ? 1 : 0;
            $vitri = @$_POST['txt_vitri'] ? $_POST['txt_vitri'] : 0;
            $ngdang="1";

            $record = array("ten" => $ten,"gia"=>$gia,"id_xuatxu"=>$id_xuatxu,
                            "anh" => $anh,"id_chitiet" => $ploai,"mota" => $mota,
                            "soluong" =>$soluong, "id_nguoidang"=>$ngdang,"url" =>$url,"parent_id" =>$parent_id,
                            "type" =>$type,"an_hien" =>$anhien,"vitri" =>$vitri,"id_dongxe" => $sl_dongxe);

            $conditions = array("ten" => $ten);

            $check = $pt->select($this->table,$conditions);
            if($check  > 0){
                array_push($errors,"Phụ tùng đã tồn tại <br>");
            }else{
                $pt->insert($this->table,$record);
                var_dump($ndcc);die;
                header('Location: index.php?c=phutung&a=index');
            }

        }
        $this->view->load('tbl_phutung/create', ['errors'=>$errors,'listpt' => $listpt,
                                                                        'ngdungcapcao' => $ngdungcapcao,
                                                                        'xuatxu' => $xuatxu,
                                                                        'chitiet' => $chitiet,
                                                                        'dongxe' => $dongxe]);
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

