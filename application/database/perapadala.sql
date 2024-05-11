-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 07:06 PM
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
(29, '3', 0);

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
  `address` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `contact`, `address`) VALUES
(65, 'Bruno Reed', 'Fugit dolorem volup', 'Sed quis corporis se'),
(66, 'Gemma Landry', 'Qui et in in et ea m', 'Ut pariatur Animi '),
(67, 'Elmo Medina', 'Et consequatur et an', 'Nulla omnis vel moll'),
(68, 'Camilla Stephens', 'Nobis rerum ratione ', 'Voluptatem excepteur'),
(69, 'Ulysses Ellison', 'Dolore et voluptate ', 'Similique qui error '),
(70, 'Joel Joyce', 'Quam incidunt aperi', 'Adipisicing voluptas'),
(71, 'Ella Pacheco', 'Quidem et et ex laud', 'Ipsum natus officia '),
(72, 'Jasper Le', 'Quisquam eiusmod qui', 'Amet aute vitae at '),
(73, 'Luke Reed', 'Vel aliqua Et conse', 'Illo voluptate aut i'),
(74, 'Tarik Guerra', 'Excepturi vel aut is', 'Consequat Enim cons'),
(75, 'Hiroko Monroe', 'Et eum quaerat minus', 'Sed velit ut ipsum v'),
(76, 'Iris Reilly', 'Ipsa quibusdam non ', 'Neque ut dicta qui e'),
(77, 'Daquan Lowery', 'Ipsum et occaecat u', 'Sed beatae ipsum max'),
(78, 'Stacy Wong', 'Quo debitis ipsam eu', 'Consequatur Dolorum'),
(79, 'Emmanuel Ochoa', 'Ducimus sunt id m', 'Non omnis qui eaque '),
(80, 'Xaviera Gilbert', 'Nostrud corrupti qu', 'Ut ullam corporis no'),
(81, 'Derek Mcgowan', 'Similique anim optio', 'Ab vel obcaecati mol'),
(82, 'Rajah Mcintosh', 'Rerum facere ab dolo', 'Sunt cumque ea quia '),
(83, 'Lewis Warren', 'Est in in commodo si', 'Sunt iure qui ea hic'),
(84, 'Francis White', 'Voluptatem et modi a', 'Impedit earum venia'),
(85, 'Clarke Wright', 'Doloremque enim elit', 'Eiusmod quia ipsum '),
(86, 'Shellie Patrick', 'Lorem tempora except', 'Laborum Est eos mo'),
(87, 'Stella Duncan', 'Proident earum dolo', 'Nisi accusamus persp'),
(88, 'Dean Mcguire', 'Et dicta qui velit s', 'Incididunt ducimus '),
(89, 'Reese Hamilton', 'Duis mollitia nostru', 'Aut aperiam nobis cu'),
(90, 'Wynter Tillman', '0898978676', 'Bacolod City, Brgy Tangub sum-ag'),
(91, 'Philip Leblanc', '099394848', 'Bacolod City, Brgy Tangub sum-ag'),
(92, 'Katell Griffin', 'Facilis officiis dol', 'Voluptas deleniti qu'),
(93, 'Byron Clay', '0898978676', 'Bacolod City, Brgy Tangub sum-ag'),
(94, 'Joel Saunders', 'Deserunt omnis conse', 'Non voluptatum tempo'),
(95, 'Uriel Barron', 'Ut cupiditate enim c', 'Occaecat earum cum e');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL DEFAULT '0',
  `lname` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `contact` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `branch_id` int(11) DEFAULT 0,
  `job_id` int(11) NOT NULL DEFAULT 0,
  `hire_date` date NOT NULL,
  `employee_status` int(11) NOT NULL DEFAULT 1,
  `bm_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `email`, `password`, `contact`, `address`, `branch_id`, `job_id`, `hire_date`, `employee_status`, `bm_status`) VALUES
(1, 'Jed', 'Araceli', 'jed@gmail.com', '$2y$10$05a/zajGkCnKndx8lL0IOOT.mVZoVoHudOkVAULpwZ9', '09770772409', 'Isabela', 13, 1, '2024-05-08', 1, 1),
(2, 'Dennis', 'Ong', 'dennis@yahoo.com', '123', '09770772409', 'Hinigaran', 0, 2, '2024-05-04', 1, 0),
(3, 'Daryl', 'Ong', 'daryl@gmail.com', '123', '0', '0', 14, 1, '2024-05-04', 1, 1),
(9, 'Lester Tyler', 'May Mckenzie', 'zerycir@mailinator.com', '$2y$10$DHJxSproMlvt/BDHfPqxR.tzvPBPB292c1zcpcT/C/q', '01-Oct-1980', '12-Jun-2001', 0, 2, '2023-07-25', 1, 0),
(10, 'Nerea Sosa', 'Cathleen Ewing', 'hatiw@mailinator.com', '$2y$10$mJCm8q5TgMP9RthqR1ZiFOgxkWPfNH65PwKZq1TFfrx', 'Sydney Charles', 'Joseph Callahan', 0, 1, '1970-02-25', 1, 0),
(11, 'Colette York', 'Justine Underwood', 'gogucabyb@mailinator.com', '$2y$10$cWa3rbCuzqxuwiS1zKE8pOJX5aNBKZIRxVhA6l19XHV', '909088575', 'Ignatius Blackwell', 16, 1, '1987-06-19', 1, 1);

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
(5, 'Ilo-ilo', 'Jaro', 3, 'Bagdag St', 1);

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
(5, 'region 9', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `percent` varchar(50) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_code`, `percent`, `transaction_date`, `status`, `employee_id`) VALUES
(66, 'SXF-925-OZB-2405-0503', '2%', '2024-05-10 05:03:08', 0, 2),
(67, 'LNJ-885-VWI-2405-0503', '2%', '2024-05-10 05:03:52', 0, 2),
(68, 'QND-793-GAR-2405-0506', '2%', '2024-05-10 05:06:54', 0, 2),
(69, 'SYH-634-VZT-2405-0508', '2%', '2024-05-10 05:08:43', 0, 2),
(70, 'PTD-358-XOL-2405-0509', '2%', '2024-05-10 05:09:28', 0, 2),
(71, 'EXS-596-RAD-2405-0510', '2%', '2024-05-10 05:10:51', 0, 2),
(72, 'MVM-583-WDN-2405-0512', '2%', '2024-05-10 05:12:52', 0, 2),
(73, 'CKD-834-IQY-2405-0513', '2%', '2024-05-10 05:13:50', 0, 2),
(74, 'IFV-406-GWK-2405-0514', '2%', '2024-05-10 05:14:59', 0, 2),
(75, 'LJR-133-SFA-2405-0516', '2%', '2024-05-10 05:16:03', 0, 2),
(76, 'HJN-363-VYG-2405-0516', '2%', '2024-05-10 05:16:31', 0, 2),
(77, 'WGB-696-GXK-2405-0517', '2%', '2024-05-10 05:17:50', 0, 2),
(78, 'TDX-288-OXF-2405-0521', '2%', '2024-05-10 05:21:37', 0, 2),
(79, 'MDL-153-TLO-2405-0522', '2%', '2024-05-10 05:22:11', 0, 2),
(80, 'SSJ-652-GPW-2405-0523', '2%', '2024-05-10 05:23:11', 0, 2),
(81, 'LKK-449-OXZ-2405-0523', '2%', '2024-05-10 05:23:33', 0, 2),
(82, 'OUC-353-NSW-2405-0523', '2%', '2024-05-10 05:23:55', 0, 2),
(83, 'XPO-044-KZF-2405-0524', '2%', '2024-05-10 05:24:32', 0, 2),
(84, 'CBI-258-CUA-2405-0524', '2%', '2024-05-10 05:24:55', 0, 2),
(85, 'BOZ-584-AWN-2405-0525', '2%', '2024-05-10 05:25:41', 0, 2),
(86, 'HRR-283-SNQ-2405-0526', '2%', '2024-05-10 05:26:21', 0, 2),
(87, 'MBV-850-IFK-2405-0527', '2%', '2024-05-10 05:27:14', 0, 2),
(88, 'ILX-927-GVD-2405-0527', '2%', '2024-05-10 05:27:28', 0, 2),
(89, 'MQH-947-EGU-2405-0540', '2%', '2024-05-10 05:40:15', 0, 2),
(90, 'FYF-390-MCZ-2405-0541', '2%', '2024-05-10 05:41:05', 0, 2),
(91, 'OUN-401-MBB-2405-0600', '2%', '2024-05-10 06:00:50', 0, 2),
(92, 'TVV-594-BSB-2405-0602', '2%', '2024-05-10 06:02:23', 0, 2),
(93, 'GDF-339-CYF-2405-0604', '2%', '2024-05-10 06:04:07', 0, 2),
(94, 'RLO-678-BOQ-2405-0605', '2%', '2024-05-10 06:05:23', 0, 2),
(95, 'FDK-635-DBL-2405-0611', '2%', '2024-05-10 06:11:50', 0, 2),
(96, 'FCH-735-FZP-2405-0614', '2%', '2024-05-10 06:14:41', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_details_id` int(11) NOT NULL,
  `sender_customer_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_address` varchar(50) NOT NULL,
  `receiver_contact` varchar(50) NOT NULL,
  `fee` varchar(50) NOT NULL,
  `sender_relation` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_details_id`, `sender_customer_id`, `amount`, `receiver_name`, `receiver_address`, `receiver_contact`, `fee`, `sender_relation`, `purpose`, `transaction_id`) VALUES
