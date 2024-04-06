<section class="section awe-section-1 mt-3">
    <div class="container section px-md-0 mt-lg-0 mt-3">
        <div class="section__slider section_slider clearfix">
            <div class="home__slider home-slider d-flex align-items-center slick-initialized slick-dotted">
                <button class="slick-prev slick-arrow slick-hover">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <div class="slick-track slick-track-banner">
                    <div class="slick-slider">
                        <img src="../../content/img/banner1.webp" alt="">
                    </div>
                    <div class="slick-slider">
                        <img src="../../content/img/banner2.jpg" alt="">
                    </div>
                </div>
                <button class="slick-next slick-arrow slick-hover">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
                <ul class="slick-dots">
                    <li class="active"></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section-2 section_product_new section">
    <div class="container py-2 card border-0">
        <div class="section-2__container">
            <div class="heading__bar title_module_main heading-bar d-flex justify-content-between align-items-center">
                <h2 class="heading__bar-title">
                    Sản phẩm bán chạy
                </h2>
            </div>

            <div class="product__new-section slick-new mt-3 slick-initialized">
                <div class="slick-list slick-new mt-3 slick-initialized">
                    <div class="slick-track slick-track-product">
                        <?php $count = 0 ?>
                        <?php foreach ($productHotList as $product) : ?>
                            <div class="slick-slide col-md-12 col-6 slick-slide slick-current slick-active slick-product">
                                <div class="item__product-main">
                                    <div class="product__wrap">
                                        <div class="product-thumbnail">
                                            <a class="img-thumb" href="?modules=product&action=details&id=<?= $product['MaSanPham'] ?>">
                                                <img src="../../content/img/<?= $product['HinhAnh'] ?>" alt="">
                                            </a>
                                            <a href="?modules=product&action=details&id=<?= $product['MaSanPham'] ?>" class="group-overlay">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </div>

                                        <div class="product-info">
                                            <h3 class="product-name">
                                                <a href="?modules=product&action=details&id=<?= $product['MaSanPham'] ?>"><?= $product['TenSanPham'] ?></a>
                                            </h3>

                                            <div class="price-box">
                                                <span class="price">
                                                    <?= $product['Gia'] ?>đ
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; ?>
                                    <?php if ($count == 4) break; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php foreach ($categoryList as $category) : ?>
    <section class="section-2 section_product_new section">
        <div class="container py-2 card border-0">
            <div class="section-2__container">
                <div class="heading__bar title_module_main heading-bar d-flex justify-content-between align-items-center">
                    <h2 class="heading__bar-title">
                        <a href="?modules=page&action=category&id=<?= $category['MaDanhMuc'] ?>"><?= $category['TenDanhMuc'] ?></a>
                    </h2>
                </div>

                <div class="product__new-section slick-new mt-3 slick-initialized">
                    <div class="slick-list slick-new mt-3 slick-initialized">
                        <div class="slick-track slick-track-product">
                            <?php $count = 0 ?>
                            <?php foreach ($productList as $product) : ?>
                                <?php if ($product['MaDanhMuc'] == $category['MaDanhMuc']) : ?>
                                    <div class="slick-slide col-md-12 col-6 slick-product">
                                        <div class="item__product-main">
                                            <div class="product__wrap">
                                                <div class="product-thumbnail">
                                                    <a class="img-thumb" href="?modules=product&action=details&id=<?= $product['MaSanPham'] ?>">
                                                        <img src="../../content/img/<?= $product['HinhAnh'] ?>" alt="">
                                                    </a>
                                                    <a href="?modules=product&action=details&id=<?= $product['MaSanPham'] ?>" class="group-overlay">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                </div>

                                                <div class="product-info">
                                                    <h3 class="product-name">
                                                        <a href=""><?= $product['TenSanPham'] ?></a>
                                                    </h3>

                                                    <div class="price-box">
                                                        <span class="price">
                                                            <?= $product['Gia'] ?>đ
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count++; ?>
                                    <?php if ($count == 4) break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="product__view-all">
                    <a href="?modules=page&action=category&id=<?= $category['MaDanhMuc'] ?>" class="btn-view-all">
                        Xem tất cả
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>