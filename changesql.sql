ALTER TABLE  `child_1_base` ADD  `EnterDate` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER  `InputDate` ,
ADD  `LeaveDate` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `EnterDate` ;
ALTER TABLE  `child_1_base` ADD  `Activities` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `Class` ,
ADD  `Child_Eat` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `Activities` ;
ALTER TABLE  `child_1_base` ADD  `Child_EatDate` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `Child_Eat` ;


----本次-----
ALTER TABLE  `child_1_base` ADD  `Music_Date` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `Activities` ,
ADD  `English_Date` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `Music_Date` ,
ADD  `Gym_Date` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `English_Date` ,
ADD  `Dance_Date` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `Gym_Date` ;

ALTER TABLE `child_1_base` DROP `Insurance_File`;


2016-05-31:
ALTER TABLE  `user` ADD  `Available` INT( 5 ) NOT NULL AFTER  `SELLEVEL` ;
ALTER TABLE  `user` ADD  `Remark` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER  `LASTLOGINTIME` ;



2016-06-03
`user_guardian`
--

CREATE TABLE IF NOT EXISTS `user_guardian` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Cuardian_ID` varchar(30) NOT NULL,
  `PWD` varchar(30) NOT NULL,
  `Available` varchar(30) NOT NULL,
  `LASTLOGINTIME` varchar(30) DEFAULT NULL,
  `Remark` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

2016-06-04
ALTER TABLE  `communication` CHANGE  `Leave_Date`  `LeaveDate` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;

ALTER TABLE  `communication` ADD  `LeaveDate_End` VARCHAR( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `LeaveDate` ;


2016-06-23
ALTER TABLE  `child_recog` ADD  `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST

2016-06-28
ALTER TABLE  `child_1_base` ADD  `group` INT NOT NULL AFTER  `Nearby2_ChildName`


2016-06-30


