#!/bin/bash

_name=$1
_user=$2
_passwd=$3

# test parametrów
if [ $# -lt "3" ] | [ $# -gt "3" ]; then
	echo Liczba parametrow sie nie zgadza\!
	exit 1
fi

# Tworzenie bazy danych
if mysql -e "CREATE TABLE IF NOT EXISTS $1;"; then
	echo Utworzono baze danych $1...
	if mysql -e "GRANT SELECT, ALTER, CREATE, UPDATE, INSERT, DELETE, DROP ON $1.* TO '$2'@'localhost'IDENTIFIED BY '$3';FLUSH PRIVILEGES;"; then
		if mysql -e "USE $1; CREATE TABLE IF NOT EXISTS messages(msg_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,uname VARCHAR(32) NOT NULL,timestamp TIMESTAMP NOT NULL,message TEXT(256) NOT NULL,PRIMARY KEY(msg_id));"; then
			echo Przygotowano baze danych\!
			exit 0
	else
		echo Tworzenie uzytkownika zakonczone niepowodzeniem\!
		exit 1
	fi
else
	echo Nie udalo sie utworzyc bazy danych\!
	exit 1
fi

exit 2
