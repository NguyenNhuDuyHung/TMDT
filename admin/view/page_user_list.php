<div class="p-5">
    <p class="text-center">QUẢN LÝ NGƯỜI DÙNG</p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Admin</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userPage as $user) : ?>
                <tr>
                    <td><?= $user['MaKhachHang'] ?></td>
                    <td><?= $user['HoTen'] ?></td>
                    <td><?= $user['Email'] ?></td>
                    <td><?= $user['DiaChi'] ?></td>
                    <td><?= $user['SDT'] ?></td>
                    <td><?= $user['Admin'] ?></td>
                    <td><?= $user['TrangThai'] ?></td>

                    <td>
                        <a href="?modules=user&action=update&id=<?= $user['MaKhachHang'] ?>" class="btn btn-success">Sửa</a>
                        <a href="?modules=user&action=delete&id=<?= $user['MaKhachHang'] ?>" class="btn btn-danger">Xóa</a>
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
                    <a class="page-link" href="?modules=user&action=list&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>


</div>