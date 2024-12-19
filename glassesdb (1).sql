-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 17, 2024 at 12:55 AM
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
-- Database: `glassesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nameCategory` varchar(255) NOT NULL,
  `delCategory` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nameCategory`, `delCategory`) VALUES
(1, 'Kính nam', 0),
(2, 'Kính nữ', 0),
(3, 'Kính trẻ em', 0),
(4, 'Kính mát', 0),
(6, 'Kính người già', 0);

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `nameMethod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`id`, `nameMethod`) VALUES
(1, 'Tiền mặt'),
(2, 'Chuyển khoản');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateOrder` datetime NOT NULL DEFAULT current_timestamp(),
  `totalOrder` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `methodPay` int(11) NOT NULL,
  `voucherId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `dateOrder`, `totalOrder`, `status`, `methodPay`, `voucherId`) VALUES
(10, 2, '2024-12-15 15:43:41', 1050000, 1, 2, NULL),
(11, 5, '2024-12-15 22:35:11', 450000, 2, 1, NULL),
(12, 2, '2024-12-17 06:47:27', 444000, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `quantity`, `total`) VALUES
(8, 10, 3, 2, 4, 600000),
(9, 10, 3, 3, 3, 450000),
(10, 11, 3, 3, 2, 300000),
(11, 11, 3, 5, 1, 150000),
(12, 12, 3, 3, 2, 300000),
(13, 12, 3, 6, 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `codeProduct` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `nameProduct` varchar(255) NOT NULL,
  `mainImage` varchar(1000) NOT NULL,
  `descriptionProduct` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `dateUp` datetime NOT NULL DEFAULT current_timestamp(),
  `delProduct` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `codeProduct`, `material`, `price`, `nameProduct`, `mainImage`, `descriptionProduct`, `category_id`, `dateUp`, `delProduct`) VALUES
