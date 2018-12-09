
<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý Hóa đơn
            <small>Danh sách Hóa đơn</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary btn-sm" href="?c=hoadon&a=create">
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
                <th>Mã hóa đơn</th>
                <th>Mã khách hàng  </th>
                <th>Tên khách hành</th>
                <th>Số điện thoại </th>
                <th>Email </th>
                <th>Địa chỉ</th>
                <th>Ngày tạo hóa đơn </th>
                <th>Tình trạng </th>

                <th colspan="2">Thao tác</th>
            </tr>
            <?php foreach ($hoadon as $hd):?>
            <?php foreach ($listhd as $lhd):?>

                <tr>
                    <td><?= $hd['id_hoadon'] ?></td>
                    <td><?php
//                        var_dump( $lhd);die;
                        $hd['id_khach']== null? "null" :$hd['id_khach']
                        ?></td>
                    <td><?php $hd['id_khach']== null? $lhd['tenkhach']:$hd['hoten'] ?></td>
                    <td><?php $hd['id_khach']== null? $lhd['sdt']:$hd['sdt'] ?></td>
                    <td><?php $hd['id_khach']== null? $lhd['email']:$hd['email'] ?></td>
                    <td><?php $hd['id_khach']== null? $lhd['diachi']:$hd['diachi'] ?></td>

                    <td><?= $hd['ngaytao'] ?></td>
                    <td><?php
                        if ($hd['tinhtrang'] == 0){
                            echo "Đã thanh toán";
                        }else if ($hd['tinhtrang'] == 1){
                            echo "Chưa thanh toán";
                        }else{
                            echo "Đang chờ hàng";
                        }
                        ?></td>
                    <td>
                        <a class="btn" href='index.php?c=dsquyen&a=update&id=<?= $dsq['id_dsquyen']?>'>
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"
                           href="index.php?c=dsquyen&a=delete&id=<?= $dsq['id_dsquyen']?>">
                            <span class="glyphicon glyphicon-trash text-danger"></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
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