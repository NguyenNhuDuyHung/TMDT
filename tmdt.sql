-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmdt`
--

-- --------------------------------------------------------

--
-- Table structure for table `BinhLuan`
--

CREATE TABLE `BinhLuan` (
  `MaBinhLuan` int(11) NOT NULL,
  `NoiDung` text NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `NgayBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ChiTietDonHang`
--

CREATE TABLE `ChiTietDonHang` (
  `MaChiTietDH` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ChiTietDonHang`
--

-- --------------------------------------------------------

--
-- Table structure for table `DanhMuc`
--

CREATE TABLE `DanhMuc` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(100) NOT NULL,
  `TrangThai` varchar(100) NOT NULL DEFAULT 'Đang hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DanhMuc`
--

INSERT INTO `DanhMuc` (`MaDanhMuc`, `TenDanhMuc`, `TrangThai`) VALUES
(1, 'TRÁI CÂY VIỆT', 'Đang hoạt động'),
(2, 'ĐẶC SẢN 3 MIỀN', 'Đang hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `DonHang`
--

CREATE TABLE `DonHang` (
  `MaDonHang` int(11) NOT NULL,
  `NgayDatHang` datetime NOT NULL DEFAULT current_timestamp(),
  `HoTen` varchar(255) NOT NULL,
  `SoDienThoai` int(20) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DonHang`
--

-- --------------------------------------------------------

--
-- Table structure for table `KhachHang`
--

CREATE TABLE `KhachHang` (
  `MaKhachHang` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SDT` varchar(100) DEFAULT NULL,
  `Admin` int(1) NOT NULL DEFAULT 0,
  `TrangThai` int(1) NOT NULL DEFAULT 1,
  `activeToken` varchar(100) DEFAULT NULL,
  `create_at` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `KhachHang`
--

INSERT INTO `KhachHang` (`MaKhachHang`, `Email`, `MatKhau`, `HoTen`, `DiaChi`, `SDT`, `Admin`, `TrangThai`) VALUES
(1, 'duyhung03112004@gmail.com', '1234567890', 'Nguyễn Như Duy Hưng', 'Hà Nội', '0356085145', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SanPham`
--

CREATE TABLE `SanPham` (
  `MaSanPham` int(10) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `HinhAnh` text DEFAULT NULL,
  `Gia` DECIMAL(10,3) NOT NULL,
  `GiaKhuyenMai` DECIMAL(10,3) NOT NULL,
  `MaDanhMuc` int(10) NOT NULL,
  `SoLuong` int(10) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `Hot` int(11) DEFAULT NULL,
  `TrangThai` varchar(100) NOT NULL DEFAULT 'Đang hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SanPham`
--

INSERT INTO `SanPham` (`MaSanPham`, `TenSanPham`, `HinhAnh`, `Gia`, `GiaKhuyenMai`, `MaDanhMuc`, `SoLuong`, `MoTa`, `Hot`, `TrangThai`) VALUES
(5, 'Dâu tây', 'dau_tay.webp', 180, 160, 1, 100, NULL, 0, 'Đang hoạt động'),
(6, 'Vải thiều sấy khô', 'vai-thieu-say-kho_NtpvlfoDGT.png', 56, 50, 1, 50, NULL, NULL, 'Đang hoạt động'),
(7, 'Dưa hấu', 'duahau.jpg', 30, 20, 1, 50, NULL, 1, 'Đang hoạt động'),
(8, 'Roi đỏ', 'roi.webp', 50, 45, 1, 40, NULL, NULL, 'Đang hoạt động'),
(9, 'Lê Đường Hà Giang', 'le-duong.png', 280, 200, 1, 30, NULL, 0, 'Đang hoạt động'),
(10, 'Nho mẫu đơn hộp xanh', 'nhoxanh.png', 336, 330, 1, 30, NULL, NULL, 'Đang hoạt động'),
(11, 'Mận seo tím', 'mantim.png', 600, 550, 1, 10, NULL, 1, 'Đang hoạt động'),
(12, 'Nho đỏ', 'nho.png', 77, 70, 1, 30, NULL, NULL, 'Đang hoạt động'),
(13, 'Đường phèn hoa cúc Tili 300gr', 'duong-phen-hoa-cuc.jpg', 59, 50, 2, 30, NULL, NULL, 'Đang hoạt động'),
(14, 'Trà đậu đen gạo lứt rang Tili 680gr', '.tra-dau-den-gao-lut-rang-tili-680gr_6v6ISA2NHp.jpg', 140, 120, 2, 40, NULL, 1, 'Đang hoạt động'),
(15, 'Trà ngũ cốc Tili 450gr', '.tra-ngu-coc-tili-450gr_sAIrmDi02L.jpg', 140, 120, 2, 50, NULL, NULL, 'Đang hoạt động'),
(16, 'Thập cẩm hạt Tili 400gr', 'thap-cam-hat-tili-400gr_K91lQA9NFw.jpg', 149, 139, 2, 30, NULL, 1, 'Đang hoạt động'),
(22, 'Xoài cát hòa lộc', 'xoai-cat.jpg', 400, 350, 1, 30, NULL, NULL, 'Đang hoạt động'),
(23, 'Cherry', 'nu_vay_6.webp', 362, 300, 1, NULL, NULL, NULL, 'Đang hoạt động'),
(24, 'Thanh long', 'thanhlong.png', 60, 40, 1, 30, NULL, NULL, 'Đang hoạt động'),
(25, 'Táo sấy dẻo Tili 300gr', '.tao-say-deo-tili-300gr_Blp8wN1D3s.jpg', 500, 350, 1, 20, NULL, NULL, 'Đang hoạt động'),
(26, 'Hạt dẻ cười nguyên vỏ Tili 500gr', 'hat-de-cuoi-nguyen-vo-tili-500gr_JBTgtkNSYw.jpg', 180, 160, 2, 10, NULL, NULL, 'Đang hoạt động'),
(27, 'Đậu phộng rang ớt tỏi Tili 300gr', '.dau-phong-rang-ot-toi-tili-300gr_upt9J9kWu0.jpg', 72, 70, 2, 30, NULL, NULL, 'Đang hoạt động');

--
--  Table structure for table `loginotken`

CREATE TABLE `logintoken` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(100),
  `created_at` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `BinhLuan`
--
ALTER TABLE `BinhLuan`
  ADD PRIMARY KEY (`MaBinhLuan`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Indexes for table `ChiTietDonHang`
--
ALTER TABLE `ChiTietDonHang`
  ADD PRIMARY KEY (`MaChiTietDH`),
  ADD KEY `MaDonHang` (`MaDonHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Indexes for table `DanhMuc`
--
ALTER TABLE `DanhMuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Indexes for table `DonHang`
--
ALTER TABLE `DonHang`
  ADD PRIMARY KEY (`MaDonHang`);

--
-- Indexes for table `KhachHang`
--
ALTER TABLE `KhachHang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Indexes for table `SanPham`
--
ALTER TABLE `SanPham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BinhLuan`
--
ALTER TABLE `BinhLuan`
  MODIFY `MaBinhLuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ChiTietDonHang`
--
ALTER TABLE `ChiTietDonHang`
  MODIFY `MaChiTietDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `DanhMuc`
--
ALTER TABLE `DanhMuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `DonHang`
--
ALTER TABLE `DonHang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `KhachHang`
--
ALTER TABLE `KhachHang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `SanPham`
--
ALTER TABLE `SanPham`
  MODIFY `MaSanPham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BinhLuan`
--
ALTER TABLE `BinhLuan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `KhachHang` (`MaKhachHang`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `SanPham` (`MaSanPham`);

--
-- Constraints for table `ChiTietDonHang`
--
ALTER TABLE `ChiTietDonHang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDonHang`) REFERENCES `DonHang` (`MaDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `SanPham` (`MaSanPham`);

--
-- Constraints for table `SanPham`
--
ALTER TABLE `SanPham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDanhMuc`) REFERENCES `DanhMuc` (`MaDanhMuc`);
COMMIT;


ALTER TABLE `logintoken`
  ADD PRIMARY KEY (`id`),
  ADD CONSTRAINT `logintoken_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `KhachHang` (`MaKhachHang`);