-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2021 at 08:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`courier_id`, `courier_name`, `courier_fee`, `created_at`, `updated_at`) VALUES
(1, 'Express', 10000, NULL, NULL),
(2, 'Cargo', 11000, NULL, NULL);

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_date`, `kepada`, `sales_name`, `courier_name`, `alamat_kirim`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, '2021-05-01', 'PT. Cahaya Agung', 'Bambang', 'Cargo', 'Jln. Banda', 'Cash', NULL, NULL),
(2, '2021-05-11', 'PT. Sinar Mentari', '', '', '', '', NULL, NULL);

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `buy_qty`, `sub_total`, `courier_fee`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 770000, 2530000, 3300000, NULL, NULL),
(2, 2, 1, 0, 0, 0, NULL, NULL);

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `invoice_id`, `product_name`, `weight`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kacang', 10, 100, 35000, NULL, NULL),
(2, 1, 'Kelapa', 10, 10, 20000, NULL, NULL),
(3, 1, 'Tepung Terigu', 3, 100, 22000, NULL, NULL),
(4, 2, 'Jeruk', 10, 10, 23000, NULL, NULL);

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_name`, `created_at`, `updated_at`) VALUES
(1, 'Bambang', NULL, NULL),
(2, 'Jajang', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
