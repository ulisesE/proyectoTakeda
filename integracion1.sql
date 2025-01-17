-- MySQL Script generated by MySQL Workbench
-- Tue Jun 23 13:07:53 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema proyectotakeda
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema proyectotakeda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyectotakeda` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `proyectotakeda`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectotakeda`.`usuarios` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` VARCHAR(30) NOT NULL,
  `apellidoPaterno` VARCHAR(30) NOT NULL,
  `apellidoMaterno` VARCHAR(30) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `contrasena` VARCHAR(20) NOT NULL,
  `rol` VARCHAR(20) NOT NULL,
  `fechaRegistro` DATE NOT NULL,
  `fotoUsuario` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `uq_correo` (`correo` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 63
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `mydb`.`Publicaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Publicaciones` (
  `idPublicaciones` INT NOT NULL AUTO_INCREMENT,
  `titulo` TEXT NULL,
  `contenido` TEXT NULL,
  `fecha` DATE NULL,
  `usuarios_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idPublicaciones`),
  INDEX `fk_Publicaciones_usuarios_idx` (`usuarios_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Publicaciones_usuarios`
    FOREIGN KEY (`usuarios_idUsuario`)
    REFERENCES `proyectotakeda`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`comentarios` (
  `idcomentarios` INT NOT NULL,
  `comentario` VARCHAR(45) NULL,
  `fecha` DATETIME NULL,
  `usuarios_idUsuario` INT(11) NOT NULL,
  `Publicaciones_idPublicaciones` INT NOT NULL,
  PRIMARY KEY (`idcomentarios`),
  INDEX `fk_comentarios_usuarios1_idx` (`usuarios_idUsuario` ASC) VISIBLE,
  INDEX `fk_comentarios_Publicaciones1_idx` (`Publicaciones_idPublicaciones` ASC) VISIBLE,
  CONSTRAINT `fk_comentarios_usuarios1`
    FOREIGN KEY (`usuarios_idUsuario`)
    REFERENCES `proyectotakeda`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_Publicaciones1`
    FOREIGN KEY (`Publicaciones_idPublicaciones`)
    REFERENCES `mydb`.`Publicaciones` (`idPublicaciones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `proyectotakeda` ;

-- -----------------------------------------------------
-- Table `proyectotakeda`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectotakeda`.`departamentos` (
  `idDepartamento` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreDepartamento` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`idDepartamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `proyectotakeda`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectotakeda`.`pedidos` (
  `idPedido` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NOT NULL,
  `estado` VARCHAR(50) NOT NULL,
  `municipio` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `costoPedido` FLOAT(200,2) NOT NULL,
  `estadoPedido` VARCHAR(20) NOT NULL,
  `fechaPedido` DATE NOT NULL,
  `horaPedido` TIME NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `idUsuario` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `pedidos_ibfk_1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `proyectotakeda`.`usuarios` (`idUsuario`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `proyectotakeda`.`tipoproducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectotakeda`.`tipoproducto` (
  `idTipoProducto` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoProducto` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idTipoProducto`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `proyectotakeda`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectotakeda`.`productos` (
  `idProducto` INT(11) NOT NULL AUTO_INCREMENT,
  `idDepartamento` INT(11) NOT NULL,
  `idTipoProducto` INT(11) NOT NULL,
  `nombreProducto` VARCHAR(255) NOT NULL,
  `descripcionProducto` VARCHAR(255) NOT NULL,
  `precioProducto` FLOAT(100,2) NOT NULL,
  `productosDisponibles` INT(255) NOT NULL,
  `fechaProducto` DATE NOT NULL,
  `fotoProducto` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  INDEX `idDepartamento` (`idDepartamento` ASC) VISIBLE,
  INDEX `idTipoProducto` (`idTipoProducto` ASC) VISIBLE,
  CONSTRAINT `productos_ibfk_1`
    FOREIGN KEY (`idDepartamento`)
    REFERENCES `proyectotakeda`.`departamentos` (`idDepartamento`)
    ON UPDATE CASCADE,
  CONSTRAINT `productos_ibfk_2`
    FOREIGN KEY (`idTipoProducto`)
    REFERENCES `proyectotakeda`.`tipoproducto` (`idTipoProducto`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `proyectotakeda`.`pedidosproductos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyectotakeda`.`pedidosproductos` (
  `idPedidoProducto` INT(11) NOT NULL AUTO_INCREMENT,
  `idPedido` INT(11) NOT NULL,
  `idProducto` INT(11) NOT NULL,
  `unidades` INT(255) NOT NULL,
  PRIMARY KEY (`idPedidoProducto`),
  INDEX `idPedido` (`idPedido` ASC) VISIBLE,
  INDEX `idProducto` (`idProducto` ASC) VISIBLE,
  CONSTRAINT `pedidosproductos_ibfk_1`
    FOREIGN KEY (`idPedido`)
    REFERENCES `proyectotakeda`.`pedidos` (`idPedido`)
    ON UPDATE CASCADE,
  CONSTRAINT `pedidosproductos_ibfk_2`
    FOREIGN KEY (`idProducto`)
    REFERENCES `proyectotakeda`.`productos` (`idProducto`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
