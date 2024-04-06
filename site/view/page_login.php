<section class="section section-cart">
    <div class="container section-cart-container">
        <div class="form-container">
            <h2 class="form-title">Đăng nhập</h2>
            <div class="form-checkout">
                <?php
                if (!empty($msg)) {
                    getMsg($msg, $msgType);
                }
                ?>
                <form action="" method="post">
                    <div class="form-group mg-form">
                        <label for="Email">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Địa chỉ email" value="<?php
                                                                                                                    if (!empty($errors)) {
                                                                                                                        // echo (!empty($old['fullname'])) ? $old['fullname'] : null;
                                                                                                                        echo oldInfo('email', $old);
                                                                                                                    }
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
                        <label for="Email">Mật khẩu</label>
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu" value="<?php
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

                    <p class="text-center btn-checkout">
                        <button type="submit" class="btn btn-primary btn-block mg-btn">Đăng nhập</button>
                    </p>

                    <hr>
                    <div class="text-center">
                        <h3>Bạn chưa có tài khoản?
                            <a class="option-register" href="?modules=user&action=register">Đăng ký</a>
                        </h3>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>