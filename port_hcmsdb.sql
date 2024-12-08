-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2024 at 04:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `port_hcmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category`, `status`) VALUES
(1, 'Internal Medicine', 'ACTIVE'),
(4, 'External Medicine', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `id` int NOT NULL,
  `user` varchar(50) NOT NULL,
  `logdate` datetime NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`id`, `user`, `logdate`, `action`) VALUES
(1, 'Administrator', '2024-09-09 02:06:09', 'Added patient with firstname: Juan, lastname: Cruz, middlename: Dela , phone number: 09123456879, add date: 2024-09-09, sino: Sample'),
(2, 'Administrator', '2024-09-09 02:22:07', 'Updated patient with ID: 1 to firstname: Juans, lastname: Cruzs, middlename: Delas, phone number: 09123456879, add date: 2024-09-09, sino: Samples'),
(10, '1', '2024-09-14 00:38:45', 'Added Supplier with Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Sample'),
(11, '1', '2024-09-14 00:38:52', 'Edited Supplier with ID: 1, Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Samples'),
(12, '1', '2024-09-14 00:40:27', 'Deleted Supplier with Name: Juan Dela Cruz'),
(13, '1', '2024-09-14 00:43:10', 'Added Supplier with Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Samples'),
(14, '1', '2024-09-14 00:43:17', 'Edited Supplier with ID: 2, Name: Juan Dela Cruz, Contact Number: 09123456789, Products Ordered: Sample'),
(15, '1', '2024-09-14 00:43:21', 'Deleted Supplier with Name: Juan Dela Cruz'),
(16, '1', '2024-09-14 01:04:46', 'Added Supplier with Name: Juan Dela Cruz, Contact Number: 09123546789, Products Ordered: Medicines'),
(17, '1', '2024-09-14 01:14:20', 'Added Inventory Item with Product Name: Bioflu'),
(18, '1', '2024-09-14 01:15:46', 'Deleted Inventory Item with Product Name: Bioflu'),
(19, '1', '2024-09-14 01:18:34', 'Added Inventory Item with Product Name: Bioflu'),
(20, '1', '2024-09-14 01:39:48', 'Edited Inventory Item with ID: 2, Product Name: Bioflus, Price: 20.00, Supplier ID: 3, Stock Quantity: 600'),
(21, '1', '2024-09-14 01:40:09', 'Edited Inventory Item with ID: 2, Product Name: Bioflu, Price: 10.00, Supplier ID: 3, Stock Quantity: 500'),
(22, 'Administrator', '2024-09-14 02:52:09', 'Added Product named Bioflue'),
(23, 'Administrator', '2024-09-14 02:53:25', 'Added Product named Bioflue'),
(24, 'Administrator', '2024-09-14 02:57:06', 'Added Product named Bioflu'),
(25, 'Administrator', '2024-09-14 02:58:09', 'Added Product named Bioflu'),
(26, 'Administrator', '2024-09-14 03:24:06', 'Added Product named Bioflu'),
(27, 'Administrator', '2024-11-13 11:34:23', 'Updated patient with ID: 1 to firstname: Juans, lastname: Cruzs, middlename: Delas, phone number: 09123456879, add date: 2024-09-09, sino: Samplessss'),
(28, 'Administrator', '2024-11-13 11:34:33', 'Updated patient with ID: 1 to firstname: Juans, lastname: Cruzs, middlename: Delas, phone number: 09123456879, add date: 2024-09-09, sino: Samples'),
(29, 'Administrator', '2024-11-13 11:35:03', 'Added patient with firstname: Aila, lastname: Espela, middlename: Gimena, phone number: 09123458765, add date: 2024-11-13, sino: Sample'),
(30, '1', '2024-11-13 11:37:45', 'Added Supplier with Name: saksdj, Contact Number: hjashd, Products Ordered: aashdj'),
(31, '1', '2024-11-13 11:37:53', 'Edited Supplier with ID: 4, Name: saksdj, Contact Number: hjashd, Products Ordered: aaaaaaaaaaaa'),
(32, '1', '2024-11-13 11:38:00', 'Deleted Supplier with Name: saksdj'),
(33, '1', '2024-12-02 11:12:24', 'Deleted Patient ID: 1'),
(34, '1', '2024-12-02 11:12:51', 'Deleted Patient ID: 2'),
(35, 'Administrator', '2024-12-02 11:13:15', 'Added patient with firstname: Sample, lastname: sample, middlename: sample, phone number: 0912345687, add date: 2024-12-02, sino: 10851546'),
(36, 'Administrator', '2024-12-02 11:13:47', 'Updated patient with ID: 3 to firstname: Sample, lastname: sample, middlename: sample, phone number: 0912345687, add date: 2024-12-02, sino: 10851546asdaasd'),
(37, '1', '2024-12-02 11:15:26', 'Added Supplier with Name: Maria Dela Torre, Contact Number: 09456878132, Products Ordered: Sample'),
(38, '1', '2024-12-02 11:15:31', 'Edited Supplier with ID: 5, Name: Maria Dela Torre, Contact Number: 09456878132, Products Ordered: Samplesjahsjkdhajkshdjas'),
(39, '1', '2024-12-02 11:15:36', 'Deleted Supplier with Name: Maria Dela Torre'),
(40, '1', '2024-12-02 11:30:25', 'Added Supplier with Name: Maria Dela Torre, Contact Number: 09456878132, Products Ordered: sample'),
(41, '1', '2024-12-02 11:30:47', 'Added Supplier with Name: Sample, Contact Number: 091546445123, Products Ordered: sample'),
(42, '1', '2024-12-02 11:36:59', 'Deleted Supplier ID: 3'),
(43, '1', '2024-12-02 11:37:25', 'Deleted Supplier ID: 6'),
(44, '1', '2024-12-02 11:37:35', 'Deleted Supplier ID: 7'),
(45, '1', '2024-12-02 11:37:48', 'Added Supplier with Name: Maria Dela Torre, Contact Number: 09456878132, Products Ordered: SAMPLE'),
(46, '1', '2024-12-02 11:37:54', 'Edited Supplier with ID: 8, Name: Maria Dela Torre, Contact Number: 09456878132, Products Ordered: SAMPLESSSSSSSSS'),
(47, '1', '2024-12-02 11:37:57', 'Deleted Supplier ID: 8'),
(48, '1', '2024-12-02 11:41:46', 'Added Supplier with Name: Juan Dela Cruz, Contact Number: 09456878132, Products Ordered: Internal Medicine'),
(49, 'Administrator', '2024-12-02 11:41:56', 'Added Product named Bioflu'),
(50, 'Administrator', '2024-12-02 11:42:41', 'Added Product named Bioflu'),
(51, 'Administrator', '2024-12-02 11:44:29', 'Updated Product named Bioflu'),
(52, 'Administrator', '2024-12-02 11:44:50', 'Updated Product named Bioflu'),
(53, '1', '2024-12-02 11:49:49', 'Deleted Product ID: 1'),
(54, 'Administrator', '2024-12-02 11:50:38', 'Added Product named Neozep'),
(55, 'Administrator', '2024-12-02 12:05:58', 'Updated Product named Neozep'),
(56, 'Administrator', '2024-12-02 12:08:15', 'Added Product named Neozep'),
(57, 'Administrator', '2024-12-02 12:09:08', 'Updated Product named Neozep'),
(58, 'Administrator', '2024-12-02 12:11:51', 'Added patient with firstname: ahsjkdhah, lastname: jhjahsdhjh, middlename: hjahsjdhj, phone number: hjhajshdjh, add date: 2024-12-02, sino: 10851546'),
(59, 'Administrator', '2024-12-02 12:12:38', 'Added patient with firstname: Juan, lastname: Cruz, middlename: Dela, phone number: 0912345687, add date: 2024-12-02, sino: 10851546'),
(60, '1', '2024-12-02 12:14:53', 'Deleted Patient ID: 3'),
(61, '1', '2024-12-02 12:14:56', 'Deleted Patient ID: 4'),
(62, '1', '2024-12-02 12:14:59', 'Deleted Patient ID: 5'),
(63, 'Administrator', '2024-12-02 12:17:56', 'Added patient with firstname: Sampl, lastname: sakkansfjkajsfh, middlename: jhasjdhajs, phone number: 0912345687, add date: 2024-12-02, sino: 10851546'),
(64, 'Administrator', '2024-12-02 12:18:14', 'Added patient with firstname: ahsjdhajshdj, lastname: jkahsjdhajh, middlename: jhajshdjahj, phone number: 0912345687, add date: 2024-12-02, sino: 10851546'),
(65, '1', '2024-12-02 12:18:52', 'Added Supplier with Name: Maria Dela Torre, Contact Number: 09456878132, Products Ordered: sample'),
(66, 'Administrator', '2024-12-02 12:21:20', 'Added Product named Neozep'),
(67, 'Administrator', '2024-12-02 12:22:00', 'Added Product named Biogesic'),
(68, '1', '2024-12-02 12:24:29', 'Deleted Patient ID: 6'),
(69, '1', '2024-12-02 12:24:32', 'Deleted Patient ID: 7'),
(70, 'Administrator', '2024-12-02 12:25:18', 'Added patient with firstname: sample, lastname: sample, middlename: sample, phone number: 0912345687, add date: 2024-12-03, sino: 10851546'),
(71, 'Administrator', '2024-12-02 12:25:41', 'Added patient with firstname: Sample, lastname: ashdjhasj, middlename: akjsdhjkash, phone number: 0912345687, add date: 2024-12-03, sino: 18348872'),
(72, 'Administrator', '2024-12-02 12:30:29', 'Updated patient with ID: 8 to firstname: sample, lastname: sample, middlename: sample, phone number: 0912345687, add date: 2024-12-03, sino: 10851546asdaasd'),
(73, '1', '2024-12-02 12:34:01', 'Edited Supplier with ID: 9, Name: Juan Dela Cruz, Contact Number: 09456878132, Products Ordered: Internal Mediciness'),
(74, '1', '2024-12-02 12:34:05', 'Edited Supplier with ID: 9, Name: Juan Dela Cruz, Contact Number: 09456878132, Products Ordered: Internal Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `transno` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `total` int DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cash` int DEFAULT NULL,
  `change` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `product_id`, `quantity`, `date_updated`, `user_id`, `transno`, `customer`, `total`, `date_created`, `cash`, `change`) VALUES
