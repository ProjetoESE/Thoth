CREATE TABLE `u648750589_thoth`.`papers_qa` ( `id_papers_qa` INT NOT NULL AUTO_INCREMENT , `id_status` INT NOT NULL , `id_paper` INT NOT NULL , `id_member` INT NOT NULL , PRIMARY KEY (`id_papers_qa`)) ENGINE = InnoDB;

ALTER TABLE `papers_qa` ADD FOREIGN KEY (`id_member`) REFERENCES `members`(`id_members`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `papers_qa` ADD FOREIGN KEY (`id_paper`) REFERENCES `papers`(`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `papers_qa` ADD FOREIGN KEY (`id_status`) REFERENCES `status_qa`(`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `papers` ADD `status_qa` INT NOT NULL AFTER `check_status_selection`, ADD `check_qa` BOOLEAN NOT NULL AFTER `status_qa`;

CREATE TABLE `u648750589_thoth`.`status_qa` ( `id_status` INT NOT NULL AUTO_INCREMENT , `description` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_status`)) ENGINE = InnoDB;

ALTER TABLE `papers` ADD FOREIGN KEY (`status_qa`) REFERENCES `status_qa`(`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `status_qa` (`id_status`, `description`) VALUES (NULL, 'Accepted'), (NULL, 'Rejected'), (NULL, 'Unclassified'), (NULL, 'Removed');

ALTER TABLE `papers_qa` ADD `note` TEXT NOT NULL AFTER `id_status`;

ALTER TABLE `papers` CHANGE `status_qa` `status_qa` INT(11) NOT NULL DEFAULT '3';

ALTER TABLE `papers` ADD `score` FLOAT NOT NULL DEFAULT '0' AFTER `check_qa`;

CREATE TABLE `u648750589_thoth`.`evaluation_qa` ( `id_evaluation_qa` INT NOT NULL AUTO_INCREMENT , `id_paper` INT NOT NULL , `id_qa` INT NOT NULL , `id_member` INT NOT NULL , PRIMARY KEY (`id_evaluation_qa`)) ENGINE = InnoDB;

ALTER TABLE `evaluation_qa` ADD FOREIGN KEY (`id_member`) REFERENCES `members`(`id_members`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `evaluation_qa` ADD FOREIGN KEY (`id_paper`) REFERENCES `papers`(`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `evaluation_qa` ADD FOREIGN KEY (`id_qa`) REFERENCES `question_quality`(`id_qa`) ON DELETE CASCADE ON UPDATE CASCADE;