-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 07:43 PM
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
-- Database: `bridgify`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `subject_id`) VALUES
(45, 8, 5),
(46, 8, 15),
(47, 8, 1),
(49, 9, 2),
(50, 9, 5),
(52, 9, 17),
(54, 9, 1),
(55, 9, 4),
(57, 9, 21),
(59, 9, 10),
(61, 10, 1),
(62, 10, 2),
(63, 10, 3),
(64, 10, 5),
(65, 10, 15),
(66, 9, 3),
(69, 12, 19),
(72, 12, 17),
(73, 12, 7),
(74, 12, 6),
(75, 12, 15),
(77, 11, 10),
(78, 11, 19),
(79, 11, 21),
(80, 11, 7),
(81, 11, 6),
(82, 11, 15),
(83, 11, 11),
(84, 11, 14),
(91, 12, 21),
(93, 12, 11),
(94, 12, 10),
(95, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(13, 1, 1),
(14, 2, 1),
(15, 3, 1),
(16, 4, 1),
(17, 5, 1),
(18, 6, 1),
(19, 7, 1),
(20, 8, 1),
(21, 2, 2),
(22, 4, 2),
(23, 5, 2),
(24, 7, 2),
(25, 9, 2),
(26, 10, 2),
(27, 1, 3),
(28, 3, 3),
(29, 6, 3),
(30, 8, 3),
(31, 10, 3),
(32, 1, 4),
(33, 2, 4),
(34, 3, 4),
(35, 5, 4),
(36, 6, 4),
(37, 8, 4),
(38, 9, 4),
(39, 1, 5),
(40, 2, 5),
(41, 3, 5),
(42, 4, 5),
(43, 5, 5),
(44, 6, 5),
(45, 7, 5),
(46, 8, 5),
(47, 9, 5),
(48, 2, 6),
(49, 4, 6),
(50, 6, 6),
(51, 10, 6),
(52, 3, 7),
(53, 5, 7),
(54, 8, 7),
(55, 1, 8),
(56, 9, 8),
(57, 2, 9),
(58, 4, 9),
(59, 5, 9),
(60, 6, 9),
(61, 7, 9),
(62, 10, 9),
(63, 1, 10),
(64, 3, 10),
(65, 5, 10),
(66, 7, 10),
(67, 9, 10),
(68, 2, 13),
(69, 6, 13),
(70, 8, 13),
(71, 10, 19),
(72, 12, 19),
(73, 12, 13),
(75, 12, 2),
(76, 12, 9),
(77, 12, 4),
(79, 12, 1),
(80, 12, 3),
(81, 12, 5),
(82, 11, 1),
(83, 11, 19),
(84, 11, 20);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` int(11) DEFAULT NULL,
  `poster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image_url`, `timestamp`, `subject`, `poster`) VALUES
(1, 'The Beauty of Numbers', 'Mathematics is the language of the universe.', 'math_post.png', '2025-04-28 17:23:48', 1, 1),
(2, 'Why Stars Explode', 'A simple guide to supernovas.', 'physics_post.png', '2025-04-28 17:23:48', 2, 2),
(3, 'Explosive Chemistry', 'Chemical reactions that go boom.', 'chem_post.png', '2025-04-28 17:23:48', 3, 3),
(4, 'Secrets of DNA', 'Life’s instruction manual.', 'bio_post.png', '2025-04-28 17:23:48', 4, 4),
(5, 'Learn Python in 5 Days', 'Easy path to becoming a coding ninja.', 'cs_post.png', '2025-04-28 17:23:48', 5, 6),
(6, 'Ancient Civilizations', 'Mysteries of the past.', 'history_post.png', '2025-04-28 17:23:48', 6, 5),
(7, 'Mapping the World', 'Understanding geography made easy.', 'geo_post.png', '2025-04-28 17:23:48', 7, 7),
(8, 'Mind Games', 'Psychology tricks you didn’t know.', '', '2025-04-28 17:23:48', 8, 1),
(9, 'The Art of Colors', 'How colors impact emotions.', 'art_post.png', '2025-04-28 17:23:48', 10, 2),
(10, 'Economics for Dummies', 'Supply and demand simplified.', '', '2025-04-28 17:23:48', 12, 3),
(13, 'Test History Post', 'This is just to test if the post function works. Anyways, study history kids! It\'s fun and interesting😁', '1746444759_OIP.jpeg', '2025-05-05 11:32:39', 6, 9),
(19, 'Test Quick Ask Post', NULL, NULL, '2025-05-06 09:52:34', 1, 10),
(20, 'This genuinely blew my mind when i first heard it', 'And yes, I counted all the way up to a thousand to fact check', '1747672870_th.jpeg', '2025-05-19 16:41:10', 1, 9),
(21, 'Aight, time to become a powerbank', '😮', '1747674110_OIP.jpeg', '2025-05-19 17:01:50', 4, 9),
(22, 'I guess we owe Shakespeare', 'Bro was really ahead of his time', '1747676081_lit.jpeg', '2025-05-19 17:34:41', 15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `post` int(11) NOT NULL,
  `replier` int(11) NOT NULL,
  `parent_reply_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `reply`, `timestamp`, `post`, `replier`, `parent_reply_id`) VALUES
