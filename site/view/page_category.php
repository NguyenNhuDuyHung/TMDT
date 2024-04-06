<div class="section wrap_background">
    <div class="container">
        <div class="bg_collection section">
            <div class="row">
                <aside class="scroll card py-2 dqdt-sidebar sidebar left-content col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <div class="wrap_background_aside asidecollection">
                        <div class="filter-content aside-filter">
                            <div class="filter-container">
                                <button class="btn d-block d-lg-none open-filters p-0">
                                    <i class="fa fa-arrow-left mr-3"></i>
                                </button>

                                <aside class="aside-item border-top filter-price dq-filterxx">
                                    <div class="aside-title">
                                        <h2 class="title-head margin-top-0">
                                            <span>Mức giá</span>
                                        </h2>
                                    </div>

                                    <div class="aside-content filter-group scroll">
                                        <ul>
                                            <li class="filter-item filter-item--check-box filter-price-all">
                                                <a href="<?= $_SERVER['REQUEST_URI'] ?>&min_price=0&max_price=100">
                                                    <span class="filter-select ">Giá dưới 100.000đ</span>
                                                </a>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-price-all">
                                                <a href="<?= $_SERVER['REQUEST_URI'] ?>&min_price=100&max_price=200">
                                                    <span class="filter-select">100.000đ - 200.000đ</span>
                                                </a>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-price-all">
                                                <a href="<?= $_SERVER['REQUEST_URI'] ?>&min_price=200&max_price=300">
                                                    <span class="filter-select">200.000đ - 300.000đ</span>
                                                </a>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-price-all">
                                                <a href="<?= $_SERVER['REQUEST_URI'] ?>&min_price=300&max_price=500">
                                                    <span class="filter-select">300.000đ - 500.000đ</span>
                                                </a>
                                            </li>
                                            <li class="filter-item filter-item--check-box filter-price-all">
                                                <a href="<?= $_SERVER['REQUEST_URI'] ?>&min_price=500&max_price=9999999999999">
                                                    <span class="filter-select">Giá trên 500.000đ</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                        </div>

                </aside>

                <div class="card py-2 main_container collection col-xl-9 col-lg-9 px-4 col-md-12 col-sm-12">
                    <h1 class="title_page collection-title mb-0"><?= $categoryOne['TenDanhMuc'] ?></h1>
                    <div class="category-products products">
                        <div class="border-bottom">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <div class="sortPagiBar">
                                    <div class="sort-cate clearfix">
                                        <div class="d-flex align-items-baseline">
                                            <label for="" class="">
                                                <span>Sắp xếp: </span>
                                            </label>
                                            <ul class="ul_col ml-2 mb-0">
                                                <span class="d-flex d-lg-none align-items-center justify-content-between">Thứ
                                                    tự</span>
                                                <ul class="content_ul">
                                                    <li>
                                                        <a href="<?= $_SERVER['REQUEST_URI'] ?>&order=ASC">Giá tăng dần</a>
                                                    </li>
                                                    <li>
                                                        <a href="<?= $_SERVER['REQUEST_URI'] ?>&order=DESC">Giá giảm dần</a>
                                                    </li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class="products-view products-view-grid collection_reponsive list_hover_pro">
                            <div class="product__new-section slick-new mt-3 slick-initialized">
                                <div class="slick-list slick-new mt-3 slick-initialized">
                                    <div class="row content-col">
                                        <?php foreach ($productCategoryList as $product) : ?>
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
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>