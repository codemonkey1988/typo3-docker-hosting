#!/bin/bash

source /backup/env.sh

# Prepare backup path
mkdir -p $BACKUP_DESTINATION/files

tar cfz $BACKUP_DESTINATION/files/$(date +%F.%H%M%S).tar.gz /backup/source

# Clear up old backups
cd ${BACKUP_DESTINATION}/files
for f in $(ls | sort -r | tail -n +${KEEP_FILE_BACKUPS}); do
    rm -f $f
done