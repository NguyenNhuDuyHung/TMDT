<?php
include_once 'pdo.php';

function register($fullname, $email, $phone, $password, $address, $activeToken, $dateCreater)
{
    $sql = "INSERT INTO KhachHang(HoTen,Email,SDT,MatKhau,DiaChi,activeToken,create_at) VALUES(?,?,?,?,?,?,?)";
    return pdo_execute($sql, $fullname, $email, $phone, $password, $address, $activeToken, $dateCreater);
}

function user_one($id)
{
    $sql = "SELECT * FROM KhachHang WHERE MaKhachHang = '$id'";
    return pdo_query_one($sql);
}

function update_user($fullname, $email, $phone, $password, $address, $dateUpdate, $userId)
{
    $sql = "UPDATE KhachHang SET HoTen=?,Email=?,SDT=?,MatKhau=?,DiaChi=?,create_at=? WHERE MaKhachHang=?";
    return pdo_execute($sql, $fullname, $email, $phone, $password, $address, $dateUpdate, $userId);
}

function user_page($page)
{
    $start = ($page - 1) * 5;
    $sql = "SELECT * FROM KhachHang LIMIT $start, 5";
    return pdo_query($sql);
}

function customer_edit($id, $name, $email, $password, $address, $phone, $admin)
{
    $sql = "UPDATE KhachHang SET HoTen=?, Email=?, MatKhau=?, DiaChi=?, SDT=?, Admin=? WHERE MaKhachHang=?";
    return pdo_execute($sql, $name, $email, $password, $address, $phone, $admin, $id);
}
