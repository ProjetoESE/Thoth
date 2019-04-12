ALTER TABLE `papers` ADD `database` INT NOT NULL AFTER `score_quality`;
ALTER TABLE `papers` CHANGE `database` `data_base` INT(11) NOT NULL;
ALTER TABLE `papers` ADD FOREIGN KEY (`data_base`) REFERENCES `data_base`(`id_database`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `papers` ADD `id` INT NOT NULL AFTER `data_base`;
ALTER TABLE `project` ADD `c_papers` INT NOT NULL DEFAULT '0' AFTER `end_date`;