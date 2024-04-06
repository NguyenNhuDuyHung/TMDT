<?php
extract($_REQUEST);
if (isset($action)) {
    switch ($action) {
        case 'login':
            $data = ['pageTitle' => 'Đăng nhập'];

            $categoryList = category_list();
            if (isPost()) {
                $filterAll = filter();
                if (!empty(trim($filterAll['email'])) && !empty(trim($filterAll['password']))) {
                    $email = $filterAll['email'];
                    $password = $filterAll['password'];

                    $userQuery = pdo_query_one("SELECT * FROM KhachHang WHERE Email = '$email' AND activeToken=''");
                    if (!empty($userQuery)) {
                        $passwordHash = $userQuery['MatKhau']; // password trong database
                        $userId = $userQuery['MaKhachHang'];
                        $checkPass = password_verify($password, $passwordHash);
                        if ($checkPass) {
                            $userLogin = pdo_query_one("SELECT * FROM logintoken WHERE user_id = '$userId'");
                            // print_r($userLogin);
                            if ($userLogin) {
                                setFlashData('msg', 'Tài khoản đang được đăng nhập ở nơi khác!');
                                setFlashData('msg_type', 'danger');
                            } else {
                                // tokenLogin
                                $tokenLogin = sha1(uniqid() . time());
                                // Insert vào bảng loginToken
                                $insertStatus = pdo_execute("INSERT INTO logintoken(user_id, token) VALUES('$userId', '$tokenLogin')");
                                // print_r(!boolval($insertStatus));
                                if (!boolval($insertStatus)) {
                                    // Insert thành công
                                    // Lưu loginToken vào session: để xem người dùng có đăng nhập được hay không, có là thành công, ngược lại là thất bại
                                    setSession('loginToken', $tokenLogin);
                                    setSession('user', $userQuery);
                                } else {
                                    setFlashData('msg', 'Không thể đăng nhập, vui lòng thử lại sau');
                                    setFlashData('msg_type', 'danger');
                                }
                                removeSession('cart');
                                header('location: ?modules=page&action=home');
                            }
                        } else {
                            setFlashData('msg', 'Mật khẩu không chính xác');
                            setFlashData('msg_type', 'danger');
                        }
                    } else {
                        $testEmail = pdo_query_one("SELECT * FROM KhachHang WHERE Email = '$email'");
                        if (!$testEmail) {
                            setFlashData('msg', 'Email không tồn tại');
                            setFlashData('msg_type', 'danger');
                        } else {
                            setFlashData('msg', 'Tài khoản chưa kích hoạt');
                            setFlashData('msg_type', 'danger');
                        }
                    }
                } else {
                    setFlashData('msg', 'Vui lòng nhập email và mật khẩu');
                    setFlashData('msg_type', 'danger');
                }
            }
            $msg = getFlashData('msg');
            $msgType = getFlashData('msg_type');
            include_once 'view/header.php';
            include_once 'view/page_login.php';
            include_once 'view/footer.php';
            break;

        case 'logout':
            $token = getSession('loginToken');
            pdo_execute("DELETE FROM logintoken WHERE token = '$token'");
            removeSession('loginToken');
            removeSession('user');
            removeSession('cart');
            header('Location: ?modules=page&action=home');
            break;

        case 'register':
            $data = ['pageTitle' => 'Đăng ký'];

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
                } else {
                    $email = $filterAll['email'];
                    $sql = "SELECT MaKhachHang FROM KhachHang WHERE Email = '$email'";
                    if (pdo_query_one($sql) > 0) {
                        $error['email']['unique'] = 'Email đã tồn tại';
                    }
                }

                if (empty($filterAll['phone'])) {
                    $error['phone']['required'] = 'Bắt buộc phải nhập số điện thoại';
                } else {
                    $phone = $filterAll['phone'];
                    $sql = "SELECT MaKhachHang FROM KhachHang WHERE SDT = '$phone'";
                    if (pdo_query_one($sql) > 0) {
                        $error['phone']['unique'] = 'Số điện thoại đã tồn tại';
                    }
                    if (!isPhone($filterAll['phone'])) {
                        $error['phone']['isPhone'] = 'Số điện thoại không hợp lệ';
                    }
                }

                if (empty($filterAll['address'])) {
                    $error['address']['required'] = 'Bắt buộc phải nhập địa chỉ';
                }

                // Validate password: bắt buộc phải nhập, min 6 ký tự
                if (empty($filterAll['password'])) {
                    $error['password']['required'] = 'Bắt buộc phải nhập mật khẩu';
                } else {
                    if (strlen($filterAll['password']) < 6) {
                        $error['password']['min'] = 'Mật khẩu phải có tối thiểu 6 ký tự';
                    }
                }

                // Validate password_confirm: phải giống password, bắt buộc phải nhập
                if (empty($filterAll['password_confirm'])) {
                    $error['password']['required'] = 'Vui lòng nhập lại mật khẩu';
                } else {
                    if ($filterAll['password_confirm'] != $filterAll['password']) {
                        $error['password_confirm']['match'] = 'Mật khẩu nhập lại không chính xác';
                    }
                }

                // Xử lý insert database
                if (empty($error)) {
                    $dateCreater = date('Y-m-d H:i:s');
                    $activeToken = sha1(uniqid() . time());
                    $linkActive = 'http://localhost:3000/site/?modules=user&action=active&token=' . $activeToken;
                    $password = password_hash($filterAll['password'], PASSWORD_DEFAULT);
                    $checkRegister = register($fullname, $email, $phone, $password, $address, $activeToken, $dateCreater);
                    if (!boolval($checkRegister)) {
                        $subject = 'Kích hoạt tài khoản';
                        $content = 'Xin chào ' . $filterAll['fullname'] . '.</>' . 'Ấn vào đây để kích hoạt tài khoản' . '</br>' . $linkActive;

                        $sendMail = sendMail($filterAll['email'], $subject, $content);
                        if ($sendMail) {
                            setFlashData('msg', 'Đăng ký thành công! Vui lòng kiểm tra Email để kích hoạt tài khoản!');
                            setFlashData('msg_type', 'success');
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
            include_once 'view/page_register.php';
            include_once 'view/footer.php';
            break;
        case 'active':
            $token = filter()['token'];
            if (!empty($token)) {
                // truy vấn để kiểm tra token với database
                $tokenQuery = pdo_query_one("SELECT MaKhachHang FROM KhachHang WHERE activeToken = '$token'");
                if (!empty($tokenQuery)) {
                    $userId = $tokenQuery['MaKhachHang'];
                    $updateStatus = pdo_execute("UPDATE khachhang SET activeToken = '' WHERE MaKhachHang = '$userId'");
                    if (!boolval($updateStatus)) {
                        setFlashData('msg', 'Kích hoạt tài khoản thành công!');
                        setFlashData('msg_type', 'success');
                    } else {
                        setFlashData('msg', 'Kích hoạt tài không thành khoản thành công, vui lòng liên hệ quản trị viên!');
                        setFlashData('msg_type', 'danger');
                    }
                    header('Location: ?modules=user&action=login');
                } else {
                    getMsg('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
                }
            } else {
                getMsg('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
            }
            break;

        case 'info':
            $data = ['pageTitle' => 'Thông tin cá nhân'];

            $categoryList = category_list();
            $id = $_SESSION['user']['MaKhachHang'];
            $user = user_one($id);
            include_once 'view/header.php';
            include_once 'view/page_user.php';
            include_once 'view/footer.php';
            break;

        case 'edit':
            $categoryList = category_list();
            $filterAll = filter();
            $user = user_one($id);
            if (!empty($user)) {
                setFlashData('user-details', $user);
                $userDetails = getFlashData('user-details');
                // echo "<pre>";
                // print_r($_SESSION['user']['HoTen']);
                // echo "</pre>";

                if (!empty($userDetails)) {
                    $old = $userDetails;
                }
            } else {
                header('location: ?modules=users&action=info');
            }
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
                } else {
                    $email = $filterAll['email'];
                    $sql = "SELECT MaKhachHang FROM KhachHang WHERE Email = '$email' AND MaKhachHang <> '$id'";
                    if (pdo_query_one($sql) > 0) {
                        $error['email']['unique'] = 'Email đã tồn tại';
                    }
                }

                if (empty($filterAll['phone'])) {
                    $error['phone']['required'] = 'Bắt buộc phải nhập số điện thoại';
                } else {
                    $phone = $filterAll['phone'];
                    $sql = "SELECT MaKhachHang FROM KhachHang WHERE SDT = '$phone' AND MaKhachHang <> '$id'";
                    if (pdo_query_one($sql) > 0) {
                        $error['phone']['unique'] = 'Số điện thoại đã tồn tại';
                    }
                    if (!isPhone($filterAll['phone'])) {
                        $error['phone']['isPhone'] = 'Số điện thoại không hợp lệ';
                    }
                }

                if (empty($filterAll['address'])) {
                    $error['address']['required'] = 'Bắt buộc phải nhập địa chỉ';
                }

                // Validate password_confirm: phải giống password, bắt buộc phải nhập
                if(!empty($filterAll['password'])) {
                    if (empty($filterAll['password_confirm'])) {
                        $error['password_confirm']['required'] = 'Vui lòng nhập lại mật khẩu';
                    } else {
                        if ($filterAll['password_confirm'] != $filterAll['password']) {
                            $error['password_confirm']['match'] = 'Mật khẩu nhập lại không chính xác';
                        }
                    }
                }


                // Xử lý insert database
                if (empty($error)) {
                    $dateUpdate = date('Y-m-d H:i:s');
                    $password = password_hash($filterAll['password'], PASSWORD_DEFAULT);
                    $checkRegister = update_user($fullname, $email, $phone, $password, $address, $dateUpdate, $id);
                    print_r($checkRegister);
                    if (!boolval($checkRegister)) {
                        setFlashData('msg', 'Cập nhật thành công');
                        setFlashData('msg_type', 'success');
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
            }

            $msg = getFlashData('msg');
            $msgType = getFlashData('msg_type');
            $errors = getFlashData('error');
            $old = getFlashData('old-info');




            include_once 'view/header.php';
            include_once 'view/page_user_edit.php';
            include_once 'view/footer.php';
            break;
    }
}
