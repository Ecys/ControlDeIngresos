SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `Laboratorio` DEFAULT CHARACTER SET latin1 ;
USE `Laboratorio` ;

-- -----------------------------------------------------
-- Table `Laboratorio`.`Carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Laboratorio`.`Carrera` (
  `codigo` INT(11) NOT NULL ,
  `detalle` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`codigo`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Laboratorio`.`Estudiante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Laboratorio`.`Estudiante` (
  `DPI` DECIMAL(13,0) NOT NULL ,
  `Carnet` DECIMAL(9,0) NOT NULL ,
  `Nombres` VARCHAR(50) NOT NULL ,
  `Apellidos` VARCHAR(50) NOT NULL ,
  `Correo` VARCHAR(30) NOT NULL ,
  `Telefono` DECIMAL(8,0) NOT NULL ,
  `Direccion` VARCHAR(100) NOT NULL ,
  `Carrera` INT(11) NOT NULL ,
  PRIMARY KEY (`DPI`) ,
  UNIQUE INDEX `Carnet` (`Carnet` ASC) ,
  INDEX `fk_Estudiante_Carrera_idx` (`Carrera` ASC) ,
  CONSTRAINT `fk_Estudiante_Carrera`
    FOREIGN KEY (`Carrera` )
    REFERENCES `Laboratorio`.`Carrera` (`codigo` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Laboratorio`.`Laboratorio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Laboratorio`.`Laboratorio` (
  `id` INT(11) NOT NULL ,
  `descripcion` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Laboratorio`.`Tipo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Laboratorio`.`Tipo` (
  `id` INT NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Laboratorio`.`Registro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Laboratorio`.`Registro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  `laboratorio` INT(11) NOT NULL ,
  `alumno` DECIMAL(13,0) NOT NULL ,
  `tipo` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Ingreso_Estudiante1_idx` (`alumno` ASC) ,
  INDEX `fk_Registro_Laboratorio1_idx` (`laboratorio` ASC) ,
  INDEX `fk_Registro_Tipo1_idx` (`tipo` ASC) ,
  CONSTRAINT `fk_Ingreso_Estudiante1`
    FOREIGN KEY (`alumno` )
    REFERENCES `Laboratorio`.`Estudiante` (`DPI` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registro_Laboratorio1`
    FOREIGN KEY (`laboratorio` )
    REFERENCES `Laboratorio`.`Laboratorio` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registro_Tipo1`
    FOREIGN KEY (`tipo` )
    REFERENCES `Laboratorio`.`Tipo` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Laboratorio`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Laboratorio`.`usuarios` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(20) NOT NULL ,
  `password` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `Laboratorio` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
