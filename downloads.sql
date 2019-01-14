CREATE TABLE downloads(
	`download_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`download_title` TEXT NOT NULL,
	`download_url` TEXT NOT NULL,
	`download_stamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`download_visibility` ENUM ('visible','hidden') DEFAULT 'visible',
	`no_of_download` INT (11) UNSIGNED NOT NULL DEFAULT '0',
	`last_download_stamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY(`download_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





INSERT INTO downloads SET download_title = '', download_url = '';





CREATE TABLE downloads_count(
	`download_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`download_count` INT(11) UNSIGNED NOT NULL DEFAULT '0',
	`last_downloaded` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY(`download_id`)
) ENGINE = InnoDB;