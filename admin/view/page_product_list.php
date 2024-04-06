<div class="p-5">
    <p class="text-center">QUẢN LÝ SẢN PHẨM</p>
    <a href="?modules=product&action=add" class="btn btn-primary">Thêm sản phẩm</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product_page as $sp) : ?>
                <tr>
                    <td><?= $sp['MaSanPham'] ?></td>
                    <td><?= $sp['TenSanPham'] ?></td>
                    <td><?= $sp['Gia'] ?> đ</td>
                    <td><?= $sp['GiaKhuyenMai'] ?> đ</td>
                    <td><img src="../content/img/<?= $sp['HinhAnh'] ?>" width="60px" alt=""></td>
                    <td><?= $sp['TenDanhMuc'] ?></td>
                    <td><?= $sp['SoLuong'] ?></td>
                    <td><?= $sp['TrangThai'] ?></td>
                    <td>
                        <a href="?modules=product&action=edit&id=<?= $sp['MaSanPham'] ?>" class="btn btn-success">Sửa</a>
                        <a href="?modules=product&action=delete&id=<?= $sp['MaSanPham'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- danh sách sản phẩm có phân trang -->
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $number_page; $i++) : ?>
                <li class="page-item">
                    <a class="page-link" href="?modules=product&action=productlist&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>


</div>