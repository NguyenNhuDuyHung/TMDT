<section class="section section-cart">
    <div class="container">
        <div class="cart-container">
            <div class="cart-title">
                <h2>Giỏ hàng</h2>
            </div>

            <div class="cart-main">
                <div class="cart-product">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php if (isset($_SESSION['cartUser'])) : ?>
                            <?php $count = 0; ?>
                            <?php foreach ($_SESSION['cartUser'] as $item) : ?>
                                <?php
                                $count = number_format(ceil($item['SL'] * $item['Gia']) + $count, 3, '.', '.')
                                ?>
                                <div class="cart-content-product">
                                    <a href="?modules=cart&action=delete&id=<?= $item['MaSanPham'] ?>">
                                        <button class="btn cart-delete-btn">Xóa</button>
                                    </a>
                                    <div class="cart-img-product">
                                        <img src="../../content/img/<?= $item['HinhAnh'] ?>" alt="">
                                    </div>
                                    <div class="product__info-left-details product-buttons-details">
                                        <h2><?= $item['TenSanPham'] ?></h2>
                                        <div class="product-buttons-details-wrap">
                                            <label for="" style="display: flex;">Số lượng</label>
                                            <div class="input__quantity-btn">
                                                <div class="input__quantity-btn">
                                                    <a href="?modules=cart&action=decrease&id=<?= $item['MaSanPham'] ?>">
                                                        <button class="minus btn">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    </a>
                                                    <input type="text" name="" id="" role="spinbutton" aria-live="assertive" aria aria-valuenow="1" value="<?= $item['SL'] ?>">
                                                    <a href="?modules=cart&action=increase&id=<?= $item['MaSanPham'] ?>">
                                                        <button class="plus btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                    </a>
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
                        <?php if (!empty($_SESSION['cartUser'])) : ?>
                            <div class="cart-price" style="display: flex; justify-content: flex-end; padding-right: 30px">
                                <h4>Tổng tiền: <?= $count ?>₫</h4>
                            </div>
                        <?php endif; ?>

                        <?php if (empty($_SESSION['cartUser'])) : ?>
                            <div class="no-product">
                                <h2>(Chưa có sản phẩm nào) nhấn vào
                                    <a href="?modules=page&action=home">cửa hàng</a>
                                    để mua hàng
                                </h2>
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <?php if (isset($_SESSION['cart'])) : ?>
                            <?php $count = 0; ?>
                            <?php foreach ($_SESSION['cart'] as $item) : ?>
                                <?php
                                $count = number_format(ceil($item['SL'] * $item['Gia']) + $count, 3, '.', '.')
                                ?>
                                <div class="cart-content-product">
                                    <a href="?modules=cart&action=delete&id=<?= $item['MaSanPham'] ?>">
                                        <button class="btn cart-delete-btn">Xóa</button>
                                    </a>
                                    <div class="cart-img-product">
                                        <img src="../../content/img/<?= $item['HinhAnh'] ?>" alt="">
                                    </div>
                                    <div class="product__info-left-details product-buttons-details">
                                        <h2><?= $item['TenSanPham'] ?></h2>
                                        <div class="product-buttons-details-wrap">
                                            <label for="" style="display: flex;">Số lượng</label>
                                            <div class="input__quantity-btn">
                                                <div class="input__quantity-btn">
                                                    <a href="?modules=cart&action=decrease&id=<?= $item['MaSanPham'] ?>">
                                                        <button class="minus btn">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    </a>
                                                    <input type="text" name="" id="" role="spinbutton" aria-live="assertive" aria aria-valuenow="1" value="<?= $item['SL'] ?>">
                                                    <a href="?modules=cart&action=increase&id=<?= $item['MaSanPham'] ?>">
                                                        <button class="plus btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                    </a>
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
                        <?php if (!empty($_SESSION['cart'])) : ?>
                            <div class="cart-price" style="display: flex; justify-content: flex-end; padding-right: 30px">
                                <h4>Tổng tiền: <?= $count ?>₫</h4>
                            </div>
                        <?php endif; ?>

                        <?php if (empty($_SESSION['cart'])) : ?>
                            <div class="no-product">
                                <h2>(Chưa có sản phẩm nào) nhấn vào
                                    <a href="?modules=page&action=home">cửa hàng</a>
                                    để mua hàng
                                </h2>
                            </div>
                        <?php endif; ?>


                    <?php endif; ?>
                </div>


                <?php if (isset($_SESSION['user'])) : ?>
                <?php if (!empty($_SESSION['cartUser'])) : ?>
                    <div class="cart-sum-price">
                        <a href="?modules=order&action=checkout">
                            <button type="button" class="btn-continue-booking btn">Tiến hành đặt hàng</button>
                        </a>
                        <a href="?modules=page&action=home">
                            <button type="button" class="btn-continue-buying btn">
                                <i class="icon-continue-buying fa fa-arrow-left"></i>
                                Tiếp tục mua hàng
                            </button>
                        </a>
                    </div>
                <?php else : ?>
                <?php endif; ?>
                    <?php else : ?>
                <?php if (!empty($_SESSION['cart'])) : ?>
                    <div class="cart-sum-price">
                        <a href="?modules=order&action=checkout">
                            <button type="button" class="btn-continue-booking btn">Tiến hành đặt hàng</button>
                        </a>
                        <a href="?modules=page&action=home">
                            <button type="button" class="btn-continue-buying btn">
                                <i class="icon-continue-buying fa fa-arrow-left"></i>
                                Tiếp tục mua hàng
                            </button>
                        </a>
                    </div>
                <?php else : ?>
                <?php endif; ?>
                <?php endif; ?>

            </div>


        </div>
    </div>
</section>