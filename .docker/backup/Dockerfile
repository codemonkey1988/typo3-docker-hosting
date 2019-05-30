FROM alpine:3.9

RUN set -xe \
    && mkdir -p /backup \
    && apk add --update --no-cache \
        tar \
        bash \
        mariadb-client \
    && rm -rf /tmp/* /var/cache/apk/

RUN touch /backup/env.sh \
    && chmod 700 /backup/env.sh

ADD .docker/backup/entrypoint.sh /
RUN chmod 700 /entrypoint.sh

ADD .docker/backup/scripts/backup_database.sh /backup/backup_database.sh
ADD .docker/backup/scripts/backup_files.sh /backup/backup_files.sh
RUN chmod u+x /backup/backup_database.sh /backup/backup_files.sh

ADD .docker/backup/cron/backup.txt /etc/crontabs/root

WORKDIR /backup

ENTRYPOINT /entrypoint.sh

CMD ["crond", "-f"]