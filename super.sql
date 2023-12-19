USE superhero;

SELECT * FROM alignment;  -- bandos
SELECT * FROM attribute;  -- atributos/ caracteristicas
SELECT * FROM colour;
SELECT * FROM comic;
SELECT * FROM gender;      -- Gneros 
SELECT * FROM publisher;   -- Case de oublicidad
SELECT * FROM race;
SELECT * FROM superhero;
SELECT * FROM superpower;


DELIMITER $$
CREATE PROCEDURE sp_publisher_listar( IN _id INT )
BEGIN
	SELECT publisher_name,superhero.full_name FROM publisher 
		INNER JOIN superhero ON  superhero.id=publisher.id
        INNER JOIN gender    ON  gender.id=publisher.id
        INNER JOIN race      ON  race.id=publisher.id;  
END$$
CALL sp_publisher_listar;


DELIMITER $$
CREATE PROCEDURE spu_resumen_alignment()
BEGIN
	SELECT alignment_id,alignment, count( alignment_id) 'total'
    FROM superhero INNER JOIN alignment ON superhero.alignment_id=alignment.id
    group by alignment_id 
    order by alignment;

END$$

CALL spu_resumen_alignment;