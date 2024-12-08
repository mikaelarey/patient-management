-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 07:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category`, `status`) VALUES
(1, 'Internal Medicine', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`id`, `product_name`, `price`, `supplier_id`, `stock_quantity`) VALUES
(2, 'Bioflu', 10.00, 3, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `logdate` datetime NOT NULL,
  `action` text NOT NULL,
  `old_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_value`)),
  `new_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`id`, `user`, `logdate`, `action`, `old_value`, `new_value`) VALUES
(1, 'Administrator', '2024-12-09 00:42:41', 'Added Teacher with name of User 1', NULL, NULL),
(2, 'Administrator', '2024-12-09 00:42:55', 'Added Teacher with name of User 1', NULL, NULL),
(3, 'Administrator', '2024-12-09 00:43:02', 'Added Teacher with name of User 1', NULL, NULL),
(4, 'Administrator', '2024-12-09 00:43:02', 'Added Teacher with name of User 1', NULL, NULL),
(5, 'Administrator', '2024-12-09 00:43:03', 'Added Teacher with name of User 1', NULL, NULL),
(6, 'Administrator', '2024-12-09 00:43:04', 'Added Teacher with name of User 1', NULL, NULL),
(7, 'Administrator', '2024-12-09 00:43:05', 'Added Teacher with name of User 1', NULL, NULL),
(8, 'Administrator', '2024-12-09 00:43:05', 'Added Teacher with name of User 1', NULL, NULL),
(9, 'Administrator', '2024-12-09 00:44:05', 'Added Teacher with name of User 1', NULL, NULL),
(10, 'Administrator', '2024-12-09 00:44:34', 'Update Teacher with name of ADMINISTRATOR', NULL, NULL),
(11, 'Administrator', '2024-12-09 01:29:19', 'Update Teacher with name of ADMINISTRATOR', NULL, NULL),
(12, 'Administrator', '2024-12-09 01:40:48', 'Update Teacher with name of ADMINISTRATOR', NULL, NULL),
(13, 'Administrator', '2024-12-09 01:40:49', 'Update Teacher with name of ADMINISTRATOR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `transno` varchar(100) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `cash` int(11) DEFAULT NULL,
  `change` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `product_id`, `quantity`, `date_updated`, `user_id`, `transno`, `customer`, `total`, `date_created`, `cash`, `change`) VALUES
(1, 1, 10, '2024-09-13 19:07:46', 1, '09142024-0001', 'Juan Dela Cruz', 100, '2024-09-13 19:07:46', 500, 400),
(2, 1, 1, '2024-09-22 19:08:44', 1, '09232024-0001', 'Pepito Manaloto', 15, '2024-09-22 19:08:44', 100, 85);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `adddate` date DEFAULT NULL,
  `sino` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`id`, `firstname`, `lastname`, `middlename`, `phoneno`, `adddate`, `sino`) VALUES
(1, 'Juans', 'Cruzs', 'Delas', '09123456879', '2024-09-09', 'Samples'),
(8, 'Rey', 'Bandal', 'tear', '0230430', '2024-12-07', 'SI 9238947'),
(16, 'fda', 'fda', 'fda023940', '0234', '2024-12-06', '2039'),
(17, 'fda', 'fda', 'fda023940', '0234', '2024-12-06', '2039'),
(18, 'test', 'Bandal', 'tear', '0230430', '2024-12-14', 'fdafd'),
(19, 'test', 'Bandal', 'tear', '0230430', '2024-12-14', 'fdafd'),
(20, 'test', 'Bandal', 'tear', '0230430', '2024-12-14', 'fdafd'),
(21, 'test', 'Bandal', 'tear', '0230430', '2024-12-14', 'fdafd'),
(22, 'test', 'Bandal', 'tear', '0230430', '2024-12-14', 'fdafd'),
(24, 'test', 'Bandal', 'tear', '0230430', '2024-12-14', 'fdafd'),
(25, 'test', 'Bandal', 'tear', '0230430', '2024-12-14', 'fdafd'),
(26, 'test', 'ttes', 'fdafda', '02950359', '2024-12-20', 'SI484773'),
(27, 'test', 'Bandal', 'fdafda', '0230430', '2024-12-04', 'fdafd'),
(28, 'Rey', 'Bandal', 'fdafda', '0230430', '2024-12-12', 'fdafd'),
(29, 'Rey', 'Bandal', 'fdafda', '0230430', '2024-12-12', 'fdafd'),
(30, 'Rey', 'Bandal', 'fdafda', '0230430', '2024-12-12', 'fdafd'),
(31, 'test', 'Bandal', 'fdafda', '0230430', '2024-12-02', 'SI484773'),
(32, 'test', 'Bandal', 'fdafda', '0230430', '2024-12-02', 'SI484773');

-- --------------------------------------------------------

--
-- Table structure for table `tblprescription`
--

CREATE TABLE `tblprescription` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `prescription_date` date DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `status` varchar(100) NOT NULL DEFAULT 'ACTIVE',
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `price`, `qty`, `status`, `description`, `image`, `date_created`, `date_updated`, `cat_id`, `supplier_id`) VALUES
(1, 'Bioflu', 15, 489, 'ACTIVE', 'This medicine is used for the relief of clogged nose, runny nose, cough from postnasal drip, itchy and watery eyes, sneezing, headache, sore throat, body aches, and fever associated with the common cold, allergic rhinitis, sinusitis, flu and other minor respiratory tract infections', '1726253889050_bioflu.png', '2024-09-14 02:58:09', '2024-09-14 02:58:09', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblsales`
--

CREATE TABLE `tblsales` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `down_payment` decimal(10,2) DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `remaining_balance` decimal(10,2) NOT NULL,
  `status` enum('paid','partial') DEFAULT 'partial',
  `sale_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsms`
--

CREATE TABLE `tblsms` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `products_ordered` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`id`, `name`, `contact_number`, `products_ordered`) VALUES
(3, 'Juan Dela Cruz', '09123546789', 'Medicines');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `username`, `password`, `role`, `active`, `photo`) VALUES
(1, 'ADMINISTRATOR', 'admin@info.com', '12345678', 'ADMINISTRATOR', 'ACTIVE', '1.png'),
(8, 'test user account', 'test@gmail.com', 'lklkojm,', 'USER', 'ACTIVE', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisithistory`
--

CREATE TABLE `tblvisithistory` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwsupplier`
-- (See below for the actual view)
--
CREATE TABLE `vwsupplier` (
`id` int(11)
,`product_name` varchar(100)
,`price` decimal(10,2)
,`stock_quantity` int(11)
,`supplier_id` int(11)
,`supplier` varchar(123)
);

-- --------------------------------------------------------

--
-- Structure for view `vwsupplier`
--
DROP TABLE IF EXISTS `vwsupplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rec12`@`%` SQL SECURITY DEFINER VIEW `vwsupplier`  AS SELECT `i`.`id` AS `id`, `i`.`product_name` AS `product_name`, `i`.`price` AS `price`, `i`.`stock_quantity` AS `stock_quantity`, `i`.`supplier_id` AS `supplier_id`, concat(`s`.`name`,' | ',`s`.`contact_number`) AS `supplier` FROM (`tblinventory` `i` join `tblsupplier` `s` on(`s`.`id` = `i`.`supplier_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblprescription`
--
ALTER TABLE `tblprescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblsales`
--
ALTER TABLE `tblsales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsms`
--
ALTER TABLE `tblsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblvisithistory`
--
ALTER TABLE `tblvisithistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD CONSTRAINT `tblinventory_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `tblsupplier` (`id`);

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
