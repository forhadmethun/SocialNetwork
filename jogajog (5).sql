-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2015 at 04:25 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jogajog`
--
CREATE DATABASE IF NOT EXISTS `jogajog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jogajog`;

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`c_id`, `user1`, `user2`) VALUES
(1, 13, 12),
(2, 13, 10),
(3, 13, 2),
(4, 13, 5),
(5, 14, 13),
(6, 18, 17),
(7, 2, 2),
(8, 15, 2),
(9, 12, 2),
(10, 12, 12),
(11, 15, 15),
(12, 18, 16),
(13, 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE IF NOT EXISTS `friendlist` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `friendlist`
--

INSERT INTO `friendlist` (`f_id`, `user1`, `user2`) VALUES
(1, 13, 10),
(2, 13, 2),
(3, 13, 12),
(4, 13, 5),
(5, 13, 14),
(7, 18, 13),
(10, 18, 17),
(12, 2, 12),
(14, 2, 14),
(15, 2, 15),
(16, 12, 11),
(17, 16, 18),
(18, 16, 13);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE IF NOT EXISTS `friend_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_from`, `user_to`) VALUES
(30, 'pokaa', 'password'),
(32, 'password', 'forhadmethun1'),
(33, 'password', 'dahrof'),
(35, 'forhadmethun2', 'pokaa'),
(36, 'forhadmethun3', 'pokaa');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `group_name` varchar(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `interest_id` int(11) NOT NULL,
  `interest_name` varchar(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`interest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_liked` varchar(50) NOT NULL,
  `total_likes` int(11) NOT NULL,
  `uid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_liked`, `total_likes`, `uid`) VALUES
(1, 'dahrof', 38, 'dahrof');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `pkey` int(20) NOT NULL AUTO_INCREMENT,
  `c_id` int(20) DEFAULT NULL,
  `mtime` date DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `mtext` text COLLATE latin1_general_ci NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=126 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`pkey`, `c_id`, `mtime`, `sender`, `mtext`, `status`) VALUES
(11, 1, '2015-12-18', 13, 'hei eeee', 0),
(10, 1, '2015-12-18', 13, 'hei eeee', 0),
(114, 1, '2015-12-22', 12, 'à¦¹à§‡ à¦ªà§‹à¦•à¦¾.....................***** ', 0),
(113, 10, '2015-12-22', 12, 'hlw', 1),
(12, 2, '2015-12-18', 13, 'hei', 0),
(13, 3, '2015-12-18', 13, 'adfs', 0),
(14, 4, '2015-12-18', 13, 'hei how are you today', 0),
(15, 1, '2015-12-18', 13, 'how are you today', 0),
(16, 1, '2015-12-18', 13, 'feeling okay?', 0),
(17, 1, '2015-12-18', 13, 'not so well\r\nsyntax right?', 0),
(18, 1, '2015-12-18', 13, 'again if a send', 0),
(19, 1, '2015-12-18', 13, 'send', 0),
(20, 1, '2015-12-18', 13, 'now again', 0),
(21, 1, '2015-12-18', 13, 'why\r\n', 0),
(22, 1, '2015-12-18', 13, 'hei', 0),
(23, 1, '2015-12-18', 13, 'now', 0),
(24, 1, '2015-12-18', 13, 'is the time to have it', 0),
(25, 1, '2015-12-18', 13, 'the step to jump off the hill', 0),
(26, 4, '2015-12-18', 13, 'nice sleep ha\r\n', 0),
(27, 4, '2015-12-18', 13, 'why no', 0),
(28, 4, '2015-12-18', 13, 'are you mad', 0),
(29, 4, '2015-12-18', 13, 'go \r\nand', 0),
(30, 4, '2015-12-18', 13, 'have some sleep', 0),
(31, 4, '2015-12-18', 13, '', 0),
(32, 4, '2015-12-18', 13, '', 0),
(33, 4, '2015-12-18', 13, 'you ', 0),
(34, 4, '2015-12-18', 13, 'are', 0),
(35, 4, '2015-12-18', 13, 'so hot and crazy', 0),
(36, 1, '2015-12-18', 13, 'oi hala\r\n', 0),
(37, 1, '2015-12-18', 13, 'thappor dibo tore -_-', 0),
(38, 1, '2015-12-18', 13, 'ki re', 0),
(39, 5, '2015-12-18', 14, 'hei i am joyita poka', 0),
(40, 5, '2015-12-18', 14, 'how are you doing baby', 0),
(41, 5, '2015-12-18', 13, 'i am fine', 0),
(42, 5, '2015-12-18', 13, 'wanna eat me?', 0),
(43, 5, '2015-12-18', 13, 'yeah', 0),
(44, 5, '2015-12-18', 13, 'nope', 0),
(45, 5, '2015-12-18', 13, 'so hot', 0),
(46, 1, '2015-12-18', 13, 'so good', 0),
(47, 4, '2015-12-18', 13, 'why am i talking to myslef', 0),
(48, 5, '2015-12-18', 14, 'u are just a pokaaa', 0),
(49, 5, '2015-12-18', 13, 'hei joyita', 0),
(50, 5, '2015-12-18', 13, 'i am just testing you', 0),
(51, 5, '2015-12-18', 14, 'u are so clever', 0),
(52, 5, '2015-12-18', 13, 'got it', 0),
(53, 5, '2015-12-18', 13, 'testing you just', 0),
(54, 5, '2015-12-18', 14, 'yeeeeeiiiiiii yeppi', 0),
(55, 5, '2015-12-18', 14, 'feeling tui poka', 0),
(56, 5, '2015-12-18', 14, 'lets see if u see :D', 0),
(57, 2, '2015-12-19', 13, 'hei alam\r\n', 1),
(58, 2, '2015-12-19', 13, 'hellow', 1),
(59, 1, '2015-12-19', 13, 'hellow', 0),
(60, 1, '2015-12-19', 13, 'its me ', 0),
(61, 1, '2015-12-19', 13, 'i am adelle', 0),
(62, 5, '2015-12-19', 13, 'hei', 0),
(63, 5, '2015-12-19', 13, 'hei', 0),
(64, 5, '2015-12-19', 13, 'i am sad :(\r\n', 0),
(65, 5, '2015-12-20', 13, 'joyi', 0),
(66, 5, '2015-12-20', 13, 'ki kortishsihs tui\r\n', 0),
(67, 5, '2015-12-20', 13, 'ashe na kan msg', 0),
(68, 5, '2015-12-20', 14, 'gio', 0),
(69, 5, '2015-12-20', 14, 'jshfjhjs', 0),
(70, 5, '2015-12-20', 13, 'ksja', 0),
(71, 5, '2015-12-20', 14, 'hei pokaa i am back', 0),
(72, 5, '2015-12-20', 14, 'i am joyita', 0),
(73, 5, '2015-12-20', 13, 'i am too back', 0),
(74, 5, '2015-12-20', 13, 'thats great', 0),
(75, 5, '2015-12-20', 14, 'me joyita', 0),
(76, 5, '2015-12-20', 14, 'i have seen all', 0),
(77, 5, '2015-12-20', 14, 'now delete the hell', 0),
(78, 5, '2015-12-20', 13, 'ok it works fine here', 0),
(79, 5, '2015-12-20', 13, 'stupid i hope now', 0),
(80, 5, '2015-12-20', 14, 'i hope so much', 0),
(81, 5, '2015-12-20', 14, 'jahd', 0),
(82, 5, '2015-12-20', 14, 'hei poka', 0),
(83, 5, '2015-12-20', 14, 'hei :) i am very happy', 0),
(84, 5, '2015-12-20', 14, 'are you', 0),
(85, 5, '2015-12-20', 13, 'no msges', 0),
(86, 5, '2015-12-20', 14, 'and now it comes', 0),
(87, 5, '2015-12-20', 14, 'can u get this', 0),
(88, 5, '2015-12-20', 13, 'nope', 0),
(89, 5, '2015-12-20', 13, 'he', 0),
(90, 5, '2015-12-20', 14, 'yeah', 0),
(91, 5, '2015-12-20', 14, 'thanks', 0),
(92, 5, '2015-12-20', 13, 'oke', 0),
(93, 5, '2015-12-21', 13, '1', 0),
(94, 5, '2015-12-21', 13, 'à¦¬à¦¾à¦‚à¦²à¦¾ ', 0),
(95, 1, '2015-12-21', 12, 'bbbbbbbbbbbbbbb', 0),
(96, 1, '2015-12-21', 12, 'jhhhhhhhhhhhhh', 0),
(97, 1, '2015-12-21', 12, 'h', 0),
(98, 6, '2015-12-21', 18, 'Hey forhadmethun4 how are you :D', 0),
(99, 6, '2015-12-21', 17, 'i am fine buddy \r\nHow are you :) ', 0),
(100, 6, '2015-12-21', 18, 'I am okay man \r\nhow is about your family :D', 0),
(101, 6, '2015-12-21', 17, 'They are good man :) ', 0),
(102, 7, '2015-12-21', 2, 'whassup\r\n', 1),
(103, 1, '2015-12-21', 12, 'Hey pokaaaaaaaaaa', 0),
(104, 8, '2015-12-21', 15, 'whassup', 0),
(105, 8, '2015-12-21', 15, 'How are you', 0),
(106, 7, '2015-12-21', 2, 'um fine', 1),
(107, 7, '2015-12-21', 2, 'How is about you......', 1),
(108, 8, '2015-12-21', 15, 'are you carzy', 0),
(109, 8, '2015-12-21', 2, 'sorry man :/', 0),
(110, 8, '2015-12-21', 15, 'hi man ........', 0),
(111, 9, '2015-12-22', 12, 'Hey........', 0),
(112, 1, '2015-12-22', 12, 'à¦¹à§‡à¦‡ à¦ªà§‹à¦•à¦¾ ...........', 0),
(115, 11, '2015-12-22', 15, 'à¦¹à¦¾à¦‰ à¦†à¦° à¦‡à¦‰!?', 1),
(116, 11, '2015-12-22', 15, 'à¦†à¦‡ à¦à¦® à¦«à¦¾à¦‡à¦¨à¥¤ à¦¹à§‹à§Ÿà¦¾à¦Ÿ à¦à¦¬à¦¾à¦‰à¦Ÿ à¦‡à¦‰?', 1),
(117, 8, '2015-12-22', 2, 'à¦†à¦¹à¦¾à¦°à§‡ à¦†à¦¹à¦¾à¦°à§‡ , ............ ', 0),
(118, 8, '2015-12-22', 15, 'à¦•à§‹à¦¥à¦¾à§Ÿ à¦ªà¦¾à¦¬à§‹ à¦¤à¦¾à¦¹à¦¾à¦°à§‡ .........', 0),
(119, 8, '2015-12-22', 2, 'à¦¯à§‡ à¦›à¦¿à¦² ...............\r\n', 0),
(120, 8, '2015-12-22', 2, 'à¦†à¦®à¦¿', 0),
(121, 8, '2015-12-22', 2, 'à¦¨à¦¾à¦‡ à¦¨à¦¾ ', 0),
(122, 12, '2015-12-22', 18, 'hey forhadmethu5', 0),
(123, 13, '2015-12-22', 12, 'Hy password\r\niis it any name ? :P ', 0),
(124, 13, '2015-12-22', 11, 'How is about u?', 0),
(125, 13, '2015-12-22', 12, 'um not okay\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `ptext` text CHARACTER SET utf8 NOT NULL,
  `ptime` date NOT NULL,
  `added_by` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `user_posted_to` varchar(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `ptext`, `ptime`, `added_by`, `user_posted_to`) VALUES
(1, 'test', '2015-12-03', 'test123', 'test321'),
(5, 'who cares', '2015-12-03', 'test123', 'test321'),
(4, 'it is another post', '2015-12-03', 'forhadmethun', 'forhadmethun'),
(6, 'i am a bad boy ...', '2015-12-07', 'test123', 'test321'),
(7, 'it is forhadmethun', '2015-12-07', 'test123', ''),
(8, 'it is forhadmethun', '2015-12-07', '', ''),
(9, 'i am forhad', '2015-12-07', 'forhadmethun', 'forhadmethun'),
(10, 'is it working', '2015-12-07', 'forhadmethun', 'forhadmethun'),
(11, 'is it working', '2015-12-07', 'forhadmethun', 'forhadmethun'),
(12, 'is it working', '2015-12-07', 'forhadmethun', 'forhadmethun'),
(13, '.......#######338', '2015-12-07', 'forhadmethun', 'forhadmethun'),
(14, 'methun bhai rocks\n', '2015-12-07', 'ahsantarique', 'ahsantarique'),
(15, 'kai bhai rocks\n', '2015-12-07', 'ahsantarique', 'ahsantarique'),
(16, '------->it is a Post <-----------', '2015-12-07', 'forhadmethun', 'forhadmethun'),
(17, 'hey me', '2015-12-07', 'hoynai', 'hoynai'),
(18, 'yeaaaa i can do this ', '2015-12-07', 'hoynai', 'hoynai'),
(19, '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '2015-12-07', '', ''),
(20, 'it is my post ', '2015-12-07', 'password', 'password'),
(21, 'it is sheet .. .', '2015-12-07', 'password', 'password'),
(22, 'it is my post ..', '2015-12-07', 'dahrof', 'dahrof'),
(23, 'my accoutn is not working', '2015-12-07', 'dahrof', 'dahrof'),
(24, 'Hey Bro!!!', '2015-12-08', 'forhadmethun', 'forhadmethun'),
(25, 'this post is working ', '2015-12-16', 'forhadmethun', 'forhadmethun'),
(26, 'this post is workig and i know is', '2015-12-16', 'forhadmethun', 'forhadmethun'),
(27, 'my first post ..', '2015-12-16', 'abcdef', 'abcdef'),
(28, 'fvgbhjnk', '2015-12-16', 'abcdef', 'abcdef'),
(29, 'This is a test post', '2015-12-16', 'abcdef', 'abcdef'),
(30, 'Nice it is working ... :D', '2015-12-16', 'abcdef', 'abcdef'),
(31, 'I am cute and i know this :D ', '2015-12-16', 'abcdef', 'abcdef'),
(32, 'test...', '2015-12-16', 'forhadmethun', 'forhadmethun'),
(33, 'this is my(((((((((((())))))))))))))))))', '2015-12-16', 'forhadmethun', 'forhadmethun'),
(34, '&#2476;&#2494;&#2434;&#2482;&#2494; &#24', '2015-12-20', 'dahrof', 'dahrof'),
(35, '&#2463;&#2503;&#2488;&#2509;&#2463;.....', '2015-12-20', 'dahrof', 'dahrof'),
(36, '&#2438;&#2478;&#2495; , ', '2015-12-20', 'forhadmethun', 'forhadmethun'),
(37, 'i am 2...', '2015-12-20', 'forhadmethun1', 'forhadmethun1'),
(38, 'i am number 1 ... \r\n', '2015-12-20', 'forhadmethun1', 'forhadmethun1'),
(39, '&#2438;&#2478;&#2494;&#2480; &#2488;&#25', '2015-12-20', 'forhadmethun1', 'forhadmethun1'),
(40, 'à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾ à¦²à¦¿à¦–à¦¿ .', '2015-12-20', 'forhadmethun1', 'forhadmethun1'),
(41, 'à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦—à¦¾à¦¨ à', '2015-12-20', 'forhadmethun1', 'forhadmethun1'),
(42, 'à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦—à¦¾à¦¨\r\n', '2015-12-20', 'forhadmethun1', 'forhadmethun1'),
(43, 'à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦—à¦¾à¦¨ à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦—à¦¾à¦¨ à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦—à¦¾à¦¨ à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦—à¦¾à¦¨', '2015-12-20', 'forhadmethun1', 'forhadmethun1'),
(44, 'my..........', '2015-12-20', 'forhadmethun3', 'forhadmethun3'),
(45, 'asdf', '2015-12-20', 'username', 'username'),
(46, 'um 5.........', '2015-12-20', 'forhadmethun5', 'forhadmethun5'),
(47, 'à¦¹à§‡ à¦¹à§‡ ', '2015-12-21', 'dahrof', 'dahrof'),
(48, 'à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾', '2015-12-21', 'forhadmethun1', 'dahrof'),
(49, 'Hey!\r\nMy Post.......', '2015-12-21', 'forhadmethun', 'forhadmethun'),
(50, 'Hey i am forhadmethun5', '2015-12-21', 'forhadmethun5', 'forhadmethun5'),
(51, 'Polsssssssssssssssssssssss........', '2015-12-21', 'forhadmethun', 'forhadmethun3'),
(52, 'halsdjfnaklsdhfas;dlkjfl', '2015-12-21', 'forhadmethun', 'forhadmethun3'),
(53, 'Hey um pokaaa....', '2015-12-21', 'pokaa', 'pokaa'),
(54, 'Here goes my post .. .', '2015-12-21', 'forhadmethun5', 'forhadmethun5'),
(55, 'à¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦—à¦¾à¦¨ à¦—à¦¾à¦‡ \r\nà¦†à¦®à¦¿ à¦¬à¦¾à¦‚à¦²à¦¾à¦° à¦—à¦¾à¦¨ à¦—à¦¾à¦‡ \r\nà¦†à¦®à¦¾à¦‡ à¦†à¦®à¦¾à¦° à¦†à¦®à¦¿à¦•à§‡ à¦šà¦¿à¦°à¦¦à¦¿à¦¨ à¦à¦‡\r\nà¦¬à¦¾à¦‚à¦²à¦¾à§Ÿ à¦–à§à¦œà§‡ à¦ªà¦¾à¦‡ .....  \r\n', '2015-12-22', 'forhadmethun2', 'forhadmethun2'),
(56, 'It is my post............', '2015-12-22', 'pokaa', 'forhadmethun3'),
(57, 'It is my status', '2015-12-22', 'pokaa', 'pokaa');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_interest`
--

