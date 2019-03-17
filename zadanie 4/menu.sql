CREATE TABLE `menu` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` TEXT NULL,
	`parent_id` INT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_polish_ci'
ENGINE=InnoDB
;

ALTER TABLE `menu`
	ADD CONSTRAINT `FK_menu_menu` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`);
	
	
INSERT INTO `menu`(`name`) VALUES ('Kategoria główna');
INSERT INTO `menu`(`name`, `parent_id`) VALUES ('Podkategoria 1', '1');
INSERT INTO `menu`(`name`, `parent_id`) VALUES ('Podkategoria 1.1', '2');
INSERT INTO `menu`(`name`, `parent_id`) VALUES ('Podkategoria 1.2', '2');
INSERT INTO `menu`(`name`, `parent_id`) VALUES ('Podkategoria 2', '1');
INSERT INTO `menu`(`name`, `parent_id`) VALUES ('Podkategoria 2.1', '5');
INSERT INTO `menu`(`name`, `parent_id`) VALUES ('Podkategoria 2.2', '5');