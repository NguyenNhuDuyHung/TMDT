<?php
include_once 'pdo.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Hàm gửi mail
function sendMail($to, $subject, $content)
{
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'khanh2000fc@gmail.com';                     //SMTP username
        $mail->Password   = 'zxouprrgvelsxnaf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duyhung03112004@gmail.com', 'admin');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->CharSet = "UTF-8";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;


        $sendMail = $mail->send();
        if ($sendMail) {
            return $sendMail;
        }
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


// Kiểm tra phương thức GET
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    } else {
        return false;
    }
}

// Kiểm tra phương thức POST
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    } else {
        return false;
    }
}

// Hàm filter lọc dữ liệu

function filter()
{
    $filterArr = [];
    if (isGet()) {
        // Xử lý dữ liệu trước khi nó được hiển thị
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    if (isPost()) {
        // Xử lý dữ liệu trước khi nó được hiển thị
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    return $filterArr;
}

// Kiểm tra email
function isEmail($email)
{
    $checkMail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $checkMail;
}

// Kiểm tra số nguyên (kiểu INT)
function isNumberInt($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
    return $checkNumber;
}


// Kiểm tra số thực (kiểu FLOAT)
function isNumberFloat($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_FLOAT);
    return $checkNumber;
}


// Kiểm tra số điện thoại
function isPhone($phone)
{
    // Kiểm tra ký tự đầu tiên là số 0
    $checkZero = false;
    if ($phone[0] == '0') {
        $checkZero = true;
        $phone = substr($phone, 1); // Xóa phẩn tử đầu tiên (số 0)
    }

    // Đằng sau có 9 chữ số
    $checkNumber = false;
    if (isNumberInt($phone) && strlen($phone) == 9) {
        $checkNumber = true;
    }


    if ($checkZero && $checkZero) {
        return true;
    }

    return false;
}


// Thông báo lỗi 
function getMsg($msg, $type = 'success')
{
    echo '<div class="alert alert-' . $type . '">';
    echo $msg;
    echo '</div>';
}

function formError($fileName, $beforeHtml = '', $afterHtml = '', $errors)
{
    return (!empty($errors[$fileName])) ? $beforeHtml . reset($errors[$fileName]) . $afterHtml : null;
}

// Hàm hiển thị dữ liệu cũ
function oldInfo($fileName, $oldData, $default = null)
{
    return (!empty($oldData[$fileName])) ? $oldData[$fileName] : $default;
}


// Hàm gán session
function setSession($key, $value)
{
    $_SESSION[$key] = $value;
    return $_SESSION;
}

// Hàm đọc session
function getSession($key = '')
{
    if (!empty($key)) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    } else {
        return $_SESSION;
    }
}

// Hàm xóa session
function removeSession($key = '')
{
    if (!empty($key)) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
    } else {
        session_destroy();
        return true;
    }
}

// Hàm flash data: Sau khi xử dụng xong trong 1 phiên làm việc sẽ tự động xóa 
function setFlashData($key, $value)
{
    // Phân biệt key của session thường và key của flashdata
    $key = 'flash_' . $key;
    return setSession($key, $value);
}

// Hàm đọc flash data
function getFlashData($key)
{
    $key = 'flash_' . $key;
    $data = getSession($key);
    removeSession($key);
    return $data;
}

function isLogin()
{
    $checkLogin = false;
    if (getSession('loginToken')) {
        $tokenLogin = getSession('loginToken');
        // Kiểm tra xem token có giống trong database không
        $queryToken = pdo_query_one("SELECT user_id FROM loginToken WHERE token = '$tokenLogin'");
        if (!empty($queryToken)) {
            $checkLogin = true;
        } else {
            removeSession('loginToken');
        }
    }
    return $checkLogin;
}