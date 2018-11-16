
<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý Hãng Xe
            <small>Danh sách Hãng Xe</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary btn-sm" href="?c=hangxe&a=create">
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
                <th>Mã hãng xe</th>
                <th>Tên hãng xe</th>
                <th>Logo</th>
                <th>Nước sản xuất</th>
                <th colspan="2">Thao tác</th>
            </tr>
            <?php foreach ($hangxes as $hx):?>
                <tr>
                    <td><?= $hx['id'] ?></td>
                    <td><?= $hx['ten'] ?></td>
                    <td><?= $hx['logo'] ?></td>
                    <td><?= $hx['nuocsx'] ?></td>
                    <td>
                        <a class="btn" href='index.php?c=hangxe&a=update&id=<?= $hx['id']?>'>
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"
                           href="index.php?c=hangxe&a=delete&id=<?= $hx['id']?>">
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