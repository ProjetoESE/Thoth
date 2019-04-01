CREATE TABLE `thoth`.`question_extraction` ( `id_de` INT NOT NULL AUTO_INCREMENT , `id` VARCHAR(255) NOT NULL , `description` VARCHAR(255) NOT NULL , `type` INT NOT NULL , `id_project` INT NOT NULL , PRIMARY KEY (`id_de`)) ENGINE = InnoDB;
CREATE TABLE `thoth`.`types_question` ( `id_type` INT NOT NULL AUTO_INCREMENT , `type` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_type`)) ENGINE = InnoDB;
ALTER TABLE `question_extraction` ADD FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `question_extraction` ADD FOREIGN KEY (`type`) REFERENCES `types_question`(`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
INSERT INTO `types_question` (`id_type`, `type`) VALUES (NULL, 'Text'), (NULL, 'Multiple Choice List'), (NULL, 'Pick One List');
CREATE TABLE `thoth`.`options_extraction` ( `id_option` INT NOT NULL AUTO_INCREMENT , `description` VARCHAR(255) NOT NULL , `id_de` INT NOT NULL , PRIMARY KEY (`id_option`)) ENGINE = InnoDB;
ALTER TABLE `options_extraction` ADD FOREIGN KEY (`id_de`) REFERENCES `question_extraction`(`id_de`) ON DELETE CASCADE ON UPDATE CASCADE;
