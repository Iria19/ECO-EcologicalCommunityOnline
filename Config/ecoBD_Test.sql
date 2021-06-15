DROP DATABASE IF EXISTS ecoBD_Test;
CREATE DATABASE ecoBD_Test DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use ecoBD_Test;
CREATE TABLE IF NOT EXISTS usuario(
    username varchar(30),
    nombre varchar(20) NOT NULL,
    apellidos varchar(200) NOT NULL,
    contrasenha varchar(100) NOT NULL,
    email varchar(100)  NOT NULL  ,
    descripcion varchar(255) ,
    telefono varchar(15)  ,
    tipo enum('estandar','administrador') NOT NULL,
    DNI varchar(9)  ,
    PRIMARY KEY (username)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into usuario(username, nombre, apellidos, contrasenha, email, descripcion, telefono, tipo, DNI) values ('imalvarez', 'Iria','Martinez','25d55ad283aa400af464c76d713c07ad','imalvarez@gmail.com', 'Soy Iria', '634422456','administrador', '35609734F');
insert into usuario(username, nombre, apellidos, contrasenha, email, descripcion, telefono, tipo, DNI) values ('admin', 'admin','admin','25d55ad283aa400af464c76d713c07ad','admin@gmail.com', 'Soy admin', '633422456','administrador', '55487985W');
insert into usuario(username, nombre, apellidos, contrasenha, email, descripcion, telefono, tipo, DNI) values ('usuario', 'usuario','usuario','25d55ad283aa400af464c76d713c07ad','usuario@gmail.com', 'Soy usuario', '633522456','administrador', '03901980F');

CREATE TABLE IF NOT EXISTS grupo(
    id_grupo int AUTO_INCREMENT,
    nombre varchar(20) NOT NULL,
    descripcion varchar(255) ,
    responsable_grupo varchar(30) NOT NULL,
    PRIMARY KEY (id_grupo),
    FOREIGN KEY (responsable_grupo) REFERENCES usuario(username)
    ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (1, 'GrupoPruebaT','Grupo prueba para test insertado','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (2, 'GrupoPruebaTest','Grupo prueba para test insertado','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (4, 'UsuarioGrupoPruebaTest','Grupo prueba para test usuariogrupo insertado','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (6, 'UsuarioGrupoTest','Grupo prueba para test usuariogrupo con usuarios','admin');


CREATE TABLE IF NOT EXISTS actividad(
    id_actividad int AUTO_INCREMENT,
    responsable_actividad varchar(30),
    nombre varchar(20) NOT NULL,
    ecoins int NOT NULL,
    descripcion varchar(255) ,
    tipo enum('interior','exterior') ,
    id_grupo int,
    PRIMARY KEY (id_actividad),
    FOREIGN KEY (responsable_actividad) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into actividad(id_actividad, responsable_actividad,nombre,ecoins, descripcion, tipo, id_grupo) values (1,'admin', 'ActPru',3,'Actividad prueba para test','interior',1);
insert into actividad(id_actividad, responsable_actividad,nombre,ecoins, descripcion, tipo, id_grupo) values (2,'imalvarez', 'ActPruT',10,'Actividad dos prueba para test','exterior',1);
insert into actividad(id_actividad, responsable_actividad,nombre,ecoins, descripcion, tipo, id_grupo) values (3,'imalvarez', 'Actidelete',10,'Actividad dos prueba para test','exterior',1);
insert into actividad(id_actividad, responsable_actividad,nombre,ecoins, descripcion, tipo, id_grupo) values (7,'imalvarez', 'Actideleteee',10,'Actividad dos prueba para test','exterior',1);
insert into actividad(id_actividad, responsable_actividad,nombre,ecoins, descripcion, tipo, id_grupo) values (6,'imalvarez', 'ast',10,'Actividad dos prueba para test','exterior',NULL);


CREATE TABLE IF NOT EXISTS actividades(
    id_actividades int AUTO_INCREMENT,
    nombre varchar(20) NOT NULL,
    username varchar(30),
    fecha datetime NOT NULL,
    id_actividad int NOT NULL,
    validado enum('Si','No') ,
    PRIMARY KEY (id_actividades),    
    FOREIGN KEY (id_actividad) REFERENCES actividad (id_actividad)
     ON UPDATE CASCADE ON DELETE CASCADE, 
    FOREIGN KEY (username) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into actividades(id_actividades,nombre, fecha, id_actividad,username,validado) values (1,'prueba', '2022-10-12',1,'admin','Si');
insert into actividades(id_actividades,nombre, fecha, id_actividad, username,validado) values (2,'pruebados', '2022-10-12', 1,'admin','Si');
insert into actividades(id_actividades,nombre, fecha, id_actividad,username,validado) values (3,'pruebatres', '2022-11-12',3,'admin','Si');
insert into actividades(id_actividades,nombre, fecha, id_actividad,username,validado) values (4,'pruebaatres', '2022-12-12',3,'admin','Si');
insert into actividades(id_actividades,nombre, fecha, id_actividad,username,validado) values (5,'pruebaacuatro', '2022-12-12',3,'admin','Si');


CREATE TABLE IF NOT EXISTS usuario_grupo(
    id_grupo int,
    username varchar(30),
    ecoins int NOT NULL,
    tipo_participacion enum('participa','sigue') NOT NULL,
    PRIMARY KEY (id_grupo,username)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into usuario_grupo(id_grupo, username,ecoins,tipo_participacion) values (1, 'admin',5, "sigue");
insert into usuario_grupo(id_grupo, username,ecoins,tipo_participacion) values (6, 'admin',6, "participa");

CREATE TABLE IF NOT EXISTS proyecto(
    id_proyecto int AUTO_INCREMENT,
    nombre varchar(20) NOT NULL,
    descripcion varchar(255) ,
    responsable_proyecto varchar(30) NOT NULL,
    id_grupo int,
    PRIMARY KEY (id_proyecto),
    FOREIGN KEY (responsable_proyecto) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_grupo) REFERENCES grupo (id_grupo)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into proyecto(id_proyecto, nombre, descripcion, responsable_proyecto,id_grupo) values (1, 'ProyPruebaT','Proyecto prueba para test insertado','admin',2);
insert into proyecto(id_proyecto, nombre, descripcion, responsable_proyecto,id_grupo) values (2, 'ProyPruebaTTest','Proyecto prueba para test insertado','admin',2);
insert into proyecto(id_proyecto, nombre, descripcion, responsable_proyecto,id_grupo) values (3, 'ProyPrueba','Proyecto prueba para test insertado','admin',1);
insert into proyecto(id_proyecto, nombre, descripcion, responsable_proyecto,id_grupo) values (4, 'ProyePrueba','Proyecto prueba para test insertado','admin',1);
insert into proyecto(id_proyecto, nombre, descripcion, responsable_proyecto,id_grupo) values (5, 'ProPruebaEl','Proyecto prueba para test eliminado','usuario',2);

CREATE TABLE IF NOT EXISTS documentacion(
    id_documentacion int AUTO_INCREMENT,
    archivo varchar(255) NOT NULL,
    username varchar(30) NOT NULL,
    id_actividades int NULL,
    id_proyecto int NULL,
    validado enum('Si','No') ,
    PRIMARY KEY (id_documentacion),
    FOREIGN KEY (username) REFERENCES usuario (username)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into documentacion(id_documentacion, archivo, username, id_actividades,id_proyecto,validado) values (1, 'Archivo','admin',2,1,'No');

CREATE TABLE IF NOT EXISTS mensaje(
    id_mensaje int AUTO_INCREMENT,
    emisor varchar(30) NOT NULL,
    receptor varchar(30) NOT NULL,
    titulo varchar(20) NOT NULL,
    cuerpo varchar(255) ,
    leido enum('Si','No') NOT NULL,
    PRIMARY KEY (id_mensaje),
    FOREIGN KEY (emisor) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (receptor) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


GRANT ALL PRIVILEGES ON ecoBD_Test.* TO 'ecouser'@'localhost';