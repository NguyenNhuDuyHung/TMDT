<div>
    <form class="form p-4" method="post" action="" enctype="multipart/form-data">
        <?php
        if (!empty($msg)) {
            getMsg($msg, $msgType);
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label class="form-label" for="">Tên sản phẩm</label class="form-label">
                    <input class="form-control" type="text" name="name" value="<?= $sp['TenSanPham'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Danh Mục</label>
                    <select class="form-select" name="category">
                        <?php
                        foreach ($dsdm as $dm) {
                            if ($dm['MaDanhMuc'] == $sp['MaDanhMuc']) {
                                echo '<option selected value="' . $dm['MaDanhMuc'] . '">' . $dm['TenDanhMuc'] . '</option>';
                            } else {
                                echo '<option value="' . $dm['MaDanhMuc'] . '">' . $dm['TenDanhMuc'] . '</option>';
                            }
                        }
                        ?>
                    </select>

                </div>
                <div>
                    <label class="form-label" for="">Giá</label class="form-label">
                    <input class="form-control" type="number" name="price" value="<?= $sp['Gia'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Giá khuyến mãi</label class="form-label">
                    <input class="form-control" type="number" name="sale" value="<?= $sp['GiaKhuyenMai'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Mô tả</label class="form-label">
                    <textarea class="form-control" name="description" id="" cols="30" rows="10" value="<?= $sp['MoTa'] ?>"></textarea>
                </div>

            </div>
            <div class="col-md-6">
                <div>
                    <label class="form-label" for="">Hình ảnh</label class="form-label">
                    <input class="form-control" type="file" name="image">
                    <img class="my-3" src="../content/img/<?= $sp['HinhAnh'] ?>" width="200" height="250" alt="">
                </div>
                <div>
                    <label class="form-label" for="">Số Lượng</label class="form-label">
                    <input class="form-control" type="number" name="quantity" value="<?= $sp['SoLuong'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Sản phẩm nổi bật</label class="form-label">
                    <div class="form-control">
                        <input type="radio" name="hot" value="1" <?php if ($sp['Hot'] == 1) echo 'checked' ?>> Có
                        <input type="radio" name="hot" value="0" <?php if ($sp['Hot'] == 0) echo 'checked' ?>> Không
                    </div>
                </div>
                <div>
                    <label class="form-label" for="">Trạng thái</label class="form-label">
                    <select class="form-select" name="status" id="">
                        <option value="Đang hoạt động" <?php if ($sp['TrangThai'] == 'Đang hoạt động') echo 'selected' ?>>Đang hoạt động</option>
                        <option value="Tạm ngưng" <?php if ($sp['TrangThai'] == 'Tạm ngưng') echo 'selected' ?>>Tạm ngưng</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="text-center">
                <input class="btn btn-danger m-5" type="submit" name="editProduct_submit" value="Sửa">
            </div>
            <hr>

            <div class="text-center">
                <a class="" href="?modules=product&action=productlist" style="text-decoration: none; color: #333">Quay lại</a>
            </div>
    </form>
</div>