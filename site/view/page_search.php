<section class="section section-cart">
    <div class="container section-container" style="padding: 20px;">
        <div class="section-container-wrap" style="padding: 20px; background-color: #fff">
            <?php if (!empty($_SESSION['search'])) : ?>
                <div class="search-title">
                    <h2>
                        Có
                        <?php echo count($productFilter); ?>
                        kết quả tìm kiếm phù hợp với "<?php echo $keyword; ?>":
                    </h2>
                </div>

                <div class="slick-list slick-new mt-3 slick-initialized">
                    <div class="row content-col">
                        <?php foreach ($productFilter as $product) : ?>
                            <div class="col-6 col-sm-3 product-col">
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
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php else : ?>
                    <div class="search-title">
                    <h2>
                        Có
                        <?php echo count($productFilter); ?>
                        kết quả tìm kiếm phù hợp với "<?php echo $keyword; ?>":
                    </h2>
                </div>
            <?php endif; ?>
        </div>
    </div>endif; ?>
</section>