-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.projetofinaluff.dreamhosters.com
-- Generation Time: Nov 11, 2012 at 02:30 PM
-- Server version: 5.1.53
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `room_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `buil_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `buil_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`buil_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`buil_cd_key`, `buil_nm_name`) VALUES
(1, 'Bloco E - Praia Vermelha'),
(3, 'Ufasa Praia Vermelha'),
(4, 'Ufasa Gragoatá'),
(9, 'Bloco D - Praia Vermelha');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `cour_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `cour_nb_code` int(2) DEFAULT NULL,
  `cour_nm_name` varchar(80) NOT NULL,
  PRIMARY KEY (`cour_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cour_cd_key`, `cour_nb_code`, `cour_nm_name`) VALUES
(1, 31, 'Ciência da Computação'),
(2, 20, 'Matemática'),
(11, NULL, 'Sistemas de Informação');

-- --------------------------------------------------------

--
-- Table structure for table `crowd`
--

CREATE TABLE IF NOT EXISTS `crowd` (
  `crow_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `teac_cd_key` int(11) DEFAULT NULL,
  `crow_nm_name` varchar(2) NOT NULL,
  `crow_nb_module` int(11) NOT NULL,
  `subj_cd_key` int(11) NOT NULL,
  PRIMARY KEY (`crow_cd_key`),
  KEY `teac_cd_key` (`teac_cd_key`),
  KEY `subj_cd_key` (`subj_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `crowd`
--

INSERT INTO `crowd` (`crow_cd_key`, `teac_cd_key`, `crow_nm_name`, `crow_nb_module`, `subj_cd_key`) VALUES
(13, 7, 'A1', 40, 23),
(14, 8, 'B1', 30, 23),
(15, 9, 'C1', 30, 23),
(16, 10, 'E1', 30, 23),
(17, 11, 'A1', 40, 22),
(19, 11, 'B1', 35, 22),
(20, 16, 'B1', 40, 24),
(21, 17, 'C1', 40, 24),
(22, 12, 'B1', 45, 1),
(23, 13, 'A1', 10, 25),
(24, 12, 'A1', 45, 26),
(25, 18, 'A1', 40, 27),
(26, 17, 'A2', 30, 27);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `buil_cd_key` int(11) NOT NULL,
  `room_nm_number` varchar(10) NOT NULL,
  `room_nb_vagas` int(11) NOT NULL,
  PRIMARY KEY (`room_cd_key`),
  KEY `buil_cd_key` (`buil_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_cd_key`, `buil_cd_key`, `room_nm_number`, `room_nb_vagas`) VALUES
(18, 1, '230', 40),
(19, 3, '230', 50),
(20, 1, '232', 50),
(21, 1, '234', 40),
(22, 3, '102', 20),
(23, 1, '236', 60),
(24, 1, '440', 50),
(25, 4, '101', 20);

-- --------------------------------------------------------

--
-- Table structure for table `room_crowd_datetime`
--

CREATE TABLE IF NOT EXISTS `room_crowd_datetime` (
  `rocd_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `rcds_cd_key` int(11) NOT NULL,
  `crow_cd_key` int(11) NOT NULL,
  `room_cd_key` int(11) DEFAULT NULL,
  `rocd_nb_weekday` int(1) NOT NULL,
  `rocd_dt_start_time` time NOT NULL,
  `rocd_dt_final_time` time NOT NULL,
  PRIMARY KEY (`rocd_cd_key`),
  KEY `rcds_cd_key` (`rcds_cd_key`),
  KEY `crow_cd_key` (`crow_cd_key`),
  KEY `room_cd_key` (`room_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `room_crowd_datetime`
--

INSERT INTO `room_crowd_datetime` (`rocd_cd_key`, `rcds_cd_key`, `crow_cd_key`, `room_cd_key`, `rocd_nb_weekday`, `rocd_dt_start_time`, `rocd_dt_final_time`) VALUES
(13, 1, 13, 18, 1, '08:00:00', '11:00:00'),
(14, 1, 13, 18, 3, '08:00:00', '11:00:00'),
(15, 1, 14, 19, 1, '08:00:00', '11:00:00'),
(16, 1, 14, 19, 3, '08:00:00', '11:00:00'),
(17, 1, 15, 20, 3, '08:00:00', '11:00:00'),
(18, 1, 15, 18, 5, '08:00:00', '11:00:00'),
(19, 1, 16, 21, 3, '09:00:00', '11:00:00'),
(20, 1, 16, 21, 5, '09:00:00', '13:00:00'),
(21, 1, 17, 18, 2, '14:00:00', '16:00:00'),
(22, 1, 19, 18, 4, '14:00:00', '16:00:00'),
(23, 1, 20, 20, 2, '08:00:00', '11:00:00'),
(24, 1, 20, 21, 4, '08:00:00', '11:00:00'),
(25, 1, 21, 20, 2, '08:00:00', '11:00:00'),
(26, 1, 21, 21, 4, '08:00:00', '11:00:00'),
(27, 1, 22, 19, 2, '09:00:00', '11:00:00'),
(28, 1, 22, 19, 4, '09:00:00', '11:00:00'),
(29, 1, 23, 22, 2, '18:00:00', '20:00:00'),
(30, 1, 23, 22, 4, '18:00:00', '20:00:00'),
(31, 1, 24, 20, 3, '11:00:00', '13:00:00'),
(32, 1, 25, 24, 4, '11:00:00', '13:00:00'),
(33, 1, 25, 18, 1, '11:00:00', '15:00:00'),
(34, 1, 26, NULL, 1, '11:00:00', '13:00:00'),
(35, 1, 26, 24, 4, '11:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `room_crowd_datetime_status`
--

CREATE TABLE IF NOT EXISTS `room_crowd_datetime_status` (
  `rcds_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `rcds_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`rcds_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `room_crowd_datetime_status`
--

INSERT INTO `room_crowd_datetime_status` (`rcds_cd_key`, `rcds_nm_name`) VALUES
(1, 'Aprovado'),
(2, 'Pendente');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_forgot_password`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Grupo de Administradores', '2011-04-19 02:10:29', '2011-04-19 02:10:29'),
(2, 'sec', 'Grupo da Secretaria do Instituto', '2011-04-19 03:40:48', '2011-04-19 03:40:52'),
(3, 'dir', 'Grupo da Diretoria do Instituto', '2011-04-19 03:40:55', '2011-04-19 03:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2011-04-19 02:10:29', '2011-04-19 02:10:29'),
(2, 2, '2011-04-19 03:43:17', '2011-04-19 03:43:19'),
(3, 3, '2011-04-19 03:43:24', '2011-04-19 03:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Permissão de Administrador', '2011-04-19 02:10:29', '2011-04-19 02:10:29'),
(2, 'sec', 'Permissão da Secretaria do Instituto', '2011-04-19 03:42:12', '2011-04-19 03:42:14'),
(3, 'dir', 'Permissão da Diretoria do Instituto', '2011-04-19 03:42:17', '2011-04-19 03:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sf_guard_remember_key`
--

INSERT INTO `sf_guard_remember_key` (`id`, `user_id`, `remember_key`, `ip_address`, `created_at`, `updated_at`) VALUES
(8, 1, '9kmba5ua60cokwsww08k4oo00o4kc00', '186.212.144.195', '2012-10-08 20:53:34', '2012-10-08 20:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '', 'admin@admin.com', 'admin', 'sha1', 'dd994942d883ea20c746c039752205ea', 'ab7b775c8c0f35a30e4afb8b03e570bbbf238cf2', 1, 1, '2012-11-06 05:26:42', '2011-04-19 02:10:29', '2012-11-06 05:26:42'),
(2, NULL, NULL, 'sec@sec.com', 'sec', 'sha1', '3f7105dd2dfd47412d0fcdedc0ce763f', 'daf91c298829fa67efe77fa9d03d4a07d321ef75', 1, 0, '2011-04-19 05:30:27', '2011-04-19 05:29:56', '2011-04-19 05:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2011-04-19 02:10:29', '2011-04-19 02:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subj_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `subj_nm_code` varchar(10) DEFAULT NULL,
  `subj_nm_name` varchar(40) NOT NULL,
  `cour_cd_key` int(11) DEFAULT NULL,
  PRIMARY KEY (`subj_cd_key`),
  UNIQUE KEY `subj_nm_code` (`subj_nm_code`),
  KEY `cour_cd_key` (`cour_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_cd_key`, `subj_nm_code`, `subj_nm_name`, `cour_cd_key`) VALUES
(1, 'TCC00168', 'Métodos Numéricos', 1),
(22, 'TCC00169', 'Introdução à Ciência da Computação', 1),
(23, 'TCC00173', 'Programação de Computadores I', 1),
(24, 'TCC00174', 'Programação de Computadores II', 1),
(25, 'TCC00280', 'Computação e Meio Ambiente', 1),
(26, 'TCC00189', 'Computação e Sociedade', 1),
(27, 'tcc001010', 'Adm', 11);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teac_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `teac_nm_name` varchar(80) NOT NULL,
  `teac_nm_email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`teac_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teac_cd_key`, `teac_nm_name`, `teac_nm_email`) VALUES
(2, 'Martinhon', ''),
(3, 'Regina', ''),
(7, 'Dante', ''),
(8, 'Esteban', ''),
(9, 'Mateus', ''),
(10, 'Vanessa', ''),
(11, 'Julius', ''),
(12, 'José Raphael', ''),
(13, 'Rosângela', ''),
(15, 'Loana', ''),
(16, 'Marcos', ''),
(17, 'Leonardo', ''),
(18, 'Murta', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crowd`
--
ALTER TABLE `crowd`
  ADD CONSTRAINT `crowd_ibfk_1` FOREIGN KEY (`teac_cd_key`) REFERENCES `teacher` (`teac_cd_key`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `crowd_ibfk_2` FOREIGN KEY (`subj_cd_key`) REFERENCES `subject` (`subj_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`buil_cd_key`) REFERENCES `building` (`buil_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_crowd_datetime`
--
ALTER TABLE `room_crowd_datetime`
  ADD CONSTRAINT `room_crowd_datetime_ibfk_1` FOREIGN KEY (`rcds_cd_key`) REFERENCES `room_crowd_datetime_status` (`rcds_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_crowd_datetime_ibfk_2` FOREIGN KEY (`crow_cd_key`) REFERENCES `crowd` (`crow_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_crowd_datetime_ibfk_3` FOREIGN KEY (`room_cd_key`) REFERENCES `room` (`room_cd_key`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`cour_cd_key`) REFERENCES `course` (`cour_cd_key`) ON DELETE SET NULL ON UPDATE CASCADE;



ALTER TABLE `crowd` ADD `crow_cd_parent` INT NULL DEFAULT NULL ,
    ADD INDEX ( `crow_cd_parent` ) ;

ALTER TABLE `crowd` ADD FOREIGN KEY ( `crow_cd_parent` ) REFERENCES `room_manager`.`crowd` (
    `crow_cd_key`
) ON DELETE SET NULL ON UPDATE SET NULL ;