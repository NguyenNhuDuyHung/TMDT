<?php
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'productlist':
            $count_product = count_product();
            $number_page = ceil($count_product / 5);
            if (!isset($page)) {
                $page = 1;
            }
            $product_page = product_page($page);
            
            include_once 'view/template_header.php';
            include_once 'view/page_product_list.php';
            include_once 'view/template_footer.php';
            break;
        case 'add':
            $dsdm = category_list();
            if (isset($addProduct_submit)) {
                product_add($name, $_FILES['image']['name'], $price, $sale, $category, $quantity, $description, $hot, $status);
                move_uploaded_file($_FILES['image']['tmp_name'], '../content/img/' . $_FILES['image']['name']);
                header('location: ?modules=product&action=productlist');
            }
            include_once 'view/template_header.php';
            include_once 'view/page_product_add.php';
            include_once 'view/template_footer.php';
            break;
        case 'delete':
            product_delete($id);
            header('location: ?modules=product&action=productlist');
            break;
        case 'edit':
            $product = product_one($id);
            $dsdm = category_list();
            if (isset($editProduct_submit)) {
                if ($_FILES['image']['name'] != null) {
                    product_edit($id, $name, $_FILES['image']['name'], $price, $sale, $category, $quantity, $description, $hot, $status);
                    move_uploaded_file($_FILES['image']['tmp_name'], '../content/img/' . $_FILES['image']['name']);
                    setFlashData('msg', 'Sửa thành công');
                    setFlashData('msg_type', 'success');
                    // header('location: ?modules=product&action=edit&id=' . $id);
                } else {
                    product_edit($id, $name, $product['HinhAnh'], $price, $sale, $category, $quantity, $description, $hot, $status);
                    setFlashData('msg', 'Sửa thành công');
                    setFlashData('msg_type', 'success');
                    // header('location: ?modules=product&action=edit&id=' . $id);
                }
            }
            $msg = getFlashData('msg');
            $msgType = getFlashData('msg_type');

            $productQuery = pdo_query_one("SELECT * FROM sanpham WHERE MaSanPham = '$id'");
            // print_r($product);
            include_once 'view/template_header.php';
            include_once 'view/page_product_edit.php';
            break;
    }
}
