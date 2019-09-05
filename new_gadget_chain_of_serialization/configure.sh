#!/bin/bash

# Apache2
a2dissite 000-default
a2ensite vhost
service apache2 start
service apache2 status

# Mysql
service mysql start
service mysql status
mysql_user=root
mysql_pass=faked

mysql -u $mysql_user -p$mysql_pass --socket=/var/run/mysqld/mysqld.sock -e "create database wordpress"
mysql -u $mysql_user -p$mysql_pass --socket=/var/run/mysqld/mysqld.sock -e "CREATE USER 'ctf'@'localhost' IDENTIFIED BY 'faked';\
	GRANT ALL PRIVILEGES ON wordpress.* TO 'ctf'@'localhost'; \
	FLUSH PRIVILEGES;"
mysql -u $mysql_user -p$mysql_pass --socket=/var/run/mysqld/mysqld.sock wordpress < /opt/build/wordpress.sql

exec "$@"
