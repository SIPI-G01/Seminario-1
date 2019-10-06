ALTER TABLE `objetivo`   
	ADD COLUMN `alias` VARCHAR(255) NULL AFTER `nombre`;
ALTER TABLE `objetivo_tiempo`   
	ADD COLUMN `alias` VARCHAR(255) NULL AFTER `tiempo`;
ALTER TABLE `publicacion`   
	ADD COLUMN `alias` VARCHAR(255) NULL AFTER `titulo`;
