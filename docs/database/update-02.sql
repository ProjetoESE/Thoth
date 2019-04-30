ALTER TABLE `papers_selection` CHANGE `id_user` `id_member` INT(11) NOT NULL;
ALTER TABLE `papers_selection` DROP FOREIGN KEY `papers_selection_ibfk_1`; ALTER TABLE `papers_selection` ADD CONSTRAINT `papers_selection_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members`(`id_members`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `evaluation_criteria` DROP FOREIGN KEY `evaluation_criteria_ibfk_3`; ALTER TABLE `evaluation_criteria` ADD CONSTRAINT `evaluation_criteria_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `members`(`id_members`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `evaluation_criteria` CHANGE `id_user` `id_member` INT(11) NOT NULL;
UPDATE `levels` SET `level` = 'Reviser' WHERE `levels`.`id_level` = 4;