DROP DATABASE IF EXISTS ecoBD;
CREATE DATABASE ecoBD DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use ecoBD;

CREATE TABLE IF NOT EXISTS usuario(
    username varchar(30),
    nombre varchar(20) NOT NULL,
    apellidos varchar(200) NOT NULL,
    contrasenha varchar(100) NOT NULL,
    email varchar(100)  NOT NULL ,
    descripcion varchar(255) ,
    telefono varchar(15)  ,
    tipo enum('estandar','administrador') NOT NULL,
    DNI varchar(9)  ,
    PRIMARY KEY (username)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into usuario(username, nombre, apellidos, contrasenha, email, descripcion, telefono, tipo, DNI) values ('imalvarez', 'Iria','Martinez','25d55ad283aa400af464c76d713c07ad','imalvarez@gmail.com', 'Soy Iria', '634422456','administrador', '35609734F');
insert into usuario(username, nombre, apellidos, contrasenha, email, descripcion, telefono, tipo, DNI) values ('admin', 'admin','admin','25d55ad283aa400af464c76d713c07ad','admin@gmail.com', 'Soy admin', '633422456','administrador', '42952226W');
insert into usuario(username, nombre, apellidos, contrasenha, email, descripcion, telefono, tipo, DNI) values ('usuario', 'Usuario','Usuario','25d55ad283aa400af464c76d713c07ad','usuario@gmail.com', 'Soy un usuario', '633462456','estandar', '13565782Z');


CREATE TABLE IF NOT EXISTS grupo(
    id_grupo int AUTO_INCREMENT,
    nombre varchar(20) NOT NULL,
    descripcion varchar(255) ,
    responsable_grupo varchar(30) NOT NULL,
    PRIMARY KEY (id_grupo),
    FOREIGN KEY (responsable_grupo) REFERENCES usuario(username)
    ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (1, 'Grupo Cultivo','Grupo para el cultivo en pequeños huertos ecológicos. Algunas ideas de cultivo son patatas, lechuga y repollos.','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (2, 'Grupo Plantar Árboles','Grupo creado para plantar árboles y ayudar al desarrollo sostenible','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (3, 'Grupo Ahorro Agua','Grupo para ideas de como reducir el consumo del agua','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (4, 'Grupo Reutilizar','Grupo ideas para reutilizar','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (5, 'Grupo Reciclar','Grupo ideas para reciclar','admin');
insert into grupo(id_grupo, nombre, descripcion, responsable_grupo) values (6, 'Grupo Paseos','Grupo para dar paseos por diversos lugares y limpiarlos','admin');

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

insert into actividad(id_actividad, responsable_actividad,nombre,ecoins, descripcion, tipo, id_grupo) values (1,'admin', 'Cultivo',15,'Cultivo ecológico','exterior',1);
insert into actividad(id_actividad, responsable_actividad,nombre,ecoins, descripcion, tipo, id_grupo ) values (2,'imalvarez', 'Ahorro Agua',10,'Maneras de ahorrar agua','interior',2);

CREATE TABLE IF NOT EXISTS actividades(
    id_actividades int AUTO_INCREMENT,
    username varchar(30),
    nombre varchar(20) NOT NULL,
    fecha datetime NOT NULL,
    id_actividad int NOT NULL,    
    validado enum('Si','No') NOT NULL,
    PRIMARY KEY (id_actividades),    
    FOREIGN KEY (id_actividad) REFERENCES actividad (id_actividad)
     ON UPDATE CASCADE ON DELETE CASCADE,     
    FOREIGN KEY (username) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into actividades(id_actividades,nombre, fecha, id_actividad,username,validado) values (1,"Cultivo lechuga", '2022-10-12',1,'admin','Si');
insert into actividades(id_actividades,nombre, fecha, id_actividad,username,validado) values (2,"Cultivo fresas", '2022-10-12', 1,'admin','Si');
insert into actividades(id_actividades,nombre, fecha, id_actividad,username,validado) values (3,"Cultivo", '2022-10-12', 1,'admin','Si');

CREATE TABLE IF NOT EXISTS usuario_grupo(
    id_grupo int NOT NULL,
    username varchar(30) NOT NULL,
    ecoins int NOT NULL DEFAULT 0,
    tipo_participacion enum('participa','sigue') NOT NULL,
    PRIMARY KEY (id_grupo,username),
    FOREIGN KEY (id_grupo) REFERENCES grupo (id_grupo)
     ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (username) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into usuario_grupo(id_grupo, username,ecoins,tipo_participacion) values (5, 'admin',10, 'participa');
insert into usuario_grupo(id_grupo, username,ecoins,tipo_participacion) values (1, 'admin',5, 'sigue');

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

insert into proyecto(id_proyecto, nombre, descripcion, responsable_proyecto,id_grupo) values (1, 'Bosques Limpios','Limpieza basura en los bosques','admin',1);
insert into proyecto(id_proyecto, nombre, descripcion, responsable_proyecto,id_grupo) values (2, 'Huerto','Huerto común ecológico','admin',2);

CREATE TABLE IF NOT EXISTS documentacion(
    id_documentacion int AUTO_INCREMENT,
    archivo varchar(255) NOT NULL,
    username varchar(30) NOT NULL,
    id_actividades int ,
    id_proyecto int ,
    validado enum('Si','No') NOT NULL,
    PRIMARY KEY (id_documentacion),
    FOREIGN KEY (username) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into documentacion(id_documentacion, archivo, username, id_actividades,id_proyecto,validado) values (1, 'prueba','admin',999999999,1,'Si');
insert into documentacion(id_documentacion, archivo, username, id_actividades,id_proyecto,validado) values (2, 'pruebados','admin',1,999999999,'Si');
insert into documentacion(id_documentacion, archivo, username, id_actividades,id_proyecto,validado) values (3, 'pruebatres','admin',999999999,1,'Si');
insert into documentacion(id_documentacion, archivo, username, id_actividades,id_proyecto,validado) values (4, 'pruebacuatro','admin',1,999999999,'Si');


CREATE TABLE IF NOT EXISTS mensaje(
    id_mensaje int AUTO_INCREMENT,
    emisor varchar(30) NOT NULL,
    receptor varchar(30) NOT NULL,
    titulo varchar(20) NOT NULL,
    cuerpo varchar(255) ,
    leido enum('Si','No') NOT NULL,
    PRIMARY KEY (id_mensaje),
    FOREIGN KEY (emisor) REFERENCES usuario (username)
     ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

drop user'ecouser'@'localhost';
flush privileges;
CREATE USER 'ecouser'@'localhost' IDENTIFIED BY 'ecopass';
GRANT ALL PRIVILEGES ON ecoBD.* TO 'ecouser'@'localhost';