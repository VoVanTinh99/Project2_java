-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2018 at 05:02 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `windsor`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `AboutId` smallint(6) NOT NULL,
  `AboutName` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `AboutWinsor` varchar(245) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeCode` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`AboutId`, `AboutName`, `AboutWinsor`, `EmployeeCode`) VALUES
(1, 'Công ty rượu xuất nhập khẩu Winsor', 'Bulgarian wineries. Welcome to one of most friendly Bulgarian Wine shop where Valentina and Asen welcomed us for a very special degustation.', 'CP890');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `BillId` int(11) NOT NULL,
  `BillCreate` datetime NOT NULL,
  `BillDetails` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BillStatus` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_order`
--

CREATE TABLE IF NOT EXISTS `bill_order` (
  `BillId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `CategoryDescription` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `CategoryDescription`) VALUES
(1, 'Vodka', 'Nổi tiếng ở Nhật Bản'),
(2, 'Whisky', 'Wisky 3'),
(3, 'Chivas', 'Otopo là loại rượu đến từ Nhật Bản'),
(4, 'Vietnam', 'Gồm nhiều loại rượu xuất xứ từ Việt Nam'),
(5, 'Fruit', 'Trái cây lên men');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ContactId` int(11) NOT NULL,
  `Subject` int(11) NOT NULL,
  `Names` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `ContactDate` date DEFAULT NULL,
  `Information` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(10) unsigned NOT NULL,
  `Address` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `RelyContact` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactId`, `Subject`, `Names`, `ContactDate`, `Information`, `Email`, `Phone`, `Address`, `RelyContact`) VALUES
(1, 2, 'Đặng Tuấn Huy', '2018-01-14', 'Khuyến Mãi Trật Ngày', 'huysamasun@gmail.com', 963505927, '123, Nguyễn Văn Cừ nối dài', 1),
(2, 2, 'Nguyễn Thị Cẩm Tuyên', '2018-01-09', 'Muốn được mua nhiều rượu nho hơn', 'ntctuyen@ctu.edu.vn', 925028460, 'Thốt Nốt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `CountryId` int(12) NOT NULL,
  `CountryName` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CountryDetails` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `CountryName`, `CountryDetails`) VALUES
(2, 'Việt Nam', ''),
(3, 'Thái Lan', ''),
(4, 'Lào', ''),
(5, 'Campuchia', ''),
(6, 'Hàn Quốc', ''),
(7, 'Pháp', ''),
(8, 'Ai Cập', ''),
(9, 'Ý', ''),
(10, 'Bỉ', 'Bỉ là một quốc gia'),
(11, 'Nhật Bản', 'Một quốc gia nổi tiếng với nhiều loại rượu. Khi bạn uống rượu và ngắm hoa anh đào thật là tuyệt phải không?'),
(12, 'Thụy Sỉ', 'Những loại rượu tuyệt vời của Thụy Sĩ bạn sẽ phải ngất ngây'),
(13, 'Thụy Sỉ', 'Những loại rượu tuyệt vời của Thụy Sĩ bạn sẽ phải ngất ngây'),
(14, 'Úc', 'Một trong những quốc gia nổi tiếng với rượu trái cây'),
(15, 'Úc', 'Một trong những quốc gia nổi tiếng với rượu trái cây'),
(16, 'Úc', 'Một trong những quốc gia nổi tiếng với rượu trái cây'),
(17, 'Canada', 'Canada không mấy nổi tiếng về rượu'),
(18, 'Canada', 'Canada không mấy nổi tiếng về rượu'),
(19, 'Canada', 'Canada không mấy nổi tiếng về rượu'),
(20, 'Nauy', 'ttttt');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EmployeeCode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeePass` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeName` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeBirth` date NOT NULL,
  `EmployeeAddress` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeEmail` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeIC` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RoleId` smallint(6) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeCode`, `EmployeePass`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `RoleId`) VALUES