(55, 65, '470', 'Hayfa Marks', 'Dolor et deserunt es', 'Aute aut quis sunt c', '9.40', 'Laborum et commodo a', 'Voluptatem aut dolor', 66),
(56, 66, '580', 'Morgan Tanner', 'Dolore qui nostrum n', 'Accusantium labore d', '11.60', 'Aliquip totam dolore', 'Fugiat animi a sin', 67),
(57, 67, '610', 'Anjolie Deleon', 'Eligendi culpa atqu', 'Ipsum necessitatibus', '12.20', 'Dicta laborum Aut d', 'Libero impedit labo', 68),
(58, 68, '1400', 'Lesley Villarreal', 'Eius consectetur vol', 'Quibusdam veniam mo', '28.00', 'Nobis nulla occaecat', 'Aute omnis nihil odi', 69),
(59, 69, '320', 'Walker Booth', 'Non ullam asperiores', 'Dolor sunt irure qui', '6.40', 'Mollitia fugiat per', 'In ut voluptas fugia', 70),
(60, 70, '350', 'Damian Alvarado', 'Dolores hic est qui ', 'Dolorem reiciendis o', '7.00', 'Lorem molestias qui ', 'Accusamus non aute r', 71),
(61, 71, '470', 'Drew Stevens', 'Quidem nobis asperna', 'Natus in nostrum acc', '9.40', 'Molestiae rerum est ', 'Alias ullamco explic', 72),
(62, 72, '600', 'Ella Hooper', 'Inventore et aut sed', 'Vel accusantium temp', '12.00', 'In esse ut fuga Nat', 'Enim exercitationem ', 73),
(63, 73, '370', 'Vance Stein', 'Quia numquam sit con', 'Labore dolores velit', '7.40', 'Repellendus Quia ar', 'Do possimus eos rep', 74),
(64, 74, '410', 'Arden Weiss', 'Assumenda animi qui', 'Ut laudantium est s', '8.20', 'Inventore aut sed oc', 'Est magna qui in qui', 75),
(65, 75, '190', 'Karly Willis', 'Quia ullamco omnis h', 'Est atque voluptate ', '3.80', 'Ipsum cupiditate fug', 'Adipisci sit nihil v', 76),
(66, 76, '450', 'Brynne Bates', 'Quae consequatur Se', 'Iure rerum necessita', '9.00', 'Irure nostrum minim ', 'Do ut consequuntur n', 77),
(67, 77, '650', 'Celeste Deleon', 'Commodi qui in moles', 'Eligendi ipsum rati', '13.00', 'Vero in qui quas exc', 'Quis ut enim dolorem', 78),
(68, 78, '620', 'Reed Wilcox', 'Velit quam aliquam r', 'Animi consequatur ', '12.40', 'Vel illo aute est ve', 'Laborum proident re', 79),
(69, 79, '4700', 'Gabriel Maxwell', 'Atque excepteur fugi', 'Modi possimus est i', '94.00', 'Labore odit qui inci', 'Lorem voluptas dolor', 80),
(70, 80, '3800', 'Nolan Campbell', 'Ut occaecat placeat', 'Et officia voluptate', '76.00', 'Anim aut nihil dolor', 'Illo saepe culpa odi', 81),
(71, 81, '200', 'Quinn Gay', 'Aliquip officia vel ', 'A iste laborum Labo', '4.00', 'Autem ex sed et eos ', 'Eum doloribus incidu', 82),
(72, 82, '710', 'Phillip Russo', 'Excepteur consequunt', 'Numquam unde quibusd', '14.20', 'Minim quia exercitat', 'Labore deserunt face', 83),
(73, 83, '960', 'Zephr Navarro', 'Ipsum fugiat explic', 'Laboriosam eius nih', '19.20', 'Distinctio Do labor', 'Distinctio Itaque q', 84),
(74, 84, '640', 'Ulla Carter', 'Voluptas in aliquam ', 'Veniam ut omnis ist', '12.80', 'Eu ut quis magnam cu', 'Ducimus sapiente no', 85),
(75, 85, '8100', 'Roary Spears', 'Minima quia nostrum ', 'Est lorem amet dol', '162.00', 'Repudiandae unde par', 'Qui quis molestiae h', 86),
(76, 86, '840', 'Emmanuel Matthews', 'Autem quas voluptatu', 'Adipisicing laborios', '16.80', 'Labore dignissimos c', 'Illum saepe aut exc', 87),
(77, 87, '630', 'Ulla Stafford', 'Consequuntur ullamco', 'Ipsam error eveniet', '12.60', 'Aperiam nobis rerum ', 'Quis amet alias ips', 88),
(78, 88, '620', 'Dillon Glenn', 'Aliqua Beatae in au', 'Voluptatibus asperna', '12.40', 'Autem in molestias t', 'Dolorum minus minima', 89),
(79, 89, '100', 'Maisie Blake', 'Voluptatem voluptas', 'Provident beatae pe', '2.00', 'Suscipit porro nisi ', 'Id reprehenderit cul', 90),
(80, 90, '10000', 'Philip Barker', 'Himamaylan City , Brgy 1', '08778878', '200.00', 'Friend', 'allowance', 91),
(81, 91, '8200', 'Shafira Rowe', 'Himamaylan City , Brgy 1', '0958584883', '164.00', 'Friend of Mine', 'Allowance', 92),
(82, 92, '1200', 'Ivana Mclean', 'Eos minim officia re', 'Provident at suscip', '24.00', 'Ratione dolor volupt', 'Nam consequuntur eve', 93),
(83, 93, '10000', 'Aubrey Booker', 'Himamaylan City , Brgy 1', '0958584883', '200.00', 'Friend', 'allowance', 94),
(84, 94, '75', 'Justin Livingston', 'In elit unde pariat', 'Nostrum labore venia', '0.74', 'Hic minus qui offici', 'Quidem et fugit con', 95),
(85, 95, '1000', 'Anika Cobb', 'Ut quis reiciendis a', 'Deserunt sint quas ', '20.00', 'Similique libero qui', 'Qui corrupti quia e', 96);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `employee_id` (`employee_id`);

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
  MODIFY `charge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
