<div>
    <form class="form p-4" method="post" action="" enctype="multipart/form-data">
        <p>Thêm sản phẩm</p>
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label class="form-label" for="">Tên sản phẩm</label class="form-label">
                    <input class="form-control" type="text" name="name" id="">
                </div>
                <div>
                    <label class="form-label" for="">Danh Mục</label>
                    <select class="form-select" name="category">
                        <?php foreach ($dsdm as $dm) : ?>
                            <option value="<?= $dm['MaDanhMuc'] ?>"><?= $dm['TenDanhMuc'] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div>
                    <label class="form-label" for="">Giá</label class="form-label">
                    <input class="form-control" type="number" name="price" id="">
                </div>
                <div>
                    <label class="form-label" for="">Giá khuyến mãi</label class="form-label">
                    <input class="form-control" type="number" name="sale" id="">
                </div>
                <div>
                    <label class="form-label" for="">Mô tả</label class="form-label">
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                </div>

            </div>
            <div class="col-md-6">
                <div>
                    <label class="form-label" for="">Hình ảnh</label class="form-label">
                    <input class="form-control" type="file" name="image" id="">
                </div>
                <div>
                    <label class="form-label" for="">Số Lượng</label class="form-label">
                    <input class="form-control" type="number" name="quantity" id="">
                </div>
                <div>
                    <label class="form-label" for="">Sản phẩm nổi bật</label class="form-label">
                    <div class="form-control">
                        <input type="radio" name="hot" value="1"> Có
                        <input type="radio" name="hot" value="0"> Không
                    </div>
                    <div>
                        <label class="form-label" for="">Trạng thái</label class="form-label">
                        <select class="form-select" name="status" id="">
                            <option value="Đang hoạt động">Đang hoạt động</option>
                            <option value="Tạm ngưng">Tạm ngưng</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <input class="btn btn-danger m-5" type="submit" name="addProduct_submit" value="Thêm">
                </div>

                <hr>

                <div class="text-center">
                    <a class="" href="?modules=user&action=list" style="text-decoration: none; color: #333">Quay lại</a>
                </div>
    </form>
</div>