<div class="p-5">
    <p class="text-center">QUẢN LÝ SẢN PHẨM</p>
    <a href="?modules=order&action=add" class="btn btn-primary">Thêm sản phẩm</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã chi tiết đơn hàng</th>
                <th>Mã khách hàng</th>
                <th>Mã sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userOrder as $order) : ?>
                <tr>
                    <td><?= $order['MaChiTietDH'] ?></td>
                    <td><?= $order['MaKhachHang'] ?></td>
                    <td><?= $order['MaSanPham'] ?></td>
                    <td><?= $order['GiaBan'] ?>đ</td>
                    <td><?= $order['SoLuong'] ?> </td>
                    <td><?= $order['TrangThai'] ?></td>
                    <td>
                        <a href="?modules=order&action=delete&id=<?= $order['MaChiTietDH'] ?>" class="btn btn-danger">Xóa</a>
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
                    <a class="page-link" href="?modules=order&action=orderlist&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>


</div>