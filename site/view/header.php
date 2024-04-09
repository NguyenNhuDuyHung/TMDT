<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        echo !empty($data['pageTitle']) ? $data['pageTitle'] : 'Chợ Quê ONLINE';
        ?>
    </title>
    <link rel="icon" href="../../content/img/cho-que-online_icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../content/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../content/css/grid.css">
    <link rel="stylesheet" href="../../content/css/base.css">
    <link rel="stylesheet" href="../../content/css/style.css">
    <link rel="stylesheet" href="../../content/css/responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="app">
        <header class="header header_menu container px-md-0">
            <div class="row align-items-center">
                <nav class="header__navbar">
                    <label for="nav__mobile-input" class="nav__icon hide">
                        <i class="fa-solid fa-bars"></i>
                    </label>

                    <input type="checkbox" id="nav__mobile-input" class="nav__mobile-input">

                    <label for="nav__mobile-input" class="overlay"></label>

                    <div class="nav__mobile">
                        <label for="nav__mobile-input" class="nav__mobile-close">
                            <i class="nav__mobile-close-icon fa-solid fa-xmark"></i>
                        </label>
                        <ul class="nav__mobile-list">
                            <li>
                                <a href="" class="nav__mobile-link">Trang chủ</a>
                            </li>
                            <li>
                                <a href="" class="nav__mobile-link">Danh mục</a>
                            </li>
                            <li>
                                <a href="" class="nav__mobile-link">Đăng ký</a>
                            </li>
                            <li>
                                <a href="" class="nav__mobile-link">Đăng nhập</a>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar__logo col-2 col-lg-2 header-right hide-on-mobile-tablet">
                        <a href="?modules=page&action=home" class="navbar__logo-wrap">
                            <img src="../../content/img/logo.png" alt="Logo">
                        </a>
                    </div>

                    <div class="navbar__logo col-2 col-lg-2 header-right hide">
                        <a href="?modules=page&action=home" class="navbar__logo-wrap">
                            <img src="../../content/img/logo.png" alt="Logo">
                        </a>
                    </div>

                    <div class="navbar__search col-xl-5 col-lg-4 col-12 header-center hide-on-mobile-tablet">
                        <div class="navbar__search-wrap">
                            <form action="?modules=page&action=search" method="post" role="search">
                                <input type="text" class="navbar__search-input" placeholder="Tìm kiếm sản phẩm" name="keyword" required autocomplete="off">
                                <span class="navbar__search-group">
                                    <button type="submit" class="btn navbar__search-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>

                    <div class="navbar__info col-2 col-xl-5 col-lg-6 col-sm-2">
                        <ul class="navbar__info-list">
                            <li class="navbar__info-item hide-on-mobile-tablet">
                                <div class="navbar__info-item-info">
                                    <div class="navbar__info-img">
                                        <img src="../../content/img/phone.png" alt="">
                                    </div>
                                    <div class="navbar__info-item-info-wrap">
                                        <span>Hỗ trợ khách hàng</span>
                                        <span class="navbar__info-hotline">0356 085 145</span>
                                    </div>
                                </div>
                            </li>
                            <li class="navbar__info-item hide-on-mobile-tablet">
                                <div class="navbar__info-item-info navbar__info-item-info--hover">
                                    <?php if (!isset($_SESSION['user'])) : ?>
                                        <div class="navbar__info-img">
                                            <img src="../../content/img/account.png" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <div class="navbar__info-item-info-wrap">
                                        <?php if (!isset($_SESSION['user'])) : ?>

                                            <a href="?modules=user&action=login" class="navbar__login">Đăng nhập</a>
                                            <small>
                                                <a class="navbar__register" href="?modules=user&action=register">Đăng ký</a>
                                            </small>
                                        <?php else : ?>
                                            <div class="user-info">
                                                <h4>Xin chào!</h4>
                                                <h4><?= $_SESSION['user']['HoTen'] ?></h4>
                                            </div>
                                            <ul class="header__navbar-user-menu">
                                                <li class="header__navbar-user-item">
                                                    <a href="?modules=user&action=info">Tài khoản của tôi</a>
                                                </li>
                                                <li class="header__navbar-user-item header__navbar-user-item--separate">
                                                    <a href="?modules=user&action=logout">Đăng xuất</a>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="navbar__info-item">
                                <div class="mini-cart">
                                    <a href="?modules=cart&action=list" class="img__cart">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span class="text-cart hide-on-mobile-tablet">Giỏ hàng</span>
                                        <?php if (isLogin()) : ?>
                                            <span class="count-item hide-on-mobile-tablet">
                                                <?php if (!empty($_SESSION['cartUser'])) : ?>
                                                    <?= count($_SESSION['cartUser']) ?>
                                                <?php else : ?>
                                                    0
                                                <?php endif; ?>
                                            </span>
                                        <?php else : ?>
                                            <span class="count-item hide-on-mobile-tablet">
                                                <?php if (!empty($_SESSION['cart'])) : ?>
                                                    <?= count($_SESSION['cart']) ?>
                                                <?php else : ?>
                                                    0
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div class="subheader hide-on-mobile-tablet">
            <div class="subheader-wrap container px-md-0">
                <div class="subheader__container">
                    <div class="navigation-wrap navigation--horizontal d-md-flex align-items-center d-none">
                        <nav class="">
                            <ul class="navigation menu-group">
                                <li class="menu-item">
                                    <a href="?modules=page&action=home" class="menu-item-link">TRANG CHỦ
                                    </a>
                                </li>

                                <?php foreach ($categoryList as $category) : ?>
                                    <li class="menu-item menu-item-hover">
                                        <a href="?modules=page&action=category&id=<?= $category['MaDanhMuc'] ?>" class="menu-item-link"><?= $category['TenDanhMuc'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar__search col-xl-5 col-lg-4 col-12 header-center hide">
            <div class="navbar__search-wrap">
                <div class="container navbar__search-mobile-tablet" style="position: relative;">
                    <form action="?modules=page&action=search" method="post" role="search">
                        <input type="text" class="navbar__search-input" placeholder="Tìm kiếm sản phẩm" name="keyword" required autocomplete="off">
                        <span class="navbar__search-group">
                            <button type="submit" class="btn navbar__search-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </form>
                </div>
            </div>
        </div>