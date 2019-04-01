ALTER TABLE `activity_log` ADD `id_project` INT NULL DEFAULT NULL AFTER `activity`;
ALTER TABLE `activity_log` ADD `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `id_project`;
ALTER TABLE `activity_log` ADD FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

