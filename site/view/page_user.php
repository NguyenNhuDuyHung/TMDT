<div class="container my-3">
    <?php
    if (!empty($msg)) {
        getMsg($msg, $msgType);
    }
    ?>

    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">THÔNG TIN KHÁCH HÀNG</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center" style="font-size: 1.6rem;">
            <p><b>Họ tên: </b><?= $user['HoTen'] ?></p>
            <p><b>Email: </b><?= $user['Email'] ?></p>
            <p><b>Số điện thoại: </b><?= $user['SDT'] ?></p>
            <p><b>Địa chỉ: </b><?= $user['DiaChi'] ?></p>
            <div class="row">
                <div class="col-md-12" style="margin: 10px 0">
                    <a href="?modules=user&action=edit&id=<?= $user['MaKhachHang'] ?>" class="btn btn-primary">Sửa thông tin</a>
                </div>
                <?php if ($user['Admin'] == 1) : ?>
                    <div class="col-md-12" style="margin: 10px 0">
                        <a href="../../admin/?modules=category&action=list" class="btn btn-success">Trang Admin</a>
                    </div>
                <?php endif; ?>
                <div class="col-md-12" style="margin: 10px 0">
                    <a href="?modules=user&action=logout" class="btn btn-danger">Đăng xuất</a>

                </div>
            </div>
        </div>
    </div>
</div>