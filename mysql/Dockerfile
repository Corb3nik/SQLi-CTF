FROM mysql:5.7.18
ENV MYSQL_DATABASE: "web_level3_sqli"
ENV MYSQL_USER: "web_level3_sqli"
ENV MYSQL_PASSWORD: "thisisasecurepassword123"
ENV MYSQL_ROOT_PASSWORD: "root"
ENV MYSQL_ALLOW_EMPTY_PASSWORD: "yes"
ADD setup.sql /docker-entrypoint-initdb.d/setup.sql
ADD my.cnf /etc/mysql/conf.d/my.cnf
RUN useradd -ms /bin/bash "FLAG-is_this_sqli_or_lfi"

