-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 06:09 PM
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
-- Database: `university system`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcourse`
--

CREATE TABLE `addcourse` (
  `ID` int(11) NOT NULL,
  `course` varchar(250) NOT NULL,
  `section` varchar(120) NOT NULL,
  `date1` varchar(120) NOT NULL,
  `date2` varchar(120) NOT NULL,
  `time` varchar(120) NOT NULL,
  `seat` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcourse`
--

INSERT INTO `addcourse` (`ID`, `course`, `section`, `date1`, `date2`, `time`, `seat`) VALUES
(1, 'intorduction to programming', '', 'sunday', 'tuesday', '11.00-12.30', '40'),
(2, 'DATA  SCIENCE', '', 'sunday', 'wednesday', '11.00 am to 1.30pm', '20'),
(3, 'NLP', '', 'sunday', 'thrusday', '10.00-12.00', '40'),
(4, 'DATA  SCIENCE', 'B', 'sunday', 'monday', '12.00-2.00pm', '40'),
(5, 'DATA  SCIENCE', 'C', 'saturday', 'saturday', '11.00-12.30', '40'),
(6, 'HCI', 'a', 'sunday', 'monday', '10.0pm-12.00am', '20');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `target_audience` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `subject`, `target_audience`, `message`) VALUES
(1, 'data science', 'All Students', 'klk class nai'),
(0, 'alert', 'All Students', 'we have defense today');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `student_name`, `student_id`, `course`, `file`, `submitted_at`) VALUES
(0, 'maruf', '22-48582-3', 'DATA  SCIENCE', 'Assignment Cover - Fillable 2025.docx', '2025-09-13 16:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `items` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `borrowed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `username`, `items`, `quantity`, `total_price`, `borrowed_at`) VALUES
(2, '22-48582-3', 'A Survey on Deep Learning, Quantum Computing for Computer Scientists, The Art of Computer Programming', 3, 1250.00, '2025-09-13 17:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `computer_network`
--

CREATE TABLE `computer_network` (
  `id` int(11) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `computer_network`
--

INSERT INTO `computer_network` (`id`, `section`, `subject`, `time`) VALUES
(1, 'A', 'Computer Network', '08:00 AM - 09:30 AM'),
(2, 'B', 'Computer Network', '09:45 AM - 11:15 AM'),
(3, 'C', 'Computer Network', '11:30 AM - 01:00 PM'),
(4, 'D', 'Computer Network', '02:00 PM - 03:30 PM'),
(5, 'E', 'Computer Network', '03:45 PM - 05:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` int(120) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `department` int(120) NOT NULL,
  `course` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `fullname`, `username`, `department`, `course`) VALUES
(1, 'sheun ahmed', '1444-1420', 0, 'intorduction to programming');

-- --------------------------------------------------------

--
-- Table structure for table `course_registration`
--

CREATE TABLE `course_registration` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `course_name` text NOT NULL,
  `total_fee` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_registration`
--

INSERT INTO `course_registration` (`id`, `username`, `course_name`, `total_fee`) VALUES
(0, '22-48582-3', 'Web Technology - A, Data Science - B', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `data_science`
--

CREATE TABLE `data_science` (
  `id` int(11) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_science`
--

INSERT INTO `data_science` (`id`, `section`, `subject`, `time`) VALUES
(1, 'A', 'Data science', '08:00 AM - 09:30 AM'),
(2, 'B', 'Data science', '09:45 AM - 11:15 AM'),
(3, 'C', 'Data science', '11:30 AM - 01:00 PM'),
(4, 'D', 'Data science', '02:00 PM - 03:30 PM'),
(5, 'E', 'Data science', '03:45 PM - 05:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `username`, `course_name`, `grade`) VALUES
(1, '22-48582-3', 'Web Technology - A', 'A'),
(2, '22-48582-3', 'Data Science - B', 'B+'),
(3, '22-48582-3', 'Computer Networks - A', 'A-'),
(4, '22-48580-3', 'Web Technology - B', 'B'),
(5, '22-48580-3', 'Data Science - A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `student_name`, `course_name`, `grade`, `year`, `created_at`) VALUES
(1, '22-48582-3', 'maruf', 'data science', 'A+', 2025, '2025-09-13 22:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `leaveapplication`
--

CREATE TABLE `leaveapplication` (
  `ID` int(120) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `application` mediumtext NOT NULL,
  `action` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaveapplication`
--

INSERT INTO `leaveapplication` (`ID`, `fullname`, `username`, `application`, `action`) VALUES
(2, 'hi', '1234-1243', 'r\r\nr\r\nr\r\nr\r\nr\r\nr\r\nrsfsgf\r\nsdfs\r\nfs\r\nfs\r\ndf\r\nsf\r\ns\r\nfs', 'Accpet'),
(3, 'qaqweq', '1234-1243', 'Subject: Application for Leave\r\n\r\nRespected [Manager/Teacher/Principal],\r\n\r\nI am writing to formally request leave from [start date] to [end date] due to [state your reason, e.g., personal reasons, medical issue, family matter, etc.].\r\n\r\nI kindly request you to grant me permission for the mentioned period. I assure you that I will complete all pending responsibilities before/after my return.\r\n\r\nI would be grateful for your kind consideration.\r\n\r\nSincerely,\r\n[Your Full Name]\r\n[Your Position / Roll / ID]', '');

-- --------------------------------------------------------

--
-- Table structure for table `library_book`
--

CREATE TABLE `library_book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `available_copies` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_book`
--

INSERT INTO `library_book` (`id`, `title`, `author`, `available_copies`, `price`) VALUES
(1, 'Introduction to Algorithms', 'Thomas H. Cormen', 1, 500.00),
(2, 'Clean Code', 'Robert C. Martin', 1, 400.00),
(3, 'The Pragmatic Programmer', 'Andrew Hunt', 0, 300.00),
(4, 'Design Patterns', 'Erich Gamma', 0, 600.00),
(5, 'Artificial Intelligence: A Modern Approach', 'Stuart Russell', 1, 700.00);

-- --------------------------------------------------------

--
-- Table structure for table `library_paper`
--

CREATE TABLE `library_paper` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `available_copies` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_paper`
--

INSERT INTO `library_paper` (`id`, `title`, `author`, `available_copies`, `price`) VALUES
(1, 'A Survey on Deep Learning', 'Yann LeCun', 9, 200.00),
(2, 'Quantum Computing for Computer Scientists', 'Noson S. Yanofsky', 8, 250.00),
(3, 'The Art of Computer Programming', 'Donald E. Knuth', 9, 800.00),
(4, 'Introduction to the Theory of Computation', 'Michael Sipser', 9, 450.00),
(5, 'Computer Networks', 'Andrew S. Tanenbaum', 2, 350.00);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`) VALUES
(1, '2222-3333', '12345678'),
(2, '22-40000-2', '1qaz2wsx'),
(3, '1234-1234', '1qaz2wsx'),
(5, '22-10010-0', '$2y$10$ItbOZNEb0AXy7qYY4yqhT.H6/vRvJcOMjVq27HQbIPdarRDYnLMWa'),
(6, '2222-1111', '$2y$10$/wvV5IlybdQEv79ds0t/Yeym7UFCx4Hm4WHVGGBsDq1TN.620elEa'),
(7, '1233-1234', '$2y$10$sxyY1qgFvshLDiPsON0zKelCdiOLUwTB9SrO1uec.2rcjRApZoGHi'),
(9, '1090-1960', '$2y$10$MT4QkHXKYGqJE5JQDrbg0OeqsaPE.HtAtcwR0YgeOqyvubtNgzB7y'),
(11, '1223-5678', '$2y$10$sfCdKY1VCumeMrErW6ZOSeQkoFJfBPTDH3gmEd95QuFwI9apHjjJu'),
(12, '22-47527-2', '$2y$10$PKVfXJZNqXZMzslQTb4uYemVBDbIlKzb.YG4PjqUw0hDFb/1SThMG'),
(13, '2222-1111', ''),
(14, '1234-1234', '$2y$10$moh2Vu3HnO85wrUr2XGA1uFeSe.qIaqcQreJv4i8phoBtigBCF3FG'),
(15, '1234-1234', '$2y$10$TJbgc6RVUlzM8c1zm6PskevTXDvbsjBRsGTwcMgGtaLVVqgBIWaFq'),
(16, '1234-1243', '$2y$10$7b4hAL6zje8sJiLDsBKQ2OG0PbVV3CZ305TDMxoVJEnCKPOjQOs0S'),
(17, '1234-1265', '$2y$10$RBpZdLCizCYIkFnjlUq0Y.aJaPMdwxqzyDJ1aUaDRR2i.GjNKWk72'),
(18, '00-00000-0', '$2y$10$gsBS8lJM7KePDr7dkNtswuRr5MqvCMf9XmbujEulVYSxfXSICUC7e'),
(19, '01-01010-1', '$2y$10$HjGBoyIqEtYRL403Bij2I./3bPPC3LpbDZ3IrGoyva5TjH3AlRYGW'),
(20, '22-47625-4', '$2y$10$kjVMVfd43PVkEreSuvdPRey/HybaPZRXcoH9rhpNAW63JWusd.7q2'),
(21, '1444-1420', '$2y$10$nC4cRU1.QsWzRicOU0enrul1eRdkqoVP5A2foFfK7aiSlQqwj8IOW'),
(23, '29-21901-0', '$2y$10$YEG7Z9mJo8KKE9v5Jxn5neyt6o20SUSMwhmWP3P9OmwcaXp.bW42a'),
(24, '22-34467-2', '$2y$10$rzVUUBH11/IWH0YIuKqo7e7Hd7voevDRBx3S3PfeOpeiPf7VQCD3C'),
(25, '1234-1234', '$2y$10$Rom3D5vMt.4gZSdKtkNLGudqoDzQFRK2DUPG3UujhND7RJk8NuK0i'),
(26, '22-48582-3', '$2y$10$qU.nOfWFE87PsTZ9PWEIsO6HGpEy9FRerSq4iyNJZ2n6BwhMQjqde'),
(27, '22-77777-2', '$2y$10$9BgDmjpxnMB7.JlcissnqOfkzpIO2qZHhhJUQvVlwKL09i01XHTmq'),
(28, '9999-0000', '$2y$10$PS8ko.qs4oiEZHd2AD9Y8eQ.UQTCQ2gD5mqS3uD5PbnPjlkpROBdu'),
(29, '3333-4444', '$2y$10$Ncg/KTG/YeTFlqW4uY2Ibu.IDrr9rO8RlWRCnckdxiOuOBrB6Oq0S'),
(30, '22-48583-3', '$2y$10$eFmLoeNqQrvun.ujzbTahubBnF7IOojpxCkwwyQJY9Xct2RP75G2O'),
(31, '2001-2025', '$2y$10$2wbf5/uDGdwIC9L71T8Zxu5Bkefs6fcJ9mDlBp6ApZR4bw5UUjJkW'),
(32, '1233-4455', '$2y$10$UntE4cezTSydJuCKx6fuwOIJYWwaiUX9512bn/IOEm8n8VnPH.OBW');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `Material_ID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `Upload_Date` date DEFAULT NULL,
  `Upload_File` longblob DEFAULT NULL,
  `File_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `course_name` text NOT NULL,
  `amount` int(11) NOT NULL,
  `bank_number` varchar(20) DEFAULT NULL,
  `cvc` varchar(5) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'Completed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `username`, `course_name`, `amount`, `bank_number`, `cvc`, `payment_status`, `created_at`) VALUES
(0, 'admin', 'Web Technology - A, Data Science - C', 10000, '1234567890123456', '123', 'Completed', '2025-09-13 16:41:56'),
(3, '22-48582-3', 'Web Technology - A, Data Science - D', 10000, '1234567890123456', '123', 'Completed', '2025-09-13 15:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `ID` int(120) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL,
  `department` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `notification` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `fullname`, `role`, `department`, `username`, `email`, `password`, `notification`) VALUES
(19, 'maruf', 'Teacher', 'FST', '1223-5678', 'mdrifatunnabi@gmail.com', '$2y$10$sfCdKY1VCumeMrErW6ZOSeQkoFJfBPTDH3gmEd95QuFwI9apHjjJu', 'attention to all user. you are now our member.'),
(24, 'mahatab shah', 'Teacher', 'FST', '1234-1243', 'mdrifatunnabi@gmail.com', '$2y$10$7b4hAL6zje8sJiLDsBKQ2OG0PbVV3CZ305TDMxoVJEnCKPOjQOs0S', 'attention to all user. you are now our member.'),
(25, 'mahatab shah', 'Teacher', 'FEE', '1234-1265', 'mdrifatunnabi@gmail.com', '$2y$10$RBpZdLCizCYIkFnjlUq0Y.aJaPMdwxqzyDJ1aUaDRR2i.GjNKWk72', 'attention to all user. you are now our member.'),
(26, 'rifat rifat', 'Student', 'FBA', '00-00000-0', '11@gamil.com', '$2y$10$gsBS8lJM7KePDr7dkNtswuRr5MqvCMf9XmbujEulVYSxfXSICUC7e', 'attention to all user. you are now our member.'),
(27, 'rifat tunn', 'Student', 'FEE', '01-01010-1', 'mdrifatunnabi@gmail.com', '$2y$10$HjGBoyIqEtYRL403Bij2I./3bPPC3LpbDZ3IrGoyva5TjH3AlRYGW', 'attention to all user. you are now our member.'),
(28, 'rifat', 'Student', 'FEE', '22-47625-4', 'mdrifatunnabi@gmail.com', '$2y$10$kjVMVfd43PVkEreSuvdPRey/HybaPZRXcoH9rhpNAW63JWusd.7q2', 'attention to all user. you are now our member.'),
(29, 'sheun ahmed', 'Teacher', 'FBA', '1444-1420', '11@gamil.com', '$2y$10$nC4cRU1.QsWzRicOU0enrul1eRdkqoVP5A2foFfK7aiSlQqwj8IOW', 'attention to all user. you are now our member.'),
(31, 'rifatun rifat', 'Student', 'FST', '29-21901-0', 'mdrifatunnabi@gmail.com', '$2y$10$YEG7Z9mJo8KKE9v5Jxn5neyt6o20SUSMwhmWP3P9OmwcaXp.bW42a', 'attention to all user. you are now our member.'),
(32, 'MD.Rifatun Nobi Rifat', 'Student', 'FST', '22-34467-2', 'mdrifatunnabi@gmail.com', '$2y$10$rzVUUBH11/IWH0YIuKqo7e7Hd7voevDRBx3S3PfeOpeiPf7VQCD3C', 'attention to all user. you are now our member.'),
(35, 'md.rifatun nobi rifat', 'Student', 'FST', '22-77777-2', 'mdrifatunnabi@gmail.com', '$2y$10$9BgDmjpxnMB7.JlcissnqOfkzpIO2qZHhhJUQvVlwKL09i01XHTmq', 'attention to all user. you are now our member.'),
(49, 'MD. Naimur Rahman', 'Teacher', 'FEE', '9999-0000', '11@gamil.com', '$2y$10$PS8ko.qs4oiEZHd2AD9Y8eQ.UQTCQ2gD5mqS3uD5PbnPjlkpROBdu', ''),
(50, 'durjoy ahmed', 'Teacher', 'FBA', '3333-4444', '11@gamil.com', '$2y$10$Ncg/KTG/YeTFlqW4uY2Ibu.IDrr9rO8RlWRCnckdxiOuOBrB6Oq0S', ''),
(51, 'md. maruf chowdhury', 'Student', 'FST', '22-48583-3', 'marufchowdhury@gmail.com', '$2y$10$eFmLoeNqQrvun.ujzbTahubBnF7IOojpxCkwwyQJY9Xct2RP75G2O', ''),
(52, 'sheun ahmed', 'Teacher', 'FST', '2001-2025', 'sheunahmed@gmail.com', '$2y$10$2wbf5/uDGdwIC9L71T8Zxu5Bkefs6fcJ9mDlBp6ApZR4bw5UUjJkW', '');

-- --------------------------------------------------------

--
-- Table structure for table `reset_codes`
--

CREATE TABLE `reset_codes` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(6) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset_codes`
--

INSERT INTO `reset_codes` (`id`, `email`, `code`, `expires_at`, `created_at`) VALUES
(1, 'marufhasanchowdhury2002@gmail.com', '366984', '2025-09-12 21:23:27', '2025-09-12 19:13:27'),
(2, 'marufhasanchowdhury2002@gmail.com', '160419', '2025-09-12 21:23:38', '2025-09-12 19:13:38'),
(3, 'marufhasanchowdhury2002@gmail.com', '976627', '2025-09-12 21:25:46', '2025-09-12 19:15:46'),
(4, 'marufhasanchowdhury2002@gmail.com', '767608', '2025-09-12 21:36:32', '2025-09-12 19:26:32'),
(5, 'marufhasanchowdhury2002@gmail.com', '507292', '2025-09-12 21:36:47', '2025-09-12 19:26:47'),
(6, 'marufhasanchowdhury2002@gmail.com', '112005', '2025-09-12 21:37:09', '2025-09-12 19:27:09'),
(7, 'marufhasanchowdhury2002@gmail.com', '862292', '2025-09-12 21:37:51', '2025-09-12 19:27:51'),
(8, 'marufhasanchowdhury2002@gmail.com', '477080', '2025-09-12 21:39:49', '2025-09-12 19:29:49'),
(9, 'marufhasanchowdhury2002@gmail.com', '813965', '2025-09-12 21:39:53', '2025-09-12 19:29:53'),
(10, 'marufhasanchowdhury2002@gmail.com', '620129', '2025-09-12 21:39:55', '2025-09-12 19:29:55'),
(11, 'marufhasanchowdhury2002@gmail.com', '533123', '2025-09-12 21:46:40', '2025-09-12 19:36:40'),
(12, 'marufhasanchowdhury06@gmail.com', '542354', '2025-09-12 21:47:08', '2025-09-12 19:37:08'),
(13, 'marufhasanchowdhury06@gmail.com', '994930', '2025-09-12 21:51:05', '2025-09-12 19:41:05'),
(14, 'marufhasanchowdhury06@gmail.com', '642278', '2025-09-12 21:52:22', '2025-09-12 19:42:22'),
(15, 'marufhasanchowdhury06@gmail.com', '683465', '2025-09-12 21:53:26', '2025-09-12 19:43:26'),
(16, 'marufhasanchowdhury06@gmail.com', '176313', '2025-09-12 21:54:38', '2025-09-12 19:44:38'),
(17, 'marufhasanchowdhury06@gmail.com', '550944', '2025-09-13 12:15:08', '2025-09-13 10:05:08'),
(18, 'marufhasanchowdhury06@gmail.com', '608261', '2025-09-13 12:27:20', '2025-09-13 10:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ID` int(120) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `result` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `ID` int(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `salary` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `username`, `salary`) VALUES
(1, '1223-5678', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `scourse`
--

CREATE TABLE `scourse` (
  `ID` int(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `registercourse` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `Course ID` int(150) NOT NULL,
  `Course Name` varchar(150) NOT NULL,
  `Instructor` varchar(150) NOT NULL,
  `Credits` int(150) NOT NULL,
  `Schedule` varchar(150) NOT NULL,
  `Action` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`Course ID`, `Course Name`, `Instructor`, `Credits`, `Schedule`, `Action`) VALUES
(1, 'Physics I', 'Dr. Hossain', 3, 'Tue-Thu 11:00-12:30', 'Edit | Delete'),
(2, '', '', 0, '', ''),
(3, '', '', 0, '', ''),
(4, 'abc', 'xyz', 3, '10:20-11:20', ''),
(1, 'Physics I', 'Dr. Hossain', 3, 'Tue-Thu 11:00-12:30', 'Edit | Delete'),
(2, '', '', 0, '', ''),
(3, '', '', 0, '', ''),
(4, 'abc', 'xyz', 3, '10:20-11:20', ''),
(1, 'Physics I', 'Dr. Hossain', 3, 'Tue-Thu 11:00-12:30', 'Edit | Delete'),
(2, '', '', 0, '', ''),
(3, '', '', 0, '', ''),
(4, 'abc', 'xyz', 3, '10:20-11:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `tcourse`
--

CREATE TABLE `tcourse` (
  `ID` int(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `department` varchar(120) NOT NULL,
  `assigncourse` varchar(250) NOT NULL,
  `section` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tcourse`
--

INSERT INTO `tcourse` (`ID`, `username`, `fullname`, `department`, `assigncourse`, `section`) VALUES
(62, '1223-5678', 'maruf', 'FST', 'DATA  SCIENCE-C', ''),
(63, '1234-1243', 'mahatab shah', 'FST', 'NLP-', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`id`, `username`, `course_name`) VALUES
(11, '22-48582-3', 'Web Technology - A'),
(12, '22-48582-3', 'Data Science - B');

-- --------------------------------------------------------

--
-- Table structure for table `web_tech`
--

CREATE TABLE `web_tech` (
  `id` int(11) NOT NULL,
  `section` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_tech`
--

INSERT INTO `web_tech` (`id`, `section`, `subject`, `time`) VALUES
(1, 'A', 'Web Technology', '08:00 AM - 09:30 AM'),
(2, 'B', 'Web Technology', '09:45 AM - 11:15 AM'),
(4, 'D', 'Web Technology', '02:00 PM - 03:30 PM'),
(5, 'E', 'Web Technology', '03:45 PM - 05:15 PM'),
(1, 'A', 'Web Technology', '08:00 AM - 09:30 AM'),
(2, 'B', 'Web Technology', '09:45 AM - 11:15 AM'),
(4, 'D', 'Web Technology', '02:00 PM - 03:30 PM'),
(5, 'E', 'Web Technology', '03:45 PM - 05:15 PM'),
(1, 'A', 'Web Technology', '08:00 AM - 09:30 AM'),
(2, 'B', 'Web Technology', '09:45 AM - 11:15 AM'),
(4, 'D', 'Web Technology', '02:00 PM - 03:30 PM'),
(5, 'E', 'Web Technology', '03:45 PM - 05:15 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcourse`
--
ALTER TABLE `addcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `computer_network`
--
ALTER TABLE `computer_network`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_science`
--
ALTER TABLE `data_science`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `library_book`
--
ALTER TABLE `library_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_paper`
--
ALTER TABLE `library_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `scourse`
--
ALTER TABLE `scourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tcourse`
--
ALTER TABLE `tcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcourse`
--
ALTER TABLE `addcourse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scourse`
--
ALTER TABLE `scourse`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tcourse`
--
ALTER TABLE `tcourse`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
