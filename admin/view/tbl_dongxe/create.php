<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Dòng xe
                <small>Thêm mới Dòng Xe</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                    <tr>
                        <td>Tên dòng xe</td>
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
                        <td>Thuộc hãng xe</td>
                        <td>
                            <select name="sl_hangxe" class="form-control">
                                <option value="">Chọn hãng xe</option>
                                <?php foreach($hx as $hangxe): ?>
                                    <option value="<?=$hangxe['id']?>"><?=$hangxe['ten']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Năm sản xuất</td>
                        <td>
                            <input type="text" name="txt_namsx" class="form-control" required>
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