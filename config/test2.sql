SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `1mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `1mydb` ;

-- -----------------------------------------------------
-- Table `1mydb`.`utilisateur`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `1mydb`.`utilisateur` (
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT ,
  `taille` INT NULL ,
  `poid` INT NULL ,
  `age` INT NULL ,
  `localisation` VARCHAR(45) NULL ,
  `cheveux_couleur` VARCHAR(45) NULL ,
  `cheveux_coupe` VARCHAR(45) NULL ,
  `mail` VARCHAR(45) NULL ,
  `nom` VARCHAR(45) NULL ,
  `photos_ref` INT NULL ,
  `nationnalite` VARCHAR(45) NULL ,
  `profession` VARCHAR(45) NULL ,
  `hobbies` TEXT NULL ,
  `attentes` TEXT NULL ,
  `couleur_yeux` VARCHAR(45) NULL ,
  `origine` VARCHAR(45) NULL ,
  `signe_distinct` TEXT NULL ,
  `Style_vestimentaire` TEXT NULL ,
  `style_de_vie` TEXT NULL ,
  `personalitees` VARCHAR(45) NULL ,
  `tabac_addict` VARCHAR(45) NULL ,
  `alcool_addict` VARCHAR(45) NULL ,
  `je_vie` VARCHAR(45) NULL ,
  `je_sors` VARCHAR(45) NULL ,
  `activite_sport` TEXT NULL ,
  `musique` TEXT NULL ,
  `cinema` TEXT NULL ,
  `livre` TEXT NULL ,
  `magazine_journaux` TEXT NULL ,
  `mot_de_pass` VARCHAR(45) NULL ,
  `login` VARCHAR(45) NULL ,
  `mail_interne` TEXT NULL ,
  PRIMARY KEY (`id_utilisateur`) ,
  UNIQUE INDEX `mail_UNIQUE` (`mail` ASC) ,
  UNIQUE INDEX `nom_UNIQUE` (`nom` ASC) ,
  UNIQUE INDEX `id_utilisateur_UNIQUE` (`id_utilisateur` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `1mydb`.`conversation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `1mydb`.`conversation` (
  `id_conversation` INT NOT NULL AUTO_INCREMENT ,
  `convers` TEXT NULL ,
  `Date` TIMESTAMP NULL ,
  `id_message` INT NOT NULL ,
  PRIMARY KEY (`id_conversation`)  
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `1mydb`.`visite_favoris`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `1mydb`.`visite_favoris` (
  `id_visite_favoris` INT NOT NULL ,
  PRIMARY KEY (`id_visite_favoris`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `1mydb`.`utilisateur_has_conversation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `1mydb`.`utilisateur_has_conversation` (
  `id_utilisateur` INT NOT NULL ,
  `id_conversation` INT NOT NULL ,
  PRIMARY KEY (`id_utilisateur`, `id_conversation`) ,
  INDEX `fk_utilisateur_has_conversation_utilisateur` (`id_utilisateur` ASC) ,
  INDEX `fk_utilisateur_has_conversation_conversation1` (`id_conversation` ASC) ,
  CONSTRAINT `fk_utilisateur_has_conversation_utilisateur`
    FOREIGN KEY (`id_utilisateur` )
    REFERENCES `1mydb`.`utilisateur` (`id_utilisateur` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_has_conversation_conversation1`
    FOREIGN KEY (`id_conversation` )
    REFERENCES `1mydb`.`conversation` (`id_conversation` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `1mydb`.`utilisateur_has_visite_favoris`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `1mydb`.`utilisateur_has_visite_favoris` (
  `utilisateur_id_utilisateur` INT NOT NULL ,
  `visite_favoris_id_visite_favoris` INT NOT NULL ,
  PRIMARY KEY (`utilisateur_id_utilisateur`, `visite_favoris_id_visite_favoris`) ,
  INDEX `fk_utilisateur_has_visite_favoris_utilisateur1` (`utilisateur_id_utilisateur` ASC) ,
  INDEX `fk_utilisateur_has_visite_favoris_visite_favoris1` (`visite_favoris_id_visite_favoris` ASC) ,
  CONSTRAINT `fk_utilisateur_has_visite_favoris_utilisateur1`
    FOREIGN KEY (`utilisateur_id_utilisateur` )
    REFERENCES `1mydb`.`utilisateur` (`id_utilisateur` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_has_visite_favoris_visite_favoris1`
    FOREIGN KEY (`visite_favoris_id_visite_favoris` )
    REFERENCES `1mydb`.`visite_favoris` (`id_visite_favoris` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `1mydb`.`connection`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `1mydb`.`connection` (
  `utilisateur_id_utilisateur` INT NOT NULL ,
  PRIMARY KEY (`utilisateur_id_utilisateur`) ,
  CONSTRAINT `fk_connection_utilisateur1`
    FOREIGN KEY (`utilisateur_id_utilisateur` )
    REFERENCES `1mydb`.`utilisateur` (`id_utilisateur` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `1mydb`.`Message`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `1mydb`.`message` (
  `id_conversation` INT NOT NULL ,
  `message` TEXT NULL ,
  `id_message` INT NOT NULL AUTO_INCREMENT ,
  `message_date` TIMESTAMP NULL ,
  PRIMARY KEY (`id_message`) ,
  CONSTRAINT `fk_Message_conversation1`
    FOREIGN KEY (`id_conversation` )
    REFERENCES `1mydb`.`conversation` (`id_conversation` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `1mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
