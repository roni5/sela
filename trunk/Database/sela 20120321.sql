/*
SQLyog Ultimate v8.63 
MySQL - 5.5.16-log : Database - selaonline
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`selaonline` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `selaonline`;

/*Table structure for table `sl_ad_type` */

DROP TABLE IF EXISTS `sl_ad_type`;

CREATE TABLE `sl_ad_type` (
  `AdTypeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `AdTypeName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Width` int(11) DEFAULT NULL,
  `Height` int(11) DEFAULT NULL,
  `NumOfDay` int(11) DEFAULT NULL,
  `DisplayPage` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CityID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AdTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_advertising` */

DROP TABLE IF EXISTS `sl_advertising`;

CREATE TABLE `sl_advertising` (
  `AdvertisingID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `AdvertisingName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PartnerID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `AdTypeID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImageLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AdvertisingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_article` */

DROP TABLE IF EXISTS `sl_article`;

CREATE TABLE `sl_article` (
  `ArticleID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ma so Article',
  `Prefix` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Prefix cua article',
  `Title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'TIeu de',
  `FileName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Duong dan file chua noi dung',
  `ArticleType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Loai article',
  `Content` text COLLATE utf8_unicode_ci COMMENT 'noi dung article (option)',
  `NotificationType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'loai notification co can send mail khi co comment hay ko',
  `Tags` text COLLATE utf8_unicode_ci COMMENT 'noi dung cua cac tag',
  `CatalogueID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'loai san pham',
  `SectionID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nhom mat hang',
  `NumView` bigint(20) DEFAULT NULL COMMENT 'so luot xem',
  `NumComment` bigint(20) DEFAULT NULL COMMENT 'so luot commnet',
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ArticleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_article_type` */

DROP TABLE IF EXISTS `sl_article_type`;

CREATE TABLE `sl_article_type` (
  `ArticleTypeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ArticleTypeName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ArticleTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_auction` */

DROP TABLE IF EXISTS `sl_auction`;

CREATE TABLE `sl_auction` (
  `AuctionID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ProductID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `StartingPrice` decimal(20,2) DEFAULT NULL,
  `NumOffer` bigint(20) DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`AuctionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_city` */

DROP TABLE IF EXISTS `sl_city`;

CREATE TABLE `sl_city` (
  `CityID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CityName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_comment` */

DROP TABLE IF EXISTS `sl_comment`;

CREATE TABLE `sl_comment` (
  `CommentID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CommentType` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ArticleID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Content` text COLLATE utf8_unicode_ci,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CommentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_comment_bad` */

DROP TABLE IF EXISTS `sl_comment_bad`;

CREATE TABLE `sl_comment_bad` (
  `CommnentID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `ReportedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ReportedDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CommnentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_currency` */

DROP TABLE IF EXISTS `sl_currency`;

CREATE TABLE `sl_currency` (
  `CurrencyID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CurrencyName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EuroRate` decimal(20,2) DEFAULT NULL,
  `USDRate` decimal(20,2) DEFAULT NULL,
  `AUDRate` decimal(20,2) DEFAULT NULL,
  `NDTRate` decimal(20,2) DEFAULT NULL,
  `CADRate` decimal(20,2) DEFAULT NULL,
  `GBPRate` decimal(20,2) DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`CurrencyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_datatype` */

DROP TABLE IF EXISTS `sl_datatype`;

CREATE TABLE `sl_datatype` (
  `DataTypeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DataTypeName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`DataTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_district` */

DROP TABLE IF EXISTS `sl_district`;

CREATE TABLE `sl_district` (
  `DistricID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DistrictName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CityID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`DistricID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_evaluation` */

DROP TABLE IF EXISTS `sl_evaluation`;

CREATE TABLE `sl_evaluation` (
  `ArticleID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EvaluationID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NumEvaluation` bigint(20) DEFAULT NULL,
  `EvaluatedBy` text COLLATE utf8_unicode_ci COMMENT 'danh sach userID ngan cach nhau',
  `LastEvaluated` datetime DEFAULT NULL,
  PRIMARY KEY (`EvaluationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_evaluation_type` */

DROP TABLE IF EXISTS `sl_evaluation_type`;

CREATE TABLE `sl_evaluation_type` (
  `EvaluationTypeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `EvaluationTypeName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`EvaluationTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_like` */

DROP TABLE IF EXISTS `sl_like`;

CREATE TABLE `sl_like` (
  `LikeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LikeAmount` int(11) DEFAULT NULL,
  `UnlikeAmount` int(11) DEFAULT NULL COMMENT 'option',
  `LIkeUsers` text COLLATE utf8_unicode_ci COMMENT 'danh sach UserID Like,..',
  `UnlikeUsers` text COLLATE utf8_unicode_ci COMMENT 'danh sach user unlinke',
  PRIMARY KEY (`LikeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_manufactory` */

DROP TABLE IF EXISTS `sl_manufactory`;

CREATE TABLE `sl_manufactory` (
  `ManufactoryID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ManufactoryName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ManufactoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_menu` */

DROP TABLE IF EXISTS `sl_menu`;

CREATE TABLE `sl_menu` (
  `MenuID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MenuName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NumOrder` int(11) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`MenuID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_notification_type` */

DROP TABLE IF EXISTS `sl_notification_type`;

CREATE TABLE `sl_notification_type` (
  `NotificationTypeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NotificationTypeName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NotificationTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_numberaire` */

DROP TABLE IF EXISTS `sl_numberaire`;

CREATE TABLE `sl_numberaire` (
  `NumberaireID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NumberaireName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NumberaireID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_offer` */

DROP TABLE IF EXISTS `sl_offer`;

CREATE TABLE `sl_offer` (
  `AuctionID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `UserID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `OfferedDate` datetime DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDelete` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AuctionID`,`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_partner` */

DROP TABLE IF EXISTS `sl_partner`;

CREATE TABLE `sl_partner` (
  `ParterID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PartnerName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address 1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address 2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address 3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address 4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address 5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email 1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email 2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email 3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email 4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email 5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone 1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone 2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone 3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone 4` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone 5` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax 1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax 2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax 3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax 4` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fax 5` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TaxNumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AccountNumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ParterID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_payment_mode` */

DROP TABLE IF EXISTS `sl_payment_mode`;

CREATE TABLE `sl_payment_mode` (
  `PaymentModeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PaymentModeName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`PaymentModeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_product` */

DROP TABLE IF EXISTS `sl_product`;

CREATE TABLE `sl_product` (
  `ProductID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ProductName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CatalogueID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ImageLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ManufactoryID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PaymentModeID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NumberaireID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `StorageDate` datetime DEFAULT NULL,
  `Price` decimal(20,2) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_property` */

DROP TABLE IF EXISTS `sl_property`;

CREATE TABLE `sl_property` (
  `PropertyID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PropertyName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PropertyValue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DataTypeID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PropertyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_request` */

DROP TABLE IF EXISTS `sl_request`;

CREATE TABLE `sl_request` (
  `RequesID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ContentRequest` text COLLATE utf8_unicode_ci,
  `RequestedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RequestedDate` datetime DEFAULT NULL,
  `ContentRespone` text COLLATE utf8_unicode_ci,
  `ResponedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ResponedDate` datetime DEFAULT NULL,
  `IsApproved` bit(1) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`RequesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_role` */

DROP TABLE IF EXISTS `sl_role`;

CREATE TABLE `sl_role` (
  `RoleID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `RoleName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_setting` */

DROP TABLE IF EXISTS `sl_setting`;

CREATE TABLE `sl_setting` (
  `SettingID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SettingName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SettingValue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SettingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_ship_type` */

DROP TABLE IF EXISTS `sl_ship_type`;

CREATE TABLE `sl_ship_type` (
  `ShipTypeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ShipTypeName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ShipTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_status` */

DROP TABLE IF EXISTS `sl_status`;

CREATE TABLE `sl_status` (
  `StatusID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `StatusName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_user` */

DROP TABLE IF EXISTS `sl_user`;

CREATE TABLE `sl_user` (
  `UserID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sex` bit(1) DEFAULT NULL,
  `Identity` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RoleID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserRankID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Avartar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AccountID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IsActived` bit(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `sl_user_rank` */

DROP TABLE IF EXISTS `sl_user_rank`;

CREATE TABLE `sl_user_rank` (
  `UserRankID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'cap bac user: VIP,Premium, Normal',
  `UserRankName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `DeletedBy` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserRankID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
