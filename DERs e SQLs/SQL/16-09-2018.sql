CREATE DATABASE ccc;

USE ccc;

CREATE TABLE IF NOT EXISTS `ccc`.`admin` (
  `idadmin` INT(2) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(70) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(60) CHARACTER SET 'utf8' NOT NULL,
  `senha` VARCHAR(60) CHARACTER SET 'utf8' NOT NULL,
  `dtnasc` DATE NOT NULL,
  `hashrec` VARCHAR(100) NULL,
  PRIMARY KEY (`idadmin`));


  CREATE TABLE IF NOT EXISTS `ccc`.`classe` (
  `idclasse` INT(2) NOT NULL,
  `nomeclasse` VARCHAR(60) NOT NULL,
  `periestu` INT(10) NOT NULL,
  PRIMARY KEY (`idclasse`));


CREATE TABLE IF NOT EXISTS `ccc`.`aluno` (
  `idaluno` INT(6) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(150) NOT NULL,
  `nomeresp` VARCHAR(220) NOT NULL,
  `teleresp` INT(12) NOT NULL,
  `dtnasc` DATE NOT NULL,
  `sexo` INT NULL,
  `matriescol` INT(11) NOT NULL,
  `emailresp` VARCHAR(100) NOT NULL,
  `cgm` INT(8) NOT NULL,
  `classe_idclasse` INT(2) NOT NULL,
  PRIMARY KEY (`idaluno`, `classe_idclasse`),
  INDEX `fk_aluno_classe1_idx` (`classe_idclasse` ASC),
  CONSTRAINT `fk_aluno_classe1`
    FOREIGN KEY (`classe_idclasse`)
    REFERENCES `ccc`.`classe` (`idclasse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `ccc`.`professor` (
  `id` INT(2) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `dtnasc` DATE NOT NULL,
  `hashrec` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `ccc`.`ocorrencias` (
  `idocorrencias` INT(2) NOT NULL,
  `descr` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idocorrencias`));


CREATE TABLE IF NOT EXISTS `ccc`.`materia` (
  `IDmateria` INT(2) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `descr` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`IDmateria`));

CREATE TABLE IF NOT EXISTS `ccc`.`conselho` (
  `conselho` INT(4) NOT NULL,
  `nome` VARCHAR(45) NULL,
  `dataini` DATETIME NULL,
  `datafim` DATETIME NULL,
  `ocorrencias_idocorrencias` INT(2) NOT NULL,
  `professor_id` INT(2) NOT NULL,
  `materia_IDmateria` INT(2) NOT NULL,
  `aluno_idaluno` INT(6) NOT NULL,
  `aluno_classe_idclasse` INT(2) NOT NULL,
  PRIMARY KEY (`conselho`, `ocorrencias_idocorrencias`, `professor_id`, `materia_IDmateria`, `aluno_idaluno`, `aluno_classe_idclasse`),
  INDEX `fk_conselho_ocorrencias_idx` (`ocorrencias_idocorrencias` ASC),
  INDEX `fk_conselho_professor1_idx` (`professor_id` ASC),
  INDEX `fk_conselho_materia1_idx` (`materia_IDmateria` ASC),
  INDEX `fk_conselho_aluno1_idx` (`aluno_idaluno` ASC, `aluno_classe_idclasse` ASC),
  CONSTRAINT `fk_conselho_ocorrencias`
    FOREIGN KEY (`ocorrencias_idocorrencias`)
    REFERENCES `ccc`.`ocorrencias` (`idocorrencias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
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
    FOREIGN KEY (`aluno_idaluno` , `aluno_classe_idclasse`)
    REFERENCES `ccc`.`aluno` (`idaluno` , `classe_idclasse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `ccc`.`pedagogo` (
  `id` INT(2) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `snome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `username` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `dtnasc` DATE NOT NULL,
  `hashrec` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));


