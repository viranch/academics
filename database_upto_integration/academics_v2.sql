-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2011 at 09:43 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `academics_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acad_announce`
--

CREATE TABLE IF NOT EXISTS `acad_announce` (
  `priority` enum('high','normal') NOT NULL,
  `user_id` int(10) NOT NULL,
  `program` varchar(50) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent_time` time NOT NULL,
  `sent_date` date NOT NULL,
  `batch_year` int(4) DEFAULT NULL,
  `course_id` varchar(10) DEFAULT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`user_id`,`sent_time`,`sent_date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_announce`
--

INSERT INTO `acad_announce` (`priority`, `user_id`, `program`, `message`, `sent_time`, `sent_date`, `batch_year`, `course_id`, `deadline`) VALUES
('', 2, 'btech', 'sdfs', '00:00:00', '2011-03-24', 0, '', '0000-00-00'),
('', 2, 'NULL', 'hello be careful students', '18:28:47', '2011-03-24', 0, 'ct114', '0000-00-00'),
('normal', 200801003, 'btech', 'please make it work', '00:00:00', '2011-03-29', 2008, '', '2011-03-31'),
('high', 200801047, '', 'The win in match of Ind-Pak made the Institute to declare a 1 week holidays to enjoy the final', '12:01:00', '2011-03-31', 0, '', '2012-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `acad_assig_create`
--

CREATE TABLE IF NOT EXISTS `acad_assig_create` (
  `assignment_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `present_year` int(4) NOT NULL,
  `deadline` datetime NOT NULL,
  `description` text NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`assignment_id`,`course_id`,`present_year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_assig_create`
--

INSERT INTO `acad_assig_create` (`assignment_id`, `file`, `course_id`, `present_year`, `deadline`, `description`, `user_id`) VALUES
(1, 'lecture1.ppt', 'ct114', 2010, '2011-03-28 12:28:12', 'this is about wire shark', 2);

-- --------------------------------------------------------

--
-- Table structure for table `acad_assig_sub`
--

CREATE TABLE IF NOT EXISTS `acad_assig_sub` (
  `assignment_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `submission_time` datetime NOT NULL,
  `faculty_user_id` int(10) NOT NULL,
  PRIMARY KEY (`assignment_id`,`user_id`,`course_id`,`filename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_assig_sub`
--

INSERT INTO `acad_assig_sub` (`assignment_id`, `user_id`, `course_id`, `filename`, `submission_time`, `faculty_user_id`) VALUES
(1, 200801001, '', '3cd192fecdb6ac40e64a3847b28ddb0c.zip', '0000-00-00 00:00:00', 2),
(1, 200801001, '', 'd89f4c37b1e006ea95d8eb74af339e88.zip', '0000-00-00 00:00:00', 2),
(1, 200801001, '', 'fab7656b0bacd33b43e51b0ee8b8ec8c.zip', '0000-00-00 00:00:00', 2),
(1, 200801001, '', 'snipMate.zip', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `acad_batch`
--

CREATE TABLE IF NOT EXISTS `acad_batch` (
  `user_id` int(10) NOT NULL,
  `program` varchar(50) NOT NULL,
  `batch_year` int(4) NOT NULL,
  `present_sem_id` int(2) NOT NULL COMMENT 'present sem takes values like sem1 sem2 sem3 and summer1 summer2 and so on',
  `lab_group` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_batch`
--

INSERT INTO `acad_batch` (`user_id`, `program`, `batch_year`, `present_sem_id`, `lab_group`) VALUES
(200801001, 'btech', 2008, 1, 1),
(200801004, 'mtech', 2009, 2, 3),
(200801028, 'btech', 2008, 6, 1),
(200801146, 'btech', 2008, 6, 3),
(200901028, 'btech', 2009, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `acad_courses`
--

CREATE TABLE IF NOT EXISTS `acad_courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `credits` float NOT NULL,
  `category` varchar(30) NOT NULL COMMENT 'options are core,open ,technical,science,group',
  `pass_course` enum('yes','no') NOT NULL COMMENT 'determines if a course is pass or fail course',
  `dir_name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_courses`
--

INSERT INTO `acad_courses` (`course_id`, `course_name`, `description`, `credits`, `category`, `pass_course`, `dir_name`, `link`) VALUES
('it114', 'Data structures and algorithms', 'This is all about datastructures', 4.5, 'IT', 'no', 'it114', 'it114hompepage.php'),
('ct114', 'Digital signal processing', 'chakka savakodatadu', 4.5, 'ct', 'no', 'ct114_dir', 'ct114_link'),
('el114', 'Digital logic design', 'Mandal champesthadu', 3, 'el', 'no', 'el114_dir', 'el114_link'),
('it324', 'software engineering', 'sdfasdf', 3, 'group', 'no', '/vasd/asdf', 'asdfsdf'),
('it201', 'systemsoftware', 'sdfsdf', 4, 'core', 'no', 'sdf', 'sdfsdf'),
('el000', 'nanotechnology', 'much of future in future', 3, 'group', 'no', 'asdf', 'sdfsdf'),
('ct314', 'Basic Telecommunication', 'safdg', 3, 'group', 'no', 'blah', 'http://blah'),
('sc106', 'discrete mathematics', 'oh my god', 4, 'group', 'yes', 'asdf', 'asdfasdf'),
('it312', 'Models of computation', 'This is one of the best course', 3, 'core', 'no', 'asdf', 'asdf'),
('it-223', 'intro to c++', 'this is not a useful course', 4.5, 'core', 'yes', '//fl;daslkfsda/', 'fdsafasfasf'),
('ct-213', 'Basic Tele Communication', 'This is a basic for Communication stream.', 4, 'core', 'yes', 'fa', 'afas');

-- --------------------------------------------------------

--
-- Table structure for table `acad_cou_grad`
--

CREATE TABLE IF NOT EXISTS `acad_cou_grad` (
  `user_id` int(10) NOT NULL,
  `course_id` varchar(15) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `gradepoints` float NOT NULL,
  `marks_insem1` int(11) NOT NULL,
  `marks_insem2` int(11) NOT NULL,
  `marks_endsem` int(11) NOT NULL,
  `marks_misc` int(11) NOT NULL,
  `marks_effective` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`course_id`,`sem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_cou_grad`
--

INSERT INTO `acad_cou_grad` (`user_id`, `course_id`, `sem_id`, `grade`, `gradepoints`, `marks_insem1`, `marks_insem2`, `marks_endsem`, `marks_misc`, `marks_effective`) VALUES
(200801028, 'CT214', 1, 'AA', 45, 0, 0, 0, 0, 0),
(1, 'ct114', 1, 'AA', 45, 0, 0, 0, 0, 0),
(200801001, 'ct114', 1, 'AA', 56, 0, 0, 0, 0, 0),
(200801001, 'sc106', 1, 'DE', 10, 0, 0, 0, 0, 0),
(2008010, 'it-223', 3, 'AA', 45, 54, 34, 34, 43, 0),
(843208, 'it-223', 3, '', 0, 54, 54, 0, 0, 0),
(546748, 'it-223', 3, '', 0, 0, 0, 0, 0, 0),
(200801044, 'it-223', 3, '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `acad_cou_offer`
--

CREATE TABLE IF NOT EXISTS `acad_cou_offer` (
  `program` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `batch_year` int(4) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `audit` tinyint(1) NOT NULL,
  `slot_no` int(11) NOT NULL,
  `status` enum('active','completed') NOT NULL,
  `present_year` int(4) NOT NULL,
  PRIMARY KEY (`program`,`batch_year`,`sem_id`,`audit`,`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_cou_offer`
--

INSERT INTO `acad_cou_offer` (`program`, `course_id`, `batch_year`, `sem_id`, `audit`, `slot_no`, `status`, `present_year`) VALUES
('btech', 'it114', 2008, 2, 0, 1, 'active', 2009),
('mtech', 'el114', 2009, 3, 0, 0, 'active', 2009),
('btech', 'el114', 2008, 2, 0, 2, 'active', 2009),
('btech', 'it324', 2008, 2, 1, 3, 'active', 2009),
('btech', 'el000', 2008, 2, 1, 3, 'active', 2009),
('btech', 'ct314', 2008, 2, 0, 4, 'active', 2009);

-- --------------------------------------------------------

--
-- Table structure for table `acad_fac_profile`
--

CREATE TABLE IF NOT EXISTS `acad_fac_profile` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `area_of_expertise` text NOT NULL,
  `date_of_joining` date NOT NULL,
  `degrees` text NOT NULL,
  `link` text NOT NULL COMMENT 'link to hi profile page',
  `experience` int(3) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_fac_profile`
--

INSERT INTO `acad_fac_profile` (`user_id`, `name`, `area_of_expertise`, `date_of_joining`, `degrees`, `link`, `experience`) VALUES
(200801002, 'wtf!', 'expert_002', '2011-03-25', 'degrees_002', 'link_002', 2),
(200801047, 'vishvesh', 'Computer Organization, Database Management systems, Data Structures and Algorithms, Embedded Hardware Design, Game designing and Developmentm, System Software', '2011-04-06', 'fs', 'fd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `acad_fee_structure`
--

CREATE TABLE IF NOT EXISTS `acad_fee_structure` (
  `candidate_name` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `batch_year` int(4) NOT NULL,
  `reciept_number` int(10) NOT NULL,
  `tution_fee` int(10) NOT NULL,
  `caution_money_deposit` int(10) NOT NULL,
  `excess_payment` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `cash_amount` int(10) NOT NULL,
  `DD/cheque_amount` int(10) NOT NULL,
  `DD.cheque_numbers` varchar(50) NOT NULL,
  `DD/cheque_date` date NOT NULL,
  `DD/cheque_iss_bank` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `hostel_fee` int(10) NOT NULL,
  `medical_insurance` int(10) NOT NULL,
  `registration_fee` int(10) NOT NULL,
  `sem_id` int(2) NOT NULL,
  `approved_date` datetime NOT NULL,
  `Electricity_charges` int(10) NOT NULL,
  `late_fee` int(10) NOT NULL,
  PRIMARY KEY (`user_id`,`sem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_fee_structure`
--

INSERT INTO `acad_fee_structure` (`candidate_name`, `program`, `batch_year`, `reciept_number`, `tution_fee`, `caution_money_deposit`, `excess_payment`, `total`, `cash_amount`, `DD/cheque_amount`, `DD.cheque_numbers`, `DD/cheque_date`, `DD/cheque_iss_bank`, `user_id`, `hostel_fee`, `medical_insurance`, `registration_fee`, `sem_id`, `approved_date`, `Electricity_charges`, `late_fee`) VALUES
('Pavanraj', 'btech', 2008, 57645, 30000, 30000, 500, 35000, 5300, 45334, '93845902', '2011-04-28', '435324', 200801001, 5678, 654, 34523, 1, '2011-04-04 00:00:00', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `acad_grade`
--

CREATE TABLE IF NOT EXISTS `acad_grade` (
  `grade` varchar(10) NOT NULL,
  `grade_value` int(2) NOT NULL,
  PRIMARY KEY (`grade`,`grade_value`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_grade`
--

INSERT INTO `acad_grade` (`grade`, `grade_value`) VALUES
('AA', 10),
('DE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `acad_important_dates`
--

CREATE TABLE IF NOT EXISTS `acad_important_dates` (
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(900) NOT NULL,
  PRIMARY KEY (`start_date`,`end_date`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_important_dates`
--

INSERT INTO `acad_important_dates` (`start_date`, `end_date`, `description`) VALUES
('2011-03-27', '2011-03-29', 'dsf'),
('2011-04-04', '2011-04-25', 'Happy days');

-- --------------------------------------------------------

--
-- Table structure for table `acad_lectures`
--

CREATE TABLE IF NOT EXISTS `acad_lectures` (
  `course_id` varchar(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_lectures`
--

INSERT INTO `acad_lectures` (`course_id`, `user_id`, `filename`, `date`, `description`) VALUES
('ct114', 2, 'lecture1.ppt', '2011-04-04', 'This is the introduction'),
('it-223', 200801047, '52.png', '2011-04-08', 'fd'),
('it-223', 200801047, '53.png', '2011-04-08', 'fd'),
('it-223', 200801047, '6.png', '2011-04-08', ''),
('it-223', 200801047, '61.png', '2011-04-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `acad_lect_venue`
--

CREATE TABLE IF NOT EXISTS `acad_lect_venue` (
  `course_id` varchar(10) NOT NULL,
  `venue` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_lect_venue`
--

INSERT INTO `acad_lect_venue` (`course_id`, `venue`) VALUES
('ct-213', 'CEP-110'),
('it-223', 'LT-3');

-- --------------------------------------------------------

--
-- Table structure for table `acad_permissions`
--

CREATE TABLE IF NOT EXISTS `acad_permissions` (
  `user_id` int(10) NOT NULL,
  `create_user` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `acad_programs`
--

CREATE TABLE IF NOT EXISTS `acad_programs` (
  `program` varchar(50) NOT NULL,
  `release_year` date NOT NULL COMMENT 'when is the programm introduced',
  `max_sem_id` int(2) NOT NULL,
  `min_sem_id` int(2) NOT NULL,
  `description` text,
  PRIMARY KEY (`program`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_programs`
--


-- --------------------------------------------------------

--
-- Table structure for table `acad_restrictions`
--

CREATE TABLE IF NOT EXISTS `acad_restrictions` (
  `program` varchar(50) NOT NULL,
  `batch_year` int(4) NOT NULL,
  `courses_number` int(4) NOT NULL,
  `credits` float NOT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`program`,`batch_year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_restrictions`
--

INSERT INTO `acad_restrictions` (`program`, `batch_year`, `courses_number`, `credits`, `deadline`) VALUES
('btech', 2008, 5, 25.5, '2011-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `acad_sem_list`
--

CREATE TABLE IF NOT EXISTS `acad_sem_list` (
  `sem_id` int(2) NOT NULL AUTO_INCREMENT,
  `semester` varchar(20) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `acad_sem_list`
--

INSERT INTO `acad_sem_list` (`sem_id`, `semester`) VALUES
(1, 'sem1'),
(2, 'sem2'),
(11, 'summer1'),
(3, 'sem3'),
(4, 'sem4'),
(5, 'sem5'),
(6, 'sem6'),
(7, 'sem7'),
(8, 'sem8'),
(22, 'summer2'),
(33, 'summer33');

-- --------------------------------------------------------

--
-- Table structure for table `acad_sem_perform`
--

CREATE TABLE IF NOT EXISTS `acad_sem_perform` (
  `user_id` int(10) NOT NULL,
  `sem_id` int(2) NOT NULL,
  `spi` float NOT NULL DEFAULT '0',
  `credits_registered` float NOT NULL COMMENT 'these are credits earned for a sem as this table is semwise performance',
  `credits_earned` float NOT NULL DEFAULT '0',
  `grade_points_earned` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`sem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_sem_perform`
--

INSERT INTO `acad_sem_perform` (`user_id`, `sem_id`, `spi`, `credits_registered`, `credits_earned`, `grade_points_earned`) VALUES
(200801001, 1, 5.62, 18, 18, 90),
(200801001, 2, 9.22, 20.5, 20.5, 189),
(200801001, 3, 8.9, 24, 24, 213.5);

-- --------------------------------------------------------

--
-- Table structure for table `acad_sessions`
--

CREATE TABLE IF NOT EXISTS `acad_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_sessions`
--

INSERT INTO `acad_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('490e80840ec984109afa7812b27b33f0', '10.100.96.21', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1302341048, 'a:3:{s:7:"user_id";s:9:"200801047";s:12:"is_logged_in";b:1;s:9:"user_type";s:7:"faculty";}'),
('35ee4cf09b0effc6035fd203baacbe71', '10.100.98.65', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1302341274, 'a:3:{s:7:"user_id";s:9:"200801047";s:12:"is_logged_in";b:1;s:9:"user_type";s:7:"faculty";}'),
('c5b8e9f7291a107b3602c0ea96e7a3ee', '10.100.98.65', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1302339336, 'a:3:{s:7:"user_id";s:9:"200801047";s:12:"is_logged_in";b:1;s:9:"user_type";s:7:"faculty";}'),
('27ccf8c9b043aa42e5741c58337f4cc7', '10.100.98.65', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1302338438, 'a:3:{s:7:"user_id";s:9:"200801047";s:12:"is_logged_in";b:1;s:9:"user_type";s:7:"faculty";}'),
('cc2dde86fc3d995fce92cdab3fd6d7fe', '10.100.98.65', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1302279816, 'a:3:{s:7:"user_id";s:9:"200801047";s:12:"is_logged_in";b:1;s:9:"user_type";s:7:"faculty";}'),
('40b8b88f8e44c19e4b23e6a090e2649a', '10.100.98.65', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1302337982, 'a:3:{s:7:"user_id";s:9:"200801047";s:12:"is_logged_in";b:1;s:9:"user_type";s:7:"faculty";}');

-- --------------------------------------------------------

--
-- Table structure for table `acad_stu_cou`
--

CREATE TABLE IF NOT EXISTS `acad_stu_cou` (
  `user_id` int(10) NOT NULL,
  `sem_id` int(2) NOT NULL,
  `status` enum('ongoing','completed','unapproved','incomplete','grade_improvement') NOT NULL COMMENT 'ongoing,completed,unapproved,incomplete',
  `slot_no` int(2) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `registered_date` date NOT NULL,
  `audit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`sem_id`,`status`,`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_stu_cou`
--

INSERT INTO `acad_stu_cou` (`user_id`, `sem_id`, `status`, `slot_no`, `course_id`, `registered_date`, `audit`) VALUES
(200801001, 1, 'ongoing', 1, 'ct114', '0000-00-00', 0),
(200801001, 1, 'completed', 1, 'sc106', '0000-00-00', 0),
(200801001, 1, 'incomplete', 2, 'it201', '2011-03-31', 0),
(200801001, 2, 'unapproved', 4, 'ct314', '0000-00-00', 0),
(200801001, 2, 'unapproved', 3, 'el000', '0000-00-00', 0),
(200801001, 2, 'unapproved', 2, 'el114', '0000-00-00', 0),
(200801001, 2, 'unapproved', 1, 'it114', '0000-00-00', 0),
(200801044, 3, 'ongoing', 5, 'it-223', '0000-00-00', 0),
(843208, 3, 'ongoing', 5, 'it-223', '0000-00-00', 0),
(2008010, 3, 'ongoing', 5, 'it-223', '2010-03-02', 0),
(546748, 3, 'ongoing', 5, 'it-223', '2010-03-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acad_stu_profile`
--

CREATE TABLE IF NOT EXISTS `acad_stu_profile` (
  `user_id` int(10) NOT NULL,
  `twelfth_percentage` float NOT NULL,
  `tenth_percentage` float NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `twelfth_board` varchar(50) NOT NULL,
  `twelfth_year` date NOT NULL,
  `CPI` float NOT NULL DEFAULT '0',
  `Overall_grade_points` float NOT NULL DEFAULT '0',
  `Total_credits_registered` float NOT NULL DEFAULT '0',
  `Total_credits_earned` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_stu_profile`
--

INSERT INTO `acad_stu_profile` (`user_id`, `twelfth_percentage`, `tenth_percentage`, `school_name`, `twelfth_board`, `twelfth_year`, `CPI`, `Overall_grade_points`, `Total_credits_registered`, `Total_credits_earned`) VALUES
(200801001, 90, 90, 'school_001', 'board_001', '0000-00-00', 0, 0, 0, 0),
(200801004, 94, 94, 'school_004', 'board_004', '0000-00-00', 0, 0, 0, 0),
(200801028, 98.2, 93.66, 'svs', 'bie', '0000-00-00', 0, 0, 0, 0),
(200801030, 80, 65, 'fashion public school', 'armani board of fashion', '0000-00-00', 0, 0, 0, 0),
(200901028, 68, 68, 'hitech', 'chaitanya', '0000-00-00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `acad_teaching`
--

CREATE TABLE IF NOT EXISTS `acad_teaching` (
  `user_id` int(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `present_year` int(4) NOT NULL COMMENT 'stands for the year the professor is assigned to that course',
  `program` varchar(20) NOT NULL,
  `batch_year` int(4) NOT NULL,
  `status` enum('active','completed') NOT NULL COMMENT 'to keep track of last year who taught course and so on',
  `wt_insem1` int(11) NOT NULL,
  `wt_insem2` int(11) NOT NULL,
  `wt_endsem` int(11) NOT NULL,
  `wt_misc` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`course_id`,`status`,`program`,`batch_year`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_teaching`
--

INSERT INTO `acad_teaching` (`user_id`, `course_id`, `present_year`, `program`, `batch_year`, `status`, `wt_insem1`, `wt_insem2`, `wt_endsem`, `wt_misc`) VALUES
(3, 'ct114', 2008, 'btech', 2008, 'active', 0, 0, 0, 0),
(200801047, 'it-223', 2011, 'btech', 2008, 'active', 0, 0, 0, 0),
(200801047, 'ct-213', 2010, 'btech', 2009, 'active', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `acad_timetable`
--

CREATE TABLE IF NOT EXISTS `acad_timetable` (
  `program` varchar(50) NOT NULL,
  `batch_year` int(4) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(50) NOT NULL,
  `slot_no` int(11) NOT NULL,
  `type` enum('lecture','lab','tutorial') NOT NULL,
  PRIMARY KEY (`program`,`batch_year`,`day`,`slot_no`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_timetable`
--

INSERT INTO `acad_timetable` (`program`, `batch_year`, `start_time`, `end_time`, `day`, `slot_no`, `type`) VALUES
('btech', 2008, '09:30:00', '10:30:00', 'Wed', 1, 'lecture'),
('btech', 2008, '10:30:00', '11:30:00', 'Wed', 2, 'lecture'),
('btech', 2008, '12:00:00', '12:55:00', 'fri', 5, 'lecture'),
('btech', 2009, '11:00:00', '11:55:00', 'fri', 9, 'lecture');

-- --------------------------------------------------------

--
-- Table structure for table `acad_users`
--

CREATE TABLE IF NOT EXISTS `acad_users` (
  `user_id` int(10) NOT NULL,
  `candidate_name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_type` enum('student','admin','faculty') NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active' COMMENT 'This is for identifying wether the user is valid anymore or not',
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_users`
--

INSERT INTO `acad_users` (`user_id`, `candidate_name`, `password`, `user_type`, `email_id`, `first_name`, `last_name`, `dob`, `gender`, `status`, `image`) VALUES
(200801001, 'Pavanraj', '200801001', 'student', '200801001@daiict.ac.in', 'hello', 'world', '1990-01-01', 'male', 'active', '200801001.jpg'),
(200801002, '', '6fc796d0866a7a9260ee8cbb319b5676', 'faculty', '200801002@daiict.ac.in', 'hello_f', 'world_f', '1990-01-02', 'male', 'active', '200801002.jpg'),
(200801003, '', '246e38cb55ca162ff7bcd65e3017423e', 'admin', '200801003@daiict.ac.in', 'fname_200801003', 'lname_200801003', '1990-01-03', 'female', 'active', '200801003.jpg'),
(200801004, '', '9fd2fb358a21371bcac1c2198b2a3c91', 'student', '200801004@daiict.ac.in', 'fname_200801004', 'lname_200801004', '1990-01-04', 'male', 'active', '200801004.jpeg'),
(2, 'Asimbanarejje', 'c81e728d9d4c2f636f067f89cc14862c', 'faculty', 'banerjee@fa', 'sdf', 'sdf', '2011-03-31', 'male', 'active', 'sdfsdf'),
(200801047, 'vishvesh', 'vishvesh', 'faculty', 'vishu.revuri@gmail.com', 'vishvesh', 'revoori', '0000-00-00', 'male', 'active', NULL),
(2008010, 'u1', 'u1', 'student', 'u1@m.com', 'u1', 'u1', '2011-03-06', 'male', 'active', 'u1'),
(843208, 'u2', 'u2', 'student', 'u2', 'u2', 'u2', '2011-03-01', 'female', 'active', 'u2'),
(546748, 'u3', 'u3', 'student', 'u1@m.com', 'u1', 'u3', '2011-03-14', 'male', 'active', 'u3');
