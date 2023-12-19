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
CREATE PROCEDURE sp_publisher_listar()
BEGIN
	SELECT publisher_name FROM publisher;
	
       
END$$
CALL sp_publisher_listar;


DELIMITER $$
CREATE PROCEDURE spu_resumen_alignment()
BEGIN
	SELECT alignment_id,alignment, COUNT( alignment_id) 'total'
    FROM superhero INNER JOIN alignment ON superhero.alignment_id=alignment.id
    GROUP BY alignment_id 
    ORDER BY alignment;

END$$

CALL spu_resumen_alignment;