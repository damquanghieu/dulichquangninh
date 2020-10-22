-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2020 lúc 10:21 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl_ad`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(265) COLLATE utf8_unicode_ci NOT NULL,
  `action` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `action`, `created_at`, `updated_at`) VALUES
(71, 'Địa Điểm', 1, '2020-02-28 16:45:37', '2020-02-28 17:31:10'),
(72, 'Ăn gì', 1, '2020-02-28 16:45:46', '2020-02-28 16:45:46'),
(73, 'Ở đâu', 1, '2020-02-28 16:45:55', '2020-02-28 16:45:55'),
(74, 'Xe đi', 1, '2020-02-28 16:46:01', '2020-02-28 16:46:01'),
(77, 'Tour Hot', 1, '2020-03-01 11:55:21', '2020-03-01 11:55:21'),
(78, 'Top 5', 1, '2020-03-03 18:25:56', '2020-03-08 14:49:55'),
(80, 'Kinh Ngiệm', 1, '2020-03-08 14:50:09', '2020-03-08 14:50:09'),
(83, 'Nổi Bật', 1, '2020-03-09 19:14:48', '2020-03-09 19:14:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2020_05_27_163646_create_roles_table', 1),
(4, '2020_05_27_163828_create_user_role_table', 1),
(14, '2020_05_27_170805_create_permissions_table', 2),
(16, '2020_05_27_170857_create_table_permission_role_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keyword` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `keyword`, `created_at`, `updated_at`) VALUES
(1, 'category', 'Danh mục', 0, 'category', NULL, NULL),
(2, 'viewcategory', 'xem danh mục', 1, 'view_category', NULL, NULL),
(3, 'addcategory', 'thêm danh mục', 1, 'add_category', NULL, NULL),
(4, 'editcategory', 'Sửa danh mục', 1, 'edit_category', NULL, NULL),
(5, 'deletecategory', 'Xóa danh mục', 1, 'delete_category', NULL, NULL),
(6, 'posts', 'Bài viết', 0, 'posts', NULL, NULL),
(7, 'viewposts', 'xem bài viết', 6, 'view_posts', NULL, NULL),
(8, 'addposts', 'thêm bài viết', 6, 'add_posts', NULL, NULL),
(9, 'editposts', 'sửa bài viết', 6, 'edit_posts', NULL, NULL),
(10, 'deleteposts', 'xóa bài viết', 6, 'delete_posts', NULL, NULL),
(11, 'slide', 'Slide', 0, 'slide', NULL, NULL),
(12, 'user', 'Tài khoản', 0, 'user', NULL, NULL),
(13, 'role', 'Vai trò', 0, 'role', NULL, NULL),
(14, 'viewslide', 'Xem slide', 11, 'view_slide', NULL, NULL),
(15, 'addslide', 'Thêm slide', 11, 'add_slide', NULL, NULL),
(16, 'editslide', 'Sửa slide', 11, 'edit_slide', NULL, NULL),
(17, 'deleteslide', 'Xóa slide', 11, 'delete_slide', NULL, NULL),
(18, 'viewuser', 'Xem tài khoản', 12, 'view_user', NULL, NULL),
(19, 'adduser', 'Thêm tài khoản', 12, 'add_user', NULL, NULL),
(20, 'edituser', 'Sửa tài khoản', 12, 'edit_user', NULL, NULL),
(21, 'deleteuser', 'Xóa tài khoản', 12, 'delete_user', NULL, NULL),
(22, 'viewrole', 'Xem vai trò', 13, 'view_role', NULL, NULL),
(23, 'addrole', 'Thêm vai trò', 13, 'add_role', NULL, NULL),
(24, 'editrole', 'Sửa vai trò', 13, 'edit_role', NULL, NULL),
(25, 'deleterole', 'Xóa vai trò', 13, 'delete_role', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(48, 2, 2, NULL, NULL),
(49, 2, 3, NULL, NULL),
(50, 2, 4, NULL, NULL),
(51, 2, 5, NULL, NULL),
(52, 3, 7, NULL, NULL),
(53, 3, 8, NULL, NULL),
(54, 3, 9, NULL, NULL),
(55, 3, 10, NULL, NULL),
(68, 14, 2, NULL, NULL),
(69, 14, 3, NULL, NULL),
(70, 14, 4, NULL, NULL),
(71, 14, 5, NULL, NULL),
(72, 14, 7, NULL, NULL),
(73, 14, 8, NULL, NULL),
(74, 14, 9, NULL, NULL),
(75, 14, 10, NULL, NULL),
(76, 14, 14, NULL, NULL),
(77, 14, 15, NULL, NULL),
(78, 14, 16, NULL, NULL),
(79, 14, 17, NULL, NULL),
(80, 14, 18, NULL, NULL),
(81, 14, 19, NULL, NULL),
(82, 14, 20, NULL, NULL),
(83, 14, 21, NULL, NULL),
(84, 14, 22, NULL, NULL),
(85, 14, 23, NULL, NULL),
(86, 14, 24, NULL, NULL),
(87, 14, 25, NULL, NULL),
(88, 15, 2, NULL, NULL),
(89, 15, 7, NULL, NULL),
(90, 15, 14, NULL, NULL),
(91, 15, 22, NULL, NULL),
(92, 16, 2, NULL, NULL),
(93, 16, 3, NULL, NULL),
(94, 16, 4, NULL, NULL),
(95, 16, 5, NULL, NULL),
(96, 16, 7, NULL, NULL),
(97, 16, 8, NULL, NULL),
(98, 16, 9, NULL, NULL),
(99, 16, 10, NULL, NULL),
(100, 16, 14, NULL, NULL),
(101, 16, 15, NULL, NULL),
(102, 16, 16, NULL, NULL),
(103, 16, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `address`, `image`, `content`, `category_id`, `created_at`, `updated_at`) VALUES
(30, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng NinhDu lịch Hạ Long Quảng NinhDu lịch Hạ Long Quảng Ninh', 'COzYl_noibat.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 71, '2020-03-09 19:23:16', '2020-03-12 10:11:34'),
(31, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'XowSH_noibat.jpg', '<p>Du lịch Hạ Long Quảng Ninh&nbsp;Du lịch Hạ Long Quảng Ninh&nbsp;Du lịch Hạ Long Quảng Ninh&nbsp;Du lịch Hạ Long Quảng NinhDu lịch Hạ Long Quảng Ninh&nbsp;Du lịch Hạ Long Quảng Ninh</p>', 83, '2020-03-09 19:23:34', '2020-03-11 10:21:52'),
(32, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'SfEtv_noibat1.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 83, '2020-03-09 19:23:47', '2020-03-09 19:23:47'),
(33, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', '9XBg6_noibat3.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 83, '2020-03-09 19:32:42', '2020-03-09 19:32:42'),
(34, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', '8W7B2_noibat4.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 83, '2020-03-09 19:32:55', '2020-03-09 19:32:55'),
(35, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'ZZki8_noibat5.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 83, '2020-03-09 19:33:05', '2020-03-09 19:33:05'),
(36, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', '4wOGd_noibat6.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 83, '2020-03-09 19:33:19', '2020-03-09 19:33:19'),
(37, 'Tour Hà Giang 3N4D: Chạy Xe Máy Khám Phá Đồng Văn - Mèo Vạc', 'Tour Hà Giang 3N4D: Chạy Xe Máy Khám Phá Đồng Văn - Mèo Vạc', 'QAmZU_review1.jpg', '<p>Tour Hà Giang 3N4D: Chạy Xe Máy Khám Phá Đồng Văn - Mèo Vạc</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -44px; top: -6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 80, '2020-03-09 19:37:41', '2020-03-09 19:43:24'),
(38, 'Tour SaPa 3N4D: Trekking Bạch Mộc Lương Tử - Kỳ Quan San', 'Tour SaPa 3N4D: Trekking Bạch Mộc Lương Tử - Kỳ Quan San', 'zm4JP_review2.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 80, '2020-03-09 19:38:06', '2020-03-09 19:46:20'),
(39, 'Tour Phuket 4N3D: Phố Cổ Phuket - Đảo Phi Phi', 'Tour Phuket 4N3D: Phố Cổ Phuket - Đảo Phi Phi', 'pZcZW_review3.jpg', '<p><span style=\"color:rgb(34, 34, 34); font-family:consolas,lucida console,courier new,monospace; font-size:12px\">Tour Phuket 4N3D: Phố Cổ Phuket - Đảo Phi Phi</span></p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -9px; top: 38px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 80, '2020-03-09 19:38:18', '2020-03-09 19:46:58'),
(40, 'Tour Singapore 3N2D: Vườn Chim Jurong - Garden By The Bay - Sentosa', 'Tour Singapore 3N2D: Vườn Chim Jurong - Garden By The Bay - Sentosa', 'UDrKX_review5.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -83px; top: -6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 80, '2020-03-09 19:38:27', '2020-03-09 19:47:30'),
(41, 'Tour Indonesia 4N3D: Khám Phá Thiên Đường Bali (TN)', 'Tour Indonesia 4N3D: Khám Phá Thiên Đường Bali (TN)', 'JR4H0_review6.jpg', '<p><span style=\"color:rgb(34, 34, 34); font-family:consolas,lucida console,courier new,monospace; font-size:12px\">Tour Indonesia 4N3D: Khám Phá Thiên Đường Bali (TN)</span></p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -1px; top: 38px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 80, '2020-03-09 19:38:38', '2020-03-09 19:48:50'),
(42, 'Sam Quảng Yên', 'Du lịch Hạ Long Quảng Ninh', 'scK3f_samqy.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 80, '2020-03-11 10:17:09', '2020-03-11 10:17:09'),
(43, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'un6et_chua-cai-bau.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 80, '2020-03-11 10:17:24', '2020-03-11 10:17:24'),
(44, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'i1gvX_coto.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 83, '2020-03-11 10:18:41', '2020-03-11 10:18:41'),
(45, 'Điểm Đến', 'Top 5 điểm đến không thể bỏ qua', 'K2Xeh_top5dd.jpg', '<p>Top 5 điểm đến kh&ocirc;ng thể bỏ qua</p>\r\n\r\n<p><strong>1. Sun World Hạ Long Park</strong><br />\r\nKhu phức hợp&nbsp;<a href=\"https://www.dulichhalong.net/diem-du-lich/khu-vui-choi-giai-tri-sun-world-ha-long-park/\">Sun World Hạ Long Park</a>&nbsp;l&agrave; tổ hợp vui chơi giải tr&iacute; kh&eacute;p k&iacute;n h&agrave;ng đầu Việt Nam, đến đ&acirc;y qu&yacute; kh&aacute;ch như được lạc v&agrave;o một thế giới c&aacute;c tr&ograve; chơi giải tr&iacute; d&agrave;nh cho mọi lứa tuổi trong đ&oacute; c&oacute; rất nhiều tr&ograve; chơi cảm gi&aacute;c mạnh mới lạ, hấp dẫn chưa từng c&oacute; ở Việt Nam v&agrave; đ&atilde; được kiểm tra rất chặt chẽ về đồ an to&agrave;n như: Phi Long thần tốc, Theo Dấu Ch&acirc;n Rồng, T&ecirc; Gi&aacute;c Cuồng Nộ, T&agrave;u Hải Tặc&hellip; B&ecirc;n cạnh đ&oacute; c&ograve;n c&oacute; một số tr&ograve; chơi d&agrave;nh cho những du kh&aacute;ch th&iacute;ch sự nhẹ nh&agrave;ng nhưng kh&ocirc;ng k&eacute;m phần phi&ecirc;u lưu &ndash; mới lạ như: Chiếc &Ocirc; Kỳ Diệu, Du Thuyền Nhiệt Đới, Đu Quay Diệu Kỳ &hellip;.. B&ecirc;n cạnh đ&oacute; để đ&aacute;p ứng cho những du kh&aacute;ch c&oacute; sở th&iacute;ch với những tr&ograve; chơi vận động dưới nước th&igrave; qu&yacute; kh&aacute;ch c&oacute; thể tham gia v&agrave;o ph&acirc;n khu Typhon Water Park với những tr&ograve; chơi nổi bật như: Biển s&oacute;ng Thần, Cơn B&atilde;o Nhiệt Đới, Đảo Quốc Kỳ Diệu, Tia Chớp Khổng Lồ, Thử th&aacute;ch m&atilde;ng x&agrave;&hellip;. C&ograve;n nơi n&agrave;o tuyệt vời hơn khu tổ hợp Sun World Hạ Long Park khi m&agrave; bạn chỉ cần chọn một điểm đến m&agrave; vừa bạn c&oacute; thể vừa thử sức l&ograve;ng dũng cảm của m&igrave;nh với hệ thống c&aacute;c tr&ograve; chơi cảm gi&aacute;c mạnh t&iacute;nh giải tr&iacute; cao v&agrave; vừa l&agrave;m thỏa m&atilde;n cơn kh&aacute;t v&agrave; kh&ocirc;ng kh&iacute; oi bức của m&ugrave;a h&egrave; khi đắm m&igrave;nh v&agrave;o c&ocirc;ng vi&ecirc;n nước lớn v&agrave; độc đ&aacute;o với bể bơi tạo s&oacute;ng lớn nhất Miền Bắc.</p>\r\n\r\n<p><a href=\"https://www.dulichhalong.net/wp-content/uploads/2018/12/Sun-World-Halong-Park.jpg\"><img alt=\"Sun World Halong Park\" src=\"https://www.dulichhalong.net/wp-content/uploads/2018/12/Sun-World-Halong-Park.jpg\" style=\"height:483px; width:750px\" /></a><br />\r\nKhu vui chơi giải tr&iacute; Sun World Hạ Long Park (Nguồn ảnh Internet)</p>\r\n\r\n<p><strong>2. Đảo Tuần Ch&acirc;u</strong><br />\r\nKhu Vui chơi giải tr&iacute; ở&nbsp;<a href=\"https://www.dulichhalong.net/diem-du-lich/dao-tuan-chau-vinh-ha-long/\">Tuần Ch&acirc;u</a>&nbsp;hiện đ&atilde; h&igrave;nh th&agrave;nh với trung t&acirc;m biểu diễn nghệ thuật nhạc nước l&agrave; sự kết hợp giữa nước, &acirc;m nhạc v&agrave; &aacute;nh s&aacute;ng tạo l&ecirc;n một t&aacute;c phẩm nghệ thuật đầy s&aacute;ng tạo. B&ecirc;n cạnh đ&oacute; qu&yacute; kh&aacute;ch c&oacute; thể tham gia chương tr&igrave;nh biểu diễn dưới nước với những m&agrave;n nh&agrave;o lộn đi&ecirc;u luyện đến từ những ch&uacute; c&aacute; heo, sư tử biển. Ngo&agrave;i ra khi đến đảo qu&yacute; kh&aacute;ch c&ograve;n c&oacute; thể tham gia một số hoạt động thể thao hấp dẫn kh&aacute;c như: c&aacute;c dịch vụ vui chơi giải tr&iacute; dưới nước gồm hoạt động như cano k&eacute;o d&ugrave;, m&ocirc;t&ocirc; trượt nước tốc độ cao, Dịch vụ thăm quan Halong bằng tầu du lịch, cao n&ocirc; cao cấp, thủy phi cơ&hellip; Quả thực Tuần Ch&acirc;u ng&agrave;y nay l&agrave; một điểm đến kh&ocirc;ng thể thiếu của hầu hết c&aacute;c du kh&aacute;ch đến với Halong. B&ecirc;n cạnh đ&oacute;&nbsp;<a href=\"https://www.dulichhalong.net/diem-du-lich/dao-tuan-chau-vinh-ha-long/\">đảo Tuần Ch&acirc;u</a>&nbsp;c&ograve;n c&oacute; một b&atilde;i tắm nh&acirc;n tạo d&agrave;i 2 km, đến đ&acirc;y qu&yacute; kh&aacute;ch c&oacute; thể thoải m&aacute;i v&ugrave;ng vẫy giữa l&agrave;n s&oacute;ng biển trong xanh. S&aacute;t b&atilde;i biển l&agrave; khu biệt thự 50 ph&ograve;ng nghỉ đạt ti&ecirc;u chuẩn quốc tế 5 sao mang đến cho dư kh&aacute;ch những ph&uacute;t gi&acirc;y thoải m&aacute;i.</p>\r\n\r\n<p><a href=\"https://www.dulichhalong.net/wp-content/uploads/2018/12/Dao-Tuan-Chau.jpg\"><img alt=\"Dao Tuan Chau\" src=\"https://www.dulichhalong.net/wp-content/uploads/2018/12/Dao-Tuan-Chau.jpg\" style=\"height:451px; width:750px\" /></a><br />\r\nĐảo Tuần Ch&acirc;u (Nguồn ảnh Internet)</p>\r\n\r\n<p>&nbsp;</p>', 78, '2020-03-11 10:50:01', '2020-05-19 16:27:26'),
(46, 'Ăn uống', 'Top 5 nhà hàng ăn ngon nhất ở Hạ Long', 'p9jL7_top5nh.jpg', '<p>Top 5 nhà hàng ăn ngon nhất ở Hạ Long</p>', 78, '2020-03-11 10:50:33', '2020-03-11 10:50:33'),
(47, 'Khách sạn', 'Top 5 khách sạn tốt nhất ở Hạ Long', 'Xns1u_top5ks4.jpg', '<p>Top 5 khách sạn tốt nhất ở Hạ Long</p>', 78, '2020-03-11 10:51:04', '2020-03-11 10:51:04'),
(48, 'Thăm vịnh', 'Top 5 tàu thăm vịnh', 'nrMDb_tourhl.jpg', '<p><span style=\"background-color:rgb(153, 225, 253); color:rgb(255, 255, 255); font-family:helvetica,arial,sans-serif; font-size:16px\">Top 5 tàu thăm vịnh</span></p>', 78, '2020-03-11 10:55:47', '2020-03-11 10:55:47'),
(49, 'Vui chơi', 'Top 5 trò chơi mạo hiểm', 'E1HCj_review5.jpg', '<p><span style=\"background-color:rgb(153, 225, 253); color:rgb(255, 255, 255); font-family:helvetica,arial,sans-serif; font-size:16px\">Top 5 trò chơi mạo hiểm</span></p>', 78, '2020-03-11 11:00:14', '2020-03-11 11:00:14'),
(50, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', '8YoUu_review2.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 71, '2020-03-11 19:40:02', '2020-03-11 19:40:02'),
(51, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'QRZI5_noibat6.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 71, '2020-03-11 19:40:12', '2020-03-11 19:40:12'),
(52, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', '85dDO_noibat4.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 71, '2020-03-11 19:40:22', '2020-03-11 19:40:22'),
(53, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'EXLzh_review5.jpg', '<p>Du lịch Hạ Long Quảng Ninh</p>', 71, '2020-03-11 19:40:35', '2020-03-11 19:40:35'),
(54, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'hDWBL_1.-Vịnh-Hạ-Long-e1556520897422.jpg', '<p>listtinlisttinlisttinlisttin</p>', 72, '2020-03-11 19:51:58', '2020-03-11 19:51:58'),
(55, 'Du lịch Hạ Long Quảng Ninh', 'Du lịch Hạ Long Quảng Ninh', 'YZOJn_samqy.jpg', '<p>listtinlisttinlisttinlisttinlisttinl</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 157px; top: -6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', 71, '2020-03-11 19:52:11', '2020-03-12 10:14:51'),
(56, 'listtinlisttinlisttin', 'listtinlisttinlisttin', 'mIi1h_noibat1.jpg', '<p>listtinlisttinlisttinlisttinlisttinlisttin</p>', 72, '2020-03-11 19:52:22', '2020-03-11 19:52:22'),
(59, 'Điểm đến', '28°C, Wind SW at 11 km/h, 79% Humidity', 'XDJms_top5dd.jpg', '<p>28&deg;C, Wind SW at 11 km/h, 79% Humidity</p>', 78, '2020-05-19 16:01:41', '2020-05-19 16:01:41'),
(60, 'Khách sạn', '28°C, Wind SW at 11 km/h, 79% Humidity', 'apmeP_top5ks4.jpg', '<p>28&deg;C, Wind SW at 11 km/h, 79% Humidity</p>', 78, '2020-05-19 16:02:02', '2020-05-19 16:02:02'),
(61, 'Nhà hàng', '28°C, Wind SW at 11 km/h, 79% Humidity', 'oRO3p_top5nh.jpg', '<p>28&deg;C, Wind SW at 11 km/h, 79% Humidity</p>', 78, '2020-05-19 16:02:22', '2020-05-19 16:02:22'),
(62, 'Vui chơi', '28°C, Wind SW at 11 km/h, 79% Humidity', 'nUtmq_top5ks3.jpg', '<p>28&deg;C, Wind SW at 11 km/h, 79% Humidity</p>', 78, '2020-05-19 16:04:38', '2020-05-19 16:04:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'dev', 'dev', NULL, NULL),
(3, 'content', 'content', NULL, NULL),
(4, 'guest', 'guest', NULL, '2020-05-29 17:05:59'),
(14, 'admin', 'admin', '2020-05-30 16:59:50', '2020-05-30 16:59:50'),
(15, 'test', 'test', '2020-05-30 17:02:01', '2020-05-30 17:02:01'),
(16, 'oanh', 'oanhoanh', '2020-07-12 11:34:55', '2020-07-12 11:34:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title_slide` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content_slide` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image_slide` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slide` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `title_slide`, `content_slide`, `image_slide`, `slide`, `created_at`, `updated_at`) VALUES
(6, 'Ha Long', 'Vịnh Hạ Long là địa điểm du lịch nổi tiếng của Việt Nam, nằm ở phần bờ Tây vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam.', '5TwPk_slide_halong.jpg', 0, '2020-05-19 15:33:26', '2020-05-19 15:52:15'),
(7, 'Ninh Bình', 'Ninh Bình là một tỉnh nằm ở cửa ngõ cực nam miền Bắc, Việt Nam.', 'xmSfZ_slide_ninhbinh.jpg', 0, '2020-05-19 15:34:10', '2020-05-19 15:52:36'),
(8, 'Đà Nẵng', 'Đà Nẵng là một thành phố trực thuộc trung ương, nằm trong vùng Duyên hải Nam Trung Bộ Việt Nam.Được mệnh danh là hòn ngọc Viễn Đông', 'Y156y_slide_danang.png', 0, '2020-05-19 15:50:15', '2020-05-19 15:53:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `super_admin` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `super_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'admin', 'admin@gmail.com', 0, '$2y$10$67MGcYq0blT7VdKbCarGze1Tx8K.PA3FDbR8wrGZP9oQX77vWJkPe', NULL, '2020-05-30 14:05:27', '2020-05-30 14:05:27'),
(18, 'dev', 'dev@gmail.com', 0, '$2y$10$42gCyjPJDc2LkHhD3QzBdunag3EJxBGzX0qdBvL5Dje2S2lEMO9R2', NULL, '2020-05-30 15:16:12', '2020-05-30 15:16:12'),
(20, 'guest', 'guest@gmail.com', 0, '$2y$10$17TjiZ13hpQHNKsq0Qb8PeSPt9YFIdDnBSr9tqFyndBoZjUZLa1Jm', NULL, '2020-05-30 15:16:50', '2020-05-30 15:16:50'),
(21, 'test', 'test@gmail.com', 0, '$2y$10$EJjVALpclSDsQ3AAFBAwdeaehMgkcKgrqrAoigGsFkV3Gs0V5hYai', NULL, '2020-05-30 17:02:20', '2020-05-30 17:02:20'),
(22, 'oanh', 'content@gmail.com', 0, '$2y$10$WsoFFyTUvvAPqQDgwlboHO4XaLe8fMZeemWYFYY7q1OcLXaSu6fdK', NULL, '2020-07-12 11:36:33', '2020-07-12 11:36:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(16, 18, 2, NULL, NULL),
(18, 20, 4, NULL, NULL),
(19, 16, 14, NULL, NULL),
(20, 21, 15, NULL, NULL),
(22, 22, 16, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddanhmuc` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
