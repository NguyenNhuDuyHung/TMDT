<?php
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'userlist':
            $countUser = pdo_query_value("SELECT count(*) FROM khachhang");
            $number_page = ceil($countUser / 5);
            if (!isset($page)) {
                $page = 1;
            }
            $userPage = user_page($page);
            include_once 'view/template_header.php';
            include_once 'view/page_user_list.php';
            include_once 'view/template_footer.php';
            break;
        case 'update':
            $user = user_one($id);
            $filterAll = filter();
            if (isset($editUser_submit)) {
                $password = password_hash($filterAll['password'], PASSWORD_DEFAULT);
                customer_edit($id, $name, $email, $password, $address, $phone, $admin);
            }
            include_once 'view/template_header.php';
            include_once 'view/page_user_edit.php';
            include_once 'view/template_footer.php';
            break;
    }
}
