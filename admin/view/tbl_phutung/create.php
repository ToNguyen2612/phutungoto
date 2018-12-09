<?php
require_once PATH_APPLICATION . '/view/partials/head.php';
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Phụ tùng
                <small>Thêm mới Phụ tùng</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <form action="" method="post" enctype="multipart/form-data">
                    <tr>
                        <td>Tên phụ tùng</td>
                        <td>
                            <input type="text" name="txt_ten" class="form-control" required>
<!--                            <div id="error" style="margin-bottom: 10px;color: red;font-style: italic;">-->
<!--                                --><?php
//                                if(count($errors) >0 ){
//                                    foreach ($errors as $error)
//                                        echo $error;
//                                }
//                                ?>
<!--                            </div>-->
                        </td>
                    </tr>
                    <tr>
                        <td>Giá</td>
                        <td>
                            <input type="text" name="txt_gia" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Xuất xứ</td>
                        <td>
                            <select name="sl_xuatxu" class="form-control">
                                <option value="">---Chọn xuất xứ---</option>
                                <?php foreach($xuatxu as $xx): ?>
                                    <option value="<?=$xx['id']?>"><?=$xx['quocgia']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Dòng xe</td>
                        <td>
                            <select name="sl_dongxe" class="form-control">
                                <option value="">---Chọn dòng xe---</option>
                                <?php foreach($dongxe as $dx): ?>
                                    <option value="<?=$dx['id_dongxe']?>"><?=$dx['ten_dx']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ảnh</td>
                        <td>
                            <input type="file" name="anh"></td>
                    </tr>
                    <tr>
                        <td>Phân loại</td>
                        <td>
                            <select name="sl_chitiet" class="form-control">
                                <option value="">---Chọn chi tiết bộ phận---</option>
                                <?php foreach($chitiet as $ct): ?>
                                    <option value="<?=$ct['id_chitiet']?>"><?=$ct['chitietbophan']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td>
                            <textarea name="txt_mota" id="mota" class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Số lượng</td>
                        <td>
                            <input type="text" name="txt_soluong" class="form-control" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Đường dẫn</td>
                        <td>
                            <input type="text" name="txt_duongdan" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Sản phẩm cha</td>
                        <td>
                            <select name="sl_spcha" class="form-control">
                                <option value="">---Chọn phụ tùng cha---</option>
                                <?php
                                foreach($listpt as $pts):?>
                                    <option value="<?=$pts['id_phutung']?>"><?=$pts['ten']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <select name="sl_type" class ="form-control">
                                <option value="0">Sản phẩm gốc</option>
                                <option value="1">Sản phẩm đã thay đổi</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ẩn Hiện	</td>
                        <td>
                            <input type="checkbox" name="cbx_anhien"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Vị trí</td>
                        <td>
                            <input type="number" name="txt_vitri" class="form-control">
                        </td>
                    </tr>

<!--                    <tr>-->
<!--                        <td>Ngày đăng</td>-->
<!--                        <td>-->
<!--                            <input type="datetime-local" name="txt_ngaydang" class="form-control" required>-->
<!--                        </td>-->
<!--                    </tr>-->

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
    <script>
        CKEDITOR.replace( 'mota' );
    </script>

<?php
require_once PATH_APPLICATION . '/view/partials/foot.php';
?>