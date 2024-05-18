-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 10:47 AM
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
-- Database: `perapadala`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL DEFAULT '0',
  `employee_id` int(11) DEFAULT 0,
  `location_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `employee_id`, `location_id`) VALUES
(13, 'Bata Branch', 1, 4),
(14, 'Jaro Branch', 3, 5),
(15, 'Lacson Branch', 0, 1),
(16, 'Kabankalan Branch', 11, 2),
(17, 'De La Paz Branch', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `charge_id` int(11) NOT NULL,
  `percent` varchar(50) NOT NULL DEFAULT '0',
  `is_default` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`charge_id`, `percent`, `is_default`) VALUES
(1, '20', 0),
(18, '2', 1),
(29, '3', 0),
(30, '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`) VALUES
(2, 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `contact` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `cust_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `contact`, `address`, `cust_date`) VALUES
(103, 'Isabelle Bell', '0938848384', 'Himamaylan City ,Brgy 2', '2024-05-18'),
(104, 'Zephry Roberto', '09449954101', 'Bacolod City, Brgy Tangub sum-ag', '2024-05-18'),
(105, 'Macy Salasa', '09388388488', 'Libacao, Himamaylan ,Negros Occidental', '2024-05-18'),
(106, 'Rana Flowers', '09939988384', 'Kabankalan City, Negros Occidental', '2024-05-18'),
(107, 'Ryan SY', '03999493995', 'Bacolod City, Brgy Tangub sum-ag', '2024-05-18'),
(108, 'Nash Barber', '09898989899', 'Isabela, Negros Occidental', '2024-05-18'),
(109, 'Charity Clements', '08989898989', 'Sipalay City, Negros Occidental', '2024-05-18'),
(110, 'Tanek Peck', '09347373747', 'Hinobaan, Negros Occidental', '2024-05-18'),
(111, 'Axel Washington', '09939983884', 'Dumaguete City, Negros Oriental', '2024-05-18'),
(112, 'Darryl Foley', 'Cooper Jordan', 'Carly Bullock', '2024-05-18'),
(113, 'Amethyst Holcomb', '09384838844', 'Bacolod City, Brgy Tangub', '2024-05-18'),
(114, 'Angela Gamble', 'Iste soluta', 'Corrupti in aut mag', '2024-05-18'),
(115, 'Lillith Valenzuela', '08977878787', 'Zenaida Hyde', '2024-05-18'),
(116, 'Moses Mccray', 'Qui nemo of', 'Voluptates accusanti', '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL DEFAULT '0',
  `lname` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(250) NOT NULL DEFAULT '0',
  `contact` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `branch_id` int(11) DEFAULT 0,
  `job_id` int(11) NOT NULL DEFAULT 0,
  `hire_date` date NOT NULL,
  `employee_status` int(11) NOT NULL DEFAULT 1,
  `bm_status` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `email`, `password`, `contact`, `address`, `branch_id`, `job_id`, `hire_date`, `employee_status`, `bm_status`, `avatar`) VALUES
(1, 'Jed', 'Araceli', 'jed@gmail.com', '$2y$10$YsJBp5jW18gfh.f0b65YbuYBD0R/bLqG77kvjZ38FKx1skv.s2kTG', '09770772409', 'Isabela', 13, 1, '2024-05-08', 1, 1, NULL),
(2, 'Dennis', 'Ong', 'dennis@yahoo.com', '$2y$10$s.ojx2iynLbIp7t5TkeaR.t/HhhK9NFe.H3v9J8hAgjyIrKNh4XV.', '09770772409', 'Hinigaran', 13, 2, '2024-05-04', 1, 0, NULL),
(3, 'Daryl', 'Ong', 'daryl@gmail.com', '123', '0', '0', 14, 1, '2024-05-04', 1, 1, NULL),
(9, 'Lester Tyler', 'May Mckenzie', 'zerycir@mailinator.com', '$2y$10$DHJxSproMlvt/BDHfPqxR.tzvPBPB292c1zcpcT/C/q', '09384883848', 'Severina Avenue, Paranaque City', 13, 2, '2023-07-25', 1, 0, NULL),
(10, 'Nerea Sosa', 'Cathleen Ewing', 'hatiw@mailinator.com', '$2y$10$mJCm8q5TgMP9RthqR1ZiFOgxkWPfNH65PwKZq1TFfrx', 'Sydney Charles', 'Joseph Callahan', 0, 1, '1970-02-25', 1, 0, NULL),
(11, 'Mark', 'Zuckerberg', 'user123@yahoo.com', '$2y$10$YA7qJegoVL7Bxh1tew4Ay.s70PlTj.RkwZTy5IFbeXYerziGOmebq', '9090885100', 'Ignatius Blackwell', 16, 1, '1987-06-19', 1, 1, 'avatar_20240517082823.jpg'),
(12, 'Ignatius Shannon', 'Harrison Hurst', 'sample@yahoo.com', '$2y$10$Yz34Hu84BR7iLv.sHOvrweZt5FXZDQIcb.uCnfRTRKO', 'Yvette Hammond', 'Indigo Mayo', 0, 2, '2024-05-12', 1, 0, NULL),
(13, 'Fitzgerald Gibbs', 'Winter Davis', 'sample2@yahoo.com', '$2y$10$Zc96CFTjgGwEquwZw26QH.Ivaql5206OdzZOBdY.2xZmCpFyGSrU6', 'Phelan Harding', 'Lavinia Mcpherson', 16, 2, '2024-05-12', 1, 0, NULL),
(14, 'Jena Howard', 'Kyla Spence', 'user@yahoo.com', '$2y$10$II7cFq2.3b6ihXyZX3uzwO6.zVwCHOrhjZi8x7vf/oWthZ6zKCBOO', '09388388388', 'Brgy Humana, Bacolod City', 16, 2, '2024-05-12', 1, 0, NULL),
(15, 'Allistair Orr', 'Alfreda Johnston', 'fuxecyza@mailinator.com', '$2y$10$03CaErMJwR/EwUSHEBasrepjd8mgercxL0CvGtzmULXUe87NVSY/S', 'Clayton Sanders', 'Sipalay City, Negros Occidental', 0, 2, '2024-05-17', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `job_code` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `name`, `job_code`) VALUES
(1, 'Branch Manager', 'BM'),
(2, 'Branch Personnel', 'BP');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `province_name` varchar(50) NOT NULL DEFAULT '0',
  `city` varchar(50) NOT NULL DEFAULT '0',
  `region_id` int(11) NOT NULL DEFAULT 0,
  `street_name` varchar(50) NOT NULL DEFAULT '0',
  `assign` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `province_name`, `city`, `region_id`, `street_name`, `assign`) VALUES
(1, 'Negros Occidental', 'Bacolod', 3, 'Lacson St', 1),
(2, 'Negros Occidental', 'Kabankalan City', 3, 'Brgy 1', 1),
(3, 'Iloilo', 'Iloilo City', 3, 'Brgy 1', 1),
(4, 'Negros Occidental', 'Bacolod City', 3, 'Purok Riverside, Bata', 1),
(5, 'Ilo-ilo', 'Jaro', 3, 'Bagdag St', 1),
(7, 'Negros Occidental', 'Bacolod City', 3, 'Homesite', 0);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `country_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `name`, `country_id`) VALUES
(1, 'Region 8', 2),
(2, 'Region 7', 2),
(3, 'Region 6', 2),
(5, 'region 9', 2),
(6, 'Region 10', 2),
(7, 'Region 11', 2),
(8, 'NCR', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT 0,
  `transaction_code` varchar(50) NOT NULL,
  `percent` varchar(50) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `transaction_claimed` datetime DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `branch_id`, `transaction_code`, `percent`, `transaction_date`, `status`, `transaction_claimed`, `employee_id`) VALUES
