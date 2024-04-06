<div>
    <form class="form p-4" method="post" action="" enctype="multipart/form-data">
        <?php
        if (!empty($msg)) {
            getMsg($msg, $msgType);
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <label class="form-label" for="">Tên khách hàng</label class="form-label">
                    <input class="form-control" type="text" name="name" value="<?= $user['HoTen'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Email</label>
                    <input class="form-control" type="email" name="email" value="<?= $user['Email'] ?>">

                </div>
                <div>
                    <label class="form-label" for="">Địa chỉ</label class="form-label">
                    <input class="form-control" type="text" name="address" value="<?= $user['DiaChi'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Số điện thoại</label class="form-label">
                    <input class="form-control" type="text" name="phone" value="<?= $user['SDT'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Mật khẩu</label class="form-label">
                    <input class="form-control" type="password" name="password" value="<?= $user['MatKhau'] ?>">
                </div>
                <div>
                    <label class="form-label" for="">Cấp quyền admin</label class="form-label">
                    <div class="form-control">
                        <input type="radio" name="admin" value="1" <?php if ($user['Admin'] == 1) echo 'checked' ?>> Có
                        <input type="radio" name="admin" value="0" <?php if ($user['Admin'] == 0) echo 'checked' ?>> Không
                    </div>
                </div>

            </div>
            <br>
            <div class="text-center">
                <input class="btn btn-danger m-5" type="submit" name="editUser_submit" value="Sửa">
            </div>

            <hr>

            <div class="text-center">
                <a class="" href="?modules=user&action=userlist" style="text-decoration: none; color: #333">Quay lại</a>
            </div>
            <br>
    </form>
</div>