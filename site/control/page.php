<?php
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'home':
            $categoryList = category_list();
            $productList = product_list();
            $productHotList = product_hot_list();
            // print_r($categoryList);
            // print_r($productList);
            $data = ['pageTitle' => 'Chợ Quê ONLINE'];

            include_once 'view/header.php';
            include_once 'view/page_home.php';
            include_once 'view/footer.php';
            break;
        case 'search':
            $data = ['pageTitle' => 'Chợ Quê ONLINE'];
            $categoryList = category_list();
            $productFilter = product_search($keyword);
            setSession('search', $productFilter);
            include_once 'view/header.php';
            include_once 'view/page_search.php';
            include_once 'view/footer.php';
            break;
        case 'category':
            $data = ['pageTitle' => 'Chợ Quê ONLINE'];

            $categoryList = category_list();
            $categoryOne = get_category_one($id);
            if (!isset($min_price)) {
                $min_price = 0;
            }
            if (!isset($max_price)) {
                $max_price = 9999999999;
            }

            if (!isset($order)) {
                $order = '';
            }
            $productCategoryList = product_category_order_filter($id, $min_price, $max_price, $order);
            include_once 'view/header.php';
            include_once 'view/page_category.php';
            include_once 'view/footer.php';
            break;
    }
}
