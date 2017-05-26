-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2017 at 06:10 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amarproshno`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `replier_id` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `q_id`, `replier_id`, `answer`) VALUES
(54, 47, 44, 'yeah'),
(53, 35, 44, 'ok'),
(33, 31, 9, 'hulu'),
(34, 31, 9, 'mulo'),
(35, 31, 9, 'ok'),
(36, 31, 9, 'hu'),
(37, 29, 9, 'biplob'),
(38, 31, 9, 'humul'),
(39, 31, 9, 'lubu'),
(40, 30, 9, 'ok'),
(41, 30, 9, 'okkkk'),
(42, 30, 9, 'pol'),
(43, 29, 9, 'hum'),
(44, 29, 9, 'asik'),
(45, 29, 9, 'me'),
(46, 29, 9, ''),
(47, 29, 9, ''),
(48, 29, 9, ''),
(49, 28, 9, ''),
(50, 28, 9, 'okkk?'),
(51, 32, 9, 'Ghuraghuri with girls'),
(52, 30, 5, 'ekhon mone hoy thik ace');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `u_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `mname` varchar(20) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `dob_day` varchar(11) DEFAULT NULL,
  `dob_month` varchar(11) DEFAULT NULL,
  `dob_year` varchar(4) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `interest1` varchar(50) DEFAULT NULL,
  `interest2` varchar(50) DEFAULT NULL,
  `photo` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`u_id`, `fname`, `mname`, `lname`, `dob_day`, `dob_month`, `dob_year`, `gender`, `interest1`, `interest2`, `photo`) VALUES
(44, 'Asik', 'Hasan', 'Biplob', '7', 'April', '1993', 'Male', 'Chating', 'Listening songs', 'photo.jpg'),
(41, 'Md.', 'Biplob', 'Hosen', '1', 'January', '2000', 'Male', 'Cricket', 'Travelling', 'Me_Formal.jpg'),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `Q_title` varchar(100) NOT NULL DEFAULT 'Untitled',
  `question` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `u_id`, `Q_title`, `question`) VALUES
(45, 44, 'Who is the brother (or brothers) of Poseidon?', 'Who is the brother (or brothers) of Poseidon?Who is the brother (or brothers) of Poseidon?Who is the brother (or brothers) of Poseidon?Who is the brother (or brothers) of Poseidon?Who is the brother (or brothers) of Poseidon?Who is the brother (or brothers) of Poseidon?'),
(37, 41, 'How do you know if a religion is wrong or right, or what you have been taught is right ? help?', 'my family has a religion (christianity) and i dont know if its wrong or right, i tried asking help from my family but they tell me to have faith, and .'),
(38, 43, '\r\nAim4fun\r\nHow is it the 58th inauguration but only 45th president?', '13 - 2 assassinations= 11'),
(39, 43, 'My parents won\'t accept my relationship, what now?', ' having kids. In all honesty I\'m so very happy happy for all my friends and their beautiful families but when I personally think of having'),
(40, 43, 'Is it posible to have one religion in the world ?', 'please tell me some positive'),
(41, 43, 'Historically ACCURATE book or text book that describes the history of Christianity and?', ' Christianity and how it come about. I want to know everything from where the ideas came from (ie ideas borrowed from other religions or gods .'),
(42, 44, 'I am planning for Kota Stone Roofing so I wish to know if Kota stone is a good option for RCC roof?', 'I have no ideas about it and really need some good suggestions.'),
(43, 44, 'My roommate hasnt been home in over 2 weeks. do I have to evict her or is she moved out?', 'not really a "roommate" but my aunt. weve been trying to evict her for over 2 months and shes somehow managed to dodge them all. but she'),
(44, 44, '\r\nFunnycat21\r\nIf we evolved from monkeys then where did they come from?', '\r\nFunnycat21\r\nIf we evolved from monkeys then where did they come from?\r\nFunnycat21\r\nIf we evolved from monkeys then where did they come from?'),
(36, 41, 'Did the Democrats boycott Abraham Lincoln\'s inauguration?', 'Did the Democrats boycott Abraham Lincoln\'s inauguration?Did the Democrats boycott Abraham Lincoln\'s inauguration?'),
(35, 41, 'Help me remember what this old candy is!?', 'Trying to remember an old candy. It\'s hazelnut shaped hard candy with soft center. Kind of like a werthers or nips, but its not them'),
(34, 41, 'Project update', 'How much you have done?'),
(46, 44, 'Google- I\'m writing an essay about extracurricular activities and if it should be banned or not.?', 'What\'s your opinion on banning extracurricular activities?'),
(47, 44, 'Hi do spirits talk about heaven?', 'do they say what it is like do we see loved ones do we meet god and jesus. there is talk of reincarnation i dont believe in this do they mention this ...'),
(48, 44, 'How to date while living with strict Christian parents?', '\r\nNaruakira21\r\nHow to date while living with strict Christian parents?\r\n\r\nI\'m a 20 year old female and I live at home with my parents. I grew up in a Christian family and don\'t regret that I have. However because \r\nNaruakira21\r\nHow to date while living with strict Christian parents?\r\n\r\nI\'m a 20 year old female and I live at home with my parents. I grew up in a Christian family and don\'t regret that I have. However because '),
(50, 41, 'About php', 'what is php?'),
(51, 41, 'PHP', 'Is php hard to learn?');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `u_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`u_id`, `email`, `password`) VALUES
(44, 'asik@gmail.com', '123456'),
(43, 'tarek@gmail.com', '987654'),
(42, 'biplob@hotmail.com', '123456'),
(41, 'biplobiit@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD UNIQUE KEY `u_id` (`u_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
