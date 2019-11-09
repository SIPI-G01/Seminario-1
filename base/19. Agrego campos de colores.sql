ALTER TABLE `objetivo`   
	ADD COLUMN `color_texto` VARCHAR(255) NULL AFTER `categoria`,
	ADD COLUMN `color_fondo` VARCHAR(255) NULL AFTER `color_texto`;
