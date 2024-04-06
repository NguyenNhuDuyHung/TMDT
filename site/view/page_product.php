<div class="product__container">
    <div class="grid wide">
        <div class="row sm-gutter product__content">
            <div class="product__img-wrap col p-5">
                <img src="../../content/img/<?= $product['HinhAnh'] ?>" alt="product" class="product__img">
            </div>
            <div class="product__infomation col p-7">
                <div class="product__infomation-wrap">
                    <h1 class="title-product"><?= $product['TenSanPham'] ?></h1>
                    <div class="product__infomation-details row">
                        <div class="product__info-left col p-7">
                            <div class="product__info-left-details product-price-box">
                                <span>
                                    <?= $product['Gia'] ?>₫
                                </span>
                            </div>

                            <div class="product__info-left-details product--buy-support">
                                <div class="product--buy-support-wrap">
                                    <label for="">
                                        <i class="fas fa-users mr-2"></i>
                                        Hỗ trợ mua hàng
                                    </label>
                                    <ul class="product--buy-support-list">
                                        <li class="sp">
                                            <span>
                                                Hotline tư vấn 1: 0399 522 549
                                            </span>
                                        </li>
                                        <li class="sp">
                                            <span>
                                                Hotline tư vấn 2: 0333 505 078
                                            </span>
                                        </li>
                                        <li class="sp">
                                            <span>
                                                Email tư vấn: dacsanmientayquetoi2016@gmail.com
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <div class="product__info-left-details product__buy">
                                <div class="product__buy-btn">
                                    <form action="?modules=cart&action=add&id=<?= $product['MaSanPham'] ?>" method="post">
                                        <div class="product__info-left-details product-buttons-details">
                                            <div class="product-buttons-details-wrap">
                                                <label for="" style="display: flex;">Số lượng</label>
                                                <div class="input__quantity-btn">
                                                    <div class="input__quantity-btn">
                                                        <input type="number" name="SoLuong" id="" role="spinbutton" aria-live="assertive" aria aria-valuenow="1" value="1" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn--primary btn-addCart">
                                            <span>Mua ngay</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="product__infor-right col p-5">
                            <div class="product-policises-wrapper">
                                <h5>Chỉ có ở Chợ Quê ONLINE:</h5>
                                <ul>
                                    <li>
                                        <div>
                                            <img src="https://choqueonline.vn/public/template/images/policy_product_image_1.png?v=275" alt="">
                                        </div>
                                        <div class="media-body">100% tự nhiên</div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="https://choqueonline.vn/public/template/images/policy_product_image_3.png?v=275" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <div>Hàng mới mỗi ngày</div>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-trustbadge">
                                <a href="">
                                    <img src="https://choqueonline.vn/public/template/images/product_banner_img.webp?v=275" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>