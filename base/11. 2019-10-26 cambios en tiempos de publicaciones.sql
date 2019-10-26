ALTER TABLE `publicacion`   
	ADD COLUMN `tiempo` INT(11) NULL AFTER `fecha_modificado`,
	ADD COLUMN `unidad_tiempo` INT(11) NULL AFTER `tiempo`;

ALTER TABLE `objetivo_tiempo`   
	ADD COLUMN `desde` INT(11) NULL AFTER `categoria`,
	ADD COLUMN `hasta` INT(11) NULL AFTER `desde`;
