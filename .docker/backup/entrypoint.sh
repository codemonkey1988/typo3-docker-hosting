#!/bin/sh

# Write env variables into an sh script for usage in cronjobs - the cronjob does not know the environment variables passed by docker.
printenv | sed 's/^\(.*\)$/export \1/g' > /backup/env.sh && chmod 700 /backup/env.sh /backup/env.sh

crond -f