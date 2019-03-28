-- -----------------------------------------------------
--  DROP DATABASE ANTES E DEPOIS COLA ISSO NO TERMINAL
-- -----------------------------------------------------


CREATE DATABASE ccc;
USE ccc;
-- -----------------------------------------------------
-- Table `ccc`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`admin` (
  `idadmin` INT(2) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(70) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(60) CHARACTER SET 'utf8' NOT NULL,
  `senha` VARCHAR(60) CHARACTER SET 'utf8' NOT NULL,
  `dtnasc` DATE NOT NULL,
  `hashrec` VARCHAR(100) NULL,
  PRIMARY KEY (`idadmin`));


-- -----------------------------------------------------
-- Table `ccc`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`aluno` (
  `idaluno` INT(6) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(150) NOT NULL,
  `nomeresp` VARCHAR(220) NOT NULL,
  `teleresp` INT(12) NOT NULL,
  `dtnasc` DATE NOT NULL,
  `sexo` INT NULL,
  `matriescol` INT(11) NOT NULL,
  `emailresp` VARCHAR(100) NOT NULL,
  `cgm` INT(8) NOT NULL,
  PRIMARY KEY (`idaluno`));


-- -----------------------------------------------------
-- Table `ccc`.`classe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`classe` (
  `idclasse` INT(2) NOT NULL AUTO_INCREMENT,
  `letra` VARCHAR(2) NOT NULL,
  `numero` INT(2) NOT NULL,
  `periestu` INT(10) NOT NULL,
  PRIMARY KEY (`idclasse`));



-- -----------------------------------------------------
-- Table `ccc`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`professor` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `dtnasc` DATE NOT NULL,
  `hashrec` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));



-- -----------------------------------------------------
-- Table `ccc`.`ocorrencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`ocorrencias` (
  `idocorrencias` INT(2) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descr` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idocorrencias`));



-- -----------------------------------------------------
-- Table `ccc`.`materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`materia` (
  `IDmateria` INT(2) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `descr` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`IDmateria`));



-- -----------------------------------------------------
-- Table `ccc`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`cursos` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descr` VARCHAR(150) NULL,
  PRIMARY KEY (`id`));



-- -----------------------------------------------------
-- Table `ccc`.`conselho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`conselho` (
  `conselho` INT(4) NOT NULL AUTO_INCREMENT,
  `datareg` DATETIME NULL,
  `professor_id` INT(2) NOT NULL,
  `materia_IDmateria` INT(2) NOT NULL,
  `aluno_idaluno` INT(6) NOT NULL,
  `ocorrencias_idocorrencias` INT(2) NOT NULL,
  `classe_idclasse` INT(2) NOT NULL,
  `observ` VARCHAR(200) NULL,
  `cursos_id` INT(2) NOT NULL,
  PRIMARY KEY (`conselho`, `professor_id`, `materia_IDmateria`, `aluno_idaluno`, `ocorrencias_idocorrencias`, `classe_idclasse`, `cursos_id`),
  INDEX `fk_conselho_professor1_idx` (`professor_id` ASC),
  INDEX `fk_conselho_materia1_idx` (`materia_IDmateria` ASC),
  INDEX `fk_conselho_aluno1_idx` (`aluno_idaluno` ASC),
  INDEX `fk_conselho_ocorrencias1_idx` (`ocorrencias_idocorrencias` ASC),
  INDEX `fk_conselho_classe1_idx` (`classe_idclasse` ASC),
  INDEX `fk_conselho_cursos1_idx` (`cursos_id` ASC),
  CONSTRAINT `fk_conselho_professor1`
    FOREIGN KEY (`professor_id`)
    REFERENCES `ccc`.`professor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conselho_materia1`
    FOREIGN KEY (`materia_IDmateria`)
    REFERENCES `ccc`.`materia` (`IDmateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conselho_aluno1`
    FOREIGN KEY (`aluno_idaluno`)
    REFERENCES `ccc`.`aluno` (`idaluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conselho_ocorrencias1`
    FOREIGN KEY (`ocorrencias_idocorrencias`)
    REFERENCES `ccc`.`ocorrencias` (`idocorrencias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conselho_classe1`
    FOREIGN KEY (`classe_idclasse`)
    REFERENCES `ccc`.`classe` (`idclasse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conselho_cursos1`
    FOREIGN KEY (`cursos_id`)
    REFERENCES `ccc`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table `ccc`.`pedagogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ccc`.`pedagogo` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `dtnasc` DATE NOT NULL,
  `hashrec` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));
