-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema kcldb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kcldb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kcldb` DEFAULT CHARACTER SET utf8 ;
USE `kcldb` ;

-- -----------------------------------------------------
-- Table `kcldb`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`category` (
  `idCategory` INT(11) NOT NULL,
  `type` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idCategory`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `kcldb`.`collection_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`collection_type` (
  `idCollectionType` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idCollectionType`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `kcldb`.`platform`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`platform` (
  `idPlatform` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  `info` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`idPlatform`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `kcldb`.`inventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`inventory` (
  `idInventory` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(70) NOT NULL,
  `availability` TINYINT(4) NOT NULL,
  `releaseYear` INT(11) NULL DEFAULT NULL,
  `rentStatus` TINYINT(4) NOT NULL,
  `company` VARCHAR(100) NULL DEFAULT NULL,
  `image` VARCHAR(1000) NULL DEFAULT NULL,
  `rating` DOUBLE NULL,
  `idPlatform` INT(11) NULL DEFAULT NULL,
  `idCategory` INT(11) NULL DEFAULT NULL,
  `idCollectionType` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idInventory`),
  CONSTRAINT `idCategory`
    FOREIGN KEY (`idCategory`)
    REFERENCES `kcldb`.`category` (`idCategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCollectionType`
    FOREIGN KEY (`idCollectionType`)
    REFERENCES `kcldb`.`collection_type` (`idCollectionType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idPlatform`
    FOREIGN KEY (`idPlatform`)
    REFERENCES `kcldb`.`platform` (`idPlatform`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `kcldb`.`user_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`user_type` (
  `idUserType` INT(11) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idUserType`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `kcldb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`user` (
  `idUser` INT NOT NULL,
  `First_Name` VARCHAR(50) NULL DEFAULT NULL,
  `last_name` VARCHAR(50) NULL DEFAULT NULL,
  `DOB` DATE NULL DEFAULT NULL,
  `email` VARCHAR(80) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `idUserType` INT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `idUserType`
    FOREIGN KEY (`idUserType`)
    REFERENCES `kcldb`.`user_type` (`idUserType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `kcldb`.`status_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`status_type` (
  `idstatusType` INT NOT NULL,
  `type` VARCHAR(100) NULL,
  PRIMARY KEY (`idstatusType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kcldb`.`user_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`user_status` (
  `idUserStatus` INT NOT NULL,
  `totalRents` INT NULL,
  `balance` INT NULL,
  `lastUpdate` DATE NULL,
  `idStatusType` INT NULL,
  PRIMARY KEY (`idUserStatus`),
  CONSTRAINT `idStatusType`
    FOREIGN KEY (`idStatusType`)
    REFERENCES `kcldb`.`status_type` (`idstatusType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idUserStatus`
    FOREIGN KEY (`idUserStatus`)
    REFERENCES `kcldb`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kcldb`.`ban_logs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`ban_logs` (
  `idBanLog` INT NOT NULL,
  `startDate` DATE NULL,
  `endDate` DATE NULL,
  `info` TEXT NULL,
  PRIMARY KEY (`idBanLog`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kcldb`.`rents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`rents` (
  `idRent` INT NOT NULL AUTO_INCREMENT,
  `dateRented` DATE NOT NULL,
  `expiryRent` DATE NOT NULL,
  `dateReturned` DATE NULL,
  `booked` TINYINT NULL,
  `extraExtension` TINYINT NULL,
  `idInventory` INT NULL,
  `idUser` INT NULL,
  PRIMARY KEY (`idRent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kcldb`.`damage_property`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`damage_property` (
  `idInventory` INT NOT NULL,
  `idUser` INT NOT NULL,
  `fee` INT NOT NULL,
  `refunded` TINYINT NULL,
  `info` VARCHAR(100) NULL,
  PRIMARY KEY (`idInventory`, `idUser`),
  CONSTRAINT `idInventory`
    FOREIGN KEY (`idInventory`)
    REFERENCES `kcldb`.`inventory` (`idInventory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idUser`
    FOREIGN KEY (`idUser`)
    REFERENCES `kcldb`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kcldb`.`extention`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`extention` (
  `idExtention` INT NOT NULL AUTO_INCREMENT,
  `expiryExtention` DATE NOT NULL,
  `numberOfExtention` INT NULL,
  `idRent` INT NULL,
  PRIMARY KEY (`idExtention`),
  CONSTRAINT `idRent`
    FOREIGN KEY (`idRent`)
    REFERENCES `kcldb`.`rents` (`idRent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kcldb`.`current_rules`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kcldb`.`current_rules` (
  `idRule` INT NOT NULL AUTO_INCREMENT,
  `rentPeriod` VARCHAR(5) NULL,
  `extenisionNumber` INT NULL,
  `extensionPeriod` VARCHAR(5) NULL,
  `rentNumber` INT NULL,
  `banPeriod` VARCHAR(5) NULL,
  `itmNotReturned` INT NULL,
  `itmNotReturnedPeriod` VARCHAR(5) NULL,
  PRIMARY KEY (`idRule`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
