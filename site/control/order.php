<?php
// Nếu CODE không tồn tại
if (!defined('_CODE')) {
    die('Access denied...');
}
extract($_REQUEST);
// sendMail('duyhung03112004@gmail.com', 'hello world', 'localhost');

if (isset($action)) {
    switch ($action) {
        case 'checkout':
            // print_r($_SESSION['user']['MaKhachHang']);
            // echo '<pre>';
            // print_r($_SESSION['cartUser']);
            // echo '</pre>';



            // echo count($_SESSION['cartUser']);           

            $data = ['pageTitle' => 'Thanh toán'];

            $categoryList = category_list();
            if (isPost()) {
                $filterAll = filter();
                // echo "<pre>";
                // print_r($filterAll);
                // echo "</pre>";

                $error = [];
                // Validate form
                if (empty($filterAll['fullname'])) {
                    $error['fullname']['required'] = 'Bắt buộc phải nhập họ tên';
                } else {
                    if (strlen($filterAll['fullname']) < 6) {
                        $error['fullname']['min'] = 'Họ tên phải có tối thiểu 6 ký tự';
                    }
                }

                if (empty($filterAll['email'])) {
                    $error['email']['required'] = 'Bắt buộc phải nhập email';
                }
                if (empty($filterAll['phone'])) {
                    $error['phone']['required'] = 'Bắt buộc phải nhập số điện thoại';
                } else {
                    if (!isPhone($filterAll['phone'])) {
                        $error['phone']['isPhone'] = 'Số điện thoại không hợp lệ';
                    }
                }

                if (empty($filterAll['address'])) {
                    $error['address']['required'] = 'Bắt buộc phải nhập địa chỉ';
                }

                // Xử lý insert database
                if (empty($error)) {
                    $dateOrder = date('Y-m-d H:i:s');
                    $checkorder = order($_SESSION['user']['MaKhachHang'], $fullname, $email, $phone, $address, $dateOrder);
                    if (!boolval($checkorder)) {
                        $subject = 'Xác nhận đơn hàng';
                        $content = 'Xin chào ' . $filterAll['fullname'] . '.</>' . 'Đây là đơn hàng của bạn: ' . '</br>';
                        $sendMail = sendMail($filterAll['email'], $subject, $content);
                        if ($sendMail) {
                            setFlashData('msg', 'Đặt hàng thành công! Vui lòng kiểm tra Email để xác nhận đơn hàng');
                            setFlashData('msg_type', 'success');

                            $idOrder = pdo_query_value('SELECT MaDonHang FROM donhang WHERE MaKhachHang = ' . $_SESSION['user']['MaKhachHang']);
                            $userId = $_SESSION['user']['MaKhachHang'];
                            // echo $idOrder;

                            foreach ($_SESSION['cartUser'] as $user) {
                                $sql = "INSERT INTO chitietdonhang(MaKhachHang, MaDonHang, MaSanPham, SoLuong, GiaBan) VALUES ('$userId' , '$idOrder', '$user[MaSanPham]', '$user[SL]', '$user[Gia]')";
                                pdo_execute($sql);
                            }
                            header('location: ?modules=order&action=success');

                        } else {
                            setFlashData('msg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sau!');
                            setFlashData('msg_type', 'danger');
                        }
                    } else {
                        setFlashData('msg', 'Có lỗi');
                        setFlashData('msg_type', 'danger');
                    }
                } else {
                    setFlashData('msg', 'Vui lòng kiểm tra lại dữ liệu!');
                    setFlashData('old-info', $filterAll); // Dữ liệu cũ 
                    setFlashData('msg_type', 'danger');
                    setFlashData('error', $error);
                }

                $msg = getFlashData('msg');
                $msgType = getFlashData('msg_type');
                $errors = getFlashData('error');
                $old = getFlashData('old-info');
            }
            include_once 'view/header.php';
            include_once 'view/page_checkout.php';
            include_once 'view/footer.php';
            break;

        case 'success':
            $categoryList = category_list();

            include_once 'view/header.php';
            include_once 'view/page_checkout_success.php';
            include_once 'view/footer.php';
            break;
    }
}
