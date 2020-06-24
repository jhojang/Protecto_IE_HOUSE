SELECT * FROM usuario;

DESCRIBE usuario;

INSERT INTO usuario (nombre_de_usuario, nombre, apellido, correo_usuario, pass_usuario, id_rol) VALUES ("Sauron", "Jhojan", "Gomez", "jhojan.gomez4@gmail.com", "ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413", 1);


DESCRIBE rol;

INSERT INTO rol (nombre_rol) VALUES ("administrador");
INSERT INTO rol (nombre_rol) VALUES ("usuario común");

SELECT * FROM rol;

SHOW TABLES;

DESCRIBE bombillo_usuario;

SELECT * FROM bombillo_usuario;

SELECT * FROM bombillo;

SELECT * FROM bombillo_usuario WHERE id_usuario = 2;
