/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


### Create Database
DROP DATABASE IF EXISTS RFID_Database;
CREATE DATABASE RFID_Database;
USE RFID_Database;

### Create Primary Tables

DROP TABLE IF EXISTS `Makes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Makes (
    make_id INT(3)  NOT NULL auto_increment,
    makeName VARCHAR(200) NOT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    delete_Boolean tinyint default NULL,
    PRIMARY KEY (make_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `nomenclature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE nomenclature (
    nomenclature_id INT(2) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    nomenclature_Name VARCHAR(200) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    delete_Boolean tinyint default NULL,
    PRIMARY KEY (nomenclature_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `storeimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE  storeimages (
	photo LONGBLOB NOT NULL,
    model_Name VARCHAR(300) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
	INDEX model_Name (model_Name),
    Foreign Key (model_Name)
		references Models(model_Name)
        ON DELETE CASCADE,
    PRIMARY KEY (model_Name)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `Models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Models (
    model_id INT(4) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    model_Name VARCHAR(300) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    make_id INT(3) COLLATE UTF8_UNICODE_CI DEFAULT NULL ,
    nom_id INT(2) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    seriveLife INT DEFAULT NULL,
    delete_Boolean tinyint default NULL,
	maintainence_type VARCHAR(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    maintainenance_information VARCHAR(300) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    maintainenance_Date DATE DEFAULT NULL,
    PRIMARY KEY (model_id),
    INDEX make_id (make_id),
    Foreign Key (make_id)
		references Makes(make_id)
        ON DELETE CASCADE,
    INDEX nom_id (nom_id),
    Foreign Key (nom_id)
		references nomenclature(nomenclature_id)
        ON DELETE CASCADE
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `Locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Locations (
    location_id INT(2) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    roomNumber VARCHAR(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    created_at DATE DEFAULT NULL,
    updated_at DATE DEFAULT NULL,
    delete_Boolean tinyint default NULL,
    PRIMARY KEY (location_id)
)  ENGINE=MYISAM DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE users (
	user_id INT(4) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    userName VARCHAR(40) COLLATE UTF8_UNICODE_CI NOT NULL,
    lastName VARCHAR(20) COLLATE UTF8_UNICODE_CI NOT NULL,
    firstNAme VARCHAR(20) COLLATE UTF8_UNICODE_CI NOT NULL,
    payGrade VARCHAR(4) COLLATE UTF8_UNICODE_CI NOT NULL,
    pass VARCHAR(40) COLLATE UTF8_UNICODE_CI NOT NULL,
    delete_Boolean tinyint default NULL,
    PRIMARY KEY (user_id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE admin (
	admin_id INT(4) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    adminName VARCHAR(40) COLLATE UTF8_UNICODE_CI NOT NULL,
    lastName VARCHAR(20) COLLATE UTF8_UNICODE_CI NOT NULL,
    firstNAme VARCHAR(20) COLLATE UTF8_UNICODE_CI NOT NULL,
    payGrade VARCHAR(4) COLLATE UTF8_UNICODE_CI NOT NULL,
    pass VARCHAR(40) COLLATE UTF8_UNICODE_CI NOT NULL,
    delete_Boolean tinyint default NULL,
    PRIMARY KEY (admin_id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE items (
    items_id INT(4) COLLATE UTF8_UNICODE_CI NOT NULL auto_increment,
    rfid CHAR(40) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    model_id INT(4) COLLATE UTF8_UNICODE_CI NOT NULL,
    dateAcquired DATE DEFAULT NULL,
    HandRecieptSignDate DATE DEFAULT NULL,
    location_id INT(2) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    serialNum VARCHAR(40) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    BarCoode VARCHAR(40) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    comments VARCHAR(100) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    price INT DEFAULT NULL,
    pbhrNumber VARCHAR(8) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    user_id INT(2) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    itemStatus VARCHAR(100) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    calibration_due DATE DEFAULT NULL,
    last_calibration DATE DEFAULT NULL,   
    accountedFor VARCHAR(8) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    alias CHAR(10) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    delete_Boolean tinyint default NULL,
    INDEX model_id (model_id),
    Foreign Key (model_id)
		references Models(model_id)
		ON DELETE CASCADE,
    INDEX location_id (location_id),
    Foreign Key (location_id)
		references Locations(location_id)
		ON DELETE CASCADE,
    INDEX user_id (user_id),
    Foreign Key (user_id)
		references users(user_id)
		ON DELETE CASCADE,
	PRIMARY KEY (items_id)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;
/*!40101 SET character_set_client = @saved_cs_client */;