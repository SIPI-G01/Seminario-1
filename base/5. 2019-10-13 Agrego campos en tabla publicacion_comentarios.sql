ALTER TABLE `publicacion_comentario`   
	ADD COLUMN `fecha` DATETIME NULL AFTER `texto`,
	ADD COLUMN `reply` INT(11) NULL AFTER `fecha`;
