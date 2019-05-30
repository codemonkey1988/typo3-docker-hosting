#!/bin/bash

source /backup/env.sh

# Prepare backup path
mkdir -p $BACKUP_DESTINATION/database

# Create .my.cnf file
cat > ~/.my.cnf << EOF
[mysqldump]
user=$MYSQL_USER
password=$MYSQL_PASSWORD
host=db
EOF

# Create database backup
/usr/bin/mysqldump $MYSQL_DATABASE | gzip > ${BACKUP_DESTINATION}/database/${MYSQL_DATABASE}_$(date +%F.%H%M%S).sql.gz

# Clear up old backups
cd ${BACKUP_DESTINATION}/database
for f in $(ls | sort -r | tail -n +${KEEP_DATABASE_BACKUPS}); do
    rm -f $f
done