-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Abr 19, 2011 as 05:31 AM
-- Versão do Servidor: 5.5.9
-- Versão do PHP: 5.3.5

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
-- Estrutura da tabela `sf_guard_forgot_password`
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
-- Extraindo dados da tabela `sf_guard_forgot_password`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_group`
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
-- Extraindo dados da tabela `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Grupo de Administradores', '2011-04-19 02:10:29', '2011-04-19 02:10:29'),
(2, 'sec', 'Grupo da Secretaria do Instituto', '2011-04-19 03:40:48', '2011-04-19 03:40:52'),
(3, 'dir', 'Grupo da Diretoria do Instituto', '2011-04-19 03:40:55', '2011-04-19 03:40:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_group_permission`
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
-- Extraindo dados da tabela `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2011-04-19 02:10:29', '2011-04-19 02:10:29'),
(2, 2, '2011-04-19 03:43:17', '2011-04-19 03:43:19'),
(3, 3, '2011-04-19 03:43:24', '2011-04-19 03:43:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Permissão de Administrador', '2011-04-19 02:10:29', '2011-04-19 02:10:29'),
(2, 'sec', 'Permissão da Secretaria do Instituto', '2011-04-19 03:42:12', '2011-04-19 03:42:14'),
(3, 'dir', 'Permissão da Diretoria do Instituto', '2011-04-19 03:42:17', '2011-04-19 03:42:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_remember_key`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_user`
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
-- Extraindo dados da tabela `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '', 'admin@admin.com', 'admin', 'sha1', 'dd994942d883ea20c746c039752205ea', 'ab7b775c8c0f35a30e4afb8b03e570bbbf238cf2', 1, 1, '2011-04-19 04:48:28', '2011-04-19 02:10:29', '2011-04-19 04:48:28'),
(2, NULL, NULL, 'sec@sec.com', 'sec', 'sha1', '3f7105dd2dfd47412d0fcdedc0ce763f', 'daf91c298829fa67efe77fa9d03d4a07d321ef75', 1, 0, '2011-04-19 05:30:27', '2011-04-19 05:29:56', '2011-04-19 05:30:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_user_group`
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
-- Extraindo dados da tabela `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2011-04-19 02:10:29', '2011-04-19 02:10:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_user_permission`
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
-- Extraindo dados da tabela `sf_guard_user_permission`
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
  ADD CONSTRAINT `crowd_subj_cd_key_subject_subj_cd_key` FOREIGN KEY (`subj_cd_key`) REFERENCES `subject` (`subj_cd_key`),
  ADD CONSTRAINT `crowd_ibfk_1` FOREIGN KEY (`time_cd_key`) REFERENCES `timetable` (`time_cd_key`),
  ADD CONSTRAINT `crowd_ibfk_2` FOREIGN KEY (`subj_cd_key`) REFERENCES `subject` (`subj_cd_key`),
  ADD CONSTRAINT `crowd_ibfk_3` FOREIGN KEY (`teac_cd_key`) REFERENCES `teacher` (`teac_cd_key`),
  ADD CONSTRAINT `crowd_teac_cd_key_teacher_teac_cd_key` FOREIGN KEY (`teac_cd_key`) REFERENCES `teacher` (`teac_cd_key`),
  ADD CONSTRAINT `crowd_time_cd_key_timetable_time_cd_key` FOREIGN KEY (`time_cd_key`) REFERENCES `timetable` (`time_cd_key`);

--
-- Restrições para a tabela `crowd_room`
--
ALTER TABLE `crowd_room`
  ADD CONSTRAINT `crowd_room_crow_cd_key_crowd_crow_cd_key` FOREIGN KEY (`crow_cd_key`) REFERENCES `crowd` (`crow_cd_key`),
  ADD CONSTRAINT `crowd_room_crrs_cd_key_crowd_room_status_crrs_cd_key` FOREIGN KEY (`crrs_cd_key`) REFERENCES `crowd_room_status` (`crrs_cd_key`),
  ADD CONSTRAINT `crowd_room_ibfk_4` FOREIGN KEY (`room_cd_key`) REFERENCES `room` (`room_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crowd_room_ibfk_5` FOREIGN KEY (`crow_cd_key`) REFERENCES `crowd` (`crow_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crowd_room_ibfk_6` FOREIGN KEY (`crrs_cd_key`) REFERENCES `crowd_room_status` (`crrs_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crowd_room_room_cd_key_room_room_cd_key` FOREIGN KEY (`room_cd_key`) REFERENCES `room` (`room_cd_key`);

--
-- Restrições para a tabela `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_buil_cd_key_building_buil_cd_key` FOREIGN KEY (`buil_cd_key`) REFERENCES `building` (`buil_cd_key`),
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`buil_cd_key`) REFERENCES `building` (`buil_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Restrições para a tabela `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Restrições para a tabela `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Restrições para a tabela `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Restrições para a tabela `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;
