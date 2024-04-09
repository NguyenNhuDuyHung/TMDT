<?php
include_once '../modal/category.php';
include_once '../modal/product.php';
include_once '../modal/function.php';
include_once '../modal/database.php';
include_once '../modal/user.php';
extract($_REQUEST);
if (isset($modules)) {
    switch ($modules) {
        case 'category':
            include_once 'control/category.php';
        case 'product':
            include_once 'control/product.php';
        case 'user':
            include_once 'control/user.php';
    }
}
