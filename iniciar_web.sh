cd app
echo "Vamos a cambiar los permisos de los logs"
sudo chmod 644 logs.log
sudo chown www-data logs.log
echo "Vamos a cambiar los permisos de la clave simétrica"
sudo chown www-data clave.txt
sudo chmod 400 clave.txt 
cd ..
echo "Ahora vamos a desplegar la web. Para abrirla hay que introducir en un navegador la siguiente url 'http://localhost:81/' "
sudo docker build -t="web" .
sudo docker-compose up