(3, 4, 1, '2024-12-02 04:49:08', 1, '12022024-0001', 'Pedro Manaloto', 300, '2024-12-02 04:49:08', 500, 200),
(4, 5, 1, '2024-12-02 04:49:13', 1, '12022024-0001', 'Pedro Manaloto', 300, '2024-12-02 04:49:13', 500, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `id` int NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `adddate` date DEFAULT NULL,
  `sino` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`id`, `firstname`, `lastname`, `middlename`, `phoneno`, `adddate`, `sino`) VALUES
(9, 'Sample', 'ashdjhasj', 'akjsdhjkash', '0912345687', '2024-12-03', '18348872');

-- --------------------------------------------------------

--
-- Table structure for table `tblprescription`
--

CREATE TABLE `tblprescription` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `prescription_date` date DEFAULT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int NOT NULL DEFAULT '1',
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'ACTIVE',
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_id` int NOT NULL,
  `supplier_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `price`, `qty`, `status`, `description`, `image`, `date_created`, `date_updated`, `cat_id`, `supplier_id`) VALUES
(4, 'Neozep', 100, 499, 'ACTIVE', 'These medicines are used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections.', '1733113280408_images.jpg', '2024-12-02 12:21:20', '2024-12-02 12:21:20', 1, NULL),
(5, 'Biogesic', 200, 499, 'ACTIVE', 'These medicines are used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu, and other minor respiratory tract infections.', '1733113320566_Biogesic.png', '2024-12-02 12:22:00', '2024-12-02 12:22:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

CREATE TABLE `tblsales` (
  `id` int NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `down_payment` decimal(10,2) DEFAULT '0.00',
  `total_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `status` enum('paid','partial') DEFAULT 'partial',
  `sale_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsms`
--

CREATE TABLE `tblsms` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `message` text,
  `sent_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `products_ordered` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`id`, `name`, `contact_number`, `products_ordered`) VALUES
(10, 'Maria Dela Torre', '09456878132', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `active` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'ACTIVE',
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `username`, `password`, `role`, `active`, `photo`) VALUES
(1, 'ADMINISTRATOR', 'admin@info.com', '12345678', 'ADMINISTRATOR', 'ACTIVE', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisithistory`
--

CREATE TABLE `tblvisithistory` (
  `id` int NOT NULL,
  `patient_id` int DEFAULT NULL,
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwsupplier`
-- (See below for the actual view)
--
CREATE TABLE `vwsupplier` (
);

-- --------------------------------------------------------

--
-- Structure for view `vwsupplier`
--
DROP TABLE IF EXISTS `vwsupplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rec12`@`%` SQL SECURITY DEFINER VIEW `vwsupplier`  AS SELECT `i`.`id` AS `id`, `i`.`product_name` AS `product_name`, `i`.`price` AS `price`, `i`.`stock_quantity` AS `stock_quantity`, `i`.`supplier_id` AS `supplier_id`, concat(`s`.`name`,' | ',`s`.`contact_number`) AS `supplier` FROM (`tblinventory` `i` join `tblsupplier` `s` on((`s`.`id` = `i`.`supplier_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprescription`
--
ALTER TABLE `tblprescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsales`
--
ALTER TABLE `tblsales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsms`
--
ALTER TABLE `tblsms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvisithistory`
--
ALTER TABLE `tblvisithistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblprescription`
--
ALTER TABLE `tblprescription`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsms`
--
ALTER TABLE `tblsms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvisithistory`
--
ALTER TABLE `tblvisithistory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblprescription`
--
ALTER TABLE `tblprescription`
  ADD CONSTRAINT `tblprescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tblpatient` (`id`);

--
-- Constraints for table `tblsms`
--
ALTER TABLE `tblsms`
  ADD CONSTRAINT `tblsms_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tblpatient` (`id`);

--
-- Constraints for table `tblvisithistory`
--
ALTER TABLE `tblvisithistory`
  ADD CONSTRAINT `tblvisithistory_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tblpatient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
