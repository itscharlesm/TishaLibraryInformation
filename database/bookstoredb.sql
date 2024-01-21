-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 01:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookclubmanagement_mendoza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `BookID` int(255) NOT NULL,
  `BookTitle` varchar(255) NOT NULL,
  `BookISBN` varchar(255) NOT NULL,
  `BookAuthor` varchar(255) NOT NULL,
  `BookPublicationYear` varchar(255) NOT NULL,
  `BookPublisher` varchar(255) NOT NULL,
  `BookCopies` varchar(255) NOT NULL,
  `CategoryID` varchar(255) NOT NULL,
  `isActive` text NOT NULL DEFAULT 'Yes',
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='5';

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`BookID`, `BookTitle`, `BookISBN`, `BookAuthor`, `BookPublicationYear`, `BookPublisher`, `BookCopies`, `CategoryID`, `isActive`, `Date`) VALUES
(1, 'Harry Potter', '5100045158973', 'J. K. Rowling', '2019', 'Bloomsbury', '20321', '4 - Fantasy', 'No', '2023-06-20'),
(2, 'The Hunger', '2572528418449', 'Suzanne Collins', '2019', 'Scholastic', '251232', '', 'Yes', '2023-06-21'),
(3, 'Treasure Island', '3514460373941', 'Robert Louis Stevenson', '2010', 'Cassell and Company', '52135', '1 - Action', 'Yes', '2023-06-21'),
(4, 'Divergent', '56360778675', 'Veronica Roth', '2015', 'Katherine Tegen Books', '41223', '4 - Fantasy', 'Yes', '2023-06-21'),
(5, 'teacher', '9907321862163', 'jenny', '2015', 'um', '222', '4 - Fantasy', 'Yes', '2023-06-21'),
(6, 'Books', '4335208431921', 'UM', '2015', 'Evan', '242', '5 - Supernatural', 'Yes', '2023-06-21'),
(7, 'Habbo', '5535733359169', 'US', '2020', 'UM', '2421', '4 - Fantasy', 'Yes', '2023-06-21'),
(8, 'Lovely', '9109423445341', 'George Mendoza', '2015', 'James John', '21412', '3 - Romance', 'Yes', '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookcategory`
--

CREATE TABLE `tbl_bookcategory` (
  `CategoryID` int(15) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `IsActive` text NOT NULL DEFAULT 'Yes',
  `DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookcategory`
--

INSERT INTO `tbl_bookcategory` (`CategoryID`, `CategoryName`, `IsActive`, `DateTime`) VALUES
(2, 'Drama', 'No', '2023-06-19 23:53:36'),
(3, 'Romance', 'Yes', '2023-06-19 23:53:36'),
(4, 'Fantasy', 'Yes', '2023-06-19 23:53:36'),
(5, 'Supernatural', 'Yes', '2023-06-19 23:53:36'),
(6, 'Adventure', 'Yes', '2023-06-21 08:14:35'),
(7, 'Classics', 'Yes', '2023-06-21 08:15:05'),
(8, 'Fan Fiction', 'Yes', '2023-06-21 08:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

CREATE TABLE `tbl_guest` (
  `GuestID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guest`
--

INSERT INTO `tbl_guest` (`GuestID`, `name`, `email`, `password`) VALUES
(1, 'im a guest', 'guest@guest.com', '1'),
(2, 'George Vincent Pena', 'georgep@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_librarian`
--

CREATE TABLE `tbl_librarian` (
  `LibrarianID` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_librarian`
--

INSERT INTO `tbl_librarian` (`LibrarianID`, `email`, `password`, `name`, `DateTime`) VALUES
(1, 'admin@admin.com', '1', 'Charleslexcel B. Mendoza', '2023-06-21 00:40:44'),
(2, 'itskyllem@gmail.com', '1', 'Kylle Adyzza I. Mendoza', '2023-06-21 00:41:21'),
(3, 'c.abuzo123@gmail.com', '1', 'Loyd Clarence Abuzo', '2023-06-21 00:42:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `tbl_bookcategory`
--
ALTER TABLE `tbl_bookcategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- Indexes for table `tbl_librarian`
--
ALTER TABLE `tbl_librarian`
  ADD PRIMARY KEY (`LibrarianID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `BookID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_bookcategory`
--
ALTER TABLE `tbl_bookcategory`
  MODIFY `CategoryID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  MODIFY `GuestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_librarian`
--
ALTER TABLE `tbl_librarian`
  MODIFY `LibrarianID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
