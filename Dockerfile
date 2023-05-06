FROM php:7.4.33-fpm-alpine

# RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
RUN apk update \
    && docker-php-source extract \
    && docker-php-ext-install mysqli && docker-php-ext-enable mysqli \
    && docker-php-ext-install pdo && docker-php-ext-enable pdo \
    && docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql

VOLUME [ "/var/www/html" ]
ENV TZ=Asia/Shanghai
EXPOSE 9000
CMD ["php", "-S", "0.0.0.0:9000", "-t", "/var/www/html"]
