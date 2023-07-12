FROM --platform=linux/x86_64 mysql:8.0

ENV TZ=Asia/Tokyo \
    MYSQL_DATABASE=app \
    MYSQL_USER=user \
    MYSQL_PASSWORD=password \
    MYSQL_ROOT_PASSWORD=password

COPY ./conf.d/my.cnf /etc/my.cnf
