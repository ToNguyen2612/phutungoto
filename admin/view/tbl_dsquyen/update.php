<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Danh sách quyền
                <small>Cập nhật Danh sách quyền</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                    <tr>
                        <td>Menu bị tác động</td>
                        <td>
                            <select name="sl_menu" class="form-control">
                                <option value="">---Chọn menu---</option>
<!--                                --><?php //foreach($nhomnd as $nnd): ?>
<!--                                    <option-->
<!--                                        --><?//= $nnd['id_nhomnd'] == $dsquyen['kieunguoidung_id'] ? 'selected' : ''?>
<!--                                            value="--><?//=$nnd['id_nhomnd']?><!--">-->
<!--                                        --><?//=$nnd['ten']?><!--</option>-->
<!--                                --><?php //endforeach; ?>
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
                            <input type="checkbox" name="kieuquyen[]" value="Thêm" <?= $dsquyen['kieuquyen']== "Thêm"?'checked':"" ?> >Thêm
                            <input type="checkbox" name="kieuquyen[]" value="Xem" <?= $dsquyen['kieuquyen']== "Xem"?'checked':"" ?> > Xem
                            <input type="checkbox" name="kieuquyen[]" value="Sửa" <?= $dsquyen['kieuquyen']== "Sửa"?'checked':"" ?> > Sửa
                            <input type="checkbox" name="kieuquyen[]" value="Xóa" <?= $dsquyen['kieuquyen']== "Xóa"?'checked':"" ?> > Xóa
                        </td>
                    </tr>
                    <tr>
                        <td>Tên nhóm sử dụng quyền</td>
                        <td>
                            <select name="sl_nhomsdq" class="form-control" >
                                <option value="">---Chọn nhóm sử dụng quyền---</option>
                                <?php foreach($nhomnd as $nnd): ?>
                                    <option
                                        <?= $nnd['id_nhomnd'] == $dsquyen['kieunguoidung_id'] ? 'selected' : ''?>
                                            value="<?=$nnd['id_nhomnd']?>">
                                        <?=$nnd['ten']?></option>
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