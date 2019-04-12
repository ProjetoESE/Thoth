CREATE TABLE `u648750589_thoth`.`bib_upload` ( `id_bib` INT NOT NULL AUTO_INCREMENT , `name` INT NOT NULL , `id_project_database` INT NOT NULL , PRIMARY KEY (`id_bib`)) ENGINE = InnoDB;
CREATE TABLE `u648750589_thoth`.`papers` ( `id_paper` INT NOT NULL AUTO_INCREMENT , `id_bib` INT NOT NULL , `title` VARCHAR(255) NOT NULL , `author` VARCHAR(255) NOT NULL , `book_title` VARCHAR(255) NOT NULL , `volume` VARCHAR(255) NOT NULL , `pages` VARCHAR(255) NOT NULL , `num_pages` VARCHAR(255) NOT NULL , `abstract` TEXT NOT NULL , `keywords` TEXT NOT NULL , `doi` VARCHAR(255) NOT NULL , `journal` VARCHAR(255) NOT NULL , `issn` VARCHAR(255) NOT NULL , `location` VARCHAR(255) NOT NULL , `isbn` VARCHAR(255) NOT NULL , `address` VARCHAR(255) NOT NULL , `type` INT NOT NULL , `bib_key` VARCHAR(255) NOT NULL , `month` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , `publisher` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_paper`)) ENGINE = InnoDB;
ALTER TABLE `bib_upload` ADD FOREIGN KEY (`id_project_database`) REFERENCES `project_databases`(`id_project_database`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `papers` ADD FOREIGN KEY (`id_bib`) REFERENCES `bib_upload`(`id_bib`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `papers` CHANGE `type` `type` VARCHAR(255) NOT NULL;