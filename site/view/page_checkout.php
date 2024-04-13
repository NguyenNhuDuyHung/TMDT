<section class="section section-cart">
    <div class="container section-cart-container">
        <div class="cart-main">
            <div class="checkout-product">
                <?php if (isset($_SESSION['cartUser'])) : ?>
                    <?php $count = 0; ?>
                    <?php foreach ($_SESSION['cartUser'] as $item) : ?>
                        <?php
                        $count = number_format(ceil($item['SL'] * $item['Gia']) + $count, 3, '.', '.')
                        ?>
                        <div class="checkout-content-product">
                            <div class="cart-img-product">
                                <img src="../../content/img/<?= $item['HinhAnh'] ?>" alt="">
                            </div>
                            <div class="product__info-left-details product-buttons-details">
                                <h2><?= $item['TenSanPham'] ?></h2>
                                <div class="product-buttons-details-wrap">
                                    <div class="input__quantity-btn">
                                        <div class="input__quantity-btn">
                                            <h4 style="font-weight: 400;">x <?= $item['SL'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-sum-title">
                                <h4>Thành tiền: <?= number_format(ceil($item['SL'] * $item['Gia']), 3, '.', '.'); ?>₫</h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="checkout-price" style="display: flex; justify-content: flex-end; padding: 20px 30px 20px 0 ;">
                    <h4>Tổng tiền: <?= $count ?>₫</h4>
                </div>
            </div>
        </div>


        <div class="form-container">
            <h2 class="form-title">Thông tin người nhận hàng</h2>
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
                                                                                                                    if (!empty($_SESSION['user'])) {
                                                                                                                        echo $_SESSION['user']['HoTen'];
                                                                                                                    }
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
                                                                                                                    if (!empty($_SESSION['user'])) {
                                                                                                                        echo $_SESSION['user']['Email'];
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
                        <label for="Email">Số điện thoại</label>
                        <input name="phone" type="text" class="form-control" placeholder="Số điện thoại" value="<?php
                                                                                                                if (!empty($_SESSION['user'])) {
                                                                                                                    echo $_SESSION['user']['SDT'];
                                                                                                                }
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
                                                                                                            if (!empty($_SESSION['user'])) {
                                                                                                                echo $_SESSION['user']['DiaChi'];
                                                                                                            }
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

                    <a class="text-center btn-checkout" style="display: block;" href="?modules=order&action=success">
                        <button type="submit" class="btn btn-primary btn-block mg-btn">Đặt hàng</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>