-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2021 lúc 08:46 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan-ly-cua-hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `idBill` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `dateCreate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id_bill_detail` int(11) NOT NULL,
  `nameProduct` varchar(50) DEFAULT NULL,
  `priceProduct` decimal(11,0) DEFAULT NULL,
  `quantityProduct` int(11) DEFAULT NULL,
  `idBill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_receipt`
--

CREATE TABLE `history_receipt` (
  `id_history_receipt` int(11) NOT NULL,
  `idReceipt` int(11) DEFAULT NULL,
  `nameProduct` varchar(50) DEFAULT NULL,
  `quantityProduct` int(11) DEFAULT NULL,
  `priceProduct` decimal(11,0) DEFAULT NULL,
  `imageProduct` varchar(255) DEFAULT NULL,
  `codeProduct` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` varchar(50) DEFAULT NULL,
  `quantityProduct` int(11) DEFAULT NULL,
  `priceProduct` decimal(11,0) DEFAULT NULL,
  `imageProduct` varchar(255) DEFAULT NULL,
  `codeProduct` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idProduct`, `nameProduct`, `quantityProduct`, `priceProduct`, `imageProduct`, `codeProduct`) VALUES
(3, 'Ca cao', 5, '10000', '20210410062437RobloxScreenShot20210328_231000146.png', 'CACAO1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt_product`
--

CREATE TABLE `receipt_product` (
  `idReceipt` int(11) NOT NULL,
  `dateReceipt` datetime DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `idRole` int(5) NOT NULL,
  `nameRole` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`idRole`, `nameRole`) VALUES
(1, 'Nhân viên'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Email` varchar(90) DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Gender` tinyint(1) DEFAULT NULL,
  `idRole` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `Username`, `Email`, `Password`, `PhoneNumber`, `Gender`, `idRole`) VALUES
(27, 'ase', '123@gmail.com', '202cb962ac59075b964b07152d234b70', '12476869076', 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idBill`),
  ADD KEY `idUser` (`idUser`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id_bill_detail`),
  ADD KEY `idBill` (`idBill`);

--
-- Chỉ mục cho bảng `history_receipt`
--
ALTER TABLE `history_receipt`
  ADD PRIMARY KEY (`id_history_receipt`),
  ADD KEY `idReceipt` (`idReceipt`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`,`codeProduct`) USING BTREE,
  ADD UNIQUE KEY `codeProduct` (`codeProduct`);

--
-- Chỉ mục cho bảng `receipt_product`
--
ALTER TABLE `receipt_product`
  ADD PRIMARY KEY (`idReceipt`),
  ADD KEY `idUser` (`idUser`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id_bill_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `history_receipt`
--
ALTER TABLE `history_receipt`
  MODIFY `id_history_receipt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `receipt_product`
--
ALTER TABLE `receipt_product`
  MODIFY `idReceipt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`idBill`) REFERENCES `bill` (`idBill`);

--
-- Các ràng buộc cho bảng `history_receipt`
--
ALTER TABLE `history_receipt`
  ADD CONSTRAINT `history_receipt_ibfk_1` FOREIGN KEY (`idReceipt`) REFERENCES `receipt_product` (`idReceipt`);

--
-- Các ràng buộc cho bảng `receipt_product`
--
ALTER TABLE `receipt_product`
  ADD CONSTRAINT `receipt_product_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
