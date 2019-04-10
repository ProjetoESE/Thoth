ALTER TABLE `papers` ADD `added_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `year`;
ALTER TABLE `papers` ADD `update_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `added_at`;
ALTER TABLE `papers` ADD `note` TEXT NOT NULL AFTER `update_at`;
ALTER TABLE `papers` ADD `status_selection` INT NOT NULL AFTER `note`, ADD `status_extraction` INT NOT NULL AFTER `status_selection`, ADD `score` FLOAT NOT NULL AFTER `status_extraction`, ADD `score_quality` INT NOT NULL AFTER `score`;
CREATE TABLE `u648750589_thoth`.`status_selection` ( `id_status` INT NOT NULL AUTO_INCREMENT , `description` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_status`)) ENGINE = InnoDB;
CREATE TABLE `u648750589_thoth`.`status_extraction` ( `id_status` INT NOT NULL AUTO_INCREMENT , `description` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_status`)) ENGINE = InnoDB;
INSERT INTO `status_selection` (`id_status`, `description`) VALUES (NULL, 'Accepted'), (NULL, 'Rejected'), (NULL, 'Unclassified');
ALTER TABLE `papers` CHANGE `status_selection` `status_selection` INT(11) NOT NULL DEFAULT '3';
ALTER TABLE `papers` ADD FOREIGN KEY (`status_selection`) REFERENCES `status_selection`(`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;