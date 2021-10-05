-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 08:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'php'),
(2, 'python'),
(3, 'html1'),
(4, 'java');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `first_name`, `last_name`, `email`, `body`, `status`, `date`) VALUES
(1, 'anand', 'raj', 'rajanand9039@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh nulla, viverra vitae congue quis, auctor ut lorem. Maecenas euismod dignissim tortor. Cras quis sagittis nisl. Duis non nisl dui. Cras commodo feugiat neque, a ultricies ipsum dictum eu. Donec semper ultrices ornare. Aenean ac convallis ipsum. Nunc ac nisi vitae magna eleifend dignissim quis nec tellus. Morbi justo tellus, feugiat in laoreet ac, posuere vel arcu. Proin non faucibus turpis. Fusce mattis tellus nibh, quis scelerisque arcu sollicitudin consectetur. Vestibulum et ullamcorper sem, sit amet finibus risus. Nam ipsum mauris, facilisis iaculis sapien vitae, maximus interdum arcu. Praesent nec neque felis. Proin pretium vitae diam ac fermentum. Sed tempus elit ac tortor ornare, placerat cursus enim consectetur.\r\n\r\nPhasellus nisl nunc, volutpat at orci vel, egestas imperdiet orci. Pellentesque et pharetra mauris, et venenatis mauris. Maecenas condimentum libero tortor, sed luctus metus vestibulum non. Sed bibendum egestas ipsum, eu auctor lorem pellentesque vel. Vestibulum viverra neque sed sem elementum, sit amet pharetra tortor tincidunt. Pellentesque eget sollicitudin mi. Mauris molestie quam eu ante rhoncus malesuada. Aliquam erat volutpat. Fusce congue ligula ex, nec posuere leo posuere vel. Cras vitae mattis justo. Suspendisse auctor eget turpis sed ultricies.\r\n\r\nSed posuere consequat nulla, vel viverra felis rutrum ut. Vivamus viverra orci turpis, eget tincidunt urna scelerisque in. Vestibulum pretium, dui at pharetra luctus, ex urna pulvinar ex, eu vestibulum massa diam a neque. Quisque dignissim dolor enim, nec fermentum nisl dapibus quis. Suspendisse suscipit magna in libero viverra, quis venenatis nisi auctor. Etiam interdum urna metus, a tristique justo suscipit eu. Aenean sed nulla sed quam molestie mattis. Sed bibendum lorem quam. Donec tempus mauris sit amet erat euismod, sit amet pretium orci tincidunt. Suspendisse luctus tristique porttitor. Aliquam erat sem, vulputate ac nisi volutpat, maximus mattis lacus. Vivamus at turpis dui. Aliquam suscipit vestibulum convallis. Etiam facilisis mauris ut neque tincidunt maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget ex tempus, condimentum elit nec, sagittis lorem.', 0, '2021-04-05 02:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `copyright` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `copyright`) VALUES
(1, 'anand 2021 all rights reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'contact us', '&lt;p&gt;22Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh nulla, viverra vitae congue quis, auctor ut lorem. Maecenas euismod dignissim tortor. Cras quis sagittis nisl. Duis non nisl dui. Cras commodo feugiat neque, a ultricies ipsum dictum eu. Donec semper ultrices ornare. Aenean ac convallis ipsum. Nunc ac nisi vitae magna eleifend dignissim quis nec tellus. Morbi justo tellus, feugiat in laoreet ac, posuere vel arcu. Proin non faucibus turpis. Fusce mattis tellus nibh, quis scelerisque arcu sollicitudin consectetur. Vestibulum et ullamcorper sem, sit amet finibus risus. Nam ipsum mauris, facilisis iaculis sapien vitae, maximus interdum arcu. Praesent nec neque felis. Proin pretium vitae diam ac fermentum. Sed tempus elit ac tortor ornare, placerat cursus enim consectetur. Phasellus nisl nunc, volutpat at orci vel, egestas imperdiet orci. Pellentesque et pharetra mauris, et venenatis mauris. Maecenas condimentum libero tortor, sed luctus metus vestibulum non. Sed bibendum egestas ipsum, eu auctor lorem pellentesque vel. Vestibulum viverra neque sed sem elementum, sit amet pharetra tortor tincidunt. Pellentesque eget sollicitudin mi. Mauris molestie quam eu ante rhoncus malesuada. Aliquam erat volutpat. Fusce congue ligula ex, nec posuere leo posuere vel. Cras vitae mattis justo. Suspendisse auctor eget turpis sed ultricies. Sed posuere consequat nulla, vel viverra felis rutrum ut. Vivamus viverra orci turpis, eget tincidunt urna scelerisque in. Vestibulum pretium, dui at pharetra luctus, ex urna pulvinar ex, eu vestibulum massa diam a neque. Quisque dignissim dolor enim, nec fermentum nisl dapibus quis. Suspendisse suscipit magna in libero viverra, quis venenatis nisi auctor. Etiam interdum urna metus, a tristique justo suscipit eu. Aenean sed nulla sed quam molestie mattis. Sed bibendum lorem quam. Donec tempus mauris sit amet erat euismod, sit amet pretium orci tincidunt. Suspendisse luctus tristique porttitor. Aliquam erat sem, vulputate ac nisi volutpat, maximus mattis lacus. Vivamus at turpis dui. Aliquam suscipit vestibulum convallis. Etiam facilisis mauris ut neque tincidunt maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget ex tempus, condimentum elit nec, sagittis lorem.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(1, 2, 'first post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh nulla, viverra vitae congue quis, auctor ut lorem. Maecenas euismod dignissim tortor. Cras quis sagittis nisl. Duis non nisl dui. Cras commodo feugiat neque, a ultricies ipsum dictum eu. Donec semper ultrices ornare. Aenean ac convallis ipsum. Nunc ac nisi vitae magna eleifend dignissim quis nec tellus. Morbi justo tellus, feugiat in laoreet ac, posuere vel arcu. Proin non faucibus turpis. Fusce mattis tellus nibh, quis scelerisque arcu sollicitudin consectetur. Vestibulum et ullamcorper sem, sit amet finibus risus. Nam ipsum mauris, facilisis iaculis sapien vitae, maximus interdum arcu. Praesent nec neque felis. Proin pretium vitae diam ac fermentum. Sed tempus elit ac tortor ornare, placerat cursus enim consectetur.\r\n\r\nPhasellus nisl nunc, volutpat at orci vel, egestas imperdiet orci. Pellentesque et pharetra mauris, et venenatis mauris. Maecenas condimentum libero tortor, sed luctus metus vestibulum non. Sed bibendum egestas ipsum, eu auctor lorem pellentesque vel. Vestibulum viverra neque sed sem elementum, sit amet pharetra tortor tincidunt. Pellentesque eget sollicitudin mi. Mauris molestie quam eu ante rhoncus malesuada. Aliquam erat volutpat. Fusce congue ligula ex, nec posuere leo posuere vel. Cras vitae mattis justo. Suspendisse auctor eget turpis sed ultricies.\r\n\r\nSed posuere consequat nulla, vel viverra felis rutrum ut. Vivamus viverra orci turpis, eget tincidunt urna scelerisque in. Vestibulum pretium, dui at pharetra luctus, ex urna pulvinar ex, eu vestibulum massa diam a neque. Quisque dignissim dolor enim, nec fermentum nisl dapibus quis. Suspendisse suscipit magna in libero viverra, quis venenatis nisi auctor. Etiam interdum urna metus, a tristique justo suscipit eu. Aenean sed nulla sed quam molestie mattis. Sed bibendum lorem quam. Donec tempus mauris sit amet erat euismod, sit amet pretium orci tincidunt. Suspendisse luctus tristique porttitor. Aliquam erat sem, vulputate ac nisi volutpat, maximus mattis lacus. Vivamus at turpis dui. Aliquam suscipit vestibulum convallis. Etiam facilisis mauris ut neque tincidunt maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget ex tempus, condimentum elit nec, sagittis lorem.', 'post1.jpg', 'anand', 'python', '2021-04-05 02:10:02'),
(2, 1, 'second post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh nulla, viverra vitae congue quis, auctor ut lorem. Maecenas euismod dignissim tortor. Cras quis sagittis nisl. Duis non nisl dui. Cras commodo feugiat neque, a ultricies ipsum dictum eu. Donec semper ultrices ornare. Aenean ac convallis ipsum. Nunc ac nisi vitae magna eleifend dignissim quis nec tellus. Morbi justo tellus, feugiat in laoreet ac, posuere vel arcu. Proin non faucibus turpis. Fusce mattis tellus nibh, quis scelerisque arcu sollicitudin consectetur. Vestibulum et ullamcorper sem, sit amet finibus risus. Nam ipsum mauris, facilisis iaculis sapien vitae, maximus interdum arcu. Praesent nec neque felis. Proin pretium vitae diam ac fermentum. Sed tempus elit ac tortor ornare, placerat cursus enim consectetur.\r\n\r\nPhasellus nisl nunc, volutpat at orci vel, egestas imperdiet orci. Pellentesque et pharetra mauris, et venenatis mauris. Maecenas condimentum libero tortor, sed luctus metus vestibulum non. Sed bibendum egestas ipsum, eu auctor lorem pellentesque vel. Vestibulum viverra neque sed sem elementum, sit amet pharetra tortor tincidunt. Pellentesque eget sollicitudin mi. Mauris molestie quam eu ante rhoncus malesuada. Aliquam erat volutpat. Fusce congue ligula ex, nec posuere leo posuere vel. Cras vitae mattis justo. Suspendisse auctor eget turpis sed ultricies.\r\n\r\nSed posuere consequat nulla, vel viverra felis rutrum ut. Vivamus viverra orci turpis, eget tincidunt urna scelerisque in. Vestibulum pretium, dui at pharetra luctus, ex urna pulvinar ex, eu vestibulum massa diam a neque. Quisque dignissim dolor enim, nec fermentum nisl dapibus quis. Suspendisse suscipit magna in libero viverra, quis venenatis nisi auctor. Etiam interdum urna metus, a tristique justo suscipit eu. Aenean sed nulla sed quam molestie mattis. Sed bibendum lorem quam. Donec tempus mauris sit amet erat euismod, sit amet pretium orci tincidunt. Suspendisse luctus tristique porttitor. Aliquam erat sem, vulputate ac nisi volutpat, maximus mattis lacus. Vivamus at turpis dui. Aliquam suscipit vestibulum convallis. Etiam facilisis mauris ut neque tincidunt maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget ex tempus, condimentum elit nec, sagittis lorem.', 'post2.png', 'faiyaz', 'html', '2021-04-05 02:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `facebook`, `twitter`, `linkedin`, `instagram`) VALUES
(1, 'https://facebook.com', 'https://twitter.com', 'https://linkedin.com', 'https://instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'anand', '90d788e31333195618c1ea10ad6aab36');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slogan` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'php blog website by anand raj', 'php blog website ', 'logo.png'),
(2, 'php blog website 2', 'php blog website there we go 2', 'logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
