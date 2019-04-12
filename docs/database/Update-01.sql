CREATE TABLE `u648750589_thoth`.`question_quality` ( `id_qa` INT NOT NULL AUTO_INCREMENT , `id` VARCHAR(255) NOT NULL , `description` INT NOT NULL , `weight` FLOAT NOT NULL , `min_to_app` INT NOT NULL , `id_project` INT NOT NULL , PRIMARY KEY (`id_qa`)) ENGINE = InnoDB;

CREATE TABLE `u648750589_thoth`.`score_quality` ( `id_score` INT NOT NULL AUTO_INCREMENT , `score_rule` VARCHAR(255) NOT NULL , `description` VARCHAR(255) NOT NULL , `score` INT NOT NULL , `id_qa` INT NOT NULL , PRIMARY KEY (`id_score`)) ENGINE = InnoDB;

ALTER TABLE `score_quality` ADD FOREIGN KEY (`id_qa`) REFERENCES `question_quality`(`id_qa`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `question_quality` ADD FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `question_quality` ADD FOREIGN KEY (`min_to_app`) REFERENCES `score_quality`(`id_score`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `question_quality` DROP FOREIGN KEY `question_quality_ibfk_2`; ALTER TABLE `question_quality` ADD CONSTRAINT `question_quality_ibfk_2` FOREIGN KEY (`min_to_app`) REFERENCES `score_quality`(`id_score`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `question_quality` CHANGE `min_to_app` `min_to_app` INT(11) NULL DEFAULT NULL;

ALTER TABLE `question_quality` CHANGE `description` `description` VARCHAR(255) NOT NULL;