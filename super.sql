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
	SELECT id,publisher_name FROM publisher; 
END$$
CALL sp_publisher_listar;

DELIMITER $$
CREATE PROCEDURE spu_publisher_buscar(IN _publisher_id INT )
BEGIN
	SELECT 
		S.id,
		S.superhero_name,
		S.full_name,
		G.gender,
		R.race,
		P.publisher_name
	 FROM superhero S
		 INNER JOIN gender G ON G.id=S.gender_id
		 INNER JOIN race R ON R.id=S.race_id
		 INNER JOIN publisher P ON P.id=S.publisher_id
         WHERE S.publisher_id=_publisher_id;
END$$



DELIMITER $$
CREATE PROCEDURE spu_resumen_alignment()
BEGIN
   SELECT alignment_id,alignment, COUNT( alignment_id) 'total'
    FROM superhero INNER JOIN alignment ON superhero.alignment_id=alignment.id
    GROUP BY alignment_id 
    ORDER BY total;

END$$

CALL spu_resumen_alignment;

