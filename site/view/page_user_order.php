<section class="section section-cart">
    <div class="container section-cart-container">
        <div class="checkout-main" style="padding: 20px 0;">
            <h1 style="padding: 0 50px;">Đơn hàng</h1>  
            <div class="checkout-product">
                <?php if (isset($orderQuery)) : ?>
                    <?php $count = 0; ?>
                    <?php foreach ($orderQuery as $orderQuery) : ?>
                        <?php
                        $count = number_format(ceil($orderQuery['SoLuong'] * $orderQuery['GiaBan']) + $count, 3, '.', '.');
                        ?>

                        <div class="checkout-content-product">
                            <div class="cart-img-product">
                                <img src="../../content/img/<?= $orderQuery['HinhAnh'] ?>" alt="">
                            </div>
                            <div class="product__info-left-details product-buttons-details">
                                <h2><?= $orderQuery['TenSanPham'] ?></h2>
                                <div class="product-buttons-details-wrap">
                                    <div class="input__quantity-btn">
                                        <div class="input__quantity-btn">
                                            <h4 style="font-weight: 400;">x <?= $orderQuery['SoLuong'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-sum-title">
                                <h4>Thành tiền: <?= number_format(ceil($orderQuery['SoLuong'] * $orderQuery['GiaBan']), 3, '.', '.'); ?>₫</h4>
                                <!-- <div class="order-status" style="padding-top:20px">
                                    <?php if ($orderQuery['TrangThai'] != 'Đã hủy') : ?>
                                        <h3 style="color: var(--primary-color);">
                                            Trạng thái: <?= $orderQuery['TrangThai'] ?>
                                        </h3>
                                    <?php else : ?>
                                        <h3 style="color: red">
                                            Trạng thái: <?= $orderQuery['TrangThai'] ?>
                                        </h3>
                                    <?php endif; ?>
                                </div> -->
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (empty($orderQuery)) : ?>
                    <div class="no-product" style="padding: 40px; text-align:center;">
                        <h2>(Chưa có đơn hàng nào) nhấn vào
                            <a href="?modules=page&action=home">cửa hàng</a>
                            để mua hàng
                        </h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>