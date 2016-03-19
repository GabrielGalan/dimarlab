SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `tbl_salud`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_salud` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombreInstitucion` TEXT NOT NULL ,
  `claveSalud` TEXT NOT NULL ,
  `descripcionSalud` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `producto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `producto` (
  `idProducto` INT NOT NULL AUTO_INCREMENT ,
  `nomComercial` TEXT NOT NULL ,
  `codigoBarra` TEXT NOT NULL ,
  `codigoReferencia` TEXT NOT NULL ,
  `observacion` TEXT NOT NULL ,
  `claveCuadroBasico` TEXT NOT NULL ,
  `descripcionCuadroBasico` TEXT NOT NULL ,
  `terminado` INT NOT NULL ,
  `idSalud` INT NOT NULL ,
  PRIMARY KEY (`idProducto`, `idSalud`) ,
  INDEX `fk_producto_tbl_salud_idx` (`idSalud` ASC) ,
  CONSTRAINT `fk_producto_tbl_salud`
    FOREIGN KEY (`idSalud` )
    REFERENCES `tbl_salud` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `imagen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `imagen` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `direccion` TEXT NOT NULL ,
  `tituloFoto` TEXT NOT NULL ,
  `idProducto` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_imagen_producto1_idx` (`idProducto` ASC) ,
  CONSTRAINT `fk_imagen_producto1`
    FOREIGN KEY (`idProducto` )
    REFERENCES `producto` (`idProducto` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tbl_marca`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_marca` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `marca` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tbl_proveedores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_proveedores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `proveedor` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tbl_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tbl_user` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `at_user` VARCHAR(254) NOT NULL ,
  `at_pass` VARCHAR(254) NOT NULL ,
  `at_nombre` VARCHAR(90) NOT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `producto_proveedores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `producto_proveedores` (
  `idProducto` INT NOT NULL ,
  `idSalud` INT NOT NULL ,
  `idProveedor` INT NOT NULL ,
  PRIMARY KEY (`idProducto`, `idSalud`, `idProveedor`) ,
  INDEX `fk_producto_has_tbl_proveedores_tbl_proveedores1_idx` (`idProveedor` ASC) ,
  INDEX `fk_producto_has_tbl_proveedores_producto1_idx` (`idProducto` ASC, `idSalud` ASC) ,
  CONSTRAINT `fk_producto_has_tbl_proveedores_producto1`
    FOREIGN KEY (`idProducto` , `idSalud` )
    REFERENCES `producto` (`idProducto` , `idSalud` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_tbl_proveedores_tbl_proveedores1`
    FOREIGN KEY (`idProveedor` )
    REFERENCES `tbl_proveedores` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `producto_marcas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `producto_marcas` (
  `idProducto` INT NOT NULL ,
  `idSalud` INT NOT NULL ,
  `idMarca` INT NOT NULL ,
  PRIMARY KEY (`idProducto`, `idSalud`, `idMarca`) ,
  INDEX `fk_producto_has_tbl_marca_tbl_marca1_idx` (`idMarca` ASC) ,
  INDEX `fk_producto_has_tbl_marca_producto1_idx` (`idProducto` ASC, `idSalud` ASC) ,
  CONSTRAINT `fk_producto_has_tbl_marca_producto1`
    FOREIGN KEY (`idProducto` , `idSalud` )
    REFERENCES `producto` (`idProducto` , `idSalud` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_tbl_marca_tbl_marca1`
    FOREIGN KEY (`idMarca` )
    REFERENCES `tbl_marca` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
