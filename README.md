# GOODGAMES

En este trabajo hemos desarrollado un Sistema Web usando tecnologías vistas en clase: **HTML**, **CSS**, **JavaScript**, **PHP**. 
Además, se ha utilizado la base de datos **MariaDB** y su despliegue se ha automatizado mediante **Docker**.
La temática escogida para la página web es una **biblioteca de videojuegos**. 

## Componentes del grupo:

- Patricia Ortega
- Ander Gorocica
- Bidane Leon


## Instrucciones para el despliegue del proyecto:
1. Descargar el repositorio:
```sh
$ git clone -b entrega_1 https://github.com/patricia-ortega-garcia/ProyectoSGSSI.git
```
3. Situarse en el directorio donde se encuentre el proyecto:
```sh
$ cd ProyectoSGSSI
```
3. Construir la imagen web:
```sh
$ sudo docker build -t="web" .
```
4. Desplegar los servicios:
```sh
$ sudo docker-compose up
```
5. Acceder a la página de PHPMyAdmin:
```
En el navegador visitar http://localhost:8890/ y registrarse.
     Usuario: admin
     Contraseña: test
```
6. Importar la base de datos **computer_games.sql**:
```
Haz click en "database" y luego en "import", donde elegimos el archivo ProyectoSGSSI/computer_games.sql
```
7. Visitar la página web:
```
En el navegador visitar http://localhost:81
```
