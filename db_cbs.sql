-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 09:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `password_reset_id` int(11) NOT NULL,
  `password_reset_user_id` varchar(15) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `password_reset_status` int(11) NOT NULL DEFAULT 1,
  `password_reset_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`password_reset_id`, `password_reset_user_id`, `password_reset_token`, `password_reset_status`, `password_reset_created_at`) VALUES
(23, '031215031215', '9da403d202cdd3198936f185438b4915', 1, '2024-01-24 19:48:10'),
(24, '031215031215', 'c921631bb9bd366e4ff6dc61787b570e', 1, '2024-01-24 19:48:11'),
(25, '031215031215', '7c1dc7d696e24a4f1a8593a511f38140', 1, '2024-01-26 09:34:51'),
(26, '030303121215', 'f9123b0b7866216c0d3b559402e5bc90', 1, '2024-01-26 09:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `b_id` int(10) NOT NULL,
  `b_ic` varchar(15) NOT NULL,
  `b_req` varchar(10) NOT NULL,
  `b_pdate` date NOT NULL,
  `b_rdate` date NOT NULL,
  `b_total` float NOT NULL,
  `b_status` int(2) NOT NULL,
  `b_cond` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`b_id`, `b_ic`, `b_req`, `b_pdate`, `b_rdate`, `b_total`, `b_status`, `b_cond`) VALUES
(151, '030303121215', 'JCR1045', '2024-02-04', '2024-02-06', 300, 1, 'Active'),
(152, '030303121215', 'JCR1024', '2024-01-28', '2024-01-30', 68, 1, 'Active'),
(153, '030303121215', 'KDH456', '2024-01-26', '2024-01-28', 400, 1, 'Active'),
(154, '031215151515', 'JCR1024', '2024-01-25', '2024-01-26', 34, 1, 'Active'),
(155, '031215151515', 'KDH456', '2024-01-26', '2024-01-28', 400, 1, 'Cancelled'),
(156, '031215151515', 'KDQ2304', '2024-01-28', '2024-01-31', 1050, 1, 'Active'),
(157, '031215151515', 'JCR1049', '2024-01-28', '2024-01-30', 3000, 1, 'Active'),
(158, '121212121212', 'JCR1024', '2024-01-27', '2024-02-03', 238, 1, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `s_id` int(2) NOT NULL,
  `s_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`s_id`, `s_desc`) VALUES
(1, 'Received'),
(2, 'Approved'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `t_id` int(2) NOT NULL,
  `t_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`t_id`, `t_desc`) VALUES
(1, 'Staff'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_ic` varchar(15) NOT NULL,
  `u_pwd` varchar(255) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_phone` varchar(20) NOT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_add` varchar(200) NOT NULL,
  `u_lic` varchar(20) NOT NULL,
  `u_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_ic`, `u_pwd`, `u_name`, `u_phone`, `u_email`, `u_add`, `u_lic`, `u_type`) VALUES
('030303121215', '$2y$10$5tQlsOlA8OvyOnn3I.oBwOSOcLzdFo5/xPEEw0eRtXVDaWhKyrhzy', 'Farah Adibah', '0174290123', 'diebah.work111@gmail.com', '-', '2222', 2),
('031215031215', '$2y$10$I6UnoWuwwHCMyd3R0GbIg.MLcTFBVMUf.H3lgdvMubbzgIt/vJLE2', 'Adibah', '0174290127', 'nurfarahadibah@graduate.utm.my', 'Kampung Dato Syed Ahmad\r\n', '88787878', 1),
('031215151515', '$2y$10$345MkZoOHcSOZ3JSXTGQ/OIL5rMnDsuea.TpwKTSaXWPY6TVW5aG6', 'Aiman Tino', '0174290145', 'aiman@gmail.com', 'Taman Ria, Sungai Petani, Kedah', '2222', 2),
('121212121212', '$2y$10$1B0Eg7OZfbeuApCHJtsRluj9eN9wKgBvpugSPUeO7/3qMPauH5EB6', 'Aleysha', '0174290124', '22@graduate.utm.my', '-', '2222', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_vehicle`
--

CREATE TABLE `tb_vehicle` (
  `v_req` varchar(10) NOT NULL,
  `v_model` varchar(50) NOT NULL,
  `v_type` varchar(20) NOT NULL,
  `v_colour` varchar(20) DEFAULT NULL,
  `v_price` float NOT NULL,
  `v_cond` varchar(200) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_vehicle`
--

INSERT INTO `tb_vehicle` (`v_req`, `v_model`, `v_type`, `v_colour`, `v_price`, `v_cond`) VALUES
('JCR1024', 'Honda H', 'Hatchback', 'silver', 34, 'Active'),
('JCR1045', 'Honda S', 'Sedan', 'Red', 150, 'Active'),
('JCR1049', 'Honda C', 'Crossover', 'silver', 1500, 'Active'),
('JVV333', 'Proton X90', 'SUV', 'Blue', 250, 'Inactive'),
('KAD2304', 'Honda H', 'Hatchback', 'silver', 200, 'Inactive'),
('KAD2308', 'Honda H', 'Hatchback', 'silver', 200, 'Active'),
('KDH456', 'Toyota Vios', 'Sedan', 'Blue', 200, 'Active'),
('KDQ2304', 'Mitsubishi', 'MPV', 'Yellow', 350, 'Active'),
('WAM1245', 'Perodua Myvi', 'Hatchback', 'Maroon', 100, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`password_reset_id`),
  ADD KEY `password_reset_user_id` (`password_reset_user_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `b_ic` (`b_ic`),
  ADD KEY `b_req` (`b_req`),
  ADD KEY `b_status` (`b_status`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_ic`),
  ADD KEY `u_type` (`u_type`);

--
-- Indexes for table `tb_vehicle`
--
ALTER TABLE `tb_vehicle`
  ADD PRIMARY KEY (`v_req`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `password_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`password_reset_user_id`) REFERENCES `tb_user` (`u_ic`);

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`b_ic`) REFERENCES `tb_user` (`u_ic`),
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`b_status`) REFERENCES `tb_status` (`s_id`),
  ADD CONSTRAINT `tb_booking_ibfk_3` FOREIGN KEY (`b_req`) REFERENCES `tb_vehicle` (`v_req`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`u_type`) REFERENCES `tb_type` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
