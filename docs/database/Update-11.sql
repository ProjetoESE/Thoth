INSERT INTO `levels` (`id_level`, `level`) VALUES (NULL, 'Revisor');
ALTER TABLE `papers` ADD `status_selection` INT NOT NULL DEFAULT '3' AFTER `id`;
ALTER TABLE `papers` ADD FOREIGN KEY (`status_selection`) REFERENCES `status_selection`(`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `papers` ADD `check_status_selection` BOOLEAN NOT NULL DEFAULT FALSE AFTER `status_selection`;