(1, 'GK01', 'Titan', 100000, 'Gọng kính venus titan nữ', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/467294422_958522552968132_154330533227878502_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFtcGWWjGRi7bVNylr9-C8bzvvfMPje5XvO-98w-N7le1AnmlW6s4J4pxWMoHYXTCp17GpMIW9hwGAnREvy0O_n&_nc_ohc=gIK7KIFu2lcQ7kNvgH-eV2R&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=AxsndQ3mxFGed_IYNXBIriA&oh=00_AYDotZLxUAI4TVoJktxgO49Ar2D-CNx--f-Hwk8eESt-fQ&oe=6761FF52', 'Gọng kính rất đẹp', 2, '2024-12-15 07:48:28', 0),
(2, 'GK02', 'Titan', 200000, 'Gọng kính venus đa giác đẹp cho nữ', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/467238224_958522526301468_7655995823505740230_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFVWmBZ0aK-PG03Kd2389agaDAsJVhr57hoMCwlWGvnuMwm8xhnToFPqZ3xxeqIQYNOVIholzjd3dBWjzrMCQ9l&_nc_ohc=CpQVtGUNL8AQ7kNvgFc-4sB&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=A77FXB3aQk_gPXpwu9Nb-Go&oh=00_AYBSmYv3dOGXIPXTiCXZhR07ZLckCKt1P2i4ymIIQkx_Ng&oe=676226FA', 'Gọng kính rất hợp với bạn mặt to', 2, '2024-12-15 07:48:28', 0),
(3, 'GK08', 'Nhựa acrylic', 150000, 'Kính đen thời trang cho nam', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/451421048_874280278059027_7324291419832865777_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEBHH--a5m3qJk8d55LzufcsdZ4V5u9Seyx1nhXm71J7CSz0fpiaCF4QrI0b7qbdeKz8l37FdIg94Yuwhj7tGJs&_nc_ohc=VTOEVvAgBogQ7kNvgFZ5Iu6&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=Ayr0B6P730ljr2smAflyZ2q&oh=00_AYCG4Utd28jOn09BTILcQ58gsgbbgiH8TCwfKdzw5Z6g0A&oe=67621A66', 'Gọng kính rất ngầu', 1, '2024-12-15 07:48:28', 0),
(4, 'GK09', 'Nhựa dẻo', 160000, 'Kính màu rêu thời trang cho nam', 'https://scontent.fhan7-1.fna.fbcdn.net/v/t39.30808-6/451580609_874280261392362_160892067147919534_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEs8kFCGuMbi33MAUoreCmFq7teD0o5lOyru14PSjmU7A_vCpXf3dDhR8nV1y_7xhhwPenNZlZJHOUqGqATK1Np&_nc_ohc=jt7fFIW33MsQ7kNvgGjB3Gv&_nc_zt=23&_nc_ht=scontent.fhan7-1.fna&_nc_gid=AsgP01O9DICWDsOKwI_DvZL&oh=00_AYBIN9ZvQg4n4gnXYH-av7v608QpR6m727LwqzPN1OrZoQ&oe=67621AE3\r\n', 'Gọng kính rất đẹp', 1, '2024-12-15 07:48:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `nameColor` varchar(255) NOT NULL,
  `codeColor` varchar(255) NOT NULL,
  `delColor` tinyint(4) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `nameColor`, `codeColor`, `delColor`, `product_id`, `quantity`) VALUES
(3, 'Màu xám', '#808080', 0, 3, 10),
(5, 'Màu đen', '#000000', 0, 3, 49),
(6, 'Màu nâu', '#abc', 0, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `linkImage` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `linkImage`, `product_id`) VALUES
(1, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcS3f9XPGmV1oI58RaC2-pqwc8N7LbwiLpZXX-oUTD6IJJKow6QXmCUs67mu7FewLxHaJqRGDu8WyZukTVm3cE8E5fgMJa0slTlVNV1nfQyOBDWmZG6etKNG&usqp=CAE', 3),
(3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6pKxoA-61-_Z-fm8inL9QAT8J9OBlrlyhGQ&s', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nameRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nameRole`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0wfnvSXk3hq0XTCqVIwSVRvJVSNbzPeMiGM5oPOD', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNzJjNW1Oc2RNVXlOeDVVWVNnQk1Ja0xUN3JGQW5XZ0plT01acnVLcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1734393301);

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `id` int(11) NOT NULL,
  `nameStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`id`, `nameStatus`) VALUES
(1, 'Đang chờ duyệt'),
(2, 'Đã duyệt'),
(3, 'Đang vận chuyển'),
(4, 'Đã vận chuyển');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `delUser` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `phone`, `role_id`, `delUser`) VALUES
(2, 'Nguyễn  Vũ Đại Nam', 'nguyenvudaianm113@gmail.com', NULL, '$2y$12$6mNmjMF0jTke2.i2WcPvCugiFqiJhR4qXD80XKEBA8ngQjTHsvwE2', NULL, '2024-12-14 20:44:44', '2024-12-14 20:44:44', 'Bình Thạnh', '0365245602', 3, 0),
(3, 'Nguyễn Ngọc Thạch', 'thachnnps32314@fpt.edu.vn', NULL, '$2y$12$NzGorpBaSSOPVFFBI7mUTOreNLVSXJXcd3DkCT98p0QmM1082IWg.', NULL, '2024-12-15 02:25:03', '2024-12-15 02:25:03', 'Hà Nội', '0365245603', 2, 0),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$12$0s.5yPfGYwzQ3TxnGmN8o.74B7RPP9BWLJk14VzQDdb6K.1XFIj.u', NULL, '2024-12-15 02:32:23', '2024-12-15 02:32:23', 'Hà Nội', '0365245602', 1, 0),
(5, 'Kiều Trang', 'trang@gmail.com', NULL, '$2y$12$mFGRj5o1DM7Egw80RCVcxOnSBb7zWMFFKL9JtLfQLLZkZYfT7pwem', NULL, '2024-12-15 08:31:36', '2024-12-15 08:31:36', 'Hà Nội', '0365245602', 3, 0),
(6, 'Lê Trung Hiếu', 'hieu@gmail.com', NULL, '$2y$12$0azhM2Hjl42vL1bd.R5NIetOg9ojqQQ76HozlTVmZaTY58RauA/QW', NULL, '2024-12-16 16:18:05', '2024-12-16 16:18:05', 'Cộng Hòa', '0365245602', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `nameVoucher` varchar(255) NOT NULL,
  `discount` float NOT NULL,
  `delVoucher` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `nameVoucher`, `discount`, `delVoucher`) VALUES
(1, 'AbcDE12#', 600000, 0),
(2, 'AFcGE12#', 15000, 0),
(3, 'AbcJKE12#', 6000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_cart` (`user_id`),
  ADD KEY `fk_product_cart` (`product_id`),
  ADD KEY `fk_color_cart` (`color_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_order` (`user_id`),
  ADD KEY `fk_method_order` (`methodPay`),
  ADD KEY `fk_status_order` (`status`),
  ADD KEY `fk_voucher_order` (`voucherId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id_details` (`order_id`),
  ADD KEY `fk_product_detail` (`product_id`) USING BTREE,
  ADD KEY `fk_color_detail` (`color_id`) USING BTREE;

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id_product` (`category_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id_color` (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id_image` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_role_user` (`role_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_color_cart` FOREIGN KEY (`color_id`) REFERENCES `product_color` (`id`),
  ADD CONSTRAINT `fk_product_cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_method_order` FOREIGN KEY (`methodPay`) REFERENCES `method` (`id`),
  ADD CONSTRAINT `fk_status_order` FOREIGN KEY (`status`) REFERENCES `status_order` (`id`),
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_voucher_order` FOREIGN KEY (`voucherId`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id_details` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id_product` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `fk_product_id_color` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_id_image` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
