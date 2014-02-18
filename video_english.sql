-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mar 18 Février 2014 à 04:21
-- Version du serveur: 5.6.11
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `video_english`
--
CREATE DATABASE IF NOT EXISTS `video_english` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `video_english`;

-- --------------------------------------------------------

--
-- Structure de la table `env_question`
--

CREATE TABLE IF NOT EXISTS `env_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'question id',
  `videoid` int(11) NOT NULL COMMENT 'id of video which this question belong to',
  `question` text NOT NULL COMMENT 'question content',
  `answera` text NOT NULL COMMENT 'a',
  `answerb` text NOT NULL COMMENT 'b',
  `answerc` text NOT NULL COMMENT 'c',
  `answerd` text NOT NULL COMMENT 'd',
  `correct` int(11) NOT NULL COMMENT 'correct answer, 1 2 3 or 4',
  `time` int(11) NOT NULL COMMENT 'time in sec the question shows up in video',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `env_question`
--

INSERT INTO `env_question` (`id`, `videoid`, `question`, `answera`, `answerb`, `answerc`, `answerd`, `correct`, `time`) VALUES
(29, 18, 'When%2520he%2520visited%2520to%2520Jardin%2520des%2520Tuileries%252C%2520he%2520met%2520a%2520man.%2520This%2520man%2520is%2520a', 'A%20football%20player', 'An%20artist', 'A%20doctor', 'A%20police', 2, 73),
(30, 18, 'How%2520long%2520is%2520the%2520Seine%2520River%2520%253F', '774%20kilometers', '775%20kilometers', '776%20kilometers', '777%20kilometers', 3, 306),
(31, 18, 'How%2520many%2520lighbulb%2520is%2520in%2520the%2520Eiffel%253F', 'Nine%20thoudsand', 'Ten%20thoudsand', 'Eight%20thoudsand', 'Seven%20thoudsang', 2, 321),
(32, 18, 'The%2520building%2520has', '4%20floor', '5%20floor', '6%20floor', '7%20floor', 3, 455),
(33, 18, 'How%2520height%2520is%2520the%2520Eiffel%2520Tower%253F', '324%20meter', '325%20meter', '334%20meter', '335%20meter', 1, 528),
(34, 19, 'The%2520day%2520of%2520the%2520Dead%2520are%2520celebrated%2520in', '2%20October', '2%20November', '2%20December', '12%20October', 2, 15),
(36, 19, 'What%2520is%2520%2522Bread%2520of%2520the%2520Dead%2522%2520%253F', 'A%20kind%20of%20festival', 'A%20kind%20of%20food', 'A%20kind%20of%20%20drink', 'A%20kind%20of%20cloth', 2, 139),
(37, 19, 'What%2520is%2520the%2520purpose%2520of%2520%2522Day%2520of%2520the%2520Dead%2522%2520%253F', 'To%20remember%20their%20friend%20and%20thier%20family%20who%20died.', 'To%20pray%20for%20a%20good%20harvest', 'To%20dispel%20evil', 'All%20is%20wrong', 1, 220);

-- --------------------------------------------------------

--
-- Structure de la table `env_user`
--

CREATE TABLE IF NOT EXISTS `env_user` (
  `userid` varchar(20) NOT NULL,
  `fullname` text,
  `site` char(200) NOT NULL,
  PRIMARY KEY (`userid`,`site`),
  FULLTEXT KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `env_user`
--

INSERT INTO `env_user` (`userid`, `fullname`, `site`) VALUES
('09520192', 'Nguyá»…n Pháº¡m Cao NguyÃªn', 'http://courses.uit.edu.vn'),
('student', 'John Student', 'http://mm.cvaconsulting.com/moodle'),
('student', 'Barbara Gardner', 'http://school.demo.moodle.net'),
('teacher', 'Jeffrey Sanders', 'http://school.demo.moodle.net'),
('testuser1', 'test user', 'http://pcnguyen.dyndns.org/moodle');

-- --------------------------------------------------------

--
-- Structure de la table `env_video`
--

CREATE TABLE IF NOT EXISTS `env_video` (
  `videoid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of video',
  `userid` varchar(20) NOT NULL COMMENT 'id of video''s owner',
  `site` varchar(200) NOT NULL,
  `content` text NOT NULL COMMENT 'content, tips of video',
  `url` text NOT NULL COMMENT 'youtube url of video',
  `name` text NOT NULL COMMENT 'name of video, if null, it will be the video name from youtube',
  PRIMARY KEY (`videoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `env_video`
--

INSERT INTO `env_video` (`videoid`, `userid`, `site`, `content`, `url`, `name`) VALUES
(4, 'testuser1', 'http://pcnguyen.dyndns.org/moodle', '10 reason why you hate valentine day', 'lgPkuAO3w1k', 'Hector goes shopping'),
(18, 'student', 'http://mm.cvaconsulting.com/moodle', 'A%20man%20have%20a%20trip%20to%20Paris%20with%20his%20parents.%20', 'r7VY6_ADAEw', 'A trip to Paris'),
(19, 'student', 'http://mm.cvaconsulting.com/moodle', 'Find%20out%20what%20is%20the%20day%20of%20the%20Dead-%20one%20of%20the%20holiday%20in%20Mexico', 'jsbr_Tkn08w', 'The day of the Dead');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
