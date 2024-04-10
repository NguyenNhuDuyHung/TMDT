<?php
include_once 'pdo.php';
function product_hot_list()
{
    $sql = "SELECT * FROM SanPham WHERE Hot=1";
    return pdo_query($sql);
}

function product_list()
{
    $sql = "SELECT * FROM SanPham";
    return pdo_query($sql);
}

function product_search($keyword)
{
    $sql = "SELECT * FROM SanPham WHERE TenSanPham LIKE '%$keyword%'";
    return pdo_query($sql);
}

function product_category_order_filter($id, $min_price, $max_price, $order)
{
    $sql = "SELECT * FROM SanPham WHERE MaDanhMuc=? AND Gia >? AND Gia <? ORDER BY Gia $order";
    return pdo_query($sql, $id, $min_price, $max_price);
}

function product_one($id)
{
    $sql = "SELECT * FROM SanPham WHERE MaSanPham=?";
    return pdo_query_one($sql, $id);
}

// 

function count_product()
{
    $sql = "SELECT COUNT(*) FROM SanPham";
    return pdo_query_value($sql);
}

function product_page($page)
{
    $start = ($page - 1) * 5;
    $sql = "SELECT sp.*, dm.TenDanhMuc FROM SanPham sp INNER JOIN DanhMuc dm ON sp.MaDanhMuc = dm.MaDanhMuc LIMIT $start, 5";
    return pdo_query($sql);
}

function product_add($name, $image, $price, $sale, $category, $quantity, $description, $hot, $status)
{
    $sql = "INSERT INTO SanPham(TenSanPham,HinhAnh,Gia,GiaKhuyenMai,MaDanhMuc,SoLuong,MoTa,Hot,TrangThai) VALUES(?,?,?,?,?,?,?,?,?)";
    return pdo_query($sql, $name, $image, $price, $sale, $category, $quantity, $description, $hot, $status);
};

function product_delete($id)
{
    $sql = "DELETE FROM SanPham WHERE MaSanPham=?";
    return pdo_execute($sql, $id);
}

function product_edit($id, $name, $image, $price, $sale, $category, $quantity, $description, $hot, $status)
{
    $sql = "UPDATE SanPham SET TenSanPham=?,HinhAnh=?,Gia=?,GiaKhuyenMai=?,MaDanhMuc=?,SoLuong=?,MoTa=?,Hot=?,TrangThai=? WHERE MaSanPham=?";
    return pdo_execute($sql, $name, $image, $price, $sale, $category, $quantity, $description, $hot, $status, $id);
}

function order($fullname, $email, $phone, $address, $date) {
    $sql = "INSERT INTO donhang(HoTen, Email, SoDienThoai, DiaChi, NgayDatHang) VALUES (?, ?, ?, ?, ?)";
    return pdo_query($sql, $fullname, $email, $phone, $address, $date);
}
