FROM php:8.2-fpm-alpine

#================postgresql==================
# RUN set -ex \
#   && apk --no-cache add \
#     postgresql-dev

# RUN docker-php-ext-install pdo pdo_pgsql pgsql



#=======process control extension, it used for multiple process run in supervisor======= 
RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl

COPY ./php.ini /usr/local/etc/php/

ARG APP_ROOT
ARG COMMAND
ARG OPTIONS

ENV APP_ROOT=${APP_ROOT}
ENV COMMAND=${COMMAND}
ENV OPTIONS=${OPTIONS}

RUN apk update && apk add --no-cache supervisor

RUN mkdir -p "/etc/supervisor/logs"

RUN mkdir -p "/var/log/supervisor"

COPY ./conf.d/supervisord.conf /etc/supervisor/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]


