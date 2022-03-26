-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2021 at 04:31 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



DROP TABLE IF EXISTS `Student`;
CREATE TABLE IF NOT EXISTS `Student` (
  `St_ID` INTEGER UNSIGNED AUTO_INCREMENT NOT NULL COMMENT 'TRIAL',
  `first_name` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `last_name` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `St_gender` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `date_of_birth` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `P_no` INTEGER NOT NULL COMMENT 'TRIAL',
  `dormant` INTEGER NOT NULL,
   PRIMARY KEY (`St_ID`),
   FOREIGN KEY (`P_no`) REFERENCES `person`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='TRIAL';


--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`St_ID`, `first_name`,`last_name`,`St_gender`,`date_of_birth`,`P_no`,`dormant`) VALUES
('01','Syed','Kashif','Male','2007-03-23','1','1'),
('02','Atif','Munir','Male','2009-05-13','2','2'),
('03','Fatima','Munir','Female','2010-07-04','2','3'),
('04','Mahnoor','latif','Female','2011-09-15','4','2'),
('05','Khurram','latif','Male','2017-01-17','4','1'),
('06','Ali','Abbas','Male','2012-02-20','6','1'),
('07','Ayesha','Baig','Female','2013-04-25','7','1'),
('08','Zainab','Azeem','Female','2014-07-29','8','2'),
('09','Hammad','Azeem','Male','2015-08-30','8','4'),
('10','Javaria','Tahir','Female','2016-12-16','10','3');
-- --------------------------------------------------------

--
-- Table structure for table `Course`
--


