-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 06 月 13 日 01:27
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kindergarden`
--

-- --------------------------------------------------------

--
-- 表的结构 `child_1_base`
--

CREATE TABLE IF NOT EXISTS `child_1_base` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Child_Id` varchar(20) NOT NULL,
  `InputDate` varchar(20) NOT NULL,
  `EnterDate` varchar(20) NOT NULL,
  `LeaveDate` varchar(20) DEFAULT NULL,
  `FamilyName` varchar(20) NOT NULL,
  `GivenName` varchar(20) NOT NULL,
  `FamilyName_Spell` varchar(32) NOT NULL,
  `GivenName_Spell` varchar(32) NOT NULL,
  `NickName` varchar(40) NOT NULL,
  `Birthday` varchar(20) NOT NULL,
  `Sex` int(11) NOT NULL,
  `PostCode` varchar(16) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Tel` varchar(45) NOT NULL,
  `Class` varchar(32) DEFAULT NULL,
  `Activities` varchar(20) DEFAULT NULL,
  `Music_Date` varchar(30) DEFAULT NULL,
  `English_Date` varchar(30) DEFAULT NULL,
  `Gym_Date` varchar(30) DEFAULT NULL,
  `Dance_Date` varchar(30) DEFAULT NULL,
  `Child_Eat` varchar(20) DEFAULT NULL,
  `Child_EatDate` varchar(30) DEFAULT NULL,
  `Temper` varchar(12) DEFAULT NULL,
  `BloodType` varchar(8) DEFAULT NULL,
  `Traffic_Way` varchar(12) DEFAULT NULL,
  `Traffic_TakeTime` varchar(8) DEFAULT NULL,
  `Traffic_Distance` varchar(12) DEFAULT NULL,
  `Traffic_OtherWay` varchar(80) DEFAULT NULL,
  `Arrive_Time` time DEFAULT NULL,
  `Arrive_ByWho` varchar(8) DEFAULT NULL,
  `Arrive_ByOther` varchar(32) DEFAULT NULL,
  `Arrive_Time_Rest` time DEFAULT NULL,
  `Arrive_ByWho_Rest` varchar(8) DEFAULT NULL,
  `Arrive_ByOther_Rest` varchar(32) DEFAULT NULL,
  `Leave_Time` time DEFAULT NULL,
  `Leave_ByWho` varchar(8) DEFAULT NULL,
  `Leave_ByOther` varchar(32) DEFAULT NULL,
  `Leave_Time_Rest` time DEFAULT NULL,
  `Leave_ByWho_Rest` varchar(8) DEFAULT NULL,
  `Leave_ByOther_Rest` varchar(32) DEFAULT NULL,
  `Hospital_Physical` varchar(80) DEFAULT NULL,
  `Hospital_Physical_Tel` varchar(40) DEFAULT NULL,
  `Hospital_Tooth` varchar(80) DEFAULT NULL,
  `Hospital_Tooth_Tel` varchar(40) DEFAULT NULL,
  `Hospital_Eye` varchar(80) DEFAULT NULL,
  `Hospital_Eye_Tel` varchar(40) DEFAULT NULL,
  `Hospital_EarNose` varchar(80) DEFAULT NULL,
  `Hospital_EarNose_Tel` varchar(40) DEFAULT NULL,
  `Hospital_Skin` varchar(80) DEFAULT NULL,
  `Hospital_Skin_Tel` varchar(40) DEFAULT NULL,
  `Hospital_Child` varchar(80) DEFAULT NULL,
  `Hospital_Child_Tel` varchar(40) DEFAULT NULL,
  `Insurance_Record` varchar(20) DEFAULT NULL,
  `Insurance_Number` varchar(20) DEFAULT NULL,
  `Insurance_Assistance` varchar(10) DEFAULT NULL,
  `Nearby1_Class` varchar(32) DEFAULT NULL,
  `Nearby1_ChildName` varchar(40) DEFAULT NULL,
  `Nearby2_Class` varchar(32) DEFAULT NULL,
  `Nearby2_ChildName` varchar(40) DEFAULT NULL,
  `setbacksNum` int(4) NOT NULL DEFAULT '1' COMMENT '目前做到step几了',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Child_Id_UNIQUE` (`Child_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `child_1_base`
--

INSERT INTO `child_1_base` (`ID`, `Child_Id`, `InputDate`, `EnterDate`, `LeaveDate`, `FamilyName`, `GivenName`, `FamilyName_Spell`, `GivenName_Spell`, `NickName`, `Birthday`, `Sex`, `PostCode`, `Address`, `Tel`, `Class`, `Activities`, `Music_Date`, `English_Date`, `Gym_Date`, `Dance_Date`, `Child_Eat`, `Child_EatDate`, `Temper`, `BloodType`, `Traffic_Way`, `Traffic_TakeTime`, `Traffic_Distance`, `Traffic_OtherWay`, `Arrive_Time`, `Arrive_ByWho`, `Arrive_ByOther`, `Arrive_Time_Rest`, `Arrive_ByWho_Rest`, `Arrive_ByOther_Rest`, `Leave_Time`, `Leave_ByWho`, `Leave_ByOther`, `Leave_Time_Rest`, `Leave_ByWho_Rest`, `Leave_ByOther_Rest`, `Hospital_Physical`, `Hospital_Physical_Tel`, `Hospital_Tooth`, `Hospital_Tooth_Tel`, `Hospital_Eye`, `Hospital_Eye_Tel`, `Hospital_EarNose`, `Hospital_EarNose_Tel`, `Hospital_Skin`, `Hospital_Skin_Tel`, `Hospital_Child`, `Hospital_Child_Tel`, `Insurance_Record`, `Insurance_Number`, `Insurance_Assistance`, `Nearby1_Class`, `Nearby1_ChildName`, `Nearby2_Class`, `Nearby2_ChildName`, `setbacksNum`) VALUES
(1, '20160001', '2016-06-07', '2016-06-07', '0000-00-00', '春燕', '顾', 'chunyan', 'gu', 'chunyan', '2010-04-11', 1, '0510', '长江大厦6号门2407', '0510-81017307', '', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', '', '', '', '', '', '00:00:00', '', '', '00:00:00', '', '', '00:00:00', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', 2);

-- --------------------------------------------------------

--
-- 表的结构 `child_2_family`
--

CREATE TABLE IF NOT EXISTS `child_2_family` (
  `Guardian1_FamilyName` varchar(20) DEFAULT NULL,
  `Guardian1_GivenName` varchar(20) DEFAULT NULL,
  `Guardian1_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Guardian1_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Guardian1_Birthday` varchar(20) DEFAULT NULL,
  `Guardian1_Sex` int(11) DEFAULT NULL,
  `Guardian1_Relation` varchar(8) DEFAULT NULL,
  `Guardian1_WorkPlace` varchar(80) DEFAULT NULL,
  `Guardian1_WorkAddress` varchar(200) DEFAULT NULL,
  `Guardian1_WorkTel` varchar(40) DEFAULT NULL,
  `Guardian1_Mobile` varchar(60) DEFAULT NULL,
  `Guardian1_WorkTime_Begin` time DEFAULT NULL,
  `Guardian1_WorkTime_End` time DEFAULT NULL,
  `Guardian1_WorkTime_Begin_Rest` time DEFAULT NULL,
  `Guardian1_WorkTime_End_Rest` time DEFAULT NULL,
  `Guardian1_RestDay` varchar(16) DEFAULT NULL,
  `Guardian1_RestOther` varchar(40) DEFAULT NULL,
  `Guardian2_FamilyName` varchar(20) DEFAULT NULL,
  `Guardian2_GivenName` varchar(20) DEFAULT NULL,
  `Guardian2_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Guardian2_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Guardian2_Birthday` varchar(20) DEFAULT NULL,
  `Guardian2_Sex` int(11) DEFAULT NULL,
  `Guardian2_Relation` varchar(8) DEFAULT NULL,
  `Guardian2_WorkPlace` varchar(80) DEFAULT NULL,
  `Guardian2_WorkAddress` varchar(200) DEFAULT NULL,
  `Guardian2_WorkTel` varchar(40) DEFAULT NULL,
  `Guardian2_Mobile` varchar(60) DEFAULT NULL,
  `Guardian2_WorkTime_Begin` time DEFAULT NULL,
  `Guardian2_WorkTime_End` time DEFAULT NULL,
  `Guardian2_WorkTime_Begin_Rest` time DEFAULT NULL,
  `Guardian2_WorkTime_End_Rest` time DEFAULT NULL,
  `Guardian2_RestDay` varchar(16) DEFAULT NULL,
  `Guardian2_RestOther` varchar(40) DEFAULT NULL,
  `Assist_FamilyName` varchar(20) DEFAULT NULL,
  `Assist_GivenName` varchar(20) DEFAULT NULL,
  `Assist_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Assist_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Assist_Address` varchar(200) DEFAULT NULL,
  `Assist_Tel` varchar(40) DEFAULT NULL,
  `Assist_Sex` int(11) DEFAULT NULL,
  `Assist_Relation` varchar(20) DEFAULT NULL,
  `Member1_FamilyName` varchar(20) DEFAULT NULL,
  `Member1_GivenName` varchar(20) DEFAULT NULL,
  `Member1_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Member1_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Member1_Birthday` varchar(20) DEFAULT NULL,
  `Member1_Sex` int(11) DEFAULT NULL,
  `Member1_Relation` varchar(20) DEFAULT NULL,
  `Member1_WorkPlace` varchar(80) DEFAULT NULL,
  `Member2_FamilyName` varchar(20) DEFAULT NULL,
  `Member2_GivenName` varchar(20) DEFAULT NULL,
  `Member2_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Member2_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Member2_Birthday` varchar(20) DEFAULT NULL,
  `Member2_Sex` int(11) DEFAULT NULL,
  `Member2_Relation` varchar(20) DEFAULT NULL,
  `Member2_WorkPlace` varchar(80) DEFAULT NULL,
  `Member3_FamilyName` varchar(20) DEFAULT NULL,
  `Member3_GivenName` varchar(20) DEFAULT NULL,
  `Member3_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Member3_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Member3_Birthday` varchar(20) DEFAULT NULL,
  `Member3_Sex` int(11) DEFAULT NULL,
  `Member3_Relation` varchar(20) DEFAULT NULL,
  `Member3_WorkPlace` varchar(80) DEFAULT NULL,
  `Member4_FamilyName` varchar(20) DEFAULT NULL,
  `Member4_GivenName` varchar(20) DEFAULT NULL,
  `Member4_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Member4_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Member4_Birthday` varchar(20) DEFAULT NULL,
  `Member4_Sex` int(11) DEFAULT NULL,
  `Member4_Relation` varchar(20) DEFAULT NULL,
  `Member4_WorkPlace` varchar(80) DEFAULT NULL,
  `Member5_FamilyName` varchar(20) DEFAULT NULL,
  `Member5_GivenName` varchar(20) DEFAULT NULL,
  `Member5_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Member5_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Member5_Birthday` varchar(20) DEFAULT NULL,
  `Member5_Sex` int(11) DEFAULT NULL,
  `Member5_Relation` varchar(20) DEFAULT NULL,
  `Member5_WorkPlace` varchar(80) DEFAULT NULL,
  `Member6_FamilyName` varchar(20) DEFAULT NULL,
  `Member6_GivenName` varchar(20) DEFAULT NULL,
  `Member6_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Member6_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Member6_Birthday` varchar(20) DEFAULT NULL,
  `Member6_Sex` int(11) DEFAULT NULL,
  `Member6_Relation` varchar(20) DEFAULT NULL,
  `Member6_WorkPlace` varchar(80) DEFAULT NULL,
  `Member7_FamilyName` varchar(20) DEFAULT NULL,
  `Member7_GivenName` varchar(20) DEFAULT NULL,
  `Member7_FamilyName_Spell` varchar(32) DEFAULT NULL,
  `Member7_GivenName_Spell` varchar(32) DEFAULT NULL,
  `Member7_Birthday` varchar(20) DEFAULT NULL,
  `Member7_Sex` int(11) DEFAULT NULL,
  `Member7_Relation` varchar(20) DEFAULT NULL,
  `Member7_WorkPlace` varchar(80) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_2_Family_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_3_status`
--

CREATE TABLE IF NOT EXISTS `child_3_status` (
  `Birth_Period` varchar(16) DEFAULT NULL,
  `Birth_Weight` varchar(24) DEFAULT NULL,
  `Birth_Status` varchar(16) DEFAULT NULL,
  `Birth_Remark` varchar(100) DEFAULT NULL,
  `Suckle_Status` varchar(20) DEFAULT NULL,
  `Suckle_Way` varchar(20) DEFAULT NULL,
  `Suckle_StopAgeY` int(11) DEFAULT NULL,
  `Suckle_StopAgeM` int(11) DEFAULT NULL,
  `Walk_Status` varchar(32) DEFAULT NULL,
  `Walk_BeginAgeY` int(11) DEFAULT NULL,
  `Walk_BeginAgeM` int(11) DEFAULT NULL,
  `Language_Status` varchar(32) DEFAULT NULL,
  `Language_Remark` varchar(45) DEFAULT NULL,
  `Language_BeginAgeY` int(11) DEFAULT NULL,
  `Language_BeginAgeM` int(11) DEFAULT NULL,
  `RaiseMen_Relation` varchar(80) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_3_Status_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_3_vaccine`
--

CREATE TABLE IF NOT EXISTS `child_3_vaccine` (
  `4Mix_Date1` varchar(20) DEFAULT NULL,
  `4Mix_Date2` varchar(20) DEFAULT NULL,
  `4Mix_Date3` varchar(20) DEFAULT NULL,
  `4Mix_DateAdd` varchar(20) DEFAULT NULL,
  `FluB_Date1` varchar(20) DEFAULT NULL,
  `FluB_Date2` varchar(20) DEFAULT NULL,
  `FluB_Date3` varchar(20) DEFAULT NULL,
  `FluB_DateAdd` varchar(20) DEFAULT NULL,
  `Pneumonia_Date1` varchar(20) DEFAULT NULL,
  `Pneumonia_Date2` varchar(20) DEFAULT NULL,
  `Pneumonia_Date3` varchar(20) DEFAULT NULL,
  `Pneumonia_DateAdd` varchar(20) DEFAULT NULL,
  `Encephalitis_Date1` varchar(20) DEFAULT NULL,
  `Encephalitis_Date2` varchar(20) DEFAULT NULL,
  `Encephalitis_DateAdd` varchar(20) DEFAULT NULL,
  `Polio_Date1` varchar(20) DEFAULT NULL,
  `Polio_Date2` varchar(20) DEFAULT NULL,
  `Polio_Date3` varchar(20) DEFAULT NULL,
  `Polio_Date4` varchar(20) DEFAULT NULL,
  `BCG_Date` varchar(20) DEFAULT NULL,
  `Measles_Date1` varchar(20) DEFAULT NULL,
  `Measles_Date2` varchar(20) DEFAULT NULL,
  `Mumps_Date` varchar(20) DEFAULT NULL,
  `Chickenpox_Date` varchar(20) DEFAULT NULL,
  `Vaccine_Remark` varchar(400) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_3_Vaccine_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_4_health`
--

CREATE TABLE IF NOT EXISTS `child_4_health` (
  `His_Measles` varchar(4) DEFAULT NULL,
  `His_Measles_Age` int(11) DEFAULT NULL,
  `His_Chickenpox` varchar(4) DEFAULT NULL,
  `His_Chickenpox_Age` int(11) DEFAULT NULL,
  `His_Mumps` varchar(4) DEFAULT NULL,
  `His_Mumps_Age` int(11) DEFAULT NULL,
  `His_Rubella` varchar(4) DEFAULT NULL,
  `His_Rubella_Age` int(11) DEFAULT NULL,
  `His_Cough` varchar(4) DEFAULT NULL,
  `His_Cough_Age` int(11) DEFAULT NULL,
  `His_RedSpot` varchar(4) DEFAULT NULL,
  `His_RedSpot_Age` int(11) DEFAULT NULL,
  `His_HFMD` varchar(4) DEFAULT NULL,
  `His_HFMD_Age` int(11) DEFAULT NULL,
  `His_BacteriaInfect` varchar(4) DEFAULT NULL,
  `His_BacteriaInfect_Age` int(11) DEFAULT NULL,
  `His_Otitis` varchar(4) DEFAULT NULL,
  `His_Otitis_Age` int(11) DEFAULT NULL,
  `His_Pneumonia` varchar(4) DEFAULT NULL,
  `His_Pneumonia_Age` int(11) DEFAULT NULL,
  `His_Asthma` varchar(4) DEFAULT NULL,
  `His_Asthma_Age` int(11) DEFAULT NULL,
  `His_Poisoned` varchar(4) DEFAULT NULL,
  `His_Poisoned_Age` int(11) DEFAULT NULL,
  `His_Remark_Health` varchar(400) DEFAULT NULL,
  `His_Remark_Injury` varchar(400) DEFAULT NULL,
  `Body_HaveTic` varchar(4) DEFAULT NULL,
  `Body_CatchCold` varchar(4) DEFAULT NULL,
  `Body_Tonsil` varchar(4) DEFAULT NULL,
  `Body_Diarrhea` varchar(4) DEFAULT NULL,
  `Body_SkinWeak` varchar(4) DEFAULT NULL,
  `Body_NoseBleed` varchar(4) DEFAULT NULL,
  `Body_Fever` varchar(4) DEFAULT NULL,
  `Body_Asthma` varchar(4) DEFAULT NULL,
  `Body_Disjoint` varchar(4) DEFAULT NULL,
  `Body_Disjoint_Place` varchar(100) DEFAULT NULL,
  `Body_Atopy` varchar(4) DEFAULT NULL,
  `Body_Atopy_Skin` varchar(4) DEFAULT NULL,
  `Body_Atopy_Asthma` varchar(4) DEFAULT NULL,
  `Body_Atopy_Remark` varchar(100) DEFAULT NULL,
  `Body_Urticaria` varchar(4) DEFAULT NULL,
  `Body_Urticaria_Reason` varchar(100) DEFAULT NULL,
  `Body_Allergy` varchar(4) DEFAULT NULL,
  `Body_Allergy_Reason` varchar(100) DEFAULT NULL,
  `Body_Allergy_FoodDrug` varchar(100) DEFAULT NULL,
  `Body_Other` varchar(4) DEFAULT NULL,
  `Body_Other_Remark` varchar(100) DEFAULT NULL,
  `Eye_Status` varchar(16) DEFAULT NULL,
  `Eye_Status_Remark` varchar(100) DEFAULT NULL,
  `Ear_Status` varchar(40) DEFAULT NULL,
  `Ear_Status_History` varchar(400) DEFAULT NULL,
  `Health_Remark` varchar(400) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_4_Health_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_5_edu`
--

CREATE TABLE IF NOT EXISTS `child_5_edu` (
  `Edu_Place` varchar(4) DEFAULT NULL,
  `Edu_PlaceName` varchar(105) DEFAULT NULL,
  `Edu_Remark` varchar(200) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_5_Edu_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_5_live1`
--

CREATE TABLE IF NOT EXISTS `child_5_live1` (
  `Eat_Appetite` varchar(20) DEFAULT NULL,
  `Eat_Speed` varchar(20) DEFAULT NULL,
  `Eat_Like` varchar(100) DEFAULT NULL,
  `Eat_Unlike` varchar(100) DEFAULT NULL,
  `Eat_Snacks` varchar(20) DEFAULT NULL,
  `Eat_Snacks_Time` varchar(20) DEFAULT NULL,
  `Toilet_Big` varchar(25) DEFAULT NULL,
  `Toilet_Big_Leak` varchar(25) DEFAULT NULL,
  `Toilet_Small` varchar(25) DEFAULT NULL,
  `Toilet_Small_Period` varchar(45) DEFAULT NULL,
  `Toilet_Night` varchar(20) DEFAULT NULL,
  `Sleep_WakeTime` varchar(20) DEFAULT NULL,
  `Sleep_Wake` varchar(20) DEFAULT NULL,
  `Sleep_SleepTime` varchar(20) DEFAULT NULL,
  `Sleep_Sleep` varchar(25) DEFAULT NULL,
  `Sleep_Who` varchar(40) DEFAULT NULL,
  `Sleep_Who_Other` varchar(100) DEFAULT NULL,
  `Sleep_Daytime` varchar(25) DEFAULT NULL,
  `Sleep_Daytime_Spend` varchar(12) DEFAULT NULL,
  `Live1_Remark` varchar(400) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_5_Live1_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_5_live2`
--

CREATE TABLE IF NOT EXISTS `child_5_live2` (
  `Language` varchar(20) DEFAULT NULL,
  `StrongHand` varchar(20) DEFAULT NULL,
  `Hobby` varchar(100) DEFAULT NULL,
  `DistingMen` varchar(40) DEFAULT NULL,
  `Friend1_Age` int(11) DEFAULT NULL,
  `Friend1_Name` varchar(45) DEFAULT NULL,
  `Friend2_Age` int(11) DEFAULT NULL,
  `Friend2_Name` varchar(45) DEFAULT NULL,
  `PlayPlace` varchar(12) DEFAULT NULL,
  `PlayPlace_Remark` varchar(150) DEFAULT NULL,
  `LikePlay` varchar(100) DEFAULT NULL,
  `TVTime` int(11) DEFAULT NULL,
  `GameTime` int(11) DEFAULT NULL,
  `Housework` varchar(25) DEFAULT NULL,
  `Housework_Remark` varchar(100) DEFAULT NULL,
  `Dress` varchar(25) DEFAULT NULL,
  `Dress_Remark` varchar(100) DEFAULT NULL,
  `Money` varchar(12) DEFAULT NULL,
  `Money_Count` varchar(12) DEFAULT NULL,
  `Money_Use` varchar(100) DEFAULT NULL,
  `Feature_Good` varchar(400) DEFAULT NULL,
  `Feature_Low` varchar(400) DEFAULT NULL,
  `Live2_Remark` varchar(400) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_5_Live2_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_6_agree`
--

CREATE TABLE IF NOT EXISTS `child_6_agree` (
  `Agree` varchar(8) NOT NULL DEFAULT '',
  `Agree_Hope` varchar(1600) DEFAULT NULL,
  `Agree_Remark` varchar(1600) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_Child_6_Agree_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `child_recog`
--

CREATE TABLE IF NOT EXISTS `child_recog` (
  `Recog_Type` varchar(20) DEFAULT NULL,
  `Recog_Date` varchar(45) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_child_recog_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `communication`
--

CREATE TABLE IF NOT EXISTS `communication` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Child_Id` varchar(30) NOT NULL,
  `LeaveDate` varchar(25) DEFAULT NULL,
  `LeaveDate_End` varchar(30) DEFAULT NULL,
  `Late` varchar(4) DEFAULT NULL,
  `Arrive_Time` varchar(25) DEFAULT NULL,
  `Eat` varchar(4) DEFAULT NULL,
  `Rest` varchar(4) DEFAULT NULL,
  `Edit` varchar(4) DEFAULT NULL,
  `Other` varchar(4) DEFAULT NULL,
  `Reason` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `healthcard`
--

CREATE TABLE IF NOT EXISTS `healthcard` (
  `Weight` varchar(16) DEFAULT NULL,
  `ScanDate` varchar(20) DEFAULT NULL,
  `Guardian1` varchar(10) DEFAULT NULL,
  `Guardian2` varchar(15) DEFAULT NULL,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_HealthCard_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `schoolin`
--

CREATE TABLE IF NOT EXISTS `schoolin` (
  `Guardian1` varchar(8) DEFAULT NULL,
  `Guardian2` varchar(8) DEFAULT NULL,
  `InDate` varchar(20) DEFAULT NULL,
  `ChangeInDate` varchar(20) DEFAULT NULL,
  `InterruptDate` varchar(20) DEFAULT NULL,
  `FinishDate` varchar(20) DEFAULT NULL,
  `Period1_Year` varchar(20) DEFAULT NULL,
  `Period1_AgeY` varchar(8) DEFAULT NULL,
  `Period1_AgeM` varchar(8) DEFAULT NULL,
  `Period2_Year` varchar(20) DEFAULT NULL,
  `Period2_AgeY` varchar(8) DEFAULT NULL,
  `Period2_AgeM` varchar(8) DEFAULT NULL,
  `Period3_Year` varchar(20) DEFAULT NULL,
  `Period3_AgeY` varchar(8) DEFAULT NULL,
  `Period3_AgeM` varchar(8) DEFAULT NULL,
  `Period4_Year` varchar(20) DEFAULT NULL,
  `Period4_AgeY` varchar(8) DEFAULT NULL,
  `Period4_AgeM` varchar(8) DEFAULT NULL,
  `Teach1_Year` varchar(25) DEFAULT NULL,
  `Teach1_Days` int(11) DEFAULT NULL,
  `Teach1_inDays` int(11) DEFAULT NULL,
  `Teach1_YearPoint` text,
  `Teach1_SinglePoint` text,
  `Teach1_Reference` text,
  `Teach1_Remark` text,
  `Teach2_Year` varchar(25) DEFAULT NULL,
  `Teach2_Days` int(11) DEFAULT NULL,
  `Teach2_inDays` int(11) DEFAULT NULL,
  `Teach2_YearPoint` text,
  `Teach2_SinglePoint` text,
  `Teach2_Reference` text,
  `Teach2_Remark` text,
  `Teach3_Year` varchar(25) DEFAULT NULL,
  `Teach3_Days` int(11) DEFAULT NULL,
  `Teach3_inDays` int(11) DEFAULT NULL,
  `Teach3_YearPoint` text,
  `Teach3_SinglePoint` text,
  `Teach3_Reference` text,
  `Teach3_Remark` text,
  `Teach4_Year` varchar(25) DEFAULT NULL,
  `Teach4_Days` int(11) DEFAULT NULL,
  `Teach4_inDays` int(11) DEFAULT NULL,
  `Teach4_YearPoint` text,
  `Teach4_SinglePoint` text,
  `Teach4_Reference` text,
  `Teach4_Remark` text,
  `Child_1_Base_ID` int(11) NOT NULL,
  KEY `fk_SchoolIn_Child_1_Base1_idx` (`Child_1_Base_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` varchar(50) NOT NULL,
  `PWD` varchar(50) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `SELLEVEL` varchar(20) NOT NULL,
  `Available` int(5) NOT NULL,
  `LASTLOGINTIME` int(11) NOT NULL,
  `Remark` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID`, `USERID`, `PWD`, `NAME`, `SELLEVEL`, `Available`, `LASTLOGINTIME`, `Remark`) VALUES
(1, 'maxauth', 'maxauth', 'MaxAuth', 'Admin', 1, 1465692869, '管理者');

-- --------------------------------------------------------

--
-- 表的结构 `user_guardian`
--

CREATE TABLE IF NOT EXISTS `user_guardian` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Guardian_ID` varchar(30) NOT NULL,
  `PWD` varchar(30) NOT NULL,
  `Available` varchar(30) NOT NULL,
  `LASTLOGINTIME` varchar(30) DEFAULT NULL,
  `Remark` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `child_2_family`
--
ALTER TABLE `child_2_family`
  ADD CONSTRAINT `fk_Child_2_Family_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_3_status`
--
ALTER TABLE `child_3_status`
  ADD CONSTRAINT `fk_Child_3_Status_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_3_vaccine`
--
ALTER TABLE `child_3_vaccine`
  ADD CONSTRAINT `fk_Child_3_Vaccine_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_4_health`
--
ALTER TABLE `child_4_health`
  ADD CONSTRAINT `fk_Child_4_Health_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_5_edu`
--
ALTER TABLE `child_5_edu`
  ADD CONSTRAINT `fk_Child_5_Edu_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_5_live1`
--
ALTER TABLE `child_5_live1`
  ADD CONSTRAINT `fk_Child_5_Live1_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_5_live2`
--
ALTER TABLE `child_5_live2`
  ADD CONSTRAINT `fk_Child_5_Live2_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_6_agree`
--
ALTER TABLE `child_6_agree`
  ADD CONSTRAINT `child_6_agree_ibfk_1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `child_recog`
--
ALTER TABLE `child_recog`
  ADD CONSTRAINT `fk_child_Recog_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `healthcard`
--
ALTER TABLE `healthcard`
  ADD CONSTRAINT `fk_HealthCard_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `schoolin`
--
ALTER TABLE `schoolin`
  ADD CONSTRAINT `fk_SchoolIn_Child_1_Base1` FOREIGN KEY (`Child_1_Base_ID`) REFERENCES `child_1_base` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
