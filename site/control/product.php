<?php
// Nếu CODE không tồn tại
if (!defined('_CODE')) {
    die('Access denied...');
}
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'details':
            
            $categoryList = category_list();
            $product = product_one($id);
            $data = ['pageTitle' => $product['TenSanPham']];
            // print_r($product);
            include_once 'view/header.php';
            include_once 'view/page_product.php';
            include_once 'view/footer.php';
            break;
    }
}
