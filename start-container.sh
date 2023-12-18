#!/bin/bash
set -ex
PATH_ORIGON="${PWD}"

if [ "${ENVIRONMENT}" == "local" ]; then
    sed -i 's/opcache.enable=1/c\opcache.enable=0/' /usr/local/etc/php/php.ini
fi

/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
