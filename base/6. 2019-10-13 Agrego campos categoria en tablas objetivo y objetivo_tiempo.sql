ALTER TABLE `objetivo`   
	ADD COLUMN `categoria` INT(11) NULL AFTER `activo`;
ALTER TABLE `objetivo_tiempo`   
	ADD COLUMN `categoria` INT(11) NULL AFTER `activo`;
