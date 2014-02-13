-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2014 at 09:02 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `env_question`
--

INSERT INTO `env_question` (`id`, `videoid`, `question`, `answera`, `answerb`, `answerc`, `answerd`, `correct`, `time`) VALUES
(1, 1, 'What did he said?', 'Hello', 'Goodbye', 'GoodJob', 'Nice!', 1, 5),
(2, 1, 'Hi', 'Good afternoon A', 'Good afternoon B', 'Good afternoon C', 'Good afternoon D', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `env_user`
--

CREATE TABLE IF NOT EXISTS `env_user` (
  `userid` varchar(20) NOT NULL,
  `fullname` text,
  `site` char(200) NOT NULL,
  PRIMARY KEY (`userid`,`site`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `env_user`
--

INSERT INTO `env_user` (`userid`, `fullname`, `site`) VALUES
('student', 'John Student', 'http://mm.cvaconsulting.com/moodle'),
('teacher', 'Jeffrey Sanders', 'http://school.demo.moodle.net'),
('testuser1', 'test user', 'http://pcnguyen.dyndns.org/moodle');

-- --------------------------------------------------------

--
-- Table structure for table `env_video`
--

CREATE TABLE IF NOT EXISTS `env_video` (
  `videoid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of video',
  `userid` varchar(20) NOT NULL COMMENT 'id of video''s owner',
  `site` text NOT NULL,
  `content` text NOT NULL COMMENT 'content, tips of video',
  `url` text NOT NULL COMMENT 'youtube url of video',
  `name` text NOT NULL COMMENT 'name of video, if null, it will be the video name from youtube',
  PRIMARY KEY (`videoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `env_video`
--

INSERT INTO `env_video` (`videoid`, `userid`, `site`, `content`, `url`, `name`) VALUES
(1, 'student', 'http://mm.cvaconsulting.com/moodle', 'This is a testing content for this video', 'YWaBuBlc_OU', 'Hector Goes Shopping'),
(2, 'teacher', 'http://school.demo.moodle.net', 'Dota2 Liquid vs PR', 'A5EiPgnv9e0', 'The Entertainers YouTube'),
(3, 'teacher', 'http://school.demo.moodle.net', 'Video music Vet mua Vu Cat Tuong', 'BTbzNK16X88', 'A star is born'),
(4, 'testuser1', 'http://pcnguyen.dyndns.org/moodle', '10 reason why you hate valentine day', 'lgPkuAO3w1k', 'Hector goes shopping');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
