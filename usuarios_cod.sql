CREATE TABLE usuarios_cod (
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    dni VARCHAR(100) NOT NULL,
    telefono VARCHAR(100)  NOT NULL,
    fecha_nacimiento VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(100) PRIMARY KEY NOT NULL,
    sal VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL
);
