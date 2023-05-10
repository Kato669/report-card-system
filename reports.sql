-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 11:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report-card`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullname`, `username`, `password`) VALUES
(39, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `id` int(11) NOT NULL,
  `className` varchar(100) NOT NULL,
  `classNameNumeric` int(100) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`id`, `className`, `classNameNumeric`, `stream`, `creationDate`) VALUES
(55, 'P.2', 2, 'active', '2023-05-01 21:31:42'),
(56, 'P.3', 3, 'brilliant', '2023-05-01 21:59:52'),
(57, 'P.5', 7, '', '2023-05-02 03:44:48'),
(58, 'P.7', 7, '', '2023-05-02 03:44:59'),
(59, 'Array', 4, 'active', '2023-05-02 07:08:10'),
(60, 'P.5', 5, 'active', '2023-05-03 08:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_combination`
--

CREATE TABLE `tbl_combination` (
  `id` int(11) NOT NULL,
  `ClassId` int(100) NOT NULL,
  `SubjectId` int(100) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_combination`
--

INSERT INTO `tbl_combination` (`id`, `ClassId`, `SubjectId`, `CreationDate`, `status`) VALUES
(39, 56, 33, '2023-05-03 17:18:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mid`
--

CREATE TABLE `tbl_mid` (
  `id` int(11) NOT NULL,
  `class_mid_id` int(100) NOT NULL,
  `Subject_mid_id` int(100) NOT NULL,
  `marks_mid` int(100) NOT NULL,
  `stdnt_mid_id` int(100) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_results`
--

CREATE TABLE `tbl_results` (
  `id` int(11) NOT NULL,
  `ClassId` int(100) NOT NULL,
  `SubjectId` int(100) NOT NULL,
  `marks` int(100) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stdntsId` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `image` varchar(512) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `studentId` int(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(100) NOT NULL,
  `class_id` varchar(100) NOT NULL,
  `sigles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `image`, `student_name`, `studentId`, `gender`, `age`, `class_id`, `sigles`) VALUES
(77, '', 'nandagano sylivia', 2, 'male', '', '55', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `subjectName` varchar(255) NOT NULL,
  `subjectCode` int(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `initials` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `subjectName`, `subjectCode`, `Creationdate`, `initials`) VALUES
(33, 'mathematics', 23, '2023-05-03 08:39:34', 'DD'),
(34, 'science', 34, '2023-05-03 08:39:41', 'SD'),
(35, 'Religious education', 1233, '2023-05-03 17:18:21', 're');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_combination`
--
ALTER TABLE `tbl_combination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mid`
--
ALTER TABLE `tbl_mid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_results`
--
ALTER TABLE `tbl_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_combination`
--
ALTER TABLE `tbl_combination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_mid`
--
ALTER TABLE `tbl_mid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_results`
--
ALTER TABLE `tbl_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
