<div class="p-5 vh-100">
    <h3 class="text-center">Quản lý danh mục</h3>
    <div >
        <a class="btn btn-primary" href="?modules=category&action=add">Thêm danh mục</a>
    </div>
    
    <table class="table table-hover ">
        <thead>
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dsdm as $dm): ?>
            <tr>
                <td><?=$dm['MaDanhMuc']?></td>
                <td><?=$dm['TenDanhMuc']?></td>
                <td><?=$dm['TrangThai']?></td>
                <td>
                    <a class="btn btn-primary" href="?modules=category&action=editCate&id=<?=$dm['MaDanhMuc']?>">Sửa</a>
                    <a class="btn btn-danger" href="?modules=category&action=delete&id=<?=$dm['MaDanhMuc']?>">Xóa</a>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>