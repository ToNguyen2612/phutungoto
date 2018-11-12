-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2018 lúc 05:24 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phutungoto`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_albumchitiet`
--

CREATE TABLE `tbl_albumchitiet` (
  `id` int(11) NOT NULL,
  `anhchitiet` varchar(500) NOT NULL,
  `sanpham_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_albumchitiet`
--

INSERT INTO `tbl_albumchitiet` (`id`, `anhchitiet`, `sanpham_id`) VALUES
(1, 'tay-nam-cua-1.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiet`
--

CREATE TABLE `tbl_chitiet` (
  `id` int(11) NOT NULL,
  `chitietbophan` varchar(500) NOT NULL,
  `tenbophan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiet`
--

INSERT INTO `tbl_chitiet` (`id`, `chitietbophan`, `tenbophan`) VALUES
(1, 'Bơm nước', 'Phần động cơ'),
(2, 'Két nước', 'Phần động cơ'),
(3, 'Máy phát', 'Phần động cơ'),
(4, 'Máy phát', 'Phần động cơ'),
(5, 'Máy đềt', 'Phần động cơ'),
(6, 'Cổ hút', 'Phần động cơ'),
(7, 'Hộp số', 'Phần truyền động'),
(8, 'Trục chủ động', 'Phần truyền động'),
(9, 'Cửa xe', 'Phần thân vỏ'),
(10, 'Ghế ngồi', 'Phần thân vỏ'),
(11, 'Ắc quy', 'Phần điện'),
(12, 'Điều hòa', 'Phần điện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `hoadon_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dongxe`
--

CREATE TABLE `tbl_dongxe` (
  `id` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `id_hangxe` int(11) NOT NULL,
  `namsx` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_dongxe`
--

INSERT INTO `tbl_dongxe` (`id`, `ten`, `id_hangxe`, `namsx`) VALUES
(1, 'Civic', 1, 2017),
(2, 'Mazda 3', 2, 2015);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dsquyen`
--

CREATE TABLE `tbl_dsquyen` (
  `id` int(11) NOT NULL,
  `menu` varchar(200) NOT NULL,
  `kieuquyen` varchar(200) NOT NULL,
  `kieunguoidung_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_dsquyen`
--

INSERT INTO `tbl_dsquyen` (`id`, `menu`, `kieuquyen`, `kieunguoidung_id`) VALUES
(1, 'Hãng xe', 'Thêm', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hangxe`
--

CREATE TABLE `tbl_hangxe` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `nuocsx` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hangxe`
--

INSERT INTO `tbl_hangxe` (`id`, `ten`, `logo`, `nuocsx`) VALUES
(1, 'Honda', '', 'Nhật Bản'),
(2, 'Mazda', 'logo-mazda.png', 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `id` int(11) NOT NULL,
  `id_khach` int(11) DEFAULT NULL,
  `tenkhach` varchar(200) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ngaytao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`id`, `id_khach`, `tenkhach`, `sdt`, `email`, `diachi`, `ngaytao`, `tinhtrang`) VALUES
(1, 1, '', '', '', '', '2018-11-12 23:22:02', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ngdungcapcao`
--

CREATE TABLE `tbl_ngdungcapcao` (
  `id` int(11) NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `matkhau` varchar(200) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_ngdungcapcao`
--

INSERT INTO `tbl_ngdungcapcao` (`id`, `hoten`, `sdt`, `email`, `diachi`, `tendangnhap`, `matkhau`, `id_role`) VALUES
(1, 'Cộng Thị Tác Viên', '0000000000001', 'ctv@gmail.com', 'acd', 'ctv01', '12341234', 1),
(2, 'Admin Admin', '111111111', 'admin@gmail.com', '123dsf', 'admin', '11111119', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phutung`
--

CREATE TABLE `tbl_phutung` (
  `id` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `id_xuatxu` int(11) NOT NULL,
  `anh` varchar(500) NOT NULL,
  `id_chitiet` int(11) NOT NULL,
  `mota` text NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `id_nguoidang` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `an_hien` bit(1) NOT NULL,
  `ngaytao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vitri` int(11) NOT NULL,
  `id_dongxe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_phutung`
--

INSERT INTO `tbl_phutung` (`id`, `ten`, `gia`, `id_xuatxu`, `anh`, `id_chitiet`, `mota`, `soluong`, `id_nguoidang`, `url`, `parent_id`, `type`, `an_hien`, `ngaytao`, `vitri`, `id_dongxe`) VALUES
(0, 'Tay nắm cửa Mazda', '3200000', 1, '', 1, 'Tay nắm cửa', 5, 1, 'tay-nam-cua', 1, 1, b'1111111111111111111111111111111', '2018-11-12 23:05:32', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `tendangnhap` varchar(500) NOT NULL,
  `matkhau` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `hoten`, `sdt`, `email`, `diachi`, `tendangnhap`, `matkhau`) VALUES
(1, 'Nguyễn Thị Tơ', '0964083885', 'nguyenthito261298@gmail.com', 'Hà Đông - Hà Nội', 'tonguyen2612', '12345678');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_xuatxu`
--

CREATE TABLE `tbl_xuatxu` (
  `id` int(11) NOT NULL,
  `quocgia` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_xuatxu`
--

INSERT INTO `tbl_xuatxu` (`id`, `quocgia`) VALUES
(1, 'Nhật Bản'),
(2, 'Trung Quốc');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_albumchitiet`
--
ALTER TABLE `tbl_albumchitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_chitiet`
--
ALTER TABLE `tbl_chitiet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_dongxe`
--
ALTER TABLE `tbl_dongxe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hangxe` (`id_hangxe`);

--
-- Chỉ mục cho bảng `tbl_dsquyen`
--
ALTER TABLE `tbl_dsquyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kieunguoidung_id` (`kieunguoidung_id`);

--
-- Chỉ mục cho bảng `tbl_hangxe`
--
ALTER TABLE `tbl_hangxe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach` (`id_khach`);

--
-- Chỉ mục cho bảng `tbl_ngdungcapcao`
--
ALTER TABLE `tbl_ngdungcapcao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sdt` (`sdt`),
  ADD KEY `tbl_ngdungcapcao_ibfk_1` (`id_role`);

--
-- Chỉ mục cho bảng `tbl_phutung`
--
ALTER TABLE `tbl_phutung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chitiet` (`id_chitiet`),
  ADD KEY `id_dongxe` (`id_dongxe`),
  ADD KEY `id_nguoidang` (`id_nguoidang`),
  ADD KEY `id_xuatxu` (`id_xuatxu`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_xuatxu`
--
ALTER TABLE `tbl_xuatxu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_albumchitiet`
--
ALTER TABLE `tbl_albumchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tbl_chitiet`
--
ALTER TABLE `tbl_chitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_dongxe`
--
ALTER TABLE `tbl_dongxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tbl_dsquyen`
--
ALTER TABLE `tbl_dsquyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tbl_hangxe`
--
ALTER TABLE `tbl_hangxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tbl_ngdungcapcao`
--
ALTER TABLE `tbl_ngdungcapcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `tbl_xuatxu`
--
ALTER TABLE `tbl_xuatxu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_albumchitiet`
--
ALTER TABLE `tbl_albumchitiet`
  ADD CONSTRAINT `tbl_albumchitiet_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_phutung` (`id`);

--
-- Các ràng buộc cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD CONSTRAINT `tbl_chitiethoadon_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `tbl_hoadon` (`id`),
  ADD CONSTRAINT `tbl_chitiethoadon_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_phutung` (`id`);

--
-- Các ràng buộc cho bảng `tbl_dongxe`
--
ALTER TABLE `tbl_dongxe`
  ADD CONSTRAINT `tbl_dongxe_ibfk_1` FOREIGN KEY (`id_hangxe`) REFERENCES `tbl_hangxe` (`id`);

--
-- Các ràng buộc cho bảng `tbl_dsquyen`
--
ALTER TABLE `tbl_dsquyen`
  ADD CONSTRAINT `tbl_dsquyen_ibfk_1` FOREIGN KEY (`kieunguoidung_id`) REFERENCES `tbl_nhomnguoidung` (`id`);

--
-- Các ràng buộc cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `tbl_hoadon_ibfk_1` FOREIGN KEY (`id_khach`) REFERENCES `tbl_user` (`id`);

--
-- Các ràng buộc cho bảng `tbl_ngdungcapcao`
--
ALTER TABLE `tbl_ngdungcapcao`
  ADD CONSTRAINT `tbl_ngdungcapcao_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tbl_nhomnguoidung` (`id`);

--
-- Các ràng buộc cho bảng `tbl_phutung`
--
ALTER TABLE `tbl_phutung`
  ADD CONSTRAINT `tbl_phutung_ibfk_2` FOREIGN KEY (`id_chitiet`) REFERENCES `tbl_chitiet` (`id`),
  ADD CONSTRAINT `tbl_phutung_ibfk_4` FOREIGN KEY (`id_dongxe`) REFERENCES `tbl_dongxe` (`id`),
  ADD CONSTRAINT `tbl_phutung_ibfk_5` FOREIGN KEY (`id_nguoidang`) REFERENCES `tbl_ngdungcapcao` (`id`),
  ADD CONSTRAINT `tbl_phutung_ibfk_6` FOREIGN KEY (`id_xuatxu`) REFERENCES `tbl_xuatxu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
