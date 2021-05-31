-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 06:09 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable1`
--

CREATE TABLE `admintable1` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable1`
--

INSERT INTO `admintable1` (`AdminID`, `AdminName`, `Email`, `Password`, `Role`) VALUES
(4, 'b', 'minkhantsoe1999@gmail.com', 'b', 'b');

-- --------------------------------------------------------

--
-- Stand-in structure for view `calculateqty`
--
CREATE TABLE `calculateqty` (
`FoodID` int(11)
,`FoodName` varchar(30)
,`OrderID` varchar(30)
,`Name` varchar(30)
,`Price` int(11)
,`FoodImage` varchar(200)
,`sumqty` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `TownShip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `UserName`, `Email`, `Password`, `PhoneNumber`, `Address`, `TownShip`) VALUES
(4, 'a', 'a@gmail.com', '1234', '254487', 'd', 'd'),
(5, 'c', 'HakHak2199@gmail.com', 'c', '0125647', 'b', 'b');

-- --------------------------------------------------------

--
-- Stand-in structure for view `data`
--
CREATE TABLE `data` (
`FoodName` varchar(30)
,`Name` varchar(30)
,`LogoImages` varchar(200)
,`RestaurantID` int(11)
,`FoodImage` varchar(200)
,`Price` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `FoodID` int(11) NOT NULL,
  `FoodName` varchar(30) NOT NULL,
  `FoodTypeID` int(11) NOT NULL,
  `RestaurantID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` text NOT NULL,
  `FoodImage` varchar(200) NOT NULL,
  `FullImage` varchar(200) NOT NULL,
  `ManufactureDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`FoodID`, `FoodName`, `FoodTypeID`, `RestaurantID`, `Price`, `Description`, `FoodImage`, `FullImage`, `ManufactureDate`) VALUES
