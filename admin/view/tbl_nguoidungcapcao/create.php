<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Người dùng cấp cao
                <small>Thêm mới Người dùng cấp cao</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                    <tr>
                        <td>Họ và tên</td>
                        <td>
                            <input type="text" name="txt_ten" class="form-control" required>
                            <div id="error" style="margin-bottom: 10px;color: red;font-style: italic;">
                                <?php
                                if(count($errors) >0 ){
                                    foreach ($errors as $error)
                                        echo $error;
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>
                            <input type="text" name="txt_sdt" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="txt_email" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>
                            <input type="text" name="txt_diachi" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td>
                            <input type="text" name="txt_tendn" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="password" name="txt_matkhau" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Nhóm người dùng</td>
                        <td>
                            <select name="sl_nhomnd" class="form-control">
                                <option value="">---Chọn nhóm người dùng---</option>
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