CREATE TABLE IF NOT EXISTS `profile_interest` (
  `profile_id` int(11) NOT NULL,
  `interest_id` varchar(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`profile_id`,`interest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `first_name` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `mail` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `username` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `bio` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `profile_pic` text COLLATE latin1_general_ci NOT NULL,
  `friend_array` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `gender`, `first_name`, `last_name`, `mail`, `password`, `birthday`, `username`, `bio`, `profile_pic`, `friend_array`) VALUES
(2, 'M', 'dahrof', 'dahrof', 'dahrof', 'd41d8cd98f00b204e9800998ecf8427e', '2015-12-03', 'dahrof', 'Hey! i am dahrof', '', 'forhadmethun1,forhadmethun2'),
(3, 'M', 'ektakisu', 'ektakisu', 'forhadmethun@gmail.com', 'b14f45d599574d3f563a7d9be377d252', '2015-12-03', 'ektakisu', '', '', ''),
(4, 'M', 'tastee', 'tastee', 'forhadmethun@gmail.com', 'b14f45d599574d3f563a7d9be377d252', '2015-12-03', 'tastee', '', '', ''),
(5, 'M', 'dahrof', 'dahrof', 'forhadmethun@gmail.com', 'b2af6a5233bb6d1d8970165f2ec60175', '2015-12-03', 'tastee', '', '', ''),
(6, 'M', 'abcdefg', 'abcdefg', 'abcdefg', '7ac66c0f148de9519b8bd264312c4d64', '2015-12-03', 'abcdefg', '', '', ''),
(7, 'M', 'username', 'username', 'username', '14c4b06b824ec593239362517f538b29', '2015-12-07', 'username', '', '', 'forhadmethun3'),
(9, 'M', 'ahsan', 'tarique', 'ahsantarique@ymail.com', 'cc4967f9a9fd77840817745343b71f97', '2015-12-07', 'ahsantarique', '', '', ''),
(10, 'M', 'alam', 'mahbub', 'fucking@gmail.com', '596a96cc7bf9108cd896f33c44aedc8a', '2015-12-07', 'hoynai', '', '', ''),
(11, 'M', 'password', 'password', 'password', 'd41d8cd98f00b204e9800998ecf8427e', '2015-12-07', 'password', 'I am a very bad boy...', 'jzRO5gx8wmV4JfP/Koala.jpg', 'forhadmethun'),
(12, 'M', 'forhad', 'methun', 'forhad', 'b14f45d599574d3f563a7d9be377d252', '2015-12-07', 'forhadmethun', 'Hey! i am a simple boy.. \r\nwant to be good, .... ', 'TqocxLN5l4VOvgF/12357479_1064477573572731_74830643_n.jpg', 'forhadmethun3,forhadmethun5,pokaa,password'),
(13, 'M', 'pokaa', 'pokaa', 'abcdef', 'e80b5017098950fc58aad83c8c14978e', '2015-12-16', 'pokaa', 'bio goes here', 'Ua8Cg5T6E7KDhzp/Chrysanthemum.jpg', 'forhadmethun,forhadmethun3'),
(14, 'M', 'forhadmethun1', 'forhadmethun1', 'forhadmethun1', 'b14f45d599574d3f563a7d9be377d252', '2015-12-20', 'forhadmethun1', 'bio goes here', 'EAIMNiuyJ5DewHC/download.jpg', 'forhadmethun3,dahrof'),
(15, 'M', 'forhadmethun2', 'forhadmethun2', 'forhadmethun2', 'b14f45d599574d3f563a7d9be377d252', '2015-12-20', 'forhadmethun2', 'à¦†à¦®à¦¿ à¦®à¦¾à¦¨à§à¦· , à¦à¦° à¦šà§‡à§Ÿà§‡ à¦¬à§œ à¦ªà¦°à¦¿à¦šà§Ÿ à¦à¦° à¦•à¦¿ à¦•à§‹à¦¨à§‹ à¦¦à¦°à¦•à¦¾à¦° à¦†à¦›à§‡ :3 :P', 'AUUeMW7Nm2XSDKV/Jellyfish.jpg', 'dahrof'),
(16, 'M', 'forhadmethun3', 'forhadmethun3', 'forhadmethun3', 'b14f45d599574d3f563a7d9be377d252', '2015-12-20', 'forhadmethun3', 'bio goes here', '', 'username,forhadmethun,forhadmethun1,forhadmethun5,pokaa'),
(17, 'M', 'forhadmethun4', 'forhadmethun4', 'forhadmethun4', 'b14f45d599574d3f563a7d9be377d252', '2015-12-20', 'forhadmethun4', 'bio goes here', '', 'forhadmethun5'),
(18, 'M', 'forhadmethun5', 'forhadmethun5', 'forhadmethun5', 'b14f45d599574d3f563a7d9be377d252', '2015-12-20', 'forhadmethun5', 'bio goes here', 'x9rLVePBvihcpU2/Penguins.jpg', 'forhadmethun4,forhadmethun3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