(4, 'Kyay O', 4, 2, 3700, 'aaa', 'FoodImages/_Super Deluxe Pizza.jpg', 'FullImages/_SuperDeluxePizza.jpg', '2019-03-08'),
(6, 'Black Forest Ice Cream Sundaes', 2, 7, 4000, 'A rich ice cream simply loaded with fresh Bing cherries, Stracciatella (Italian pronunciation strattjaÃ‹Ë†tella), topped with some more chocolate and finished with light as air whipped cream and a fresh cherry. ', 'FoodImages/_742180d74310b20118e3f20b67ac31a7.jpg', 'FullImages/_742180d74310b20118e3f20b67ac31a7.jpg', '2019-03-05'),
(7, 'BBQ Chicken Deluxe', 3, 8, 10000, 'BBQ chicken, mozzarella cheese, BBQ sauce', 'FoodImages/_BBQChickenDeluxe.jpg', 'FullImages/_BBQChickenDeluxe.jpg', '2019-03-07'),
(9, 'c', 2, 6, 2222, '222', 'FoodImages/_hot-thai-tea-milk-56065068.jpg', 'FullImages/_hot-thai-tea-milk-56065068.jpg', '2019-03-13'),
(10, 'd', 2, 6, 2222, '222', 'FoodImages/_hot-thai-tea-milk-56065068.jpg', 'FullImages/_hot-thai-tea-milk-56065068.jpg', '2019-03-13'),
(11, '1 Pc Chicken', 6, 11, 1500, '1 pc original recipe chicken or hot n spicy', 'FoodImages/_chicken.jpg', 'FullImages/_chicken.jpg', '2019-07-26'),
(13, 'Fries', 8, 11, 900, '', 'FoodImages/_Fries.png', 'FullImages/_Fries.png', '2019-07-26'),
(14, 'Rice Box', 9, 11, 2500, 'Rice, popcorn chicken, potato curry', 'FoodImages/_RiceBox.jpg', 'FullImages/_RiceBox.jpg', '2019-07-26'),
(15, 'Popcorn Chicken', 10, 11, 1700, '1 pack of popcorn chicken', 'FoodImages/_Popcorn Chicken.jpg', 'FullImages/_Popcorn Chicken.jpg', '2019-07-26'),
(16, '1 Pc Chicken Hot n Spicy', 7, 11, 1700, '1 pc original recipe chicken or hot n spicy', 'FoodImages/_chicken Hot n Spicy.jpg', 'FullImages/_chicken Hot n Spicy.jpg', '2019-07-26'),
(17, 'Cola', 11, 11, 600, '', 'FoodImages/_kfc-Cola.jpg', 'FullImages/_kfc-Cola.jpg', '2019-07-26'),
(19, 'Black Sugar Pearl Milk Tea', 11, 12, 2000, '', 'FoodImages/_BlackSugarPearlMikeTea.png', 'FullImages/_BlackSugarPearlMikeTea.png', '2019-07-28'),
(20, 'Royal Ceylon MilkTea', 11, 12, 2000, '', 'FoodImages/_RoyalCeylonMilkTea.png', 'FullImages/_RoyalCeylonMilkTea.png', '2019-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `foodtype1`
--

CREATE TABLE `foodtype1` (
  `FoodTypeID` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodtype1`
--

INSERT INTO `foodtype1` (`FoodTypeID`, `Type`) VALUES
(1, 'Hot Drink'),
(2, 'Dessert'),
(3, 'Deluxe Pizzas'),
(4, 'Kyay O'),
(6, 'Original'),
(7, 'Hot n Spicy'),
(8, 'Fries'),
(9, 'Rice, popcorn chicken, potato '),
(10, '1 pack of popcorn chicken'),
(11, 'Cold Drink');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `OrderID` varchar(30) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `AddressStatus` varchar(100) NOT NULL,
  `NewAddress` varchar(100) NOT NULL,
  `NewPhoneNumber` varchar(30) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `TotalQty` int(11) NOT NULL,
  `OrderStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`OrderID`, `CustomerID`, `StaffID`, `OrderDate`, `AddressStatus`, `NewAddress`, `NewPhoneNumber`, `TotalAmount`, `TotalQty`, `OrderStatus`) VALUES
('Order_001', 4, 1, '2019-07-22', 'a', '', '', 10000, 1, 'Delivered'),
('Order_002', 4, 0, '2019-07-23', '', 'aaa', '222', 10000, 1, 'Purchase'),
('Order_003', 4, 1, '2019-07-22', 'a', '', '', 4000, 1, 'Delivered'),
('Order_004', 4, 0, '2019-07-22', 'a', '', '', 8000, 2, 'Pending'),
('Order_005', 4, 0, '2019-07-24', 'a', '', '', 4444, 2, 'Pending'),
('Order_006', 5, 1, '2019-07-24', 'b', '', '', 20000, 2, 'Delivered'),
('Order_007', 4, 1, '2019-07-24', 'a', '', '', 10000, 1, 'Delivered'),
('Order_008', 5, 1, '2019-08-07', 'b', '', '', 10000, 1, 'Delivered'),
('Order_009', 5, 1, '2019-08-07', '', 'aaa', '223344', 4000, 2, 'Delivered'),
('Order_010', 4, 0, '2019-08-08', 'd', '', '', 20000, 2, 'Purchase'),
('Order_011', 5, 0, '2019-08-08', 'b', '', '', 10000, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE `order_food` (
  `OrderID` varchar(30) NOT NULL,
  `FoodID` int(11) NOT NULL,
  `Quantity1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`OrderID`, `FoodID`, `Quantity1`) VALUES
('Order_001', 7, 1),
('Order_002', 7, 1),
('Order_003', 6, 1),
('Order_004', 6, 2),
('Order_005', 8, 1),
('Order_005', 9, 1),
('Order_006', 7, 2),
('Order_007', 7, 1),
('Order_008', 7, 1),
('Order_009', 20, 1),
('Order_009', 19, 1),
('Order_010', 7, 2),
('Order_011', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` varchar(30) NOT NULL,
  `PaymentMethod` varchar(30) NOT NULL,
  `CreditCardNumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `OrderID`, `PaymentMethod`, `CreditCardNumber`) VALUES
(1, 'Order_001', 'Cash', ''),
(2, 'Order_002', 'Cash', ''),
(3, 'Order_003', 'Cash', ''),
(4, 'Order_004', 'Cash', ''),
(5, 'Order_005', 'Cash', ''),
(6, 'Order_006', 'Cash', ''),
(7, 'Order_007', 'Cash', ''),
(8, 'Order_008', 'Cash', ''),
(9, 'Order_009', 'Credit', '225546721'),
(10, 'Order_010', 'Cash', ''),
(11, 'Order_011', 'Cash', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` varchar(100) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `PurchaseTime` varchar(30) NOT NULL,
  `TotalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`PurchaseID`, `StaffID`, `PurchaseDate`, `PurchaseTime`, `TotalAmount`) VALUES
('Pu_001', 0, '2019-07-24', 'Choose Time', 10000),
('Pu_002', 1, '2019-07-24', '10:00 am', 10000),
('Pu_003', 0, '0000-00-00', 'Choose Time', 12000),
('Pu_004', 1, '2019-08-08', '10:45 am', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `PurchaseID` varchar(100) NOT NULL,
  `FoodID` int(11) NOT NULL,
  `PurchaseQty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`PurchaseID`, `FoodID`, `PurchaseQty`) VALUES
('Pu_001', 7, 1),
('Pu_002', 7, 1),
('Pu_003', 6, 3),
('Pu_004', 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant1`
--

CREATE TABLE `restaurant1` (
  `RestaurantID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `TownshipID` int(11) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `LogoImages` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant1`
--

INSERT INTO `restaurant1` (`RestaurantID`, `Name`, `Address`, `TownshipID`, `PhoneNumber`, `LogoImages`) VALUES
(6, '365 Cafe', 'Near Park Royal Hotel, Thamada Hotel, 5, Alan Phya Road, Yangon, Myanmar.', 1, '01 243047 ', 'LogoImages/_14519928_307737146256721_3935704374729696826_n.jpg'),
(7, 'BlackCanyon', 'Sayar San Road', 3, '09554678', 'LogoImages/_f398b9b23fa444a2ad68570c0146303e.jpg'),
(8, 'Pizza Company', 'Myay Nee Gone', 1, '0944556677', 'LogoImages/_1200px-The_Pizza_Company_Logo.svg.png'),
(11, 'KFC', 'No.8, Hledan Street, Yangon', 4, '09 969 814161', 'LogoImages/_KFC_logo.svg.png'),
(12, 'Tea Time', 'No.713, 18th Street, Mahar Bandula, Yangon, Latha', 5, '09 970 376826', 'LogoImages/_TeaTime.png');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(30) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `NRC` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `Age`, `Gender`, `Address`, `PhoneNumber`, `NRC`, `Email`, `Position`) VALUES
(1, 'Ag Ag', 25, 'Male', 'blah', '094445566', 'kkkk', 'AgAg@gmail.com', 'kkksksk');

-- --------------------------------------------------------

--
-- Table structure for table `temporder`
--

CREATE TABLE `temporder` (
  `OrderID` varchar(11) NOT NULL,
  `FoodID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `township`
--

CREATE TABLE `township` (
  `TownshipID` int(11) NOT NULL,
  `TownshipName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `township`
--

INSERT INTO `township` (`TownshipID`, `TownshipName`) VALUES
(1, 'San Chaung'),
(3, 'Sayar San'),
(4, 'Hledan'),
(5, 'Latha');

-- --------------------------------------------------------

--
-- Structure for view `calculateqty`
--
DROP TABLE IF EXISTS `calculateqty`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calculateqty`  AS  (select `f`.`FoodID` AS `FoodID`,`f`.`FoodName` AS `FoodName`,`o`.`OrderID` AS `OrderID`,`r`.`Name` AS `Name`,`f`.`Price` AS `Price`,`f`.`FoodImage` AS `FoodImage`,sum(`of`.`Quantity1`) AS `sumqty` from ((((`food` `f` join `order1` `o`) join `order_food` `of`) join `restaurant1` `r`) join `customer` `c`) where ((`f`.`FoodID` = `of`.`FoodID`) and (`o`.`OrderID` = `of`.`OrderID`) and (`r`.`RestaurantID` = `f`.`RestaurantID`) and (`o`.`CustomerID` = `c`.`CustomerID`) and (`o`.`OrderStatus` = 'Pending') and (`r`.`RestaurantID` = '7')) group by `f`.`FoodID`) ;

-- --------------------------------------------------------

--
-- Structure for view `data`
--
DROP TABLE IF EXISTS `data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data`  AS  (select distinct `f`.`FoodName` AS `FoodName`,`r`.`Name` AS `Name`,`r`.`LogoImages` AS `LogoImages`,`r`.`RestaurantID` AS `RestaurantID`,`f`.`FoodImage` AS `FoodImage`,`f`.`Price` AS `Price` from (((`order_food` `of` join `restaurant1` `r`) join `food` `f`) join `order1` `ord`) where ((`of`.`FoodID` = `f`.`FoodID`) and (`f`.`RestaurantID` = `r`.`RestaurantID`) and (`ord`.`OrderID` = `of`.`OrderID`) and (`r`.`RestaurantID` = '7'))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable1`
--
ALTER TABLE `admintable1`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`FoodID`);

--
-- Indexes for table `foodtype1`
--
ALTER TABLE `foodtype1`
  ADD PRIMARY KEY (`FoodTypeID`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `restaurant1`
--
ALTER TABLE `restaurant1`
  ADD PRIMARY KEY (`RestaurantID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `township`
--
ALTER TABLE `township`
  ADD PRIMARY KEY (`TownshipID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable1`
--
ALTER TABLE `admintable1`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `FoodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `foodtype1`
--
ALTER TABLE `foodtype1`
  MODIFY `FoodTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `restaurant1`
--
ALTER TABLE `restaurant1`
  MODIFY `RestaurantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `township`
--
ALTER TABLE `township`
  MODIFY `TownshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
