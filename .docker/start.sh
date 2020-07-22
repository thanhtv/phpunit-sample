#!/usr/bin/env bash
httpd -v
php -v
supervisord -n -c /etc/supervisord.conf