DROP TABLE IF EXISTS `Course`;
CREATE TABLE IF NOT EXISTS `Course` (
  `Course_ID` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Course_name` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `St_ID` INTEGER UNSIGNED AUTO_INCREMENT NOT NULL COMMENT 'TRIAL',
  KEY `jhist_Course_ix` (`Course_ID`),
  FOREIGN KEY (`St_ID`) REFERENCES `Student`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='TRIAL';


--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`Course_ID`, `Course_name`,`St_ID`) VALUES
('C01','English','03'),
('C02','Urdu','01'),
('C02','Urdu','04'),
('C03','Science','05'),
('C04','Computer','07'),
('C05','History','06'),
('C06','Arts','02'),
('C06','Arts','10'),
('C07','Visual Arts','09'),
('C07','Visual Arts','08');


-- --------------------------------------------------------

DROP TABLE IF EXISTS `Class_section`;
CREATE TABLE IF NOT EXISTS `Class_section` (
  `Class_ID` varchar(100) NOT NULL COMMENT 'TRIAL',
  `P_no` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Class_title` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `group` varchar (100) NOT NULL COMMENT 'TRIAL',
  `St_ID` INTEGER UNSIGNED AUTO_INCREMENT NOT NULL COMMENT 'TRIAL',
  `time_span` varchar(100) NOT NULL COMMENT 'Admission time',
 `new_admission` varchar(100) NOT NULL COMMENT 'Check',
`class_assigned` varchar(100) NOT NULL COMMENT 'Check',
  KEY `jhist_class_ix` (`Class_ID`),
  FOREIGN KEY(`St_ID`) REFERENCES `Student`,
  FOREIGN KEY(`P_no`) REFERENCES `Person`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='TRIAL';


--
-- Dumping data for table `Class_section`
--

INSERT INTO `Class_section` (`Class_ID`,`P_no`, `Class_title`,`group`,`St_ID`, `time_span`,`new_admission`,`class_assigned`) VALUES
('CS01','2','Class of English','F','03','10-5-2019','old','new'),
('CS02','1','Class of Urdu','M','01','10-5-2019','old','old'),
('CS02','3','Class of Urdu','F','04','10-5-2019','old','new'),
('CS03','4','Class of Science','M','05','14-5-2021','old','new'),
('CS04','7','Class of Computer','F','07','16-5-2021','old','old'),
('CS05','6','Class of History','M','06','20-5-2020','old','new'),
('CS06','2','Class of Arts','M','02','10-7-2019','old','old'),
('CS06','10','Class of Arts','F','10','14-8-2021','new','old'),
('CS07','0','Class of Visual Arts','M','09','14-8-2021','new','old'),
('CS07','8','Class of Visual Arts','F','08','14-8-2021','new','new');
-- --------------------------------------------------------

--
-- Table structure for table `Student_Age`
--


DROP TABLE IF EXISTS `Student_Age`;
CREATE TABLE IF NOT EXISTS `Student_Age` (
  `St_ID` INTEGER UNSIGNED AUTO_INCREMENT NOT NULL COMMENT 'TRIAL',
  `St_Age` INTEGER DEFAULT NULL COMMENT 'TRIAL',
  `Class_ID` varchar (100) NOT NULL COMMENT 'TRIAL',
  PRIMARY KEY (`St_ID`),
  KEY `jhist_class_ix` (`Class_ID`),
  FOREIGN KEY(`St_ID`) REFERENCES `Student`,
  FOREIGN KEY(`Class_ID`) REFERENCES `Class_section`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='TRIAL';


--
-- Dumping data for table `Student_Age`
--

INSERT INTO `Student_Age` (`St_ID`, `St_Age`,`Class_ID`) VALUES
('01','14','CS02'),
('02','12','CS06'),
('03','11','CS01'),
('04','10','CS02'),
('05','04','CS03'),
('06','09','CS05'),
('07','08','CS04'),
('08','07','CS07'),
('09','06','CS07'),
('10','05','CS06');


-- --------------------------------------------------------

--
-- Table structure for table `Section`
--


DROP TABLE IF EXISTS `Section`;
CREATE TABLE IF NOT EXISTS `Section` (
  `Class_ID` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Section_ID` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Section_Name` varchar (100) DEFAULT NULL COMMENT 'TRIAL',
   PRIMARY KEY(`Section_ID`),
   KEY `jhist_class_ix` (`Class_ID`),
   FOREIGN KEY (`Class_ID`) REFERENCES `Class_section`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='TRIAL';


--
-- Dumping data for table `Section`
--

INSERT INTO `Section`(`Class_ID`, `Section_ID`,`Section_Name`) VALUES
('CS01','S01','A'),
('CS02','S02','A'),
('CS02','S03','B'),
('CS03','S04','A'),
('CS04','S05','A'),
('CS05','S06','A'),
('CS06','S07','A'),
('CS06','S08','B'),
('CS07','S09','A'),
('CS07','S10','B');

-- --------------------------------------------------------


--
-- Table structure for table `Person`
--

DROP TABLE IF EXISTS `Person`;
CREATE TABLE IF NOT EXISTS `Person` (
  `P_no` INTEGER NOT NULL COMMENT 'TRIAL',
  `Number_of_Children` INTEGER NOT NULL COMMENT 'TRIAL',
  `Father_Name` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Mother_Name` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Father_CNIC` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Mother_CNIC` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Parent_address` varchar(200) NOT NULL COMMENT 'TRIAL',
  `Father_PhoneNo` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Mother_PhoneNo` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Father_Email` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Mother_Email` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Parent_jobtype` varchar(100) NOT NULL COMMENT 'TRIAL', 
  `Guardian_Name` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `Guardian_CNIC` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `Guardian_address` varchar(200) DEFAULT NULL COMMENT 'TRIAL',
  `Guardian_PhoneNo` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `Guardian_Email` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `Guardian_Relation` varchar(100) DEFAULT NULL COMMENT 'TRIAL',
  `new_parent` varchar(100) NOT NULL,
   PRIMARY KEY(`P_no`,`Father_CNIC`,`Mother_CNIC`),
   UNIQUE(`Mother_Email`,`Guardian_Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='TRIAL';


--
-- Dumping data for table `Person`
--

INSERT INTO `Person` (`P_no`,`Number_of_Children`,`Father_Name`,`Mother_Name`,`Father_CNIC`,`Mother_CNIC`,`Parent_address`,`Father_PhoneNo`,`Mother_PhoneNo`,`Father_Email`,`Mother_Email`,`Parent_jobtype`,`Guardian_Name`,`Guardian_CNIC`,`Guardian_address`,`Guardian_PhoneNo`,`Guardian_Email`,`Guardian_Relation`,`new_parent`) VALUES
('1','1','Kashif Hamza','Hamda Syed','61101-4376543-1','61101-9234200-2','H.01 St.01 G-10/1 Islamabad','0308-5934123','0308-5234671','Kashif.Hamza@gmail.com','Hamda.Syed@gmail.com','Employee At AAJ News','Wahaj','61101-6182395-7','Wah Cantt','0315-5168892','wahajrahman@gmail.com','Uncle','old'),
('2','2','Munir Asim','Fatima Munir','61101-5271233-3','61101-8234652-4','H.11 St.11 G-10/2 Islamabad','0304-4834321','0304-5234671','Munir.Asim@gmail.com','Fatima.Munir@gmail.com','Employee At PakWheels','Mishal','51100-7612942-1','B-17 Islamabad','0321-7283965','mishal@yahoo.com','Aunt','old'),
('3','3','Umar Altaf','Ayesha Akram','61101-2173453-5','61101-7234908-6','H.21 St.12 G-10/3 Islamabad','0302-9734356','0302-5234671','Umar.Altaf@gmail.com','Ayesha.Akram@gmail.com','Employee At AAJ News','Ali','31100-7284912-4','Gulberg-3','0314-7283924','Ali230@hotmail.com','Family Friend','old'),
('4','2','Latif Khan','Zainab Khan','61101-4074373-7','61101-6234699-8','H.31 St.19 G-10/4 Islamabad','0336-3834098','0336-5234671','Latif.khatak@gmail.com','Zainab.tiktok@gmail.com','Youtuber','Qurat-ul-Ain','51100-3456789-2','G-13','0312-7839123','ainny555@gmail.com','Aunt','old'),
('5','2','Ehsan Khan','Rasheeda Khan','61101-3979873-9','61101-5234224-2','H.41 St.20 F-10/1 Islamabad','0304-7534032','0304-5234671','Ehsan.Khan@gmail.com','Rasheeda123@gmail.com','Producer At VOA','Sara','72900-8129412-8','G-10','0312-8889123','sara@hotmail.com','Family friend','old'),
('6','1','Abbas Amjad','Mahnoor Jeelani','61101-2872233-1','61101-4234229-4','H.51 St.32 F-10/2 Islamabad','0312-8434078','0312-5234671','Abbas.amjad@gmail.com','Mahnoor003@gmail.com','High Court Judge','Zia','87261-2837194-0','G-12','0300-1414714','ziahakeem@gmail.com','father in law','old'),
('7','4','Mirza Abdul Baig','Fajr Baig','61101-1777763-3','61101-3234231-6','H.61 St.17 F-10/3 Islamabad','0301-1334908','0301-5234671','Mirza.Baig@gmail.com','Fajr123@gmail.com','Unemployed','Aman','56000-6127481-2','Naval Ankrage','0312-6273842','amanshah@yahoo.com','First Cousine','old'),
('8','3','Azeem Hasan','Maria Abbas','61101-5671223-5','61101-5234666-8','H.71 St.18 F-10/4 Islamabad','0309-4234254','0309-5234671','Azeem.hasan@gmail.com','Maria.abbas@gmail.com','Employee At FAST(NUCES)','Moiz','51100-3105618-4','G-13','0312-8681969','moiz@gmail.com','First Cousine','new'),
('9','2','Umar ibn Khalid','Khateja Khan','61101-6576543-7','61101-4234997-2','H.81 St.23 E-11/1 Islamabad','0320-5134987','0320-5234671','umar.khalid@gmail.com','itsKhateja@gmail.com','Staff member of Hamaray Bachey','Taha','51100-2783923-2','G-10','0312-4673829','taha@hotmail.com','Uncle','new'),
('10','3','Tahir Abbas','Bisma Batool','61101-7474323-9','61101-3234999-4','H.91 St.21 G-11/2 Islamabad','0308-6034009','0308-5234671','tahir.amaze@gmail.com','bisma.abbas@gmail.com','Employee At GEO News','Maryam','61100-2345678-0','E-11','0331-1234123','Maryam@yahoo.com','sister in law','new');
-- --------------------------------------------------------

--
-- Table structure for table `Fees`
--


DROP TABLE IF EXISTS `Fees`;
CREATE TABLE IF NOT EXISTS `Fees` (
  `St_ID` varchar(100) NOT NULL COMMENT 'TRIAL',
  `Class_ID` varchar(100) NOT NULL COMMENT 'TRIAL',
  `voucherNumber` varchar(100) NOT NULL COMMENT 'TRIAL',
  `amount` double (8,0) DEFAULT NULL COMMENT 'TRIAL',
  `discount` INTEGER DEFAULT NULL COMMENT 'TRIAL',
  `numberofchildren` INTEGER NOT NULL COMMENT 'TRIAL',
   PRIMARY KEY(`St_ID`,`voucherNumber`),
   FOREIGN KEY (`Class_ID`) REFERENCES `Class_section`,
   FOREIGN KEY (`numberofchildren`) REFERENCES `Person`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='TRIAL';


--
-- Dumping data for table `Fees`
--

INSERT INTO `Fees`(`St_ID`,`Class_ID`, `voucherNumber`,`amount`,`discount`,`numberofchildren`) VALUES
('St01','CS02','123056783','10000','0','1'),
('St02','CS06','223156780','10000','0','2'),
('St03','CS01','323256781','10000','30','3'),
('St04','CS02','423356783','10000','0','2'),
('St05','CS03','523456784','10000','0','2'),
('St06','CS05','623556785','10000','0','1'),
('St07','CS04','723656786','10000','50','4'),
('St08','CS07','823756787','10000','30','3'),
('St09','CS07','923856788','10000','100','2'),
('St10','CS06','023956789','10000','0','3');