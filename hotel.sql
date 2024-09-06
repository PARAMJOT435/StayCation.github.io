-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 08:13 AM
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
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `fname` varchar(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `pdetails` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(10) NOT NULL,
  `hpic` text NOT NULL,
  `hid` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `mdetails` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`fname`, `contact`, `address`, `hname`, `price`, `pdetails`, `city`, `state`, `zip`, `hpic`, `hid`, `link`, `mdetails`) VALUES
('Param', 9780944918, '19R Homeland', 'Villa 5 Bhk', 3000, 'Villa with parking space', 'Ludhiana', 'Punjab', 141003, 'uploads/hotel.jpg', 1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Rajkumar', 7895161325, 'Basant Vatika 234L', 'Farmhouse', 3000, 'With swimming pool', 'Ludhiana', 'Punjab', 141003, 'uploads/c27850713b21fc3deb668a1973f6ccec.jpg', 2, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Avi', 9780944918, '1234 main st', 'Apartment', 1500, '3 bhk House', 'Ludhiana', 'Punjab', 141003, 'uploads/bb65e1a0d28a3ac69a74e250fdcd0177.jpg', 3, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Raman', 9478545698, '#2469 ', 'Mirage Home', 2000, 'Within the nature', 'Ludhiana', 'Punjab', 141003, 'uploads/0e77aa9d63ae6484f368d8a6238740a2.jpg', 4, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Ravi', 7888755578, '97R Green Avenue', 'Peak Luxury Home', 5700, '3 Bhk With Garden', 'Ludhiana', 'Punjab', 141003, 'uploads/167f651f61ae111049d0a824ceb5a902.jpg', 5, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Pritam', 7009504715, '123 janakpuri', 'Hotel Leela', 8000, '1bhk Suite', 'Delhi', 'Delhi', 500160, 'uploads/7d8c536fd675e3d5234c0a90ba0c9e64.jpg', 6, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Bansari', 7009504712, 'Green street West Delhi', 'Hotel Bansari', 1700, 'Room With Balcony', 'Delhi', 'Delhi', 500250, 'uploads/1.jpg', 7, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Oberoi Darshan', 7000050003, 'South Delhi', 'The Oberoi', 6000, '1 Bhk Suite', 'Delhi', 'Punjab', 500125, 'uploads/3.jpg', 8, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54780.75792682526!2d75.77146834863278!3d30.89232900000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a83ac9b5502e1%3A0xaafaff64d33c6778!2z4Kiw4KmA4Kic4KmI4KiC4Kif4Ki-IOCouOCpiOCoguCon-CpjeCosOCosiDgqJXgqLLgqL7gqLjgqL_gqJU!5e0!3m2!1spa!2sin!4v1720273902012!5m2!1spa!2sin', '1 Bedroom With attached bathroom'),
('Rohit', 7888799445, 'Main Street 200 ft road ', 'Keys Hotel', 2000, '1 Bedroom With attached bathroom W/O Breakfast', 'Ludhiana', 'Punjab', 141003, 'uploads/keys.jpg', 9, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.46662176507!2d75.80356607558585!3d30.873604974516685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a82154081028b%3A0xaeb833d50151a1bb!2z4KiV4KmA4Ki4IOCouOCosuCpiOColeConyDgqLLgqYHgqKfgqL_gqIbgqKPgqL4gLSDgqKzgqYAg4Kiy4KmH4Kiu4KioIOCon-CosOCpgCDgqLngqYvgqJ_gqLI!5e0!3m2!1spa!2sin!4v1720276688656!5m2!1spa!2sin', '1 Bedroom With attached bathroom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
