#!/bin/sh

# Write env variables into an sh script for usage in cronjobs - the cronjob does not know the environment variables passed by docker.
printenv | sed 's/^\(.*\)$/export \1/g' | grep -E '^export (TYPO3|MYSQL)' > /app/env.sh && chmod 700 /app/env.sh && chown www-data /app/env.sh

crond -f &
docker-php-entrypoint php-fpm