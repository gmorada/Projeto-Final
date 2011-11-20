-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Abr 18, 2011 as 11:56 PM
-- Versão do Servidor: 5.1.49
-- Versão do PHP: 5.3.3-1ubuntu9.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `room_manager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `buil_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `buil_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`buil_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `building`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `crowd`
--

CREATE TABLE IF NOT EXISTS `crowd` (
  `crow_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `time_cd_key` int(11) NOT NULL,
  `subj_cd_key` int(11) NOT NULL,
  `teac_cd_key` int(11) NOT NULL,
  `crow_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`crow_cd_key`),
  KEY `time_cd_key` (`time_cd_key`),
  KEY `subj_cd_key` (`subj_cd_key`),
  KEY `teac_cd_key` (`teac_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `crowd`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `crowd_room`
--

CREATE TABLE IF NOT EXISTS `crowd_room` (
  `crro_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `crow_cd_key` int(11) NOT NULL,
  `room_cd_key` int(11) NOT NULL,
  `crrs_cd_key` int(11) NOT NULL,
  PRIMARY KEY (`crro_cd_key`),
  KEY `clas_cd_key` (`crow_cd_key`),
  KEY `room_cd_key` (`room_cd_key`),
  KEY `clrs_cd_key` (`crrs_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `crowd_room`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `crowd_room_status`
--

CREATE TABLE IF NOT EXISTS `crowd_room_status` (
  `crrs_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `crrs_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`crrs_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `crowd_room_status`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empl_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `empl_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`empl_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `employee`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `buil_cd_key` int(11) NOT NULL,
  PRIMARY KEY (`room_cd_key`),
  KEY `buil_cd_key` (`buil_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `room`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subj_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `subj_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`subj_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `subject`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teac_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `teac_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`teac_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `teacher`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `time_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `time_dt_time` date NOT NULL,
  PRIMARY KEY (`time_cd_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `timetable`
--


--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `crowd`
--
ALTER TABLE `crowd`
  ADD CONSTRAINT `crowd_ibfk_1` FOREIGN KEY (`time_cd_key`) REFERENCES `timetable` (`time_cd_key`),
  ADD CONSTRAINT `crowd_ibfk_2` FOREIGN KEY (`subj_cd_key`) REFERENCES `subject` (`subj_cd_key`),
  ADD CONSTRAINT `crowd_ibfk_3` FOREIGN KEY (`teac_cd_key`) REFERENCES `teacher` (`teac_cd_key`);

--
-- Restrições para a tabela `crowd_room`
--
ALTER TABLE `crowd_room`
  ADD CONSTRAINT `crowd_room_ibfk_6` FOREIGN KEY (`crrs_cd_key`) REFERENCES `crowd_room_status` (`crrs_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crowd_room_ibfk_4` FOREIGN KEY (`room_cd_key`) REFERENCES `room` (`room_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crowd_room_ibfk_5` FOREIGN KEY (`crow_cd_key`) REFERENCES `crowd` (`crow_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`buil_cd_key`) REFERENCES `building` (`buil_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE;
