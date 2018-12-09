
<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý Phụ tùng
            <small>Danh sách Phụ tùng</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content" >
        <a class="btn btn-primary btn-sm" href="?c=phutung&a=create">
            <span class="glyphicon glyphicon-plus"></span>
        </a>


        <form method="get" align="center">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <input type="text" class="form-control" name="q" value="">
                </div>
                <div class="col-md-4 text-left">
                    <input class="btn btn-primary" type="submit" value="Tìm kiếm">
                </div>
            </div>
        </form>

        <table class="table table-bordered" cellpadding="10" align="center">
            <tr>
                <th>Mã </th>
                <th>Tên phụ tùng</th>
                <th>Giá</th>
                <th>Xuất xứ</th>
                <th>Dòng xe</th>
                <th>Ảnh</th>
                <th>Phân loại</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Đường dẫn</th>
                <th>Sản phẩm cha</th>
                <th>Type</th>
                <th>Ẩn Hiện</th>
                <th>Vị trí</th>
                <th>Người đăng</th>
                <th>Ngày đăng</th>

                <th colspan="2">Thao tác</th>
            </tr>
            <?php foreach ($phutung as $pt):?>
                <tr>
                    <td style="width: 50px"><?= $pt['id_phutung'] ?></td>
                    <td><?= $pt['ten'] ?></td>
                    <td><?= $pt['gia'] ?></td>
                    <td><?= $pt['quocgia'] ?></td>
                    <td><?= $pt['ten_dx'] ?></td>
                    <td><?= $pt['anh'] ?></td>
                    <td><?= $pt['chitietbophan'] ?></td>
                    <td><?= $pt['mota'] ?></td>
                    <td><?= $pt['soluong'] ?></td>
                    <td><?= $pt['url'] ?></td>
                    <td><?= $pt['parent_id'] ?></td>
                    <td><?= $pt['type'] ?></td>
                    <td style="width: 50px"><?= $pt['an_hien'] ?></td>
                    <td><?= $pt['vitri'] ?></td>
                    <td><?= $pt['hoten'] ?></td>
                    <td><?= $pt['ngaytao'] ?></td>


                    <td>
                        <a class="btn" href='index.php?c=phutung&a=update&id=<?= $pt['id_phutung']?>'>
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"
                           href="index.php?c=phutung&a=delete&id=<?= $pt['id_phutung']?>">
                            <span class="glyphicon glyphicon-trash text-danger"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!--        <div class="text-center">-->
        <!--            <ul class="pagination">-->
        <!--                --><?php //for($i = 1; $i <= $totalPage; $i++):?>
        <!--                    <li --><?//= $i == $p ? 'class="active"' : '' ?><!-->
        <!--                        <a href="?p=--><?//=$i?><!--">--><?//=$i ?><!--</a>-->
        <!--                    </li>-->
        <!--                --><?php //endfor;?>
        <!--            </ul>-->
        <!--        </div>-->

    </section>
    <!-- /.content -->
</div>

<?php
require_once PATH_APPLICATION . '/view/partials/foot.php';
?>