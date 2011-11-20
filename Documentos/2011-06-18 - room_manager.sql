-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 18, 2011 as 09:48 
-- Versão do Servidor: 5.5.8
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `building`
--

INSERT INTO `building` (`buil_cd_key`, `buil_nm_name`) VALUES
(1, 'Engenharia'),
(2, 'Valonguinho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `cour_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `cour_nb_code` int(2) NOT NULL,
  `cour_nm_name` varchar(80) NOT NULL,
  PRIMARY KEY (`cour_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`cour_cd_key`, `cour_nb_code`, `cour_nm_name`) VALUES
(1, 31, 'Ciência da Computação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crowd`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `crowd`
--

INSERT INTO `crowd` (`crow_cd_key`, `teac_cd_key`, `crow_nm_name`, `crow_nb_module`, `subj_cd_key`) VALUES
(3, 1, 'A2', 45, 1),
(4, 2, 'A3', 34, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `buil_cd_key` int(11) NOT NULL,
  `room_nm_number` varchar(10) NOT NULL,
  `room_nb_vagas` int(11) NOT NULL,
  PRIMARY KEY (`room_cd_key`),
  KEY `buil_cd_key` (`buil_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `room`
--

INSERT INTO `room` (`room_cd_key`, `buil_cd_key`, `room_nm_number`, `room_nb_vagas`) VALUES
(2, 1, '230', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `room_crowd_datetime`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `room_crowd_datetime`
--

INSERT INTO `room_crowd_datetime` (`rocd_cd_key`, `rcds_cd_key`, `crow_cd_key`, `room_cd_key`, `rocd_nb_weekday`, `rocd_dt_start_time`, `rocd_dt_final_time`) VALUES
(1, 1, 3, 2, 1, '09:00:00', '11:00:00'),
(2, 1, 4, 2, 5, '11:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `room_crowd_datetime_status`
--

CREATE TABLE IF NOT EXISTS `room_crowd_datetime_status` (
  `rcds_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `rcds_nm_name` varchar(40) NOT NULL,
  PRIMARY KEY (`rcds_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `room_crowd_datetime_status`
--

INSERT INTO `room_crowd_datetime_status` (`rcds_cd_key`, `rcds_nm_name`) VALUES
(1, 'Aprovado'),
(2, 'Pendente');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
(1, 'Administrador', '', 'admin@admin.com', 'admin', 'sha1', 'dd994942d883ea20c746c039752205ea', 'ab7b775c8c0f35a30e4afb8b03e570bbbf238cf2', 1, 1, '2011-06-07 03:20:44', '2011-04-19 02:10:29', '2011-06-07 03:20:44'),
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
  `subj_nm_code` varchar(10) NOT NULL,
  `subj_nm_name` varchar(40) NOT NULL,
  `cour_cd_key` int(11) DEFAULT NULL,
  PRIMARY KEY (`subj_cd_key`),
  KEY `cour_cd_key` (`cour_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `subject`
--

INSERT INTO `subject` (`subj_cd_key`, `subj_nm_code`, `subj_nm_name`, `cour_cd_key`) VALUES
(1, '', 'APA', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teac_cd_key` int(11) NOT NULL AUTO_INCREMENT,
  `teac_nm_name` varchar(80) NOT NULL,
  `teac_nm_email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`teac_cd_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `teacher`
--

INSERT INTO `teacher` (`teac_cd_key`, `teac_nm_name`, `teac_nm_email`) VALUES
(1, 'Loana', NULL),
(2, 'Martinhon', '');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `crowd`
--
ALTER TABLE `crowd`
  ADD CONSTRAINT `crowd_ibfk_2` FOREIGN KEY (`subj_cd_key`) REFERENCES `subject` (`subj_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crowd_ibfk_1` FOREIGN KEY (`teac_cd_key`) REFERENCES `teacher` (`teac_cd_key`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para a tabela `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_buil_cd_key_building_buil_cd_key` FOREIGN KEY (`buil_cd_key`) REFERENCES `building` (`buil_cd_key`),
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`buil_cd_key`) REFERENCES `building` (`buil_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `room_crowd_datetime`
--
ALTER TABLE `room_crowd_datetime`
  ADD CONSTRAINT `room_crowd_datetime_ibfk_1` FOREIGN KEY (`rcds_cd_key`) REFERENCES `room_crowd_datetime_status` (`rcds_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_crowd_datetime_ibfk_2` FOREIGN KEY (`crow_cd_key`) REFERENCES `crowd` (`crow_cd_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_crowd_datetime_ibfk_3` FOREIGN KEY (`room_cd_key`) REFERENCES `room` (`room_cd_key`) ON DELETE SET NULL ON UPDATE CASCADE;

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

--
-- Restrições para a tabela `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`cour_cd_key`) REFERENCES `course` (`cour_cd_key`) ON DELETE SET NULL ON UPDATE CASCADE;
