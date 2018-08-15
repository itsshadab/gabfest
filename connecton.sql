-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 07:44 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connecton`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `pid`, `comment`) VALUES
(1, 2, 4, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `time` timestamp NOT NULL,
  `venue` varchar(100) NOT NULL,
  `e_image` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `title`, `time`, `venue`, `e_image`, `category`) VALUES
(1, 'CSGO', '2017-05-02 15:52:23', 'Room No. 313', 'actions/uploads/events/369d071d32fc0732accdb03a35cbb3ce.png', 'Games'),
(2, 'Reunion', '2017-05-04 08:30:00', 'Polytechnic', 'actions/uploads/events/1170700_997572010309316_2230064537782531902_n.jpg', 'Fun');

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `frid` int(11) NOT NULL,
  `from_uid` int(11) NOT NULL,
  `to_uid` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `organisation` varchar(50) NOT NULL,
  `location` varchar(25) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jid`, `name`, `organisation`, `location`, `mobile`, `email`) VALUES
(2, 'Shadab Alam', 'GabFest', 'New Delhi', '9643664881', 'itss.shadab@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `lid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`uid`, `pid`, `lid`) VALUES
(2, 9, 149),
(2, 1, 7),
(4, 10, 101),
(2, 10, 147),
(4, 22, 108),
(2, 4, 83),
(2, 20, 151),
(2, 5, 152);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `uid` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `psw` varchar(32) NOT NULL,
  `headline` varchar(64) DEFAULT NULL,
  `dob` varchar(32) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `workplace` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `src` varchar(500) NOT NULL DEFAULT 'actions/uploads/temp.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`uid`, `fname`, `lname`, `uname`, `psw`, `headline`, `dob`, `status`, `city`, `country`, `workplace`, `mobile`, `gender`, `lang`, `src`) VALUES
(2, 'Shadab', 'Alam', 'im_shadab@outlook.com', '708090', 'Student', '10-08-1998', 'Single', 'New Delhi', 'India', 'Jamia Millia Islamia', ' 91 9643664881', 'Male', '', 'actions/uploads/profile/zayn.jpg'),
(15, 'shamim', 'malik', 'shamim123@facebook.com', 'asdfg', 'Student', '20-03-1997', 'Single', 'New Delhi', 'India', 'JMI', '91 7827881942', '', NULL, 'actions/uploads/profile/12314015_858070360978782_6813715515618688342_n.jpg'),
(22, 'Shadab', 'Alam', 'itss.shadab@gmail.com', 'asdfgh', 'Student', '1998-08-10', NULL, 'New Delhi', 'India', NULL, '9643664881', 'Male', NULL, 'actions/uploads/temp.png');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `msg` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `uid`, `msg`, `time`, `image`) VALUES
(4, 2, 'Hello and Welcome to the world of programmers ...', '2017-01-24 13:23:43', NULL),
(5, 2, '', '2017-01-24 13:25:37', 'actions\\uploads\\14925397_1355719801129672_3883809757064488263_n.jpg'),
(10, 2, NULL, '2017-01-30 10:34:55', 'actions/uploads/15134624_334224570287359_8037299316527266296_n.png'),
(9, 2, NULL, '2017-01-24 13:54:09', 'actions/uploads/15253382_591545351054237_2399577071871044068_n.jpg'),
(20, 2, NULL, '2017-03-31 09:29:20', 'actions/uploads/super-mario-games-evolution-funny-pinoy-jokes-photos-2012.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`frid`),
  ADD KEY `to_uid` (`to_uid`),
  ADD KEY `for_uid` (`from_uid`) USING BTREE;

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `frid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
