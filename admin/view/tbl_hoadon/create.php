<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Hóa đơn
                <small>Thêm mới Hóa đơn</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                    <tr>
                        <td>Tên khách hàng</td>
                        <td>
                            <select name="sl_menu" class="form-control" >
                                <option value="Hãng xe">Hãng xe</option>
                                <option value="Dòng xe">Dòng xe</option>
                                <option value="Danh sách quyền">Danh sách quyền</option>
                                <option value="Hóa đơn">Hóa đơn</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kiểu quyền</td>
                        <td>
                            <input type="checkbox" name="kieuquyen[]" value="Thêm">Thêm
                            <input type="checkbox" name="kieuquyen[]" value="Xem"> Xem
                            <input type="checkbox" name="kieuquyen[]" value="Sửa"> Sửa
                            <input type="checkbox" name="kieuquyen[]" value="Xóa"> Xóa
                            <div id="error" style="margin-bottom: 10px;color: red;font-style: italic;">
                                <?php
                                var_dump($errors);die;
                                if(count($errors) >0 ){
                                    foreach ($errors as $error)
                                        echo $error;
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên nhóm sử dụng quyền</td>
                        <td>
                            <select name="sl_nhomsdq" class="form-control" >
                                <option value="">---Chọn nhóm sử dụng quyền---</option>
                                <?php foreach($nhomnds as $nhomnd): ?>
                                    <option value="<?=$nhomnd['id_nhomnd']?>"><?=$nhomnd['ten']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="btn btn-primary" type="submit" name="btn_submit" value="Thêm mới">
                        </td>
                    </tr>
                </table>

            </form>

        </section>
        <!-- /.content -->
    </div>


<?php
require_once PATH_APPLICATION . '/view/partials/foot.php';
?>