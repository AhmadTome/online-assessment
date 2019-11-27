-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 10:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `e_id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `submitted` varchar(10) NOT NULL,
  `qtype` varchar(255) NOT NULL,
  `True_Answer` varchar(10) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `e_id`, `q_id`, `u_id`, `answer`, `submitted`, `qtype`, `True_Answer`) VALUES
(204, 7, 17, 'atome@fornova.net', 'true', 'yes', 'true-false', 'yes'),
(205, 6, 22, 'atome@fornova.net', 'choice 2', 'yes', 'multiple-choice', 'yes'),
(206, 4, 20, 'atome@asaltech.com', '8,9,', 'yes', 'code-correction', 'yes'),
(207, 4, 21, 'atome@asaltech.com', '3,4,', 'yes', 'code-correction', 'no'),
(208, 8, 23, 'atome@fornova.net', 'the answer is', 'yes', 'essay', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `submitted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `title`, `time`, `submitted`) VALUES
(4, 'Java First', '5', 'no'),
(6, 'shit', '10', 'no'),
(7, 'test', '10', 'no'),
(8, 'essay exam', '15', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` int(10) NOT NULL,
  `e_id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `e_id`, `q_id`) VALUES
(4, 4, 20),
(5, 4, 21),
(6, 5, 16),
(7, 5, 17),
(8, 5, 20),
(9, 5, 21),
(10, 6, 22),
(11, 6, 16),
(12, 7, 22),
(13, 7, 17),
(14, 7, 16),
(15, 8, 23);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `q_type` varchar(255) NOT NULL,
  `q_text` text NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `q_type`, `q_text`, `level`) VALUES
(16, 'multiple-choice', 'Which of the following does not belong: If a class inherits from some other class, it should', 'Easy'),
(17, 'true-false', 'Arrays can also be created and initialize as in above statement.\r\n', 'Easy'),
(18, 'true-false', 'In an instance method or a constructor, \"this\" is a reference to the current object.\r\n', 'Easy'),
(19, 'true-false', 'Garbage Collection is manual process.\r\n', 'Easy'),
(20, 'code-correction', 'public void newShape(String shape) {\r\n        switch (shape) {\r\n            case \"Line\":\r\n                Shape line = new Line(startX, startY, endX, endY);\r\n            shapes.add(line);\r\n            break;\r\n                case \"Oval\":\r\n            Shape oval = new Oval(startX, startY, endX, endY);\r\n            shapes.add(oval);\r\n            break;\r\n            case \"Rectangle\":\r\n            Shape rectangle = new Rectangle(startX, startY, endX, endY);\r\n            shapes.add(rectangle);\r\n            break;\r\n            default:\r\n            System.out.println(\"ERROR. Check logic.\");\r\n        }\r\n        }', 'Easy'),
(21, 'code-correction', 'public class Robot {  \r\n        int xlocation;  \r\n        int ylocation;  \r\n        String name;  \r\n        static int ccount = 0;  \r\n        public Robot(int xxlocation, int yylocation, String nname) {  \r\n            xlocation = xxlocation;  \r\n            ylocation = yylocation;  \r\n            name = nname;  \r\n            ccount++;         \r\n        } \r\n  }', 'Easy'),
(22, 'multiple-choice', 'multiple choice', 'Easy'),
(23, 'essay', 'essay', 'Easy');

-- --------------------------------------------------------

--
-- Table structure for table `q_code_correction`
--

CREATE TABLE `q_code_correction` (
  `id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `error_lines` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `q_code_correction`
--

INSERT INTO `q_code_correction` (`id`, `q_id`, `error_lines`) VALUES
(2, 20, '4,7,6'),
(3, 21, '7,9');

-- --------------------------------------------------------

--
-- Table structure for table `q_multiple_choice`
--

CREATE TABLE `q_multiple_choice` (
  `id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `choice_1` varchar(255) NOT NULL,
  `choice_2` varchar(255) NOT NULL,
  `choice_3` varchar(255) NOT NULL,
  `choice_4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `choice_text` varchar(255) NOT NULL DEFAULT '""'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `q_multiple_choice`
--

INSERT INTO `q_multiple_choice` (`id`, `q_id`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `answer`, `choice_text`) VALUES
(9, 22, 'choice 1', 'choice 2', 'choice 3', 'choice 4', '2', 'choice 2');

-- --------------------------------------------------------

--
-- Table structure for table `q_true_false`
--

CREATE TABLE `q_true_false` (
  `id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `q_true_false`
--

INSERT INTO `q_true_false` (`id`, `q_id`, `answer`) VALUES
(3, 17, 'true'),
(4, 18, 'true'),
(5, 19, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `name`, `age`) VALUES
(1, 'admin@hotmail.com', 'admin', 'admin', 'admin', 25),
(66, 'ameer@gmail.com', '', '', '', 0),
(67, 'osama@gmail.com', 'osama', 'student', 'osama', 18),
(69, 'atome@asaltech.com', '123456', 'lecturer', 'Ahmad', 27),
(70, 'atome@fornova.net', '123456', 'student', 'Ahmad', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_code_correction`
--
ALTER TABLE `q_code_correction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_multiple_choice`
--
ALTER TABLE `q_multiple_choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `q_true_false`
--
ALTER TABLE `q_true_false`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `q_code_correction`
--
ALTER TABLE `q_code_correction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `q_multiple_choice`
--
ALTER TABLE `q_multiple_choice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `q_true_false`
--
ALTER TABLE `q_true_false`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `exam` (`id`);

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `exam_questions_ibfk_3` FOREIGN KEY (`e_id`) REFERENCES `exam_questions` (`id`);

--
-- Constraints for table `q_multiple_choice`
--
ALTER TABLE `q_multiple_choice`
  ADD CONSTRAINT `q_multiple_choice_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `q_true_false`
--
ALTER TABLE `q_true_false`
  ADD CONSTRAINT `q_true_false_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