(1, 'Absolutely agree! Math really *is* everywhere.', '2025-04-28 23:10:12', 1, 4, NULL),
(2, 'You just made numbers sound sexy 🧠✨', '2025-04-29 00:05:33', 1, 6, NULL),
(3, 'Now I know what happens when a star gets emotional 😭💥', '2025-04-29 01:12:45', 2, 3, NULL),
(4, 'This post blew my mind... like a supernova 😏', '2025-04-29 01:30:27', 2, 8, NULL),
(5, 'BOOM. Science wins again 🔬🔥', '2025-04-29 02:15:00', 3, 5, NULL),
(6, 'Remind me never to mix random chemicals 😅', '2025-04-29 02:22:18', 3, 7, NULL),
(7, 'DNA is basically our body’s blueprint. Crazy stuff!', '2025-04-29 03:11:09', 4, 2, NULL),
(8, 'I always knew I was built different 💅🧬', '2025-04-29 03:27:45', 4, 1, NULL),
(9, 'Can confirm—learned Python in 4.5 days 😎', '2025-04-29 04:44:00', 5, 10, NULL),
(10, 'This post made me actually try coding. I’m hooked.', '2025-04-29 04:59:33', 5, 3, NULL),
(11, 'Day 2 and I already broke my laptop 💀', '2025-04-29 05:10:55', 5, 9, NULL),
(12, 'This made me want to dig up ruins ngl 🏺', '2025-04-29 06:00:00', 6, 6, NULL),
(13, 'History was boring till now. You just changed that!', '2025-04-29 06:25:40', 6, 8, NULL),
(14, 'Now I finally get what longitude and latitude are 🙌', '2025-04-29 07:15:12', 7, 2, NULL),
(15, 'Geography gang rise up 🌍💪', '2025-04-29 07:38:22', 7, 7, NULL),
(16, 'Psych tricks? I’m gonna try these on my crush 😏', '2025-04-29 08:45:33', 8, 1, NULL),
(17, 'This explains a lot about my ex 😂', '2025-04-29 09:01:15', 8, 5, NULL),
(18, 'This post just calmed my soul with color theory 🎨', '2025-04-29 10:10:00', 9, 6, NULL),
(19, 'I never knew colors could manipulate me like that 😳', '2025-04-29 10:30:20', 9, 9, NULL),
(20, 'Wow, I finally understand economics. Miracles do happen 🙏', '2025-04-29 11:22:33', 10, 4, NULL),
(21, 'Can someone explain this to my bank account now?', '2025-04-29 11:55:12', 10, 10, NULL),
(22, 'History test passed, and so did the post 😎', '2025-05-05 17:30:00', 13, 2, NULL),
(23, 'We stan well-written test content 👏', '2025-05-05 17:45:00', 13, 1, NULL),
(24, 'Test reply reporting for duty 🫡', '2025-05-06 16:00:00', 19, 8, NULL),
(25, 'Yup, quick ask works like a charm 🔧✨', '2025-05-06 16:05:00', 19, 7, NULL),
(26, 'Test History Reply!!😁', '2025-05-18 22:54:15', 13, 12, NULL),
(27, 'Test Reply!😁', '2025-05-18 23:15:37', 10, 12, NULL),
(30, 'Test Art Reply', '2025-05-18 23:53:41', 9, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reply_likes`
--

CREATE TABLE `reply_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply_likes`
--

INSERT INTO `reply_likes` (`id`, `user_id`, `reply_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 1, 2),
(7, 3, 2),
(8, 5, 2),
(9, 7, 2),
(10, 2, 3),
(11, 4, 3),
(12, 6, 3),
(13, 8, 3),
(14, 1, 4),
(15, 6, 4),
(16, 9, 4),
(17, 10, 4),
(18, 2, 5),
(19, 5, 5),
(20, 7, 5),
(21, 3, 6),
(22, 6, 6),
(23, 1, 7),
(24, 8, 7),
(25, 9, 7),
(26, 2, 8),
(27, 5, 8),
(28, 4, 9),
(29, 6, 9),
(30, 10, 9),
(31, 3, 10),
(32, 9, 10),
(33, 1, 11),
(34, 2, 12),
(35, 4, 12),
(36, 5, 13),
(37, 6, 13),
(38, 7, 13),
(39, 3, 14),
(40, 8, 15),
(41, 10, 15),
(42, 2, 16),
(43, 4, 16),
(44, 9, 16),
(45, 1, 17),
(46, 7, 18),
(47, 8, 18),
(48, 10, 18),
(49, 5, 19),
(50, 2, 20),
(51, 3, 20),
(52, 6, 21),
(53, 4, 22),
(54, 7, 22),
(55, 1, 23),
(56, 3, 24),
(57, 6, 24),
(58, 2, 25),
(59, 12, 24),
(60, 12, 25),
(61, 12, 12),
(62, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject_banner` varchar(255) DEFAULT NULL,
  `subject_img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `subject_banner`, `subject_img`, `description`) VALUES
