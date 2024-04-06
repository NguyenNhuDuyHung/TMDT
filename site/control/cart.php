<?php
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'add':
            $categoryList = category_list();
            $product = product_one($id);
            // print_r($product);

            if (isset($_SESSION['user'])) {
                if (!isset($SoLuong)) {
                    $SoLuong = 1;
                }
                if (isset($_SESSION['cartUser'][$id])) {
                    $_SESSION['cartUser'][$id]['SL'] += $SoLuong;
                    // header('location: ?modules=cart&action=list');
                } else {
                    $_SESSION['cartUser'][$id] = array(
                        'MaSanPham' => $product['MaSanPham'],
                        'TenSanPham' => $product['TenSanPham'],
                        'HinhAnh' => $product['HinhAnh'],
                        'Gia' => $product['Gia'],
                        'GiaKhuyenMai' => $product['GiaKhuyenMai'],
                        'SL' => $SoLuong
                    );
                    header('location: ?modules=cart&action=list');
                }
            } else {
                if (!isset($SoLuong)) {
                    $SoLuong = 1;
                }
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['SL'] += $SoLuong;
                    // header('location: ?modules=cart&action=list');
                } else {
                    $_SESSION['cart'][$id] = array(
                        'MaSanPham' => $product['MaSanPham'],
                        'TenSanPham' => $product['TenSanPham'],
                        'HinhAnh' => $product['HinhAnh'],
                        'Gia' => $product['Gia'],
                        'GiaKhuyenMai' => $product['GiaKhuyenMai'],
                        'SL' => $SoLuong
                    );
                    header('location: ?modules=cart&action=list');
                }
            }
            include_once 'view/header.php';
            include_once 'view/page_cart.php';
            include_once 'view/footer.php';
            break;
        case 'delete':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['cartUser'][$id]);
                header('location: ?modules=cart&action=list');
            } else {
                unset($_SESSION['cart'][$id]);
                header('location: ?modules=cart&action=list');
            }
            break;
        case 'list':
            $data = ['pageTitle' => 'Giỏ hàng'];

            $categoryList = category_list();
            include_once 'view/header.php';
            include_once 'view/page_cart.php';
            include_once 'view/footer.php';
            break;
        case 'increase':
            if (isset($_SESSION['user'])) {
                $_SESSION['cartUser'][$id]['SL']++;
                header('location: ?modules=cart&action=list');
            } else {
                $_SESSION['cart'][$id]['SL']++;
                header('location: ?modules=cart&action=list');
            }
            break;
        case 'decrease':
            if (isset($_SESSION['user'])) {
                if ($_SESSION['cartUser'][$id]['SL'] > 1) {
                    $_SESSION['cartUser'][$id]['SL']--;
                } else {
                    unset($_SESSION['cartUser'][$id]);
                }
            } else {
                if ($_SESSION['cart'][$id]['SL'] > 1) {
                    $_SESSION['cart'][$id]['SL']--;
                } else {
                    unset($_SESSION['cart'][$id]);
                }
            }
            header('location: ?modules=cart&action=list');
            break;
    }
}
