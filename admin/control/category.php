<?php
include_once '../modal/category.php';
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'list':
            $dsdm = category_list();
            include_once 'view/template_header.php';
            include_once 'view/page_category_list.php';
            include_once 'view/template_footer.php';
            break;
        case 'add':
            if (isset($addCategory_submit)) {
                category_add($name, $_FILES['image']['name'], $status);
                move_uploaded_file($_FILES['image']['tmp_name'], '../content/img/' . $_FILES['image']['name']);
                header('location: ?modules=category&action=list');
            }
            include_once 'view/template_header.php';
            include_once 'view/page_category_add.php';
            include_once 'view/template_footer.php';
            break;
        case 'editCate':
            $dm = get_category_one($id);
            if (isset($editCategory_submit)) {
                category_edit($name, $_FILES['image']['name'], $status, $id);
                move_uploaded_file($_FILES['image']['tmp_name'], '../content/img/' . $_FILES['image']['name']);
                header('location: ?modules=category&action=list');
            }
            include_once 'view/template_header.php';
            include_once 'view/page_category_edit.php';
            include_once 'view/template_footer.php';
            break;
        case 'delete':
            category_delete($id);
            header('location: ?modules=category&action=list');
            break;
    }
}
