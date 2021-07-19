-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2021 at 08:40 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `pass` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `pass`) VALUES
(1, 'admin', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `agent_regis`
--

CREATE TABLE `agent_regis` (
  `id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent_regis`
--

INSERT INTO `agent_regis` (`id`, `pic`, `username`, `pass`, `number`, `bankname`, `state`, `location`, `account_no`, `date`) VALUES
(26, 'Untitled design (6).png', 'Nayon', '123456', '01814569747', 'BDMC', 'Bangalore', 'A Narayanapura', '5661', 'Nov-09-2020');

-- --------------------------------------------------------

--
-- Table structure for table `bank_feed`
--

CREATE TABLE `bank_feed` (
  `id` int(11) NOT NULL,
  `bank_feed` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_feed`
--

INSERT INTO `bank_feed` (`id`, `bank_feed`, `user_id`, `agent_id`) VALUES
(1, 'dfasdfadsf', 57, 26);

-- --------------------------------------------------------

--
-- Table structure for table `bank_regi`
--

CREATE TABLE `bank_regi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `meeting_date` varchar(255) NOT NULL,
  `meeting_titme` varchar(255) NOT NULL,
  `meeting_notes` varchar(2000) NOT NULL,
  `Uwhatsapp` varchar(255) NOT NULL,
  `doc_need` varchar(1000) NOT NULL,
  `agent_com` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `meeting_date`, `meeting_titme`, `meeting_notes`, `Uwhatsapp`, `doc_need`, `agent_com`, `user_id`, `agent_id`, `status`) VALUES
(3, '2020-12-23', '00:23', '312sdfdsaf', '341234132', 'NULL', 'NULL', 57, 26, 'pending'),
(4, '2000-10-10', '00:12', 'dsfgads', '123456789', 'NULL', 'NULL', 62, 26, 'pending'),
(5, '2021-07-15', '02:11', 'jhfgk', '014885748452', 'NULL', 'NULL', 63, 26, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `id` int(11) NOT NULL,
  `doc` varchar(2000) NOT NULL,
  `doc_com` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id`, `doc`, `doc_com`, `user_id`, `agent_id`) VALUES
(1, 'ect ect ', 'FPDF ', 57, 26);

-- --------------------------------------------------------

--
-- Table structure for table `doc_file`
--

CREATE TABLE `doc_file` (
  `id` int(11) NOT NULL,
  `doc_file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_file`
--

INSERT INTO `doc_file` (`id`, `doc_file`, `user_id`, `agent_id`) VALUES
(1, 'Power_Banks_color.png', 57, 26);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback_for_interfac` varchar(255) NOT NULL,
  `feedback_for_agent` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_for_interfac`, `feedback_for_agent`, `user_id`, `agent_id`) VALUES
(18, '', '2.5', 0, 26),
(19, '', '5', 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_msg`
--

CREATE TABLE `feedback_msg` (
  `id` int(11) NOT NULL,
  `fbm` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_msg`
--

INSERT INTO `feedback_msg` (`id`, `fbm`, `user_id`, `agent_id`, `who`) VALUES
(1, 'hi ', 57, 26, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `further_doc`
--

CREATE TABLE `further_doc` (
  `id` int(11) NOT NULL,
  `further_doc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `further_doc_file`
--

CREATE TABLE `further_doc_file` (
  `id` int(11) NOT NULL,
  `further_doc_file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `further_doc_msg`
--

CREATE TABLE `further_doc_msg` (
  `id` int(11) NOT NULL,
  `further_Doc_Msg` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_approv_doc`
--

CREATE TABLE `loan_approv_doc` (
  `id` int(11) NOT NULL,
  `loan_approv_doc` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aget_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_ap_doc_file`
--

CREATE TABLE `loan_ap_doc_file` (
  `id` int(11) NOT NULL,
  `loan_ap_doc_file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_ap_msg`
--

CREATE TABLE `loan_ap_msg` (
  `id` int(11) NOT NULL,
  `loan_ap_msg` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_disbursal`
--

CREATE TABLE `loan_disbursal` (
  `id` int(11) NOT NULL,
  `loan_disbursal` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_disbursal_file`
--

CREATE TABLE `loan_disbursal_file` (
  `id` int(11) NOT NULL,
  `loan_disbursal_file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_disbursal_msg`
--

CREATE TABLE `loan_disbursal_msg` (
  `id` int(11) NOT NULL,
  `loan_disbursal_msg` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `location_id`) VALUES
(1, 'A Narayanapura', 38),
(2, 'Abbigere', 38),
(3, 'Abshot Layout', 38),
(4, 'Abshot Layout', 38),
(5, 'AECS Layout', 38),
(6, 'A Narayanapura', 38),
(7, 'Abbigere', 38),
(8, 'Anugondahalli', 38),
(9, 'Arekere', 38),
(10, 'Ashok Nagar', 38),
(11, 'Ashok Nagar', 38),
(12, 'Attibele', 38),
(13, 'Attibele', 38),
(14, 'Attiguppe', 38),
(15, 'Austin Town', 38),
(16, 'Avalahalli', 38),
(17, 'Azad Nagar', 38),
(18, 'A Narayanapura', 38),
(19, 'Abbigere', 38),
(20, 'Abshot Layout', 38),
(21, 'Adugodi', 38),
(22, 'AECS Layout', 38),
(23, 'Agara', 38),
(24, 'Agrahara Badavane', 38),
(25, 'Agram', 38),
(26, 'AGS Layout', 38),
(27, 'Akshya Nagar', 38),
(28, 'Allalasandra', 38),
(29, 'Ambalipura', 38),
(30, 'Ambalipura', 38),
(31, 'Amrutha Halli', 38),
(32, 'Anagalapura', 38),
(33, 'Anand Nagar', 38),
(34, 'Anchepalya', 38),
(35, 'Andrahalli', 38),
(36, 'Anekal', 38),
(37, 'A Narayanapura', 38),
(38, 'Abbigere', 38),
(39, 'Abshot Layout', 38),
(40, 'Adugodi', 38),
(41, 'AECS Layout', 38),
(42, 'Agara', 38),
(43, 'Agrahara Badavane', 38),
(44, 'Agram', 38),
(45, 'AGS Layout', 38),
(46, 'Akshya Nagar', 38),
(47, 'Allalasandra', 38),
(48, 'Ambalipura', 38),
(49, 'Ambalipura', 38),
(50, 'Amrutha Halli', 38),
(51, 'Anagalapura', 38),
(52, 'Anand Nagar', 38),
(53, 'Anchepalya', 38),
(54, 'Andrahalli', 38),
(55, 'Anekal', 38),
(56, 'Anjanapura', 38),
(57, 'Annapurneshwari Nagar', 38),
(58, 'Anugondahalli', 38),
(59, 'Armane Nagar', 38),
(60, 'Ashok Nagar', 38),
(61, 'Ashwath Nagar', 38),
(62, 'Attibele', 38),
(63, 'Attiguppe', 38),
(64, 'Austin Town', 38),
(65, 'Avalahalli', 38),
(66, 'Azad Nagar', 38),
(67, 'Anekal', 38);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `msg`, `user_id`, `agent_id`, `who`) VALUES
(1, 'no no, Etc ', 57, 26, 'Agent'),
(2, 'Ok OK, I\'ll send ', 57, 26, 'customer'),
(3, 'Ok thnk you ', 57, 26, 'Agent');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state`) VALUES
(38, 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `user_regi`
--

CREATE TABLE `user_regi` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `verify` int(11) NOT NULL,
  `vkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_regi`
--

INSERT INTO `user_regi` (`id`, `uname`, `number`, `state`, `location`, `pass`, `account_no`, `date`, `verify`, `vkey`) VALUES
(47, 'Bulbul ', '1234567890', 'Bangalore', 'A Narayanapura', 'Life@2021', '1411', '28-Oct-20', 1, 'e0e4bd4b88746156a67f72ac1ef91454'),
(48, 'customerone', '1234567890', 'Bangalore', 'A Narayanapura', 'Life@2021', '5288', '28-Oct-20', 1, '65faac9922bc5b76180f21e9ded05c1b'),
(49, 'customerone', '2345678912', 'Bangalore', 'A Narayanapura', '123456', '249', '28-Oct-20', 1, '81c08b4bd0b2c8d6d058b6bdabfae897'),
(50, 'customersecond', '9160057000', 'Bangalore', 'A Narayanapura', '123456', '7682', '28-Oct-20', 1, 'eeaf3be2bc850bc020238509748518d7'),
(51, 'Aswini ', '9052755421', 'Bangalore', 'Attibele', '27@swini1993', '1594', '28-Oct-20', 1, 'e8a73facfbe2c36b6184fa91cf1db9c1'),
(52, 'testcustomerone31', '1357924680', 'Bangalore', 'A Narayanapura', '123456', '2913', '31-Oct-20', 1, '4825d86ec3b79893a5d46c06fd6bcfa1'),
(53, 'venumuvvatest', '9160057000', 'Bangalore', 'A Narayanapura', '123456', '9440', '31-Oct-20', 1, '2267bb88638e5d15b483b3fcc16f7f6e'),
(54, 'testsagar', '9160057000', 'Bangalore', 'Attibele', '123456', '8212', '05-Nov-20', 1, 'fbddc1ae682626b1b0c45570aaea1349'),
(55, 'surgecustomer', '9160057000', 'Bangalore', 'Ashok Nagar', '123456', '4277', '05-Nov-20', 1, 'c54b55cbda9e1970f8c13effab2b53b5'),
(56, 'homeloanaddatestuser', '1357924680', 'Bangalore', 'A Narayanapura', '123456', '7713', '12-Nov-20', 1, 'ac5ef5b047542ff611c3a4988664015b'),
(57, 'Abbas', '1814569747', 'Bangalore', 'A Narayanapura', '123456', '4513', '23-Nov-20', 1, '571bd9343eaa9ae5fab89292f8baeaa0'),
(58, 'NAYON TALUKDER', '01760058205', 'Bangalore', 'A Narayanapura', '123456', '341', '16-Jan-21', 1, 'c03440d1358a23988ca5aa3f28a5510d'),
(59, 'Suhasini.B', '08722037780', 'Bangalore', 'Ashok Nagar', 'Suhasini123', '1438', '13-Jul-21', 1, 'f615c684f3381e54cb376004b8deb31b'),
(60, 'Suhasini.B', '08722037780', 'Bangalore', 'A Narayanapura', 'Suhasini123', '6388', '13-Jul-21', 1, 'b7eaacb87f0b43f540f9ded2129181ce'),
(61, 'Suhasini.B', '08722037780', 'Bangalore', 'A Narayanapura', 'Suhasini123', '9575', '13-Jul-21', 1, '8d06a052277cd54553cb92d8e7228208'),
(62, 'nayon', '014785784', 'Bangalore', 'A Narayanapura', '123456', '802', '13-Jul-21', 1, '5bf260b58707cd9a90dd00c4f84f387d'),
(63, 'Nnn', '1234567890', 'Bangalore', 'A Narayanapura', '123456', '4190', '14-Jul-21', 1, '0a55e032226632291c8b05092f609bb1'),
(64, 'text', '1234', 'Bangalore', 'Arekere', 'text', '7172', '14-Jul-21', 1, 'ea6f478be72edb86f2d07cfc783bb354');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_regis`
--
ALTER TABLE `agent_regis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_feed`
--
ALTER TABLE `bank_feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bf_user_id` (`user_id`),
  ADD KEY `bf_agent_id` (`agent_id`);

--
-- Indexes for table `bank_regi`
--
ALTER TABLE `bank_regi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docUser` (`user_id`),
  ADD KEY `docAgent` (`agent_id`);

--
-- Indexes for table `doc_file`
--
ALTER TABLE `doc_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbackU` (`user_id`),
  ADD KEY `feedbackA` (`agent_id`);

--
-- Indexes for table `feedback_msg`
--
ALTER TABLE `feedback_msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userIDfbm` (`user_id`),
  ADD KEY `agentIDfbm` (`agent_id`);

--
-- Indexes for table `further_doc`
--
ALTER TABLE `further_doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fdUserid` (`user_id`),
  ADD KEY `fbAgentid` (`agent_id`);

--
-- Indexes for table `further_doc_file`
--
ALTER TABLE `further_doc_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FDU` (`user_id`),
  ADD KEY `FDA` (`agent_id`);

--
-- Indexes for table `further_doc_msg`
--
ALTER TABLE `further_doc_msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `further_Doc_Msg_User` (`user_id`),
  ADD KEY `further_Doc_Msg_agent` (`agent_id`);

--
-- Indexes for table `loan_approv_doc`
--
ALTER TABLE `loan_approv_doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan-aprove-doc-Us` (`user_id`),
  ADD KEY `loan-aprove-doc-Ag` (`aget_id`);

--
-- Indexes for table `loan_ap_doc_file`
--
ALTER TABLE `loan_ap_doc_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_ap_doc_fileU` (`user_id`),
  ADD KEY `loan_ap_doc_file` (`agent_id`);

--
-- Indexes for table `loan_ap_msg`
--
ALTER TABLE `loan_ap_msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_app_smgU` (`user_id`),
  ADD KEY `loan_app_smg` (`agent_id`);

--
-- Indexes for table `loan_disbursal`
--
ALTER TABLE `loan_disbursal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_disbursal U` (`user_id`),
  ADD KEY `loan_disbursalA` (`agent_id`);

--
-- Indexes for table `loan_disbursal_file`
--
ALTER TABLE `loan_disbursal_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_disbursal_fileU` (`user_id`),
  ADD KEY `loan_disbursal_file_A` (`agent_id`);

--
-- Indexes for table `loan_disbursal_msg`
--
ALTER TABLE `loan_disbursal_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MsgUserId` (`user_id`),
  ADD KEY `MsgAgentId` (`agent_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_regi`
--
ALTER TABLE `user_regi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verify` (`verify`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_regis`
--
ALTER TABLE `agent_regis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `bank_feed`
--
ALTER TABLE `bank_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_regi`
--
ALTER TABLE `bank_regi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc_file`
--
ALTER TABLE `doc_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback_msg`
--
ALTER TABLE `feedback_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `further_doc`
--
ALTER TABLE `further_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `further_doc_file`
--
ALTER TABLE `further_doc_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `further_doc_msg`
--
ALTER TABLE `further_doc_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_approv_doc`
--
ALTER TABLE `loan_approv_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_ap_doc_file`
--
ALTER TABLE `loan_ap_doc_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_ap_msg`
--
ALTER TABLE `loan_ap_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_disbursal`
--
ALTER TABLE `loan_disbursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_disbursal_file`
--
ALTER TABLE `loan_disbursal_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_disbursal_msg`
--
ALTER TABLE `loan_disbursal_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_regi`
--
ALTER TABLE `user_regi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_feed`
--
ALTER TABLE `bank_feed`
  ADD CONSTRAINT `bf_agent_id` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bf_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `agent_id` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doc`
--
ALTER TABLE `doc`
  ADD CONSTRAINT `docAgent` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docUser` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedbackA` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback_msg`
--
ALTER TABLE `feedback_msg`
  ADD CONSTRAINT `agentIDfbm` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userIDfbm` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `further_doc`
--
ALTER TABLE `further_doc`
  ADD CONSTRAINT `fbAgentid` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fdUserid` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `further_doc_file`
--
ALTER TABLE `further_doc_file`
  ADD CONSTRAINT `FDA` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FDU` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `further_doc_msg`
--
ALTER TABLE `further_doc_msg`
  ADD CONSTRAINT `further_Doc_Msg_User` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `further_Doc_Msg_agent` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_approv_doc`
--
ALTER TABLE `loan_approv_doc`
  ADD CONSTRAINT `loan-aprove-doc-Ag` FOREIGN KEY (`aget_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan-aprove-doc-Us` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_ap_doc_file`
--
ALTER TABLE `loan_ap_doc_file`
  ADD CONSTRAINT `loan_ap_doc_file` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_ap_doc_fileU` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_ap_msg`
--
ALTER TABLE `loan_ap_msg`
  ADD CONSTRAINT `loan_app_smg` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_app_smgU` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_disbursal`
--
ALTER TABLE `loan_disbursal`
  ADD CONSTRAINT `loan_disbursal U` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_disbursalA` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_disbursal_file`
--
ALTER TABLE `loan_disbursal_file`
  ADD CONSTRAINT `loan_disbursal_fileU` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_disbursal_file_A` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `LocationID` FOREIGN KEY (`location_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `MsgAgentId` FOREIGN KEY (`agent_id`) REFERENCES `agent_regis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MsgUserId` FOREIGN KEY (`user_id`) REFERENCES `user_regi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
