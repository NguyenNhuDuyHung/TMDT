<?php
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'orderlist':
            function order_page($page)
            {
                $start = ($page - 1) * 5;
                $sql = "SELECT * FROM chitietdonhang LIMIT $start, 5";
                return pdo_query($sql);
            }
            $countOrder = pdo_query_value("SELECT count(*) FROM chitietdonhang");
            $number_page = ceil($countOrder / 5);
            if (!isset($page)) {
                $page = 1;
            }
            $userOrder = order_page($page);

            include_once 'view/template_header.php';
            include_once 'view/page_order_list.php';
            include_once 'view/template_footer.php';
            break;
        
        case 'delete':
            $deleteOrder = pdo_execute("DELETE FROM chitietdonhang WHERE MaChiTietDH = '$id'");
            header('location: ?modules=order&action=orderlist');
            break;
    }
}
