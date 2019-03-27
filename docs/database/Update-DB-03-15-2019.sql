ALTER TABLE `levels` CHANGE `level` `level` VARCHAR(255) NOT NULL;

INSERT INTO `levels` (`id_level`, `level`) VALUES (NULL, 'Administrator'), (NULL, 'Viewer'), (NULL, 'Researcher');

ALTER TABLE `members` ADD FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `members` ADD FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `members` ADD FOREIGN KEY (`level`) REFERENCES `levels`(`id_level`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `members` (`id_members`, `id_user`, `id_project`, `level`) VALUES (NULL, '1', '1', '1'), (NULL, '2', '1', '3');

ALTER TABLE `activity_log` DROP FOREIGN KEY `activity_log_ibfk_1`; ALTER TABLE `activity_log` ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `activity_log` DROP FOREIGN KEY `activity_log_ibfk_2`; ALTER TABLE `activity_log` ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module`(`id_module`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `criteria` DROP FOREIGN KEY `criteria_ibfk_1`; ALTER TABLE `criteria` ADD CONSTRAINT `criteria_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `domain` DROP FOREIGN KEY `domain_ibfk_1`; ALTER TABLE `domain` ADD CONSTRAINT `domain_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `exclusion_rule` DROP FOREIGN KEY `exclusion_rule_ibfk_1`; ALTER TABLE `exclusion_rule` ADD CONSTRAINT `exclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `exclusion_rule` DROP FOREIGN KEY `exclusion_rule_ibfk_2`; ALTER TABLE `exclusion_rule` ADD CONSTRAINT `exclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule`(`id_rule`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `general_score` DROP FOREIGN KEY `general_score_ibfk_1`; ALTER TABLE `general_score` ADD CONSTRAINT `general_score_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `inclusion_rule` DROP FOREIGN KEY `inclusion_rule_ibfk_1`; ALTER TABLE `inclusion_rule` ADD CONSTRAINT `inclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `inclusion_rule` DROP FOREIGN KEY `inclusion_rule_ibfk_2`; ALTER TABLE `inclusion_rule` ADD CONSTRAINT `inclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule`(`id_rule`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `keyword` DROP FOREIGN KEY `keyword_ibfk_1`; ALTER TABLE `keyword` ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `members` DROP FOREIGN KEY `members_ibfk_1`; ALTER TABLE `members` ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `members` DROP FOREIGN KEY `members_ibfk_2`; ALTER TABLE `members` ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `members` DROP FOREIGN KEY `members_ibfk_3`; ALTER TABLE `members` ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`level`) REFERENCES `levels`(`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `min_to_app` DROP FOREIGN KEY `min_to_app_ibfk_1`; ALTER TABLE `min_to_app` ADD CONSTRAINT `min_to_app_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `min_to_app` DROP FOREIGN KEY `min_to_app_ibfk_2`; ALTER TABLE `min_to_app` ADD CONSTRAINT `min_to_app_ibfk_2` FOREIGN KEY (`id_general_score`) REFERENCES `general_score`(`id_general_score`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `project` DROP FOREIGN KEY `project_ibfk_1`; ALTER TABLE `project` ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user`(`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `project_databases` DROP FOREIGN KEY `project_databases_ibfk_1`; ALTER TABLE `project_databases` ADD CONSTRAINT `project_databases_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `project_databases` DROP FOREIGN KEY `project_databases_ibfk_2`; ALTER TABLE `project_databases` ADD CONSTRAINT `project_databases_ibfk_2` FOREIGN KEY (`id_database`) REFERENCES `data_base`(`id_database`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `project_languages` DROP FOREIGN KEY `project_languages_ibfk_1`; ALTER TABLE `project_languages` ADD CONSTRAINT `project_languages_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `language`(`id_language`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `project_languages` DROP FOREIGN KEY `project_languages_ibfk_2`; ALTER TABLE `project_languages` ADD CONSTRAINT `project_languages_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `project_study_types` DROP FOREIGN KEY `project_study_types_ibfk_1`; ALTER TABLE `project_study_types` ADD CONSTRAINT `project_study_types_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `project_study_types` DROP FOREIGN KEY `project_study_types_ibfk_2`; ALTER TABLE `project_study_types` ADD CONSTRAINT `project_study_types_ibfk_2` FOREIGN KEY (`id_study_type`) REFERENCES `study_type`(`id_study_type`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `research_question` DROP FOREIGN KEY `research_question_ibfk_1`; ALTER TABLE `research_question` ADD CONSTRAINT `research_question_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `search_strategy` DROP FOREIGN KEY `search_strategy_ibfk_1`; ALTER TABLE `search_strategy` ADD CONSTRAINT `search_strategy_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `search_string` DROP FOREIGN KEY `search_string_ibfk_1`; ALTER TABLE `search_string` ADD CONSTRAINT `search_string_ibfk_1` FOREIGN KEY (`id_project_database`) REFERENCES `project_databases`(`id_project_database`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `search_string_generics` DROP FOREIGN KEY `search_string_generics_ibfk_1`; ALTER TABLE `search_string_generics` ADD CONSTRAINT `search_string_generics_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `synonym` DROP FOREIGN KEY `synonym_ibfk_1`; ALTER TABLE `synonym` ADD CONSTRAINT `synonym_ibfk_1` FOREIGN KEY (`id_term`) REFERENCES `term`(`id_term`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `term` DROP FOREIGN KEY `term_ibfk_1`; ALTER TABLE `term` ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project`(`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;
