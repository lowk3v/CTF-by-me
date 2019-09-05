FROM ubuntu:16.04
MAINTAINER Kev

WORKDIR /opt/
EXPOSE 80

# Install packages
RUN apt-get update
RUN apt-get install -y apache2 wget unzip php7.0 php7.0-mbstring php7.0-mysql libapache2-mod-php7.0 php7.0-mcrypt busybox
RUN echo "mysql-server mysql-server/root_password password faked" | debconf-set-selections \
        && echo "mysql-server mysql-server/root_password_again password faked" | debconf-set-selections \
        && apt-get install -y mysql-server

# Setup
RUN mkdir /opt/build /opt/log /opt/wordpress

COPY wordpress.sql configure.sh /opt/build/
COPY vhost.conf /etc/apache2/sites-available/
ADD src /opt/wordpress

RUN chmod 700 /opt/build/*
RUN chmod 750 /opt/log 
ENTRYPOINT ["/opt/build/configure.sh"]
