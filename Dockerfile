FROM php:fpm-alpine

# COPY static /app/static
# COPY system /app/system
# COPY templates /app/templates
# COPY . /app

WORKDIR /app

VOLUME [ "/app" ]

ENV TZ=Asia/Shanghai
# RUN cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime && echo 'Asia/Shanghai'>/etc/timezone

EXPOSE 9000
ENTRYPOINT ["php", "-S", "0.0.0.0:9000", "-t", "/app"]