(1, 'Mathematics', 'math_banner.png', 'math_img.png', 'All about numbers and theories.'),
(2, 'Physics', 'physics_banner.png', 'physics_img.png', 'The laws that govern the universe.'),
(3, 'Chemistry', 'chem_banner.png', 'chem_img.png', 'Study of substances and reactions.'),
(4, 'Biology', 'bio_banner.png', 'bio_img.png', 'Explore the science of life.'),
(5, 'Computer Science', 'cs_banner.png', 'cs_img.png', 'Dive into programming and algorithms.'),
(6, 'History', 'history_banner.png', 'history_img.png', 'Discover the past and its secrets.'),
(7, 'Geography', 'geo_banner.png', 'geo_img.png', 'Learn about the earth and its features.'),
(8, 'Psychology', 'psych_banner.png', 'psych_img.png', 'Understand human behavior.'),
(9, 'Sociology', 'socio_banner.png', 'socio_img.png', 'Study human society.'),
(10, 'Art', 'art_banner.png', 'art_img.png', 'Creativity unleashed.'),
(11, 'Music', 'music_banner.png', 'music_img.png', 'Feel the rhythm.'),
(12, 'Economics', 'eco_banner.png', 'eco_img.png', 'Understand markets and trade.'),
(13, 'Political Science', 'poli_banner.png', 'poli_img.png', 'Governance and politics.'),
(14, 'Philosophy', 'philo_banner.png', 'philo_img.png', 'Big thoughts about life.'),
(15, 'Literature', 'lit_banner.png', 'lit_img.png', 'Dive into books and poetry.'),
(16, 'Law', 'law_banner.png', 'law_img.png', 'Study of rules and justice.'),
(17, 'Engineering', 'eng_banner.png', 'eng_img.png', 'Building the future.'),
(18, 'Medicine', 'med_banner.png', 'med_img.png', 'Saving lives one step at a time.'),
(19, 'Astronomy', 'astro_banner.png', 'astro_img.png', 'Study of the stars.'),
(20, 'Business', 'biz_banner.png', 'biz_img.png', 'Entrepreneurship and innovation.'),
(21, 'Environmental Science', 'env_banner.png', 'env_img.png', 'Saving our planet.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'default_avatar.png',
  `display_name` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `date_joined` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `display_name`, `bio`, `date_joined`) VALUES
