FROM php:fpm-alpine

RUN apk update \
    && docker-php-ext-install mysqli && docker-php-ext-enable mysqli

WORKDIR /app
VOLUME [ "/app" ]

ENV TZ=Asia/Shanghai
# RUN cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime && echo 'Asia/Shanghai'>/etc/timezone

EXPOSE 9000
CMD ["php", "-S", "0.0.0.0:9000", "-t", "/app"]
