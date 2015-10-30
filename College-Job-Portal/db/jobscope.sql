-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 10, 2010 at 05:01 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.3

/*SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";*/
create database if not exists `jobscope`;

USE `jobscope`;



DROP TABLE IF EXISTS `mst_admin`;

-- 
-- Database: `jobscope`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `applicants`
-- 

CREATE TABLE `applicants` (
  `a_id` int(4) NOT NULL auto_increment,
  `a_uid` varchar(30) NOT NULL,
  `a_jid` varchar(30) NOT NULL,
  PRIMARY KEY  (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `applicants`
-- 

INSERT INTO `applicants` (`a_id`, `a_uid`, `a_jid`) VALUES 
(501, '201', '1001');

-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

CREATE TABLE `categories` (
  `cat_id` int(4) NOT NULL auto_increment,
  `cat_nm` varchar(30) NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `categories`
-- 

INSERT INTO `categories` (`cat_id`, `cat_nm`) VALUES 
(10, 'Teaching'),
(11, 'Non-Teaching'),
(12, 'Trainee'),
(13, 'Junior Research Fellow (JRF)'),
(14, 'Senior Research Fellow(SRF)'),
(15, 'Technical'),
(16, 'Security'),
(18, 'Doctor');

-- --------------------------------------------------------

-- 
-- Table structure for table `contact`
-- 

CREATE TABLE `contact` (
  `cont_id` int(4) NOT NULL auto_increment,
  `cont_fnm` varchar(30) NOT NULL,
  `cont_email` varchar(20) NOT NULL,
  `cont_query` varchar(300) NOT NULL,
  PRIMARY KEY  (`cont_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `contact`
-- 

INSERT INTO `contact` (`cont_id`, `cont_fnm`, `cont_email`, `cont_query`) VALUES 
(101, 'vijay', 'vijay.lakra96@gmail.c', 'xyz'),
(102, 'victor', 'victor.paul@yahoo.com', 'abc');

-- --------------------------------------------------------

-- 
-- Table structure for table `employees`
-- 

CREATE TABLE `employees` (
  `ee_id` int(4) NOT NULL auto_increment,
  `ee_fnm` varchar(30) NOT NULL,
  `ee_pwd` varchar(10) NOT NULL,
  `ee_gender` varchar(1) NOT NULL,
  `ee_email` varchar(30) NOT NULL,
  `ee_add` varchar(300) NOT NULL,
  `ee_phno` varchar(10) NOT NULL,
  `ee_mobileno` varchar(10) NOT NULL,
  `ee_current_location` varchar(20) NOT NULL,
  `ee_annualsalary` int(10) NOT NULL,
  `ee_current_organization` varchar(20) NOT NULL,
  `ee_qualification` varchar(10) NOT NULL,
  `ee_profile` varchar(300) NOT NULL,
  `ee_resume` longtext NOT NULL,
  PRIMARY KEY  (`ee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

-- 
-- Dumping data for table `employees`
-- 

INSERT INTO `employees` (`ee_id`, `ee_fnm`, `ee_pwd`, `ee_gender`, `ee_email`, `ee_add`, `ee_phno`, `ee_mobileno`, `ee_current_location`, `ee_annualsalary`, `ee_current_organization`, `ee_qualification`, `ee_profile`, `ee_resume`) VALUES 
(201, 'vijay', 'xyz', 'm', 'vijay.lakra96@gmail.com', '"vijay",Ist floor Aquamarime-A,NIT Trichy', '0281257254', '9934235456', 'Trichy', 45000, 'Nitt', 'mca', 'xyz', 'uploads/Vijay Lakra_MCA.pdf');

-- --------------------------------------------------------

-- 
-- Table structure for table `employers`
-- 

CREATE TABLE `employers` (
  `er_id` int(4) NOT NULL auto_increment,
  `er_fnm` varchar(30) NOT NULL,
  `er_pwd` varchar(10) NOT NULL,
  `er_organization` varchar(30) NOT NULL,
  `er_add` varchar(100) NOT NULL,
  `er_ph` varchar(10) NOT NULL,
  `er_email` varchar(30) NOT NULL,
  `er_organization_profile` varchar(300) NOT NULL,
  PRIMARY KEY  (`er_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=301 ;

-- 
-- Dumping data for table `employers`
-- 

INSERT INTO `employers` (`er_id`, `er_fnm`, `er_pwd`, `er_organization`, `er_add`, `er_ph`, `er_email`, `er_organization_profile`) VALUES 
(301, 'admin', 'Nitt100', 'nitt', '"nitt",Trichy-620015.', '0112345678', 'nitt.admin@gmail.com', 'abc');

-- --------------------------------------------------------

-- 
-- Table structure for table `jobs`
-- 

CREATE TABLE `jobs` (
  `j_id` int(4) NOT NULL auto_increment,
  `j_category` varchar(40) NOT NULL,
  `j_owner_name` varchar(30) NOT NULL,
  `j_title` varchar(90) NOT NULL,
  `j_hours` float(3,1) NOT NULL,
  `j_salary` varchar(20) NOT NULL,
  `j_experience` varchar(8) NOT NULL,
  `j_discription` varchar(1500) NOT NULL,
  `j_city` varchar(20) NOT NULL,
  `j_document` longtext NOT NULL,
  `j_active` int(1) NOT NULL default '0',
  PRIMARY KEY  (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

-- 
-- Dumping data for table `jobs`
-- 

INSERT INTO `jobs` (`j_id`, `j_category`, `j_owner_name`, `j_title`, `j_hours`, `j_salary`, `j_experience`, `j_discription`, `j_city`, `j_document`,`j_active`) VALUES 
(1001, 'Teaching', 'admin', 'Need for the Temporary Faculty in various departments', 5.0, '35000-40000', '2yrs', 'Temporary faculty are expected to assist the institute for the academic 
 transformation in respect of curriculum development, delivery and evaluation. They have to be academically strong in their respective areas and communicate effectively to the students. 
 They will also assist highly specialized faculty from leading institutions in the country who delivers lectures through video conferencing method.
 Qualification: 
 i) UG, PG and Ph.D. should be in the respective disciplines of Engineering, Technology, Science, Architecture, Management and Humanities.
 ii) Ph.D. desirable, First class both at UG and PG level (60% or 6.5/10 CGPA)
 Remuneration: 
 (a) For those with Ph.D. - Rs 42,000/- per month
(b) For those with Masters Degree (M.Tech/M.Phil., etc) - Rs 35,000/- per month
 No other allowances are admissible.
 Nature of appointment: The appointment is purely temporary for 11(eleven) months.', 'Trichy','jobs/temp-faculty-advt-2013.pdf', 1);

