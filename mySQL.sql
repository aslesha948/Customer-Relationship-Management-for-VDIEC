-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2019 at 12:50 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `crm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `calling`
--

CREATE TABLE `calling` (
  `Id` int(10) NOT NULL,
  `student_Name` varchar(50) NOT NULL,
  `source` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `comments` varchar(300) DEFAULT NULL,
  `lead_id` int(11) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calling`
--

INSERT INTO `calling` (`Id`, `student_Name`, `source`, `contact`, `email`, `status`, `comments`, `lead_id`, `user_email`) VALUES
(1, 'tye', 'Facebook', 342, 't@t.t', 'warm', 'kjsfbvugweufnisiaen', 1, 'aslesha.kamera@my.jcu.edu.au');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Source` varchar(20) NOT NULL,
  `Contact` int(10) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `Name`, `Source`, `Contact`, `EmailID`, `Status`) VALUES
(1, 'tye', 'Facebook', 342, 't@t.t', 'cold'),
(2, 'yte', 'Education Fair', 12345, 'ty@ty.ty', 'Warm'),
(3, 'sirish', 'Education Fair', 45225, 'te@t.e', 'ytte'),
(4, 'jghjghj', 'mdfkhsk', 6656565, 'bjkrhgfjkdhgkjd@t.', 'warm'),
(5, 'test', 'ft', 510309339, 'test@tes.t', 'hot');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `password`, `number`) VALUES
(1, 2019001, 'Aslesha', 'aslesha.kamera@my.jcu.edu.au', 'aslesha15', 420651502),
(2, 2019002, 'Sirish', 'sirishvardhanreddy.yenugu@my.jcu.edu.au', 'qwerty1449', 470306550),
(3, 122321312, 'serfs', 'tet@t.com', '852', 65321478),
(4, 2019005, 'sai', 'sai@sai.com', '9874', 69854712),
(5, 2019006, 'sai1', 'poorna@sai.com', '852', 698684712);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calling`
--
ALTER TABLE `calling`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`),
  ADD UNIQUE KEY `Contact` (`Contact`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calling`
--
ALTER TABLE `calling`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
