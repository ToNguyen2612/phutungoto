<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Chi tiết bộ phận
                <small>Thêm mới Chi tiết bộ phận</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                    <tr>
                        <td>Chi tiết bộ phận</td>
                        <td>
                            <input type="text" name="txt_chitiet" class="form-control" value="<?= $chitiet['chitietbophan']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên bộ phận</td>
                        <td>
                            <input type="text" name="txt_ten" class="form-control" value="<?= $chitiet['tenbophan']?>"  required>
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