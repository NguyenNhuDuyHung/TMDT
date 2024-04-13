<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        echo !empty($data['pageTitle']) ? $data['pageTitle'] : 'Chợ Quê ONLINE';
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-2 text-black p-4" style="box-shadow: rgba(0, 0, 0, 0.06) -2px 0px 8px 0px;">
            <h3 class="text-center"><span class="text-success">Chợ Quê </span><span class="text-success">Online</span></h3>
            <hr>
            <p>
                <i class="bi bi-tag-fill me-2"></i>
                <a class="text-decoration-none text-black" href="?modules=category&action=list"> Quản lý danh mục</a>
            </p>
            <p>
                <i class="bi bi-box-seam me-2"></i>
                <a class="text-decoration-none text-black" href="?modules=product&action=productlist"> Quản lý sản phẩm</a>
            </p>
            <p>
                <i class="bi bi-people-fill me-2"></i>
                <a class="text-decoration-none text-black" href="?modules=user&action=userlist"> Quản lý người dùng</a>
            </p>
            <p>
                <i class="bi bi-cart-fill me-2"></i>
                <a class="text-decoration-none text-black" href="?modules=order&action=orderlist"> Quản lý đơn hàng</a>
            </p>
            <hr>
            <div class="text-center">
                <a href="../../site/?modules=user&action=logout" class="btn btn-success">Đăng xuất</a>
            </div>

            <br>
            <div class="text-center">
                <a href="../../site/?modules=page&action=home" class="btn btn-success">Trang chủ</a>
            </div>
        </div>
        <div class="col-md-10 p-0">
            <div class="shadow bg-success text-white d-flex justify-content-between align-content-center p-3 pb-1">
                <p>Quản lý Chợ Quê Online</p>
            </div>
            <div class="row vh-100">