(105, 16, 'WSP-406-HHI-2405-1104', '2%', '2024-05-12 11:04:25', 1, '2024-05-12 13:56:10', 14),
(106, 16, 'HXI-374-OPQ-2405-1155', '2%', '2024-05-12 11:55:32', 1, '2024-05-12 13:56:16', 14),
(107, 16, 'RAD-832-HPT-2405-1203', '2%', '2024-05-12 12:03:38', 0, NULL, 13),
(108, 13, 'DAC-663-MQT-2405-0753', '2%', '2024-05-14 07:53:00', 0, NULL, 2),
(109, 16, 'RQA-084-XFO-2405-0611', '2%', '2024-05-15 06:11:29', 0, NULL, 11),
(110, 16, 'JBB-568-AIW-2405-0616', '2%', '2024-05-15 06:16:14', 0, NULL, 11),
(111, 16, 'BBC-243-JMD-2405-0303', '2%', '2024-05-15 15:03:27', 0, NULL, 11),
(112, 16, 'PZL-395-OXE-2405-0305', '2%', '2024-05-15 15:05:18', 0, NULL, 11),
(113, 16, 'JDZ-757-GWJ-2405-0931', '2%', '2024-05-17 09:31:30', 1, '2024-05-17 09:32:45', 11),
(114, 16, 'APS-421-FWY-2405-0225', '2%', '2024-05-17 14:25:36', 0, NULL, 14),
(115, 16, 'WGW-029-OYG-2405-0255', '2%', '2024-05-18 14:55:54', 1, '2024-05-18 14:56:16', 14),
(116, 16, 'MIX-130-CVT-2405-0304', '2%', '2024-05-18 15:04:31', 0, NULL, 11),
(117, 16, 'JHD-662-HWV-2405-0316', '2%', '2024-05-18 15:16:29', 0, NULL, 14);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_details_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `sender_customer_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_address` varchar(50) NOT NULL,
  `receiver_contact` varchar(50) NOT NULL,
  `fee` varchar(50) NOT NULL,
  `sender_relation` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_details_id`, `transaction_id`, `sender_customer_id`, `amount`, `receiver_name`, `receiver_address`, `receiver_contact`, `fee`, `sender_relation`, `purpose`) VALUES
(94, 105, 104, '9000', 'Jescie Dunlop', 'Himamaylan City , Brgy 5', '09399493111', '180.00', 'Friend', 'Allowance'),
(95, 106, 105, '1000', 'Jessamine Dalton', 'Aliquip temporibus m', '09349934838', '20.00', 'Friend', 'allowance'),
(96, 107, 106, '2000', 'Lila Michael', 'Magni non est totam', 'Ea qui culp', '40.00', 'Rerum culpa cum eve', 'Eaque nihil quam sed'),
(97, 108, 107, '2000', 'Henry Matter', 'Sipalay City', '09498583883', '40.00', 'Friend', 'Bayad Utang'),
(98, 109, 108, '9200', 'Kiayada Doyle', 'Aristotle Wiley', '08987787878', '184.00', 'Bromance', 'Allowance'),
(99, 110, 109, '13000', 'Cheyenne Owen', 'Owen Fernandez', '09787878787', '260.00', 'Friend', 'allowance'),
(100, 111, 110, '2100', 'Zeus Nguyen', 'Carol Kline', 'Maia Johnson', '42.00', 'Ulric Morris', 'Bo Sweet'),
(101, 112, 111, '780', 'Maya Morrison', 'Yoko Norman', 'TaShya Robinson', '15.60', 'Alexis Hurst', 'Rachel Houston'),
(102, 113, 112, '570', 'Yeo Perkins', 'Lucy Roach', 'Sybil Jefferson', '11.40', 'Mari Mendoza', 'Ronan Williams'),
(103, 114, 113, '970', 'Tarik Burges', 'Sipalay City, Negros Occidental', '0938848388', '19.40', 'Corrupti eos quis ', 'Accusamus nesciunt '),
(104, 115, 114, '150', 'Amaya Richards', 'Sunt dolor ea est u', 'Proident d', '3.00', 'Eum aliqua Minima u', 'Odio eu dolor nobis '),
(105, 116, 115, '360', 'Darius Manning', 'Kevyn Justice', '08987878787', '7.20', 'Mother', 'allowance'),
(106, 117, 116, '520', 'Nero Schultz', 'Non iusto aliquid eu', 'Ad dignissi', '10.40', 'Labore id accusanti', 'Perspiciatis cumque');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(250) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `role`, `status`, `avatar`) VALUES
(1, 'Ryan Wong', 'ryanwong@gmail.com', '$2y$10$iCH3cS5XxaeUDQb9Q6uXBuccQdCP8/Oc.wGwDFSFdqPz26U76/1de', 1, 1, 'avatar_20240518144435.jpg'),
(12, 'Risa Knight', 'moponom@mailinator.com', '$2y$10$aBkb.MtK4zGZstNsCszDuu73NBYUp5UW1Ya2TOiwBGlsqNZ/CnuQm', 2, 1, 'avatar_20240518144610.jpg'),
(13, 'jedi Araceli', 'jed@gmail.com', '$2y$10$97adXn8r9BjDBEW968em7.3QZnVVVKrLD4VZ.4D5g5LnmG7fObeXu', 2, 1, 'avatar_20240518115646.jpg'),
(14, 'sample', 'jed2@gmail.com', '$2y$10$yczixzDF10bkGJ5dff5ed.fA9w6l5dQseCibbH5hl8sOjBJCPPUam', 2, 1, 'avatar_20240518120034.jpg'),
(16, 'Roanna Rojas', 'mxk@yahoo.com', '$2y$10$MnV5I1Rn/ZffvEoFvZtoOOs87bUhMqDp3UuvQzKWSTq.zbzpiul3m', 2, 0, 'avatar_20240518122928.jpg'),
(17, 'Kennedy Guy', 'rukenugip@mailinator.com', '$2y$10$MTUyJadu.DLAdwPWntcs2eUG5PHp8zMWvQmuEl/EyOdteNC1GrAA6', 2, 0, 'avatar_20240518144646.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`charge_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`region_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_details_id`),
  ADD KEY `sender_customer_id` (`sender_customer_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `charge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
