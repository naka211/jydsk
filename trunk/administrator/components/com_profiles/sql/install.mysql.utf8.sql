CREATE TABLE IF NOT EXISTS `#__profiles` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(255)  NOT NULL ,
`rank` VARCHAR(255)  NOT NULL ,
`email` VARCHAR(255)  NOT NULL ,
`telephone` VARCHAR(255)  NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
`description` TEXT NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

