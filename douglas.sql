-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Out-2019 às 05:52
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `douglas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `deposit`
--

CREATE TABLE `deposit` (
  `idDeposit` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `value` double(9,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historic`
--

CREATE TABLE `historic` (
  `idHistoric` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `action` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `idAction` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transfer`
--

CREATE TABLE `transfer` (
  `idTransfer` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `value` double(9,2) NOT NULL,
  `date` date NOT NULL,
  `bank_dest` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agency_dest` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `account_number_dest` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `agency` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `balance` double(9,2) NOT NULL,
  `type` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `withdraw`
--

CREATE TABLE `withdraw` (
  `idWithdraw` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `value` double(9,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`idDeposit`),
  ADD KEY `fk_idUser_deposit` (`idUser`);

--
-- Indexes for table `historic`
--
ALTER TABLE `historic`
  ADD PRIMARY KEY (`idHistoric`),
  ADD KEY `fk_idUser_historic` (`idUser`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`idTransfer`),
  ADD KEY `fk_idUser_transfer` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`idWithdraw`),
  ADD KEY `fk_idUser_withdraw` (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `idDeposit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historic`
--
ALTER TABLE `historic`
  MODIFY `idHistoric` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `idTransfer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `idWithdraw` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `fk_idUser_deposit` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `historic`
--
ALTER TABLE `historic`
  ADD CONSTRAINT `fk_idUser_historic` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `fk_idUser_transfer` FOREIGN KEY (`idUser`) REFERENCES `transfer` (`idTransfer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `fk_idUser_withdraw` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
