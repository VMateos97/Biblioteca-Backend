USE bibliotecabd;


/*-------------------  INICIO TABLAS PARA LOGIN  ---------------------*/

CREATE TABLE usuario(
	idU INT AUTO_INCREMENT PRIMARY KEY,
	us VARCHAR(50),
	password VARCHAR(255),
	rfc VARCHAR(25),
	nip VARCHAR(4),
	nombre VARCHAR(255),
	email VARCHAR(255),
	token VARCHAR(255),
	status INT(1),
	UNIQUE(us)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE usuarioalumno(
	noControl INT(9) AUTO_INCREMENT PRIMARY KEY,
	nip INT(4),
	nombre VARCHAR(255),
	token VARCHAR(255),
	status INT(1)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE usuariodocente(
	rfc VARCHAR(25) AUTO_INCREMENT PRIMARY KEY,
	password VARCHAR(255),
	nombre VARCHAR(255),
	token VARCHAR(255),
	status INT(1)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*-------------------  FIN TABLAS PARA LOGIN  ---------------------*/


/*-------------------  INICIO TABLAS DEL SISTEMA  ---------------------*/

CREATE TABLE asesor(
	idAsesor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombreAsesor VARCHAR(45),
	apPaterno VARCHAR(45),
	apMaterno VARCHAR(45),
	rfc VARCHAR(45),
	password VARCHAR(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE periodo(
	idPeriodo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(45)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categoria(
	idCategoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nCategoria VARCHAR(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE carrera(
	idCarrera INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombreCarrera VARCHAR(255),
	periodo INT,
	FOREIGN KEY(periodo) REFERENCES periodo(idPeriodo)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE alumno(
	idAlumno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NIP INT(4),
	nombreAlumno VARCHAR(45),
	apPaterno VARCHAR(45),
	apMaterno VARCHAR(45),
	noControl INT(4),
	asesor INT,
	carrera INT,
	FOREIGN KEY(asesor) REFERENCES asesor(idAsesor),
	FOREIGN KEY(carrera) REFERENCES carrera(idCarrera)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE proyecto(
	idProyecto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	autor VARCHAR(255),
	titulo VARCHAR(255),
	fechaEntrega DATE,
	caratula VARCHAR(255),
	alumno INT,
	categoria INT,
	FOREIGN KEY(alumno) REFERENCES alumno(idAlumno),
	FOREIGN KEY(categoria) REFERENCES categoria(idCategoria)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*-------------------  FIN TABLAS DEL SISTEMA  ---------------------*/