('CP890', '90957dd92b9eb08aa00ba8a113a07f02', 'Nguyễn Thị Cẩm Tuyên', '1995-03-20', 'Thốt Nốt', 'ntctuyen@gmail.com', '212423561347', 1),
('ngthuc', '21232f297a57a5a743894a0e4a801fc3', 'Nguyên Thức', '1996-01-01', 'Ninh Kiều, Cần Thơ', 'me@ngthuc.com', '096050009748', 3),
('ntctuyen', 'cbb2e126f7265748e7b6403625431f21', 'ntctuyen', '1997-02-01', 'Tiên Thủy, Châu Thành, Bến Tre', 'huygama@gmail.com', '321573034', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedbackId` int(11) NOT NULL,
  `Username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `FeedbackCreate` date DEFAULT NULL,
  `FeedbackAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FeedbackContent` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Reply` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imageemployee`
--

CREATE TABLE IF NOT EXISTS `imageemployee` (
  `ImgEmployeeId` tinyint(4) NOT NULL,
  `ImgEmployee` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeCode` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imageemployee`
--

INSERT INTO `imageemployee` (`ImgEmployeeId`, `ImgEmployee`, `EmployeeCode`) VALUES
(1, 'CP808_ywnbs510a4.png', 'ntctuyen');

-- --------------------------------------------------------

--
-- Table structure for table `imgabout`
--

CREATE TABLE IF NOT EXISTS `imgabout` (
  `ImgAboutId` smallint(6) NOT NULL,
  `ImgAbout` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AboutId` smallint(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imgabout`
--

INSERT INTO `imgabout` (`ImgAboutId`, `ImgAbout`, `AboutId`) VALUES
(8, '1_2v5cyhl7j1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imgnews`
--

CREATE TABLE IF NOT EXISTS `imgnews` (
  `ImgNewsId` int(11) NOT NULL,
  `ImgNews` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NewsId` smallint(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imgnews`
--

INSERT INTO `imgnews` (`ImgNewsId`, `ImgNews`, `NewsId`) VALUES
(1, '1_n9o93w2z1p.jpg', 1),
(2, '1_ycu6wde3cn.jpg', 1),
(3, '1_tsz81yb9ad.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `imgwine`
--

CREATE TABLE IF NOT EXISTS `imgwine` (
  `ImgWineId` int(11) NOT NULL,
  `ImgWine` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `WineId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imgwine`
--

INSERT INTO `imgwine` (`ImgWineId`, `ImgWine`, `WineId`) VALUES
(35, '35_14_Whisky Ballantines.jpg', 14),
(42, '42_1_Ruou Phu Le.jpg', 1),
(44, '44_1_Ruou Phu Le.jpg', 1),
(45, '45_1_Ruou Phu Le.jpg', 1),
(46, '46_1_Ruou Phu Le.jpg', 1),
(47, '47_1_Ruou Phu Le.jpg', 1),
(48, '48_1_Ruou Phu Le.jpg', 1),
(56, '56_7_Vorka 1.jpg', 7),
(57, '57_7_Vorka 1.jpg', 7),
(58, '58_7_Vorka 1.jpg', 7),
(62, '62_8_Vorka 2.jpg', 8),
(63, '63_8_Vorka 2.jpg', 8),
(64, '64_8_Vorka 2.jpg', 8),
(65, '1_9_Vorka 3.jpg', 9),
(66, '66_9_Vorka 3.jpg', 9),
(70, '70_9_Vorka 3.jpg', 9),
(71, '1_13_Whisky hibiki.jpg', 13),
(72, '72_13_Whisky hibiki.jpg', 13),
(73, '73_13_Whisky hibiki.jpg', 13),
(74, '74_13_Whisky hibiki.jpg', 13),
(75, '75_13_Whisky hibiki.jpg', 13),
(76, '76_13_Whisky hibiki.jpg', 13),
(77, '36_14_Whisky Ballantines.jpg', 14),
(78, '78_14_Whisky Ballantines.jpg', 14),
(79, '79_14_Whisky Ballantines.jpg', 14),
(80, '80_14_Whisky Ballantines.jpg', 14),
(81, '81_14_Whisky Ballantines.jpg', 14),
(83, '83_6_Cherry First.jpg', 6),
(84, '84_6_Cherry First.jpg', 6),
(85, '85_6_Cherry First.jpg', 6),
(86, '86_6_Cherry First.jpg', 6),
(87, '87_6_Cherry First.jpg', 6),
(88, '88_6_Cherry First.jpg', 6),
(89, '1_5_Apple.png', 5),
(91, '91_5_Apple.png', 5),
(93, '93_5_Apple.png', 5),
(95, '1_4_Grapes.png', 4),
(96, '96_4_Grapes.jpg', 4),
(97, '97_4_Grapes.jpg', 4),
(98, '98_4_Grapes.png', 4),
(99, '99_4_Grapes.jpg', 4),
(100, '100_4_Grapes.jpg', 4),
(103, '1_3_Ong gia ba tri.png', 3),
(104, '104_3_Ong gia ba tri.jpg', 3),
(105, '105_3_Ong gia ba tri.jpg', 3),
(106, '106_3_Ong gia ba tri.png', 3),
(107, '107_3_Ong gia ba tri.jpg', 3),
(108, '108_3_Ong gia ba tri.jpg', 3),
(111, '111_2_Nep Huong.jpg', 2),
(112, '112_2_Nep Huong.jpg', 2),
(113, '113_2_Nep Huong.jpg', 2),
(114, '114_2_Nep Huong.jpg', 2),
(115, '115_2_Nep Huong.jpg', 2),
(116, '116_2_Nep Huong.jpg', 2),
(118, '118_11_Chivas 38.jpg', 11),
(119, '119_11_Chivas 38.jpg', 11),
(120, '120_11_Chivas 38.jpg', 11),
(121, '121_11_Chivas 38.jpg', 11),
(122, '122_11_Chivas 38.jpg', 11),
(123, '123_11_Chivas 38.jpg', 11),
(125, '125_12_Chivas 18 blue.jpg', 12),
(126, '126_12_Chivas 18 blue.jpg', 12),
(127, '127_12_Chivas 18 blue.jpg', 12),
(128, '128_12_Chivas 18 blue.jpg', 12),
(129, '129_12_Chivas 18 blue.jpg', 12),
(130, '1_10_Chivas regal.jpg', 10),
(131, '131_10_Chivas regal.jpg', 10),
(132, '132_10_Chivas regal.jpg', 10),
(133, '133_10_Chivas regal.jpg', 10),
(134, '134_10_Chivas regal.jpg', 10),
(135, '135_10_Chivas regal.jpg', 10),
(137, '137_15_Whisky Nikka.jpg', 15),
(138, '138_15_Whisky Nikka.jpg', 15),
(139, '139_15_Whisky Nikka.jpg', 15),
(140, '140_15_Whisky Nikka.jpg', 15),
(141, '141_15_Whisky Nikka.jpg', 15),
(142, '142_15_Whisky Nikka.jpg', 15),
(143, '59_7_Vorka 1.jpg', 7),
(144, '144_7_Vorka 1.jpg', 7),
(145, '145_7_Vorka 1.jpg', 7),
(146, '71_9_Vorka 3.jpg', 9),
(147, '147_9_Vorka 3.jpg', 9),
(148, '148_9_Vorka 3.jpg', 9),
(149, '65_8_Vorka 2.jpg', 8),
(150, '150_8_Vorka 2.jpg', 8),
(151, '151_8_Vorka 2.jpg', 8),
(152, '94_5_Apple.png', 5),
(153, '153_5_Apple.png', 5),
(154, '154_5_Apple.png', 5),
(155, '130_12_Chivas 18 blue.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NewsId` smallint(6) NOT NULL,
  `NewsNames` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `NewsContent` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `EmployeeCode` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsId`, `NewsNames`, `Title`, `NewsContent`, `EmployeeCode`) VALUES
(1, 'Tin hằng ngày', 'Rượu vàng ngày xuân', 'Rượu là một thứ thức uống', 'ntctuyen');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `OrderId` int(11) NOT NULL,
  `OrderCreateDate` date NOT NULL,
  `OrderDeliverDate` date DEFAULT NULL,
  `OrderDeliverPlace` varchar(130) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderStatus` int(11) NOT NULL,
  `Username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `PaymentMethodId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `OrderCreateDate`, `OrderDeliverDate`, `OrderDeliverPlace`, `OrderStatus`, `Username`, `PaymentMethodId`) VALUES
(6, '2018-03-22', '2018-12-21', 'Tiên Thủy Châu Thành Bến tre', 1, 'dangtuanhuy', 1),
(7, '2018-03-22', '2018-01-01', 'Bến Tre', 0, 'dangtuanhuyhachi', 2),
(8, '2018-04-02', '2018-03-31', 'Cần Thơ', 0, 'ngthuc', 3),
(9, '2018-04-02', '2018-03-31', 'Ninh Kiều', 0, 'ngthuc', 3),
(10, '2018-04-02', '2018-04-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3),
(11, '2018-04-02', '2018-04-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3),
(12, '2018-04-02', '2018-04-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3),
(13, '2018-04-02', '2018-04-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3),
(14, '2018-04-02', '2018-04-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3),
(15, '2018-04-02', '2018-03-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3),
(16, '2018-04-02', '2018-02-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3),
(17, '2018-04-02', '2018-03-01', 'Ninh Kiều, Cần Thơ', 0, 'ngthuc', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderwinedetails`
--

CREATE TABLE IF NOT EXISTS `orderwinedetails` (
  `WineOrderId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `WineOrderQuantity` int(11) NOT NULL,
  `WineSoldPrice` decimal(12,2) unsigned NOT NULL,
  `WineOriginalPrice` decimal(12,2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderwinedetails`
--

INSERT INTO `orderwinedetails` (`WineOrderId`, `OrderId`, `WineOrderQuantity`, `WineSoldPrice`, `WineOriginalPrice`) VALUES
(1, 9, 8, '40.00', '24.00'),
(1, 14, 6, '30.00', '18.00'),
(1, 17, 3, '15.00', '9.00'),
(2, 16, 16, '256.00', '192.00'),
(3, 15, 8, '40.00', '16.00'),
(4, 6, 1, '5.00', '2.00'),
(4, 13, 5, '25.00', '10.00'),
(5, 6, 1, '5.00', '2.00'),
(5, 7, 10, '50.00', '20.00'),
(7, 6, 1, '6.00', '2.00'),
(7, 12, 3, '18.00', '6.00'),
(9, 8, 4, '128.00', '12.00'),
(9, 10, 2, '64.00', '6.00'),
(9, 11, 3, '96.00', '9.00');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE IF NOT EXISTS `paymentmethod` (
  `PaymentMethodId` int(11) NOT NULL,
  `PaymentMethodName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PaymentMethodDetails` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`PaymentMethodId`, `PaymentMethodName`, `PaymentMethodDetails`) VALUES
(1, 'Master Card', 'Thanh toán bằng thẻ quốc tế network'),
(2, 'Bitcoin', 'Phải có thẻ Quốc tế để thanh toán'),
(3, 'Trực Tiếp ', 'Trực tiếp khi nhận hàng');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `PromotionId` int(11) NOT NULL,
  `PromotionName` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `PromotionDiscount` int(11) NOT NULL,
  `PromotionContent` varchar(145) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PromotionActive` date DEFAULT NULL,
  `PromotionClose` date DEFAULT NULL,
  `PromotionOpen` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`PromotionId`, `PromotionName`, `PromotionDiscount`, `PromotionContent`, `PromotionActive`, `PromotionClose`, `PromotionOpen`) VALUES
(1, 'U23 Việt Nam', 20, '<p>Khi u23 chiến thắng sẽ giảm gi&aacute;</p>', '2018-01-27', '2018-01-31', 0),
(2, 'Quốc Tế Phụ Nữ', 45, 'Tặng quà khi người mua là nữ', '2018-02-15', '2018-03-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_wine`
--

CREATE TABLE IF NOT EXISTS `promotion_wine` (
  `WineId` int(11) NOT NULL,
  `PromotionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion_wine`
--

INSERT INTO `promotion_wine` (`WineId`, `PromotionId`) VALUES
(1, 1),
(2, 1),
(4, 1),
(6, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `PublisherId` int(11) NOT NULL,
  `PublisherName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `PublisherDescription` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PublisherId`, `PublisherName`, `PublisherDescription`) VALUES
(1, 'Vietnam', 'Vietnam'),
(2, 'France', 'France');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `RoleId` smallint(6) NOT NULL,
  `RoleName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RoleDetails` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RoleActive` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `RoleName`, `RoleDetails`, `RoleActive`) VALUES
(1, 'Người dùng', 'Người dùng được phép mua hàng', 1),
(2, 'Nhân viên', 'Nhân viên được phép vào hệ thống quản quản lý rượu', 1),
(3, 'Admin', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `SubjectId` int(11) NOT NULL,
  `SubjectName` varchar(145) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectId`, `SubjectName`) VALUES
(1, 'Chương trình khuyến mãi ngày tết'),
(2, 'Việc giao hàng của Windsor'),
(3, 'Giao diện Web'),
(4, 'Phụ cấp ngày tết'),
(5, 'Giao Thừa Giao rượu');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `TimeId` int(11) NOT NULL,
  `ApplicationTime` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`TimeId`, `ApplicationTime`) VALUES
(1, '2018-01-23'),
(3, '2018-01-11'),
(5, '2018-02-15'),
(6, '2018-03-02'),
(7, '2018-01-12'),
(8, '2018-03-09'),
(9, '2018-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `time_wine`
--

CREATE TABLE IF NOT EXISTS `time_wine` (
  `WineId` int(11) NOT NULL,
  `TimeId` int(11) NOT NULL,
  `PurchasePrice` decimal(12,0) unsigned DEFAULT NULL,
  `SellingPrice` decimal(12,0) DEFAULT NULL,
  `Note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time_wine`
--

INSERT INTO `time_wine` (`WineId`, `TimeId`, `PurchasePrice`, `SellingPrice`, `Note`) VALUES
(1, 1, '3', '5', 'Mua bán '),
(2, 1, '12', '16', 'f'),
(3, 3, '2', '5', 'Khách hàng có thể'),
(4, 1, '2', '5', 'Đã có chiết khấu'),
(5, 7, '2', '5', 'Đã có chiết khấu'),
(6, 8, '3', '6', 'Giá bán đã bao gồm giá trị gia tăng'),
(7, 1, '2', '6', 'Giá bán đã bao gồm giá trị gia tăng'),
(8, 8, '404', '455', 'Đã bao gồm chiết khấu và lỗ vốn'),
(9, 6, '3', '32', 'Vì đây là sản phẩm tồn kha giá rẻ'),
(11, 9, '353', '455', 'Đã bao gồm chiết khấu và lỗ vốn'),
(12, 5, '73', '99', 'Khách hàng có thể mua trả góp'),
(13, 7, '73', '243', 'Giá bán đã bao gồm giá trị gia tăng'),
(14, 3, '2', '99', 'Giá bán đã bao gồm giá trị gia tăng'),
(15, 6, '3', '6', 'Vì đây là sản phẩm tồn kha giá rẻ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `FullName` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Sex` int(11) NOT NULL,
  `Address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `IC` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Role` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `FullName`, `Sex`, `Address`, `Phone`, `Email`, `DateOfBirth`, `IC`, `Status`, `Role`) VALUES
('abc', '900150983cd24fb0d6963f7d28e17f72', 'abc', 1, '', 963505927, 'ntctuyen.ctu@gmail.com', '2018-01-01', NULL, 1, 1),
('abcd', 'e2fc714c4727ee9395f324cd2e7f331f', 'abcd', 1, '', 963505927, 'ntctuyen.ctu@gmail.com', '2018-01-01', NULL, 1, 1),
('dangtuanhuy', '61fcd36c8292bdf65aab93287009f0f0', 'huy', 1, 'CT', 0, 'huyb1505883@student.ctu.edu.vn', '2018-02-03', '25345325235435', 1, 1),
('dangtuanhuy1', '202cb962ac59075b964b07152d234b70', 'dangtuanhuy1', 0, '', 963505927, 'testct25005@gmail.com', '2018-01-01', NULL, 1, 1),
('dangtuanhuy2', '202cb962ac59075b964b07152d234b70', 'Đặng Tuấn Huy', 0, '', 963505927, 'ntctuyen.ctu@gmail.com', '2018-01-27', NULL, 1, 1),
('dangtuanhuy3', '202cb962ac59075b964b07152d234b70', 'Đặng Tuấn Huy', 0, '', 963505927, 'ntctuyen.ctu@gmail.com', '2018-01-27', NULL, 1, 1),
('dangtuanhuyhachi', '41fb20b10e6c06837e8eb62cb2128a5d', 'Đặng Tuấn Huy', 0, '', 962505927, 'huyb1505883@student.ctu.edu.vn', '1997-01-02', NULL, 1, 1),
('ngthuc', '21232f297a57a5a743894a0e4a801fc3', 'Nguyên Thức', 1, 'Ninh Kiều, Cần Thơ', 907355924, 'me@ngthuc.com', '1996-01-01', '096969009247', 1, 1),
('nguyennhuy', 'fcea920f7412b5da7be0cf42b8c93759', 'Nguyễn Như Ý', 0, 'CTU', 963505927, 'nny@ctu.edu.vn', '2018-01-20', '321464578569', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE IF NOT EXISTS `wine` (
  `WineId` int(11) NOT NULL,
  `WineName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `WineStrength` int(40) NOT NULL,
  `WineShortDetails` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `WineDetails` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `WineUpdateDate` date NOT NULL,
  `WineQuantity` int(11) DEFAULT NULL,
  `WineSold` int(10) NOT NULL DEFAULT '0',
  `CategoryId` int(11) DEFAULT NULL,
  `PublisherId` int(11) DEFAULT NULL,
  `CountryId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`WineId`, `WineName`, `WineStrength`, `WineShortDetails`, `WineDetails`, `WineUpdateDate`, `WineQuantity`, `WineSold`, `CategoryId`, `PublisherId`, `CountryId`) VALUES
(1, 'Rượu Phú Lể', 14, 'Rất nhiều loại rượu khác nhau', 'Rất nhiều loại rượu khác nhau', '2018-01-26', 26, 24, 4, 1, 2),
(2, 'Nếp Hương', 15, 'Nồng độ cồn khá cao', 'Nồng độ cồ khá cao', '2018-02-22', 10, 108, 4, 1, 17),
(3, 'Ông già ba tri', 12, '34', 'Rất Ngon', '2018-03-09', 37, 8, 4, 1, 9),
(4, 'Grapes', 45, 'Là một loại rượu Nho', 'Là một loại rượu Nho', '2018-03-10', 39, 6, 5, 1, 3),
(5, 'Apple', 12, 'Rượu Táo', 'Rượu Táo', '2018-03-07', 34, 11, 5, 1, 14),
(6, 'Cherry First', 45, 'Chiết xuất từ cherry nguyên chất', 'Chiết xuất từ cherry nguyên chất', '2018-03-30', 100, 0, 5, 1, 16),
(7, 'Vorka 1', 50, 'Rượu Ngâm', 'Rượu Ngâm', '2018-03-04', 4, 9, 1, 1, 2),
(8, 'Vorka 2', 50, 'Rượu Ngâm', 'Rượu Ngâm', '2018-03-07', 9, 5, 1, 1, 17),
(9, 'Vorka 3', 45, 'Rượu Ngâm', 'Vodka is the most-consumed spirit in the world. In 2012, according to The Economist, global vodka consumption reached 4.4 billion liters. The definitive neutral spirit, vodka is an essential ingredient to be enjoyed in any number of mixed drinks, and sippable straight in upscale, premium versions.', '2018-03-02', 653, 13, 1, 1, 13),
(10, 'Chivas regal', 45, 'Là một loại rượu Chivas khá ngon', 'Là một loại rượu Chivas khá ngon', '2018-03-11', 45, 0, 3, 1, 11),
(11, 'Chivas 38', 55, 'Rượu Ngâm', 'Rượu Ngâm', '2018-04-20', 8, 1, 3, 1, 11),
(12, 'Chivas 18 blue', 45, 'Rượu Ngâm', 'Rượu Pha Chế', '2018-07-15', 666, 0, 3, 1, 7),
(13, 'Whisky hibiki', 12, 'Một trong các loại Whisky nổi tiếng', 'Một trong các loại Whisky nổi tiếng', '2018-04-15', 70, 0, 2, 2, 8),
(14, 'Whisky Ballantines', 50, 'Rượu Ngâm', 'Ballantines Finest là dòng rượu Whisky pha trộn ( Blended Scotch Whisky ) của Scotland , với hương vị phong phú , tinh tế và tao nhã , đáp ứng nhu cầu của những ai có phong cách sống hiện đại và trẻ trung ', '2018-05-04', 99, 1, 2, 2, 17),
(15, 'Whisky Nikka', 45, 'Rượu Ngâm', 'Rượu Nikka Samurai không chỉ đơn thuần là dòng rượu whisky có hương vị thơm ngon mà nó còn tượng trưng cho con người, văn hóa Nhật Bản.', '2018-07-07', 66, 0, 2, 2, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`AboutId`),
  ADD KEY `EmployeeCode` (`EmployeeCode`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillId`);

--
-- Indexes for table `bill_order`
--
ALTER TABLE `bill_order`
  ADD PRIMARY KEY (`BillId`,`OrderId`),
  ADD KEY `OrderId` (`OrderId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactId`),
  ADD KEY `Subject` (`Subject`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeCode`),
  ADD KEY `Role` (`RoleId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackId`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `imageemployee`
--
ALTER TABLE `imageemployee`
  ADD PRIMARY KEY (`ImgEmployeeId`),
  ADD KEY `EmployeeCode` (`EmployeeCode`);

--
-- Indexes for table `imgabout`
--
ALTER TABLE `imgabout`
  ADD PRIMARY KEY (`ImgAboutId`),
  ADD KEY `AboutId` (`AboutId`);

--
-- Indexes for table `imgnews`
--
ALTER TABLE `imgnews`
  ADD PRIMARY KEY (`ImgNewsId`),
  ADD KEY `NewsId` (`NewsId`);

--
-- Indexes for table `imgwine`
--
ALTER TABLE `imgwine`
  ADD PRIMARY KEY (`ImgWineId`),
  ADD KEY `WineId` (`WineId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsId`),
  ADD KEY `EmployeeCode` (`EmployeeCode`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `Username` (`Username`),
  ADD KEY `PaymentMethodId` (`PaymentMethodId`);

--
-- Indexes for table `orderwinedetails`
--
ALTER TABLE `orderwinedetails`
  ADD PRIMARY KEY (`WineOrderId`,`OrderId`),
  ADD KEY `OrderId` (`OrderId`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`PaymentMethodId`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`PromotionId`);

--
-- Indexes for table `promotion_wine`
--
ALTER TABLE `promotion_wine`
  ADD PRIMARY KEY (`WineId`,`PromotionId`),
  ADD KEY `PromotionId` (`PromotionId`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PublisherId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectId`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`TimeId`);

--
-- Indexes for table `time_wine`
--
ALTER TABLE `time_wine`
  ADD PRIMARY KEY (`WineId`,`TimeId`),
  ADD KEY `TimeId` (`TimeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Role` (`Role`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`WineId`),
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `PublisherId` (`PublisherId`),
  ADD KEY `CountryId` (`CountryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `AboutId` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryId` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imageemployee`
--
ALTER TABLE `imageemployee`
  MODIFY `ImgEmployeeId` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imgabout`
--
ALTER TABLE `imgabout`
  MODIFY `ImgAboutId` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `imgnews`
--
ALTER TABLE `imgnews`
  MODIFY `ImgNewsId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `imgwine`
--
ALTER TABLE `imgwine`
  MODIFY `ImgWineId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsId` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `PaymentMethodId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `PromotionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `PublisherId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `TimeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `WineId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_3` FOREIGN KEY (`EmployeeCode`) REFERENCES `employee` (`EmployeeCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill_order`
--
ALTER TABLE `bill_order`
  ADD CONSTRAINT `bill_order_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `order` (`OrderId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_order_ibfk_2` FOREIGN KEY (`BillId`) REFERENCES `bill` (`BillId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`Subject`) REFERENCES `subject` (`SubjectId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`RoleId`) REFERENCES `role` (`RoleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imageemployee`
--
ALTER TABLE `imageemployee`
  ADD CONSTRAINT `imageemployee_ibfk_3` FOREIGN KEY (`EmployeeCode`) REFERENCES `employee` (`EmployeeCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgabout`
--
ALTER TABLE `imgabout`
  ADD CONSTRAINT `imgabout_ibfk_1` FOREIGN KEY (`AboutId`) REFERENCES `about` (`AboutId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgnews`
--
ALTER TABLE `imgnews`
  ADD CONSTRAINT `imgnews_ibfk_1` FOREIGN KEY (`NewsId`) REFERENCES `news` (`NewsId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgwine`
--
ALTER TABLE `imgwine`
  ADD CONSTRAINT `imgwine_ibfk_2` FOREIGN KEY (`WineId`) REFERENCES `wine` (`WineId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`EmployeeCode`) REFERENCES `employee` (`EmployeeCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`PaymentMethodId`) REFERENCES `paymentmethod` (`PaymentMethodId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderwinedetails`
--
ALTER TABLE `orderwinedetails`
  ADD CONSTRAINT `orderwinedetails_ibfk_3` FOREIGN KEY (`OrderId`) REFERENCES `order` (`OrderId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderwinedetails_ibfk_4` FOREIGN KEY (`WineOrderId`) REFERENCES `wine` (`WineId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotion_wine`
--
ALTER TABLE `promotion_wine`
  ADD CONSTRAINT `promotion_wine_ibfk_1` FOREIGN KEY (`WineId`) REFERENCES `wine` (`WineId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promotion_wine_ibfk_2` FOREIGN KEY (`PromotionId`) REFERENCES `promotion` (`PromotionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_wine`
--
ALTER TABLE `time_wine`
  ADD CONSTRAINT `time_wine_ibfk_1` FOREIGN KEY (`WineId`) REFERENCES `wine` (`WineId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_wine_ibfk_2` FOREIGN KEY (`TimeId`) REFERENCES `time` (`TimeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Role`) REFERENCES `role` (`RoleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wine`
--
ALTER TABLE `wine`
  ADD CONSTRAINT `wine_ibfk_5` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wine_ibfk_6` FOREIGN KEY (`PublisherId`) REFERENCES `publisher` (`PublisherId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wine_ibfk_7` FOREIGN KEY (`CountryId`) REFERENCES `country` (`CountryId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
