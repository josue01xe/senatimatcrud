USE senatimat;

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_listar()
BEGIN
	SELECT	EST.idestudiante,
				EST.apellidos, EST.nombres,
				EST.tipodocumento, EST.nrodocumento,
				EST.fechanacimiento,
				ESC.escuela,
				CAR.carrera,
				SED.sede,
				EST.fotografia
		FROM estudiantes EST
		INNER JOIN carreras CAR ON CAR.idcarrera = EST.idcarrera
		INNER JOIN sedes SED ON SED.idsede = EST.idsede
		INNER JOIN escuelas ESC ON ESC.idescuela = CAR.idescuela
		WHERE EST.estado = '1';
END $$

CALL spu_estudiantes_listar();

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_registrar
(
	IN _apellidos 			VARCHAR(40),
	IN _nombres 			VARCHAR(40),
	IN _tipodocumento		CHAR(1),
	IN _nrodocumento		CHAR(8),
	IN _fechanacimiento	DATE,
	IN _idcarrera 			INT,
	IN _idsede 				INT,
	IN _fotografia 		VARCHAR(100)
)
BEGIN
	-- Validar el contenido de _fotografia
	IF _fotografia = '' THEN 
		SET _fotografia = NULL;
	END IF;

	INSERT INTO estudiantes 
	(apellidos, nombres, tipodocumento, nrodocumento, fechanacimiento, idcarrera, idsede, fotografia) VALUES
	(_apellidos, _nombres, _tipodocumento, _nrodocumento, _fechanacimiento, _idcarrera, _idsede, _fotografia);
END $$

/*
CALL spu_estudiantes_registrar('Francia Minaya', 'Jhon', 'D', '12345678', '1984-09-20', 5, 1, '');
CALL spu_estudiantes_registrar('Munayco', 'José', 'D', '77779999', '1999-09-20', 3, 2, NULL);
CALL spu_estudiantes_registrar('Prada', 'Teresa', 'C', '01234567', '2002-09-25', 3, 2, '');
SELECT * FROM estudiantes;
*/

DELIMITER $$
CREATE PROCEDURE spu_sedes_listar()
BEGIN
	SELECT * FROM sedes ORDER BY 2;
END $$
CALL spu_sedes_listar()

DELIMITER $$
CREATE PROCEDURE spu_cargos_listar()
BEGIN
	SELECT * FROM cargos ORDER BY 2;
END $$
CALL spu_cargos_listar()

DELIMITER $$
CREATE PROCEDURE spu_escuelas_listar()
BEGIN 
	SELECT * FROM escuelas ORDER BY 2;
END $$

DELIMITER $$
CREATE PROCEDURE spu_carreras_listar(IN _idescuela INT) 
BEGIN
	SELECT idcarrera, carrera 
		FROM carreras
		WHERE idescuela = _idescuela;
END $$

CALL spu_carreras_listar(3);




DELIMITER $$
CREATE PROCEDURE spu_colaboradores_listar()
BEGIN
  SELECT   COL.idcolaborador,
           COL.apellidos, COL.nombres,
           COL.telefono, COL.tipocontrato,
           COL.cv, COL.direccion,
           car.cargo,
           sed.sede
           FROM colaboradores COL
           INNER JOIN cargos CAR ON CAR.idcargo = COL.idcargo
		     INNER JOIN sedes SED ON SED.idsede = COL.idsede
		     WHERE COL.estado = '1';
 END $$
 
 CALL spu_colaboradores_listar();
 
 
 
DELIMITER $$
CREATE PROCEDURE spu_colaboradores_registrar
(
	IN _apellidos 		VARCHAR(50),
	IN _nombres 		VARCHAR(50),
	IN _idcargo 		INT,
	IN _idsede 			INT,
	IN _telefono 		CHAR(9),
	IN _tipocontrato 	CHAR(1),
	IN _cv 				VARCHAR(100),
	IN _direccion 		VARCHAR(70)
)
BEGIN
	-- Validar el contenido de _cv
	IF _cv IS NULL THEN 
		SET _cv = '';
	END IF;

	INSERT INTO colaboradores 
	(apellidos, nombres, idcargo, idsede, telefono, tipocontrato, cv, direccion) VALUES
	(_apellidos, _nombres, _idcargo, _idsede, _telefono, _tipocontrato, _cv, _direccion);
END $$

CALL spu_colaboradores_registrar('Tarantino Rojas', 'Jhon', 3, 3, '998765485', 'P', '', NULL);





      DELIMITER $$
CREATE PROCEDURE spu_usuarios_login(IN _nombreusuario VARCHAR(30))
BEGIN
  SELECT  idusuario, nombreusuario, claveacceso,
          apellidos, nombres, nivelacceso
  FROM usuarios
  WHERE nombreusuario = _nombreusuario AND estado = '1';
END $$

         
         CALL spu_usuarios_login('JOSUE');





DELIMITER $$
CREATE PROCEDURE spu_estudiantes_eliminar(IN _idestudiante INT)
BEGIN
	UPDATE estudiantes 
	SET estado = '0' 
	WHERE idestudiante = _idestudiante;
END $$

CALL spu_estudiantes_eliminar(3);
SELECT * FROM estudiantes;




DELIMITER $$
CREATE PROCEDURE spu_colaboradores_eliminar(IN _idcolaborador INT)
BEGIN
	UPDATE colaboradores 
	SET estado = '0' 
	WHERE idcolaborador = _idcolaborador;
END $$

CALL spu_colaboradores_eliminar(3);
SELECT * FROM colaboradores;






DELIMITER $$
CREATE PROCEDURE spu_estudiantes_recuperar_id(IN _idestudiante INT)
BEGIN
	SELECT * FROM estudiantes WHERE idestudiante = _idestudiante;
END $$

CALL spu_estudiantes_recuperar_id(2);


DELIMITER $$
CREATE PROCEDURE spu_estudiantes_actualizar
(
	IN _idestudiante		INT,
	IN _apellidos 			VARCHAR(40),
	IN _nombres 			VARCHAR(40),
	IN _tipodocumento		CHAR(1),
	IN _nrodocumento		CHAR(8),
	IN _fechanacimiento	DATE,
	IN _idcarrera 			INT,
	IN _idsede 				INT,
	IN _fotografia 		VARCHAR(100)
)
BEGIN
	-- Validar el contenido de _fotografia
	IF _fotografia = '' THEN 
		SET _fotografia = NULL;
	END IF;

	UPDATE estudiantes 
	SET 
		apellidos = _apellidos,
		nombres = _nombres,
		tipodocumento = _tipodocumento,
		nrodocumento = _nrodocumento,
		fechanacimiento = _fechanacimiento,
		idcarrera = _idcarrera,
		idsede = _idsede,
		fotografia = _fotografia
	WHERE 
		idestudiante = _idestudiante;
END $$



SELECT * FROM estudiantes WHERE idestudiante = 1;
CALL spu_estudiantes_actualizar(1, 'Pérez', 'Antonio', 'D', '12345678', '1995-10-20', 2, 1, '');