(1, 'Moonlight', 'moonlight@example.com', 'password123', 'avatar1.png', 'Luna Rae', 'Dreaming beyond the stars ☁️🌙', '2025-02-08'),
(2, 'Starlord', 'starlord@example.com', 'password456', 'avatar2.png', 'Star Prince', 'Saving galaxies and slaying tests 🚀', '2025-02-15'),
(3, 'CherryBomb', 'cherry@example.com', 'password789', 'avatar3.png', 'Cherry On Top', 'Sweet but explosive 🍒💣', '2025-03-02'),
(4, 'Frostbite', 'frostbite@example.com', 'password321', 'avatar4.png', 'Frost Queen', 'Cooler than ice 🧊❄️', '2025-03-17'),
(5, 'BubbleTea', 'bubble@example.com', 'password987', 'avatar5.png', 'BobaBae', 'Living life one boba at a time 🧋💖', '2025-03-25'),
(6, 'Nova', 'nova@example.com', 'password654', 'avatar6.png', 'SuperNova', 'Burn bright, go boom 🌟', '2025-04-01'),
(7, 'ElectricSoul', 'soul@example.com', 'password111', 'avatar7.png', 'Voltage Vibe', 'Plugged into vibes ⚡🎶', '2025-04-08'),
(8, 'testuser', 'testuser@example.com', '$2y$10$B4K3HTs9v1Ababhv5dWctuPCevt9CQDPHI.NJxmvWGuk88XB3Aw.i', 'default_avatar.png', 'Testronaut', 'Testing... always testing 🧪', '2025-04-18'),
(9, 'testuser2', 'testuser2@example.com', '$2y$10$YzA7jl9LffrtVN1z3BBwmOsLh1EMQshActS81nbFDngkuVjLBjqKC', 'avatar_9.png', 'Chaos Trainee', 'I actually hate my life lmao', '2025-04-25'),
(10, 'MathLover', 'mathlover@example.com', '$2y$10$ekyr9Jli/eo0yCELL8YedOBjcIHH/Xvnuvqje6WHbEbp4w/bACM..', 'default_avatar.png', 'π Queen', 'πr² is my love language ➕➗', '2025-05-01'),
(11, 'TestUser3', 'testuser3@example.com', '$2y$10$x5oxWXW6gMZ/wW7YYKqQH.g8q5eWHoFZ8FgM4t0DtyZqgT6nZwbNu', 'avatar_11.jpg', 'Local Depresso', 'Addicted to coffee, books and art☕📚🎨', '2025-05-16'),
(12, 'TestUser4', 'testuser4@example.com', '$2y$10$whHAOXHTKHkQJ/h.nzl32uyg8aLNxd7jEnLO12XSN9ynG/yrWbpQG', 'default_avatar.png', 'TestUser4', NULL, '2025-05-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`),
  ADD KEY `poster` (`poster`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post` (`post`),
  ADD KEY `replier` (`replier`),
  ADD KEY `FK_parent_reply_id` (`parent_reply_id`);

--
-- Indexes for table `reply_likes`
--
ALTER TABLE `reply_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reply_id` (`reply_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reply_likes`
--
ALTER TABLE `reply_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`poster`) REFERENCES `users` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `FK_parent_reply_id` FOREIGN KEY (`parent_reply_id`) REFERENCES `replies` (`id`),
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`post`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`replier`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reply_likes`
--
ALTER TABLE `reply_likes`
  ADD CONSTRAINT `reply_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reply_likes_ibfk_2` FOREIGN KEY (`reply_id`) REFERENCES `replies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
