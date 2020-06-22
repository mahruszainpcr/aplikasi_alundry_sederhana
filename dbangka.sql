-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 22, 2020 at 01:52 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dbwashing`
--

-- --------------------------------------------------------

--
-- Table structure for table `angka`
--

CREATE TABLE `angka` (
  `id` int(11) NOT NULL,
  `A` int(11) NOT NULL,
  `B` int(11) NOT NULL,
  `C` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `angka`
--

INSERT INTO `angka` (`id`, `A`, `B`, `C`) VALUES
(2, 4, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angka`
--
ALTER TABLE `angka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angka`
--
ALTER TABLE `angka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
