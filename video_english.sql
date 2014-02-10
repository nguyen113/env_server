-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2014 at 02:59 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `video_english`
--
CREATE DATABASE IF NOT EXISTS `video_english` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `video_english`;

-- --------------------------------------------------------

--
-- Table structure for table `env_question`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `env_user`
--

CREATE TABLE IF NOT EXISTS `env_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of user, auto increment',
  `username` varchar(20) NOT NULL COMMENT 'username, get from moodle site',
  `site` text NOT NULL COMMENT 'url of moodle site',
  `role` int(11) NOT NULL COMMENT 'role in moodle, 1=teacher,2=student, 0=admin',
  `password` text NOT NULL COMMENT 'password, create to login to our web, no need for user',
  `token` varchar(60) NOT NULL COMMENT 'token to access to webservice of moodle',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `env_user`
--

INSERT INTO `env_user` (`id`, `username`, `site`, `role`, `password`, `token`) VALUES
(1, 'test', 'https://www.google.com', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `env_video`
--

CREATE TABLE IF NOT EXISTS `env_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of video',
  `owner` int(11) NOT NULL COMMENT 'id of video''s owner',
  `content` text NOT NULL COMMENT 'content, tips of video',
  `url` text NOT NULL COMMENT 'youtube url of video',
  `name` text NOT NULL COMMENT 'name of video, if null, it will be the video name from youtube',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
