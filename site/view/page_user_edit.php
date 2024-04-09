<section class="section section-cart">
    <div class="container section-cart-container">
        <div class="form-container">
            <h2 class="form-title">Cập nhật thông tin</h2>
            <div class="form-checkout">
                <?php
                if (!empty($msg)) {
                    getMsg($msg, $msgType);
                }
                ?>
                <form action="" method="post">
                    <div class="form-group mg-form">
                        <label for="Email">Họ và tên</label>
                        <input name="fullname" type="fullname" class="form-control" placeholder="Họ và tên" value="<?php
                                                                                                                    echo $userQuery['HoTen'];;
                                                                                                                    ?>">
                        <?php
                        // echo (!empty($errors['fullname'])) ? '<span class="error">' .reset($errors['fullname']). '</span>' : null;
                        // reset: Lấy ra phần tử đầu tiên bên trong mảng
                        // Vì mảng bây giờ ta đang dùng dạng key ASSOC, không phải key dạng index nên ta không thể dùng $errors[0];
                        if (!empty($errors)) {
                            echo formError('fullname', '<span class="error">', '</span>', $errors);
                        }
                        ?>
                    </div>
                    <div class="form-group mg-form">
                        <label for="Email">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Địa chỉ email" value="<?php
                                                                                                                    echo $userQuery['Email'];
                                                                                                                    ?>">
                        <?php
                        // echo (!empty($errors['fullname'])) ? '<span class="error">' .reset($errors['fullname']). '</span>' : null;
                        // reset: Lấy ra phần tử đầu tiên bên trong mảng
                        // Vì mảng bây giờ ta đang dùng dạng key ASSOC, không phải key dạng index nên ta không thể dùng $errors[0];
                        if (!empty($errors)) {
                            echo formError('email', '<span class="error">', '</span>', $errors);
                        }
                        ?>
                    </div>
                    <div class="form-group mg-form">
                        <label for="">Số điện thoại</label>
                        <input name="phone" type="text" class="form-control" placeholder="Số điện thoại" value="<?php
                                                                                                                echo $userQuery['SDT'];
                                                                                                                ?>">
                        <?php
                        // echo (!empty($errors['fullname'])) ? '<span class="error">' .reset($errors['fullname']). '</span>' : null;
                        // reset: Lấy ra phần tử đầu tiên bên trong mảng
                        // Vì mảng bây giờ ta đang dùng dạng key ASSOC, không phải key dạng index nên ta không thể dùng $errors[0];
                        if (!empty($errors)) {
                            echo formError('phone', '<span class="error">', '</span>', $errors);
                        }
                        ?>
                    </div>
                    <div class="form-group mg-form">
                        <label for="">Địa chỉ</label>
                        <input name="address" type="text" class="form-control" placeholder="Địa chỉ" value="<?php
                                                                                                            echo $userQuery['DiaChi'];
                                                                                                            ?>">
                        <?php
                        // echo (!empty($errors['fullname'])) ? '<span class="error">' .reset($errors['fullname']). '</span>' : null;
                        // reset: Lấy ra phần tử đầu tiên bên trong mảng
                        // Vì mảng bây giờ ta đang dùng dạng key ASSOC, không phải key dạng index nên ta không thể dùng $errors[0];
                        if (!empty($errors)) {
                            echo formError('address', '<span class="error">', '</span>', $errors);
                        }
                        ?>
                    </div>
                    <div class="form-group mg-form">
                        <label for="Password">Mật khẩu</label>
                        <input name="password" type="text" class="form-control" placeholder="Mật khẩu (Nếu không thay đổi thì không nhập)" value="<?php
                                                                                                                if (!empty($errors)) {
                                                                                                                    // echo (!empty($old['fullname'])) ? $old['fullname'] : null;
                                                                                                                    echo oldInfo('password', $old);
                                                                                                                }
                                                                                                                ?>">
                        <?php
                        // echo (!empty($errors['fullname'])) ? '<span class="error">' .reset($errors['fullname']). '</span>' : null;
                        // reset: Lấy ra phần tử đầu tiên bên trong mảng
                        // Vì mảng bây giờ ta đang dùng dạng key ASSOC, không phải key dạng index nên ta không thể dùng $errors[0];
                        if (!empty($errors)) {
                            echo formError('password', '<span class="error">', '</span>', $errors);
                        }
                        ?>
                    </div>
                    <div class="form-group mg-form">
                        <label for="Password">Nhập lại mật khẩu</label>
                        <input name="password_confirm" type="text" class="form-control" placeholder="Nhập lại mật khẩu (Nếu không thay đổi thì không nhập)" value="<?php
                                                                                                                                if (!empty($errors)) {
                                                                                                                                    // echo (!empty($old['fullname'])) ? $old['fullname'] : null;
                                                                                                                                    echo oldInfo('password_confirm', $old);
                                                                                                                                }
                                                                                                                                ?>">
                        <?php
                        // echo (!empty($errors['fullname'])) ? '<span class="error">' .reset($errors['fullname']). '</span>' : null;
                        // reset: Lấy ra phần tử đầu tiên bên trong mảng
                        // Vì mảng bây giờ ta đang dùng dạng key ASSOC, không phải key dạng index nên ta không thể dùng $errors[0];
                        if (!empty($errors)) {
                            echo formError('password_confirm', '<span class="error">', '</span>', $errors);
                        }
                        ?>
                    </div>

                    <p class="text-center btn-checkout">
                        <button type="submit" class="btn btn-primary btn-block mg-btn">Cập nhật</button>
                    </p>

                    <hr>
                    <div class="text-center">
                        <a class="option-register" href="?modules=user&action=info">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>