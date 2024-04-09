<div class="p-3 vh-100">
    <form method="post" action="" enctype="multipart/form-data" class="form p-3 ">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <label for="">Tên danh mục</label>
                    <input value="<?= $categoryQuery['TenDanhMuc'] ?>" type="text" name="name" class="form-control">
                </div>

                <div>
                    <label for="">Trạng thái</label>
                    <select class="form-select" name="status">
                        <option value="Đang hoạt động" <?php if ($categoryQuery['TrangThai'] == 'Đang hoạt động') echo 'selected'; ?>>Đang hoạt động</option>
                        <option value="Tạm ngưng" <?php if ($categoryQuery['TrangThai'] == 'Tạm ngưng') echo 'selected'; ?>>Tạm ngưng</option>
                    </select>
                </div>
                <div class="text-center">
                    <input class="btn btn-danger m-5" type="submit" name="editCategory_submit" value="Sửa">
                </div>
            </div>
        </div>

    </form>
</div>