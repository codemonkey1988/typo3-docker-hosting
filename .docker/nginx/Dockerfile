FROM fholzer/nginx-brotli:mainline-latest

RUN apk add --update logrotate \
    && rm -rf /var/cache/apk/*

# Create TYPO3 entrypoints
RUN mkdir -p /app/public/ /app/public/typo3/ /var/nginx/cache/TYPO3 && \
    touch /app/public/index.php /app/public/typo3/index.php /app/public/typo3/install.php

# See https://blog.cloudflare.com/http-2-prioritization-with-nginx/
COPY .docker/nginx/etc/10-http2.conf /etc/sysctl.d/10-http2.conf

# Copy nginx configuration
# See https://blog.doismellburning.co.uk/environment-variables-in-nginx-config/
# See https://vsupalov.com/docker-build-time-env-values/
COPY .docker/nginx/conf/nginx.conf /etc/nginx/nginx.conf
COPY .docker/nginx/conf/default.conf /etc/nginx/conf.d/default.conf

# Configure logrotate
# See https://www.my-it-brain.de/wordpress/logging-und-logrotate-mit-nginx/
COPY .docker/nginx/logrotate/nginx /etc/logrotate.d/nginx

COPY --chown=nginx:nginx public/typo3conf/ext/nginx_cache/Resources/Private/nginx_purge /etc/nginx/perl/lib

# Copy static files for TYPO3
COPY --chown=nginx:nginx public/typo3/sysext/adminpanel/Resources/Public /app/public/typo3/sysext/adminpanel/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/backend/Resources/Public /app/public/typo3/sysext/backend/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/belog/Resources/Public /app/public/typo3/sysext/belog/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/beuser/Resources/Public /app/public/typo3/sysext/beuser/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/core/Resources/Public /app/public/typo3/sysext/core/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/extbase/Resources/Public /app/public/typo3/sysext/extbase/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/extensionmanager/Resources/Public /app/public/typo3/sysext/extensionmanager/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/filelist/Resources/Public /app/public/typo3/sysext/filelist/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/fluid/Resources/Public /app/public/typo3/sysext/fluid/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/fluid_styled_content/Resources/Public /app/public/typo3/sysext/fluid_styled_content/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/form/Resources/Public /app/public/typo3/sysext/form/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/frontend/Resources/Public /app/public/typo3/sysext/frontend/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/info/Resources/Public /app/public/typo3/sysext/info/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/install/Resources/Public /app/public/typo3/sysext/install/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/lowlevel/Resources/Public /app/public/typo3/sysext/lowlevel/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/opendocs/Resources/Public /app/public/typo3/sysext/opendocs/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/recordlist/Resources/Public /app/public/typo3/sysext/recordlist/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/recycler/Resources/Public /app/public/typo3/sysext/recycler/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/redirects/Resources/Public /app/public/typo3/sysext/redirects/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/reports/Resources/Public /app/public/typo3/sysext/reports/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/rte_ckeditor/Resources/Public /app/public/typo3/sysext/rte_ckeditor/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/scheduler/Resources/Public /app/public/typo3/sysext/scheduler/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/seo/Resources/Public /app/public/typo3/sysext/seo/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/setup/Resources/Public /app/public/typo3/sysext/setup/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/tstemplate/Resources/Public /app/public/typo3/sysext/tstemplate/Resources/Public
COPY --chown=nginx:nginx public/typo3/sysext/viewpage/Resources/Public /app/public/typo3/sysext/viewpage/Resources/Public

COPY --chown=nginx:nginx public/typo3conf/ext/nginx_cache/Resources/Public /app/public/typo3conf/ext/nginx_cache/Resources/Public

COPY --chown=nginx:nginx .docker/nginx/assets/robots.txt /app/public/robots.txt

EXPOSE 80 443

STOPSIGNAL SIGTERM

CMD ["crond", "-f", "&", "nginx", "-f", "daemon off;"]