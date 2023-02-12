-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 11:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_mvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(250) NOT NULL,
  `adminEmail` varchar(155) NOT NULL,
  `adminUser` varchar(250) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminID`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Mạnh Oliver', 'maccthienndii@gmail.com', 'oliver2k1', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(13, 'BINTECH'),
(14, 'SAMSUNG'),
(15, 'ASUS'),
(16, 'LENOVO'),
(17, 'HUAWEI'),
(18, 'DELL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(26, 'Thiết bị điện tử'),
(28, 'Đồng hồ'),
(29, 'Thiết bị điện gia dụng'),
(30, 'Màn hình &amp; Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(4, 'Mạnh Oliver', '134 Phố Viên', 'Hà Nội', 'AF', '20000', '0334079644', 'maccthienndii@gmail.com', 'b73d59fb26f67b66491095424336cae7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `productDes` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `productDes`, `type`, `price`, `image`) VALUES
(24, 'Máy giặt Samsung cửa trước Digital Inverter 8kg', 29, 14, '<p class=\"irIKAp\">Th&ocirc;ng số kỹ thuật</p>\r\n<p class=\"irIKAp\">Khối Lượng Giặt (kg): 8.0 kg</p>\r\n<p class=\"irIKAp\">M&agrave;u sắc: Trắng</p>\r\n<p class=\"irIKAp\">Kh&oacute;a trẻ em: Đ&uacute;ng</p>\r\n<p class=\"irIKAp\">Tốc độ quay: 1200 v&ograve;ng / ph&uacute;t</p>\r\n<p class=\"irIKAp\">K&iacute;ch Thước Thực (WxHxD): 595 x 850 x 440 mm</p>\r\n<p class=\"irIKAp\">Khối Lượng Thực: 57 kg</p>\r\n<p class=\"irIKAp\">Model: WW80T3020WW/SV</p>\r\n<p class=\"irIKAp\">TH&Ocirc;NG TIN BẢO H&Agrave;NH</p>\r\n<p class=\"irIKAp\">Bảo h&agrave;nh 24 th&aacute;ng</p>\r\n<p class=\"irIKAp\">Vui l&ograve;ng truy cập website để c&oacute; th&ocirc;ng tin bảo h&agrave;nh sản phẩm: https://www.samsung.com/vn/support/service-center/</p>', 0, '4990000', '9aad286815.jpg'),
(30, 'Laptop Lenovo IdeaPad 3-14ITL6 82H700G1VN ', 30, 16, '<p class=\"irIKAp\">TH&Ocirc;NG SỐ KỸ THUẬT:</p>\r\n<p class=\"irIKAp\">CPU: Intel Core i5-1135G7 (up to 4.20GHz, 8MB)</p>\r\n<p class=\"irIKAp\">RAM: 8GB(4GB Soldered DDR4-3200Mhz + 4GB SO-DIMM DDR4-3200Mhz) (2 khe, tối da 12GB)</p>\r\n<p class=\"irIKAp\">Ổ cứng: 512GB SSD M.2 2242 PCIe 3.0x4 NVMe</p>\r\n<p class=\"irIKAp\">VGA: Integrated Intel Iris Xe Graphics</p>\r\n<p class=\"irIKAp\">M&agrave;n h&igrave;nh: 14.0 inch FHD (1920x1080) TN 250nits Anti-glare, 45% NTSC</p>\r\n<p class=\"irIKAp\">Pin: 2Cell, 38WH</p>\r\n<p class=\"irIKAp\">C&acirc;n nặng: 1.41 kg</p>\r\n<p class=\"irIKAp\">OS: Windows 10 Home 64</p>\r\n<p class=\"irIKAp\">K&iacute;ch thước: 324.2 x 215.7 x 19.9 mm (12.76 x 8.49 x 0.78 inches) cm</p>', 1, '11590000', '22365308c2.jpg'),
(31, 'Vòng đeo tay thông minh Huawei Band 7', 28, 17, '<p class=\"irIKAp\">V&ograve;ng đeo tay th&ocirc;ng minh Huawei Band 7 - Giữ nguy&ecirc;n ngoại h&igrave;nh tiện lợi kết hợp th&ecirc;m n&acirc;ng cấp mới mẻ</p>\r\n<p class=\"irIKAp\">V&ograve;ng đeo tay th&ocirc;ng minh&nbsp;Huawei Band 7&nbsp;ngo&agrave;i việc hỗ trợ bạn xem tin nhắn, th&ocirc;ng b&aacute;o hay dự b&aacute;o thời tiết,...th&igrave; thiết bị đ&atilde; tạo dấu ấn ri&ecirc;ng của m&igrave;nh trong l&ograve;ng người d&ugrave;ng với khả năng đo lường c&aacute;c chỉ số sức khoẻ rất tốt. V&igrave; thế m&agrave; Huawei đ&atilde; cho ra đời thế hệ tiếp theo của v&ograve;ng tay th&ocirc;ng minh nhằm tối ưu hơn trải nghiệm sử dụng của bạn.</p>', 1, '939000', '984859f19d.jpg'),
(35, 'Loa bluetooth mini không dây chính hãng', 26, 13, '<p>Lớp vỏ ngo&agrave;i của Loa Bluetooth bằng nhựa chống trơn trượt Thiết kế tinh tế, c&ocirc;ng nghệ đột ph&aacute;, sử dụng đơn giản, kiểu đ&oacute;ng g&oacute;i độc đ&aacute;o.</p>', 1, '150000', 'dda4dd5bbb.jpg'),
(36, 'Máy hút bụi Samsung VC18M2120SB/SV (Xanh)', 29, 14, '<p>Thiết kế gọn nhẹ của m&aacute;y h&uacute;t bụi Samsung gi&uacute;p dễ d&agrave;ng di chuyển khắp mọi nơi. Samsung VC2100 c&oacute; k&iacute;ch thước nhỏ hơn 22% m&aacute;y h&uacute;t bụi th&ocirc;ng thường, dễ d&agrave;ng k&eacute;o v&agrave; thổi sạch bụi ở những nơi kh&oacute; tiếp cận.</p>', 1, '1150000', '3008811d09.jpg'),
(37, 'Màn hình Samsung LS24AG320NEXXV 24', 30, 14, '<p>&iacute;ch thước: 24 inch Độ ph&acirc;n giải: Full HD (1920 x 1080) Tỉ lệ: 16:9 Tấm nền: VA Loại m&agrave;n h&igrave;nh: M&agrave;n h&igrave;nh phẳng Tốc độ l&agrave;m mới: 165Hz (Max)</p>', 1, '4705000', 'ae5980ea29.jpg'),
(38, 'Laptop Asus X415EA-EK047T i3-1115G4/4G/256GB', 30, 15, '<p class=\"irIKAp\">Th&ocirc;ng số kỹ thuật:</p>\r\n<p class=\"irIKAp\">CPU: Intel&reg; Core&trade; i3-1115G4 (upto 4.10GHz, 6MB)</p>\r\n<p class=\"irIKAp\">RAM: 4GB DDR4 + 1slot</p>\r\n<p class=\"irIKAp\">Ổ cứng: 256GB M.2 NVMe&trade; PCIe&reg; 3.0 SSD</p>\r\n<p class=\"irIKAp\">VGA: Intel&reg; UHD Graphics</p>', 0, '12490000', '902b8fa66b.jpg'),
(39, 'Laptop Asus TUF Gaming', 30, 15, '<p class=\"irIKAp\">Th&ocirc;ng số kỹ thuật:</p>\r\n<p class=\"irIKAp\">CPU: Intel&reg; Core&trade; i5-10300H (2.50GHz upto 4.50GHz, 8MB)</p>\r\n<p class=\"irIKAp\">RAM: 8GB DDR4 2933MHz (2 khe, tối đa 32GB)</p>\r\n<p class=\"irIKAp\">Ổ cứng: 512GB M.2 NVMe&trade; PCIe&reg; 3.0 SSD</p>\r\n<p class=\"irIKAp\">VGA: NVIDIA&reg; GeForce&reg; GTX&nbsp;1650 4GB GDDR6</p>', 1, '21990000', 'c5c93699a5.jpg'),
(40, 'Màn Hình Gaming Dell G3223D 31.5', 30, 18, '<p class=\"irIKAp\">Th&ocirc;ng số kỹ thuật:</p>\r\n<p class=\"irIKAp\">Dell Gaming G3223D</p>\r\n<p class=\"irIKAp\">Hỗ trợ m&agrave;u sắc: 1.07 billion</p>\r\n<p class=\"irIKAp\">K&iacute;ch thước: 31.5 inches</p>\r\n<p class=\"irIKAp\">Tấm nền: IPS (In-plane switching Technology)</p>\r\n<p class=\"irIKAp\">Lớp phủ m&agrave;n h&igrave;nh: chống ch&oacute;i</p>\r\n<p class=\"irIKAp\">Loại m&agrave;n h&igrave;nh: M&agrave;n h&igrave;nh LED</p>\r\n<p class=\"irIKAp\">Độ ph&acirc;n giải: QHD 2560 x 1440</p>\r\n<p class=\"irIKAp\">Tần số qu&eacute;t: 165Hz</p>', 1, '13990000', 'c8394cf335.jpg'),
(41, 'Màn Hình Dell E2222H 21.5\' FHD VA 60Hz 5ms VGA DP', 30, 18, '<p>Th&ocirc;ng số kỹ thuật: Dell E2222H M&agrave;u: Đen Color: 16.7 million K&iacute;ch thước: 21.5 inches Tấm nền: VA Độ ph&acirc;n giải: Full HD (1920 x 1080), Anti-glare Tần số qu&eacute;t: 60 Hz Tương phản: 3000:1 / 3000:1 (dynamic)</p>', 0, '2699000', '5dce8302d2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
