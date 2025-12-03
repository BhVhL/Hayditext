CREATE DATABASE IF NOT EXISTS projects CHARSET utf8mb4;
USE projects;

CREATE TABLE IF NOT EXISTS `grant`(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) UNIQUE NOT NULL,
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `account`(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    pseudo VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    id_grant INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `project`(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    folder VARCHAR(50) NOT NULL,
    file VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `account_project`(
    id_account INT,
    id_project INT,
    PRIMARY KEY(id_account, id_movie)
)ENGINE=InnoDB;

--Jointures

ALTER TABLE `account`
ADD CONSTRAINT fk_attribute_grant
FOREIGN KEY(id_grant)
REFERENCES `grant`(id)
ON DELETE CASCADE;

ALTER TABLE account_project
ADD CONSTRAINT fk_watch_account
FOREIGN KEY(id_account)
REFERENCES `account`(id);

ALTER TABLE account_project
ADD CONSTRAINT fk_watch_project
FOREIGN KEY(id_project)
REFERENCES `project`(id);
