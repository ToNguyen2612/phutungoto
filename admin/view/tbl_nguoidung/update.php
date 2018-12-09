<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Người dùng
                <small>Cập nhật Người dùng</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                    <tr>
                        <td>Họ tên</td>
                        <td>
                            <input type="text" name="txt_hoten" class="form-control" value="<?= $nguoidung['hoten']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>
                            <input type="text" name="txt_sdt" class="form-control" value="<?= $nguoidung['sdt']?>"  required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="txt_email" class="form-control" value="<?= $nguoidung['email']?>"required>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>
                            <input type="text" name="txt_diachi" class="form-control"value="<?= $nguoidung['diachi']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td>
                            <input type="text" name="txt_tendn" class="form-control" value="<?= $nguoidung['tendangnhap']?>"required>
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="text" name="txt_matkhau" class="form-control" value="<?= $nguoidung['matkhau']?>"required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="btn btn-primary" type="submit" name="btn_submit" value="Cập nhật">
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