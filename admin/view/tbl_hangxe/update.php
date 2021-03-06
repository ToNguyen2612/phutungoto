<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Hãng Xe
                <small>Cập nhật Hãng Xe</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                    <tr>
                        <td>Tên hãng xe</td>
                        <td>
                            <input type="text" name="txt_ten" class="form-control" value="<?= $hx['ten']?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Logo</td>
                        <td>
                            <input type="file" name="image_logo">
                        </td>
                    </tr>
                    <tr>
                        <td>Nước sản xuất</td>
                        <td>
                            <input type="text" name="txt_nuocsx" class="form-control" value="<?= $hx['nuocsx']?>"required>
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