CREATE TABLE IF NOT EXISTS `master_activitiesset` (
  `ID` int(11) NOT NULL,
  `Activity_Checked` varchar(5) DEFAULT NULL,
  `Activity_Name` varchar(45) DEFAULT NULL,
  `Activity_Week` varchar(30) DEFAULT NULL,
  `Activity_Price` varchar(20) DEFAULT NULL,
  `Activity_Cost` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





CREATE TABLE IF NOT EXISTS `master_baseset` (
  `Kindergarden_Name1` varchar(100) DEFAULT NULL,
  `Kindergarden_Name2` varchar(100) DEFAULT NULL,
  `Address_Area` varchar(45) DEFAULT NULL,
  `Kindergarden_Address` varchar(100) DEFAULT NULL,
  `Kindergarden_TEL` varchar(50) DEFAULT NULL,
  `Kindergarden_FAX` varchar(45) DEFAULT NULL,
  `Kindergarden_E_mail` varchar(30) DEFAULT NULL,
  `Request_Remark` varchar(45) DEFAULT NULL,
  `BaseSet_Remark` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `master_classset` (
  `ID` int(11) NOT NULL,
  `Class_Checked` varchar(4) DEFAULT NULL,
  `Class_Name` varchar(40) DEFAULT NULL,
  `Activities` varchar(20) DEFAULT NULL,
  `Class_Remark` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `master_costset_1` (
  `Project` varchar(30) DEFAULT NULL,
  `Number` varchar(20) DEFAULT NULL,
  `Condition` varchar(25) DEFAULT NULL,
  `SetNumber` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `master_costset_23` (
  `Project` varchar(20) DEFAULT NULL,
  `FromPrice` varchar(20) DEFAULT NULL,
  `EndPrice` varchar(25) DEFAULT NULL,
  `Condition` varchar(20) DEFAULT NULL,
  `3_Standard` varchar(20) DEFAULT NULL,
  `3_Short` varchar(20) DEFAULT NULL,
  `2_Standard` varchar(25) DEFAULT NULL,
  `2_Short` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `master_dataset` (
  `Standard_Begin1` varchar(30) DEFAULT NULL,
  `Standard_End1` varchar(25) DEFAULT NULL,
  `Standard_Begin2` varchar(25) DEFAULT NULL,
  `Standard_End2` varchar(25) DEFAULT NULL,
  `Education_Begin` varchar(25) DEFAULT NULL,
  `Education_End` varchar(25) DEFAULT NULL,
  `ExtendGuar_Begin` varchar(25) DEFAULT NULL,
  `ExtendGuar_End` varchar(25) DEFAULT NULL,
  `Support_Begin1` varchar(25) DEFAULT NULL,
  `Support_End1` varchar(25) DEFAULT NULL,
  `Support_Begin2` varchar(25) DEFAULT NULL,
  `Support_End2` varchar(25) DEFAULT NULL,
  `CareStandard_Begin` varchar(25) DEFAULT NULL,
  `CareStandard_End` varchar(25) DEFAULT NULL,
  `CareShort_Begin` varchar(25) DEFAULT NULL,
  `CareShort_End` varchar(45) DEFAULT NULL,
  `Activities_Begin` varchar(25) DEFAULT NULL,
  `Activities_End` varchar(25) DEFAULT NULL,
  `Short_Begin1` varchar(25) DEFAULT NULL,
  `Short_End1` varchar(25) DEFAULT NULL,
  `Short_Begin2` varchar(25) DEFAULT NULL,
  `Short_End2` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `master_eatcostset` (
  `Recog_1_Price` int(11) DEFAULT NULL,
  `Recog_2_Price` varchar(45) DEFAULT NULL,
  `Recog_3_Price` varchar(45) DEFAULT NULL,
  `EatCost_Remark` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `master_goodscostset` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Goods_Name` varchar(100) DEFAULT NULL,
  `Goods_Price` varchar(45) DEFAULT NULL,
  `Goods_Remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS `master_guardiancon` (
  `Acceptance_Data` varchar(45) DEFAULT NULL,
  `Acceptance_Remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `master_kidslessset` (
  `Less2_Recog1_Rata` varchar(10) DEFAULT NULL,
  `Less2_Recog1_Round` varchar(10) DEFAULT NULL,
  `Less2_Recog2_Rata` varchar(10) DEFAULT NULL,
  `Less2_Recog2_Round` varchar(10) DEFAULT NULL,
  `Less2_Recog3_Rata` varchar(10) DEFAULT NULL,
  `Less2_Recog3_Round` varchar(10) DEFAULT NULL,
  `Less2_Remark` varchar(45) DEFAULT NULL,
  `Less3_Recog1_Rata` varchar(10) DEFAULT NULL,
  `Less3_Recog1_Round` varchar(10) DEFAULT NULL,
  `Less3_Recog2_Round` varchar(10) DEFAULT NULL,
  `Less3_Recog2_Rata` varchar(10) DEFAULT NULL,
  `Less3_Recog3_Round` varchar(10) DEFAULT NULL,
  `Less3_Recog3_Rata` varchar(10) DEFAULT NULL,
  `Less3_Remark` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS `master_overcostset` (
  `Recog_1_Select` varchar(5) DEFAULT NULL,
  `Recog_1_DayPrice` varchar(20) DEFAULT NULL,
  `Recog_1_MonPrice` varchar(25) DEFAULT NULL,
  `Recog_1_Rata` varchar(25) DEFAULT NULL,
  `Recog_1_Limit` varchar(20) DEFAULT NULL,
  `Recog_1_Remark` varchar(45) DEFAULT NULL,
  `Recog_2_3_Select` varchar(4) DEFAULT NULL,
  `Recog_2_3_DayPrice` varchar(20) DEFAULT NULL,
  `Recog_2_3_MonPrice` varchar(20) DEFAULT NULL,
  `Recog_2_3_Rata` varchar(25) DEFAULT NULL,
  `Recog_2_3_Limit` varchar(20) DEFAULT NULL,
  `Recog_2_3_Remark` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





CREATE TABLE IF NOT EXISTS `master_projectcostset` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Project_Name` varchar(45) DEFAULT NULL,
  `Recog_1` varchar(45) DEFAULT NULL,
  `Recog_2` varchar(45) DEFAULT NULL,
  `Recog_3` varchar(45) DEFAULT NULL,
  `Project_Remark` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;


2016-07-01
ALTER TABLE  `communication` ADD  `comm_group` INT( 10 ) NULL DEFAULT NULL


CREATE TABLE IF NOT EXISTS `buygoods` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Child_Id` varchar(45) NOT NULL,
  `Goods_Name` varchar(45) DEFAULT NULL,
  `Goods_Price` varchar(45) DEFAULT NULL,
  `Submit_Date` varchar(20) DEFAULT NULL,
  `Confirmed` varchar(10) DEFAULT NULL,
  `Confirm_Date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8



2016-07-04
ALTER TABLE  `child_6_agree` CHANGE  `Agree`  `Agree` VARCHAR( 8 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT  ''







