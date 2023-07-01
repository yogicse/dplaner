-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 07:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmanegmentdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `notestable`
--

CREATE TABLE `notestable` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `notestable`
--

INSERT INTO `notestable` (`id`, `user_id`, `title`, `notes`, `created_at`, `updated_at`) VALUES
(9, 3, 'title2', '<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n', '2023-06-23 11:08:50', '2023-06-26 21:49:52'),
(11, 3, 'title3.3', '<p>notes3.3uueuerirui3</p>\r\n', '2023-06-26 05:59:30', '2023-06-26 11:29:30'),
(12, 3, 'title4', '<p>notes 4qwdhj2eh13</p>\r\n', '2023-06-23 12:44:11', '2023-06-26 12:08:28'),
(13, 3, 'title5', '<p>note5.2555</p>\r\n', '2023-06-26 06:08:30', '2023-06-26 11:38:30'),
(15, 3, 'title new', '<p>vvsakjdwkjdnwedcewjfderjfrwdkejdjewdowjdie,ewrf,jewde</p>\r\n', '2023-06-26 06:36:20', '2023-06-26 14:54:40'),
(16, 3, 'title kdjnwd', 'mdw xjwher cqrqhjetrbajskhdxmSJMDXHEB\r\n', '2023-06-25 16:32:16', '2023-06-25 22:02:16'),
(23, 3, 'title20', 'notes 20 titile 20 shwhdfxwxedh Naresh\r\n', '2023-06-25 05:18:19', '2023-06-25 10:48:19'),
(25, 3, 'titmnkskwsd', '<p>kxc dskjflFEWQMRUHYEQWIDdfef</p>\r\n', '2023-06-26 08:00:09', '2023-06-26 13:32:44'),
(26, 4, 'title123', '<p>note ssqjwdsjwdjodjedoedfld3uxyf</p>\r\n', '2023-06-26 11:40:38', '2023-06-26 17:10:38'),
(27, 4, 'tittle2123', '<p>kjmdeifurcfbryfebfdyeqidjd;skwdu</p>\r\n', '2023-06-26 11:40:56', '2023-06-26 17:10:56'),
(28, 4, 'title3kdfk', '<p>dxj edjedbdggdwkLLQWEDYED</p>\r\n', '2023-06-26 11:41:15', '2023-06-26 17:11:15'),
(29, 4, 'title neeraj', '<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', '2023-06-26 16:02:27', '2023-06-26 21:32:27'),
(30, 4, 'naya naya title', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', '2023-06-26 16:10:07', '2023-06-26 21:40:07'),
(31, 3, 'tosaynotes', '<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfe</p>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligati</p>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligati</p>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligatictly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligati</p>\r\n', '2023-06-27 03:59:01', '2023-06-27 09:29:01'),
(32, 3, 'title22', '<p>notess</p>\r\n', '2023-06-27 11:51:29', '2023-06-27 17:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `share_note`
--

CREATE TABLE `share_note` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `share_note`
--

INSERT INTO `share_note` (`id`, `user_id`, `note_id`) VALUES
(1, 3, 25),
(2, 4, 25),
(3, 4, 15),
(4, 4, 16),
(5, 5, 25),
(6, 5, 12),
(7, 5, 12),
(8, 5, 11),
(9, 4, 23),
(10, 3, 29),
(11, 3, 29),
(12, 4, 13),
(13, 4, 12),
(14, 3, 30),
(15, 4, 9),
(16, 4, 31),
(17, 4, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tasktable`
--

CREATE TABLE `tasktable` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `summery` varchar(500) NOT NULL,
  `detail` text NOT NULL,
  `spent` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `estimate` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tasktable`
--

INSERT INTO `tasktable` (`id`, `user_id`, `summery`, `detail`, `spent`, `deadline`, `estimate`, `created_at`, `updated_at`) VALUES
(8, 3, '1 summery by Naresh', '<p>first detail by Naresh kumar</p>\r\n', 3, '2023-06-28', 10, '2023-06-27 13:05:13', '2023-06-28 12:30:16'),
(9, 3, 'summery 2', '<p>detail two by Naresh</p>\r\n', 4, '2023-07-06', 9, '2023-06-28 07:01:11', '2023-06-28 12:31:11'),
(10, 3, 'summery3 by Naresh', '<p>detail 3 by naresh kumar</p>\r\n', 4, '2023-07-08', 8, '2023-06-28 07:02:47', '2023-06-28 12:32:47'),
(11, 4, 'sumery 1 by Neeraj', '<p>task detail by neeraj</p>\r\n', 3, '2023-06-30', 9, '2023-06-28 08:15:21', '2023-06-28 13:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `created_at`, `updated_at`, `role`) VALUES
(3, 'nr123', 'b14c8dadfbf7abe58afa4839c7375b72', 'Naresh', 'Kumar', 'kumarnaresh03061999@gmail.com', 7355, '2023-06-23 07:30:55', '2023-06-23 13:00:55', 'User'),
(4, 'ne1234', 'cfffcb27b571a181a1ff30f23037d7c5', 'Neeraj', 'kumar', 'kumarneeraj03061999@gmail.com', 2147483647, '2023-06-23 07:34:05', '2023-06-23 13:04:05', 'User'),
(5, 'pe123', '4d3da17c5defd28d2f2ccc6ffc378ec7', 'Pranjal', 'Sahu', 'pranjal123@gmail.com', 2147483647, '2023-06-24 23:42:47', '2023-06-25 05:12:47', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notestable`
--
ALTER TABLE `notestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_note`
--
ALTER TABLE `share_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasktable`
--
ALTER TABLE `tasktable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notestable`
--
ALTER TABLE `notestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `share_note`
--
ALTER TABLE `share_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tasktable`
--
ALTER TABLE `tasktable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
