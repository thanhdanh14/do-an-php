-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 12:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quan-ly-cua-hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `idBill` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `dateCreate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
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
-- Table structure for table `history_receipt`
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` varchar(50) DEFAULT NULL,
  `quantityProduct` int(11) DEFAULT NULL,
  `priceProduct` decimal(11,0) DEFAULT NULL,
  `imageProduct` varchar(255) DEFAULT NULL,
  `codeProduct` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_product`
--

CREATE TABLE `receipt_product` (
  `idReceipt` int(11) NOT NULL,
  `dateReceipt` datetime DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(5) NOT NULL,
  `nameRole` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `nameRole`) VALUES
(1, 'Nhân viên'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Error reading data for table quan-ly-cua-hang.user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `quan-ly-cua-hang`.`user`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idBill`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id_bill_detail`),
  ADD KEY `idBill` (`idBill`);

--
-- Indexes for table `history_receipt`
--
ALTER TABLE `history_receipt`
  ADD PRIMARY KEY (`id_history_receipt`),
  ADD KEY `idReceipt` (`idReceipt`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`,`codeProduct`) USING BTREE,
  ADD UNIQUE KEY `codeProduct` (`codeProduct`);

--
-- Indexes for table `receipt_product`
--
ALTER TABLE `receipt_product`
  ADD PRIMARY KEY (`idReceipt`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_receipt`
--
ALTER TABLE `history_receipt`
  MODIFY `id_history_receipt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_product`
--
ALTER TABLE `receipt_product`
  MODIFY `idReceipt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`idBill`) REFERENCES `bill` (`idBill`);

--
-- Constraints for table `history_receipt`
--
ALTER TABLE `history_receipt`
  ADD CONSTRAINT `history_receipt_ibfk_1` FOREIGN KEY (`idReceipt`) REFERENCES `receipt_product` (`idReceipt`);

--
-- Constraints for table `receipt_product`
--
ALTER TABLE `receipt_product`
  ADD CONSTRAINT `receipt_product_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
