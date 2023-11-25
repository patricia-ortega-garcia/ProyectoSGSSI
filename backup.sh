#!/bin/bash

# Directorios de origen y destino
directorio_origen="/home/patricia/Documentos/SGSSI/ProyectoSGSSI"
directorio_backup="/var/tmp/Backups"

# Nombre del archivo de copia de seguridad
archivo_backup="backup_$(date +\%Y\%m\%d_\%H\%M\%S).tar.gz"

# Copia de seguridad incremental
rsync -a --link-dest="$directorio_backup/latest" "$directorio_origen" "$directorio_backup/incremental_$backup_file"

# Actualiza el enlace simbólico "latest" a la última copia de seguridad
rm -f "$directorio_backup/latest"
ln -s "incremental_$archivo_backup" "$directorio_backup/latest"

# Copia de seguridad completa (una vez por semana, por ejemplo)
if [ "$(date +\%u)" -eq 7 ]; then
  tar czf "$directorio_backup/full_$archivo_backup" "$directorio_origen"
fi

# Directorio del repositorio de GitHub
github_repo="/home/patricia/Documentos/SGSSI/SGSSI"

# Copia los archivos al repositorio de GitHub
cp -r /var/tmp/Backups/* "$github_repo/"

# Añade y sube cambios a GitHub
cd "$github_repo"
git pull
git add .
git commit -m "Copia de seguridad automática $(date +\%Y\%m\%d_\%H\%M\%S)"
git push origin master