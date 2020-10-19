-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 22, 2019 lúc 05:08 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `update_at`) VALUES
(2, 'Lục Thanh Lâm', 'nha A10 p198', 'lucthanhlam1997@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0389444395', 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT '0',
  `home` tinyint(4) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Áo Khoác', 'ao-khoac', NULL, '0', 1, 1, '2019-09-22 10:00:53', '2019-09-22 10:06:09'),
(14, 'Áo Vest Nam', 'ao-vest-nam', NULL, '0', 1, 1, '2019-09-22 10:15:07', '2019-09-22 10:16:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT 0,
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `head` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `hot`, `created_at`, `update_at`) VALUES
(13, 'ÁO HOODIE ATB099011RD', 'ao-hoodie-atb099011rd', 225000, 0, 'h2 (2).jpg', 13, 'ÁO HOODIE ATB099011RD', 100, 0, 0, 0, '2019-09-22 10:02:26', '2019-09-22 10:02:26'),
(14, 'ÁO HOODIE ATB099011BU', 'ao-hoodie-atb099011bu', 225000, 0, 'h3 (2).jpg', 13, 'ÁO HOODIE ATB099011BU', 100, 0, 0, 0, '2019-09-22 10:03:46', '2019-09-22 10:03:46'),
(15, 'ÁO HOODIE ATB099011YL', 'ao-hoodie-atb099011yl', 225000, 0, 'ao-hoodie-phoi-line-totoshop (2).jpg', 13, 'ÁO HOODIE ATB099011YL', 50, 0, 0, 0, '2019-09-22 10:05:05', '2019-09-22 10:05:05'),
(16, 'ÁO HOODIE ATB099011NV', 'ao-hoodie-atb099011nv', 225000, 0, 'h4 (2).jpg', 13, 'ÁO HOODIE ATB099011NV', 10, 0, 0, 0, '2019-09-22 10:06:05', '2019-09-22 10:06:05'),
(17, 'ÁO VEST NAZAFU MÀU XÁM DA BÒ AV1138', 'ao-vest-nazafu-mau-xam-da-bo-av1138', 1350000, 20, '1508322964_aovestvangdongdep.jpg', 14, 'Suit - dòng sản phẩm cao cấp của 4MEN tôn vinh vẻ lịch lãm, sang trọng và đẳng cấp phái mạnh.\r\nChất liệu: 83% Cotton, 17% PE\r\nBảo quản Suit đúng cách:\r\n- Tuyệt đối không dùng máy giặt hoặc vò mạnh tay khiến vest dễ bị nhàu và mất dáng.\r\n- Không dùng bàn chải lông cứng để chà gây xước hoặc phai màu\r\n- Không nên dùng nước nóng quá 70C để giặt, xả, ngâm\r\n- Nên sử dụng những loại bàn là chuyên dụng cho suit.', 10, 0, 0, 0, '2019-09-22 10:16:31', '2019-09-22 10:16:31'),
(18, 'ÁO VEST NAZAFU MÀU XÁM AV1138', 'ao-vest-nazafu-mau-xam-av1138', 1350000, 10, '1508326119_aovestnamdenbodydep.jpg', 14, 'Suit - dòng sản phẩm cao cấp của 4MEN tôn vinh vẻ lịch lãm, sang trọng và đẳng cấp phái mạnh.\r\nChất liệu: 83% Cotton, 17% PE\r\nBảo quản Suit đúng cách:\r\n- Tuyệt đối không dùng máy giặt hoặc vò mạnh tay khiến vest dễ bị nhàu và mất dáng.\r\n- Không dùng bàn chải lông cứng để chà gây xước hoặc phai màu\r\n- Không nên dùng nước nóng quá 70C để giặt, xả, ngâm\r\n- Nên sử dụng những loại bàn là chuyên dụng cho suit.', 10, 0, 0, 0, '2019-09-22 10:17:54', '2019-09-22 10:17:54'),
(19, 'ÁO VEST NAZAFU MÀU XÁM AV1139', 'ao-vest-nazafu-mau-xam-av1139', 1350000, 0, '1517731244_aovestghixam.jpg', 14, 'Suit - dòng sản phẩm cao cấp của 4MEN tôn vinh vẻ lịch lãm, sang trọng và đẳng cấp phái mạnh.\r\nChất liệu: 83% Cotton, 17% PE\r\nBảo quản Suit đúng cách:\r\n- Tuyệt đối không dùng máy giặt hoặc vò mạnh tay khiến vest dễ bị nhàu và mất dáng.\r\n- Không dùng bàn chải lông cứng để chà gây xước hoặc phai màu\r\n- Không nên dùng nước nóng quá 70C để giặt, xả, ngâm\r\n- Nên sử dụng những loại bàn là chuyên dụng cho suit.', 10, 0, 0, 0, '2019-09-22 10:18:48', '2019-09-22 10:18:48'),
(20, 'ÁO VEST NAZAFU MÀU XANH BÍCH AV1139', 'ao-vest-nazafu-mau-xanh-bich-av1139', 1350000, 5, '1510233548_anhchinaovestchambixanh.thoitrangnamhanoi.jpg', 14, 'Suit - dòng sản phẩm cao cấp của 4MEN tôn vinh vẻ lịch lãm, sang trọng và đẳng cấp phái mạnh.\r\nChất liệu: 83% Cotton, 17% PE\r\nBảo quản Suit đúng cách:\r\n- Tuyệt đối không dùng máy giặt hoặc vò mạnh tay khiến vest dễ bị nhàu và mất dáng.\r\n- Không dùng bàn chải lông cứng để chà gây xước hoặc phai màu\r\n- Không nên dùng nước nóng quá 70C để giặt, xả, ngâm\r\n- Nên sử dụng những loại bàn là chuyên dụng cho suit.', 20, 0, 0, 0, '2019-09-22 10:19:30', '2019-09-22 10:19:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` tinyint(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `update_at`) VALUES
(8, 'Lục Thanh Lâm', 'lucthanhlam1997@gmail.com', '0389444395', 'nha A10 p198', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
