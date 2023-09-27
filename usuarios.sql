CREATE TABLE usuarios (

    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    dni VARCHAR(9) PRIMARY KEY NOT NULL,
    telefono INT(9) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    email VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
);

INSERT INTO `usuarios` (`nombre`, `apellidos`, `dni`, `telefono`, `fecha_nacimiento`, `email`, `usuario`, `contraseña`) VALUES
('Patricia', 'Ortega García', '79000919J', '615818650', '2002-1-07', 'patriciaorteaga@gmail.com', 'Pato', 'root1234');
