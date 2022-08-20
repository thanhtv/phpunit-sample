FROM centos:7

# Add repository and keys
RUN yum -y update
RUN yum -y install epel-release

# Install httpd
RUN yum -y install httpd
RUN yum -y install httpd mod_ssl

# Copy apache conf
COPY .docker/sample_project.conf /etc/httpd/conf.d/sample_project.conf

# Install PHP 7.2
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum-config-manager --enable remi-php72
RUN yum -y install php
RUN yum -y install php-xml php-soap php-xmlrpc php-mbstring php-json php-gd php-mcrypt php-intl php-cli php-fpm \
                   php-pdo php-mysql php-zip

# Install xdebug
RUN yum -y install php-xdebug
COPY .docker/xdebug.ini /etc/php.d/15-xdebug.ini

# PHP-FPM needs this folder
RUN mkdir -p /run/php-fpm

# Install pip
RUN yum -y install python3-pip
RUN pip3 install --upgrade pip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# install nodejs
RUN curl -sL https://deb.nodesource.com/setup_10.x
RUN yum -y install nodejs

# install git
RUN yum -y install git

# Install supervisor
RUN pip install supervisor

# Copy supervisor conf
COPY .docker/supervisord.conf /etc/supervisord.conf

# Copy source code
#COPY src /workspace
WORKDIR /var/www/html

# Set folder permissions
# See: https://laracasts.com/discuss/channels/general-discussion/laravel-framework-file-permission-security
#RUN chgrp -R apache /workspace/storage /workspace/bootstrap/cache
#RUN chmod -R ug+rwx /workspace/storage /workspace/bootstrap/cache

# Add start script
COPY .docker/start.sh /start.sh
RUN chmod 755 /start.sh

EXPOSE 80
EXPOSE 443

CMD ["/start.sh"]
