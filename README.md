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
$ git clone -b entrega_2 https://github.com/patricia-ortega-garcia/ProyectoSGSSI.git
```
3. Situarse en el directorio donde se encuentre el proyecto:
```sh
$ cd ProyectoSGSSI
```
3. Ejecutar el script proporcionado (recuerda darle permisos de ejecución si no los tiene):
```sh
$ ./iniciar_web.sh
```
Este script construirá  la imagen y desplegará los servicios.

7. Visitar la página web:
```
En el navegador visitar http://localhost:81
```

Para parar los servicios, en otra terminal:
```sh
$ sudo docker-compose down
```
