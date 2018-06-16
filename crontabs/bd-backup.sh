#!/bin/bash
 # crea una copia de seguridad de una base de datos y la envía a una dirección de correo electrónico
 ########################
 ##### variables a editar


 #
 DB_USER=dbo732013555
 DB_PASS=Pa56word
 DB_NAME=db732013555
 BACKUP_DIR=/copiaBBDD/
 MESSAGE_FILE=backup.mail.message # colocar este archivo en BACKUP_DIR
 USER_MAIL=javiealiaga@gmail.com
 #
 ##### fin de variables a editar
 ########################
 BACKUP_FILE=${BACKUP_DIR}$(date +%Y%m%d)-${DB_NAME}.sql
 # usamos mysqldump para hacer la copia de seguridad que se guarda en BACKUP_DIR
 mysqldump --opt -u ${DB_USER} -p${DB_PASS} ${DB_NAME} > ${BACKUP_FILE}
 # usamos bzip2 para comprimir el sql
 bzip2 ${BACKUP_FILE}
 # usamos mutt para enviar por correo electrónico el archivo sql
 mutt -s "Copia de seguridad base de datos ${DB_NAME}: $(date +%B) de $(date +%Y)" ${USER_MAIL} -a ${BACKUP_FILE}.bz2 < ${BACKUP_DIR}${MESSAGE_FILE}


