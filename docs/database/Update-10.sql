ALTER TABLE `papers` DROP `note`;
ALTER TABLE `papers_selection` ADD `note` TEXT NOT NULL AFTER `id_status`;