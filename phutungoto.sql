-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2018 lúc 03:34 AM
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
  `id_album` int(11) NOT NULL,
  `anhchitiet` varchar(500) NOT NULL,
  `sanpham_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiet`
--

CREATE TABLE `tbl_chitiet` (
  `id_chitiet` int(11) NOT NULL,
  `chitietbophan` varchar(500) NOT NULL,
  `tenbophan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiet`
--

INSERT INTO `tbl_chitiet` (`id_chitiet`, `chitietbophan`, `tenbophan`) VALUES
(1, 'Bơm nước', 'Phần động cơ'),
(2, 'Két nước', 'Phần động cơ'),
(3, 'Máy phát', 'Phần động cơ'),
(4, 'Máy phát', 'Phần động cơ'),
(5, 'Máy đềt', 'Phần động cơ'),
(6, 'Cổ hút', 'Phần động cơ'),
(7, 'Hộp số', 'Phần truyền động'),
(8, 'Trục chủ động', 'Phần truyền động'),
(9, 'Cửa xe ', 'Phần thân vỏ'),
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
  `id_dongxe` int(11) NOT NULL,
  `ten_dx` varchar(500) NOT NULL,
  `id_hangxe` int(11) NOT NULL,
  `namsx` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_dongxe`
--

INSERT INTO `tbl_dongxe` (`id_dongxe`, `ten_dx`, `id_hangxe`, `namsx`) VALUES
(1, 'Civic', 1, 2017),
(2, 'Mazda 3', 2, 2015),
(3, 'BMW 150i', 5, 2017),
(4, 'Camry', 6, 2018),
(6, 'Audi Q8', 7, 2015);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dsquyen`
--

CREATE TABLE `tbl_dsquyen` (
  `id_dsquyen` int(11) NOT NULL,
  `menu` varchar(200) NOT NULL,
  `kieuquyen` varchar(200) NOT NULL,
  `kieunguoidung_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_dsquyen`
--

INSERT INTO `tbl_dsquyen` (`id_dsquyen`, `menu`, `kieuquyen`, `kieunguoidung_id`) VALUES
(1, 'Hãng xe', 'Thêm', 2),
(8, 'Danh sách quyền', 'Sửa', 2),
(9, 'Danh sách quyền', 'Xóa', 2),
(10, 'Hóa đơn', 'Xóa', 1),
(13, 'Hóa đơn', 'Thêm', 2),
(14, 'Hóa đơn', 'Xem', 2),
(15, 'Hóa đơn', 'Sửa', 2),
(16, 'Hóa đơn', 'Xóa', 2);

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
(1, 'Honda ', 'public/uploads/', 'Nhật Bản'),
(2, 'Mazda ', 'public/uploads/dog.png', 'Hàn Quốc'),
(5, 'BMW', 'public/uploads/husky.jpg', 'Mỹ'),
(6, 'Toyota', 'public/uploads/ảnh giày 2.jpg', 'Mỹ'),
(7, 'Audi', 'public/uploads/audi-logo-old_1511525288.png', 'Nhật Bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `id_hoadon` int(11) NOT NULL,
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

INSERT INTO `tbl_hoadon` (`id_hoadon`, `id_khach`, `tenkhach`, `sdt`, `email`, `diachi`, `ngaytao`, `tinhtrang`) VALUES
(1, 1, '', '', '', '', '2018-11-12 23:22:02', 2),
(2, NULL, 'Trần Văn Bq', '0985784328', 'btran@gmail.com', 'Nhà A phố B', '2018-11-20 21:23:58', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ngdungcapcao`
--

CREATE TABLE `tbl_ngdungcapcao` (
  `id_ndcc` int(11) NOT NULL,
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

INSERT INTO `tbl_ngdungcapcao` (`id_ndcc`, `hoten`, `sdt`, `email`, `diachi`, `tendangnhap`, `matkhau`, `id_role`) VALUES
(1, 'Cộng Thị Tác Viên', '0000000000001', 'ctv@gmail.com', 'acd', 'ctv01', '12341234', 1),
(2, 'Admin Admin', '111111111', 'admin@gmail.com', '123dsf', 'admin', '11111119', 2),
(3, 'Nguyễn Thị Tơ', '09640838851', 'nguyenthito261298@gmail.com', '56 An Hòa', 'ToNguyen', '26121998', 1),
(11, 'Nguyễn Thị Kiều Trang', '76534636', 'trang@gmail.com', 'Nguyễn Trãi', 'trangtrang', 'trangtrang', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phutung`
--

CREATE TABLE `tbl_phutung` (
  `id_phutung` int(11) NOT NULL,
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
  `an_hien` int(1) NOT NULL,
  `ngaytao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vitri` int(11) NOT NULL,
  `id_dongxe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_phutung`
--

INSERT INTO `tbl_phutung` (`id_phutung`, `ten`, `gia`, `id_xuatxu`, `anh`, `id_chitiet`, `mota`, `soluong`, `id_nguoidang`, `url`, `parent_id`, `type`, `an_hien`, `ngaytao`, `vitri`, `id_dongxe`) VALUES
(1, 'Tay nắm cửa', '500000', 1, 'tay-nắm-của.png', 9, 'Tay nắm cửa 2 chiều', 100, 1, 'tay-nam-cua', 0, 1, 1, '2018-11-20 11:01:29', 1, 2),
(2, 'Điều hòa ', '4300000', 2, 'public/uploads/audi-logo-old_1511525288.png', 12, '<p>Điều h&ograve;a 2 chiều&nbsp;</p>\r\n', 30, 1, 'dieu-hoa', 1, 0, 1, '0000-00-00 00:00:00', 1, 3),
(3, 'Ghế tựa', '5000000', 3, 'public/uploads/ảnh gáu.jpg', 10, '<p>Ghế m&aacute;t xa gi&uacute;p người l&aacute;i thoải m&aacute;i</p>\r\n', 40, 1, 'ghe-lai-thoai-mai', 0, 0, 1, '0000-00-00 00:00:00', 1, 4),
(6, 'Honda 34', '4000000', 4, 'public/uploads/login.jpg', 10, '\r\nfgthb ybrhb\r\n\r\n', 3, 1, 'test 1', 0, 0, 1, '2018-11-20 11:26:29', 1, 4),
(7, 'Tủ lạnh', '1500000', 2, 'public/uploads/audi-logo-old_1511525288.png', 6, '<p>rg er we ewrg&nbsp;</p>\r\n', 40, 1, 'trang 1', 0, 0, 1, '2018-11-20 11:30:06', 1, 3),
(8, 'Honda', '4000000', 1, 'public/uploads/ảnh gáu.jpg', 8, '<p>er&nbsp; w 4r 4&nbsp;</p>\r\n', 50, 1, 'https://www.24h.com.vn/tin-tuc-trong-ngay/cao-toc-34000-ty-dong-sau-va-tay-khong-co-the-boc-duoc-c46a996770.html', 2, 1, 1, '2018-11-20 11:32:58', 1, 1),
(9, 'Honda', '4000000', 1, 'public/uploads/ảnh gáu.jpg', 8, '\r\ner  w 4r 4 \r\n\r\n', 50, 1, 'https://www.24h.com.vn/tin-tuc-trong-ngay/cao-toc-34000-ty-dong-sau-va-tay-khong-co-the-boc-duoc-c46a996770.html', 2, 1, 1, '2018-11-20 11:33:06', 1, 1),
(10, 'Hộp số 2.1', '8888888', 1, 'public/uploads/ryan-walton-520633-unsplash.jpg', 7, '<p>ghym ey&nbsp; druru yu&nbsp;</p>\r\n', 43, 1, 'hop-so', 8, 1, 1, '2018-11-20 11:53:25', 1, 4),
(13, 'hhfghdf', '4000000', 1, 'public/uploads/', 2, '', 40, 1, 'test 1yty', 2, 0, 1, '2018-11-21 18:47:26', 1, 3),
(14, 'hhfghdfđ', '4000000', 1, 'public/uploads/', 2, '', 40, 1, 'test 1yhhty', 2, 0, 1, '2018-11-21 18:48:32', 1, 3),
(15, 'hhfghdfđ', '4000000', 1, 'public/uploads/', 2, '', 40, 1, 'test 1yhhty', 2, 0, 0, '2018-11-21 18:49:34', 1, 3);

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
(2, 'Trung Quốc'),
(3, 'Hàn Quốc'),
(4, 'Thụy sỹ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_albumchitiet`
--
ALTER TABLE `tbl_albumchitiet`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_chitiet`
--
ALTER TABLE `tbl_chitiet`
  ADD PRIMARY KEY (`id_chitiet`);

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
  ADD PRIMARY KEY (`id_dongxe`),
  ADD KEY `id_hangxe` (`id_hangxe`);

--
-- Chỉ mục cho bảng `tbl_dsquyen`
--
ALTER TABLE `tbl_dsquyen`
  ADD PRIMARY KEY (`id_dsquyen`),
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
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `id_khach` (`id_khach`);

--
-- Chỉ mục cho bảng `tbl_ngdungcapcao`
--
ALTER TABLE `tbl_ngdungcapcao`
  ADD PRIMARY KEY (`id_ndcc`),
  ADD UNIQUE KEY `sdt` (`sdt`),
  ADD KEY `tbl_ngdungcapcao_ibfk_1` (`id_role`);

--
-- Chỉ mục cho bảng `tbl_phutung`
--
ALTER TABLE `tbl_phutung`
  ADD PRIMARY KEY (`id_phutung`),
  ADD KEY `id_chitiet` (`id_chitiet`),
  ADD KEY `id_dongxe` (`id_dongxe`),
  ADD KEY `id_nguoidang` (`id_nguoidang`),
  ADD KEY `id_xuatxu` (`id_xuatxu`);

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
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_chitiet`
--
ALTER TABLE `tbl_chitiet`
  MODIFY `id_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tbl_dongxe`
--
ALTER TABLE `tbl_dongxe`
  MODIFY `id_dongxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `tbl_dsquyen`
--
ALTER TABLE `tbl_dsquyen`
  MODIFY `id_dsquyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `tbl_hangxe`
--
ALTER TABLE `tbl_hangxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `tbl_ngdungcapcao`
--
ALTER TABLE `tbl_ngdungcapcao`
  MODIFY `id_ndcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `tbl_phutung`
--
ALTER TABLE `tbl_phutung`
  MODIFY `id_phutung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `tbl_xuatxu`
--
ALTER TABLE `tbl_xuatxu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_albumchitiet`
--
ALTER TABLE `tbl_albumchitiet`
  ADD CONSTRAINT `tbl_albumchitiet_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_phutung` (`id_phutung`);

--
-- Các ràng buộc cho bảng `tbl_chitiethoadon`
--
ALTER TABLE `tbl_chitiethoadon`
  ADD CONSTRAINT `tbl_chitiethoadon_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `tbl_hoadon` (`id_hoadon`),
  ADD CONSTRAINT `tbl_chitiethoadon_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_phutung` (`id_phutung`);

--
-- Các ràng buộc cho bảng `tbl_dongxe`
--
ALTER TABLE `tbl_dongxe`
  ADD CONSTRAINT `tbl_dongxe_ibfk_1` FOREIGN KEY (`id_hangxe`) REFERENCES `tbl_hangxe` (`id`);

--
-- Các ràng buộc cho bảng `tbl_dsquyen`
--
ALTER TABLE `tbl_dsquyen`
  ADD CONSTRAINT `tbl_dsquyen_ibfk_1` FOREIGN KEY (`kieunguoidung_id`) REFERENCES `tbl_nhomnguoidung` (`id_nhomnd`);

--
-- Các ràng buộc cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `tbl_hoadon_ibfk_1` FOREIGN KEY (`id_khach`) REFERENCES `tbl_nguoidung` (`id_user`);

--
-- Các ràng buộc cho bảng `tbl_ngdungcapcao`
--
ALTER TABLE `tbl_ngdungcapcao`
  ADD CONSTRAINT `tbl_ngdungcapcao_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tbl_nhomnguoidung` (`id_nhomnd`);

--
-- Các ràng buộc cho bảng `tbl_phutung`
--
ALTER TABLE `tbl_phutung`
  ADD CONSTRAINT `tbl_phutung_ibfk_2` FOREIGN KEY (`id_chitiet`) REFERENCES `tbl_chitiet` (`id_chitiet`),
  ADD CONSTRAINT `tbl_phutung_ibfk_4` FOREIGN KEY (`id_dongxe`) REFERENCES `tbl_dongxe` (`id_dongxe`),
  ADD CONSTRAINT `tbl_phutung_ibfk_5` FOREIGN KEY (`id_nguoidang`) REFERENCES `tbl_ngdungcapcao` (`id_ndcc`),
  ADD CONSTRAINT `tbl_phutung_ibfk_6` FOREIGN KEY (`id_xuatxu`) REFERENCES `tbl_xuatxu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
