-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 03:12 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrsavvy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `c_fname` varchar(50) NOT NULL,
  `c_lname` varchar(50) NOT NULL,
  `c_mobileNo` varchar(22) NOT NULL,
  `c_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `c_fname`, `c_lname`, `c_mobileNo`, `c_email`) VALUES
(4, 'Che Amir Khairi ', 'Che Rosely', '0143009811', 'cheamirkhairi@gmail.com'),
(10, 'Syarafuddin', 'Mohd Sabari', '0164958185', 'syarafuddinsabari@gmail.com'),
(13, 'Mohamad Shukri', 'Saleh', '0145009851', 'shuq29@yahoo.com'),
(22, 'Uzair', 'Daniel', '014456789', 'uzair@gmail.com'),
(23, 'Shariz', 'Zainal', '0122334567', 'shariz@gmail.com'),
(24, 'Nur Soleha', 'Saleh Hudin', '0145344351', 'nursoleha23@gmail.com'),
(25, 'Tony', 'Voon', '0167651945', 'tonyvoon@gmail.com'),
(26, 'Mohd Talmizie', 'Amron', '0123488047', 'talmizie@gmail.com'),
(27, 'Aisyah', 'Iwani', '0167111440', 'aisyahiwani@gmail.com'),
(28, 'Siti Nur Aisyah', 'Saadan', '0122416741', 'sitiaisyah@tganu.uitm.edu'),
(29, 'Saleh Hudin', 'Kasim', '0199835779', 'salehhudin21@yahoo.com'),
(30, 'Rahima ', 'Ahmad', '0199885479', 'srierramurni@gmail.com'),
(31, 'Mohamad Solehin', 'Saleh Hudin', '0179202125', 'msolehin007@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', '123456'),
(2, 'Mohamad Shukri', 'shuq29@yahoo.com', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
