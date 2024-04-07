<?php
include_once '../modal/category.php';
include_once '../modal/product.php';
include_once '../modal/function.php';
include_once '../modal/database.php';
include_once '../modal/user.php';
include_once './config.php';

include_once '../modal/phpMailer/PHPMailer.php';
include_once '../modal/phpMailer/Exception.php';
include_once '../modal/phpMailer/SMTP.php';
session_start();
extract($_REQUEST);
if (isset($modules)) {
    switch ($modules) {
        case 'page':
            include_once 'control/page.php';
            break;
        case 'cart':
            include_once 'control/cart.php';
            break;
        case 'product':
            include_once 'control/product.php';
            break;
        case 'order':
            include_once 'control/order.php';
        case 'user':
            include_once 'control/user.php';
    }
}
