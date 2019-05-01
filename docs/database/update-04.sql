ALTER TABLE `evaluation_qa` ADD `score` VARCHAR(255) NOT NULL AFTER `id_member`;
ALTER TABLE `evaluation_qa` CHANGE `score` `score` INT(11) NOT NULL;
ALTER TABLE `evaluation_qa` ADD FOREIGN KEY (`score`) REFERENCES `score_quality`(`id_score`) ON DELETE CASCADE ON UPDATE CASCADE;