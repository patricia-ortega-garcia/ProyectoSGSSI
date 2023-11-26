cd app

echo "Vamos a cambiar los permisos del fichero de contraseñas malas"
sudo chown www-data 10000-peores-contraseñas.txt
sudo chmod 400 10000-peores-contraseñas.txt

cd logs

if [ ! -e logs.log ]; then
    echo "El archivo logs.log no existe. Creándolo..."
    touch logs.log
    sudo chmod 644 logs.log
    sudo chown www-data logs.log
else
    echo "El archivo logs.log ya existe. Cambiando permisos..."
    sudo chmod 644 logs.log
    sudo chown www-data logs.log
fi

cd ../..
if [ ! -e .env ]; then
    echo "El archivo .env no existe. Creándolo..."
    # Crear el archivo .env e introducir la clave secreta
    echo "CLAVE_SECRETA=\"$(openssl rand -base64 64 | tr -d '\n')\"" > .env
else
    echo "El archivo .env ya existe. No es necesario crearlo."
fi
echo "Ahora vamos a desplegar la web. Para abrirla hay que introducir en un navegador la siguiente url 'http://localhost:81/' "
sudo docker build -t="web" .
sudo docker-compose up