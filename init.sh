#!/bin/sh

USER="max-control"
HOST="127.0.0.1"
PORT="389"
HOSTNAME="$(hostname)"

PASS="$(tr -cd '[:alnum:]' < /dev/urandom | fold -w15 | head -n1)"


# create max-control user or change password if exists
if ! samba-tool user list 2>/dev/null | grep -q ^max-control$ ; then
    samba-tool user add "$USER" "$PASS" > /dev/null 2>&1
    samba-tool group addmembers "Domain Admins" "$USER"  > /dev/null 2>&1
    samba-tool group addmembers "Administrators" "$USER" > /dev/null 2>&1
else
    samba-tool user setpassword "${USER}" --newpassword="${PASS}" > /dev/null 2>&1
fi




DOMAIN=$(dnsdomainname)
BASEDN=$(dnsdomainname | sed -e 's/\./,DC=/g' -e 's/^/DC=/')
#SERVERDN=$(ldbsearch "(&(objectClass=computer)(CN=${HOSTNAME}*))" -H ldap://127.0.0.1:389 -U${USER}%${PASS} 2>/dev/null| awk -F": " '/^dn:/{print $2}')
# if [ "$SERVERDN" = "" ]; then
#   echo " * ERROR: No se pudo encontrar el servidor de dominio."
#   exit 0
# fi
# BASEDN=$(echo $SERVERDN | awk -F"OU=Domain Controllers," '{print $2}')

if [ "$BASEDN" = "" ]; then
    echo " * ERROR: No se pudo determinar el servidor de dominio."
    exit 0
fi



# Crear grupos internos
samba-tool group list 2>/dev/null | grep -q "^Teachers$" || \
    samba-tool group add "Teachers" --groupou=CN=Builtin --group-scope=Domain \
               --group-type=Security --description="Profesores"

samba-tool group list 2>/dev/null | grep -q "^CoordinadoresTIC$" || \
    samba-tool group add "CoordinadoresTIC" --groupou=CN=Builtin --group-scope=Domain \
               --group-type=Security --description="Coordinadores TIC"

samba-tool group list 2>/dev/null | grep -q "^Instaladores$" || \
    samba-tool group add "Instaladores" --groupou=CN=Builtin --group-scope=Domain \
               --group-type=Security --description="Instaladores de equipos"


rm -f /etc/max-control/conf.inc.php
cat << EOF > /etc/max-control/conf.inc.php
<?php

// file autogenerated with init.sh on '`date`'

// basedn del dominio
define('LDAP_BASEDN', '${BASEDN}');

// autenticacion
define('LDAP_BINDDN', 'CN=${USER},CN=Users,${BASEDN}');
define('LDAP_BINDPW', '${PASS}');

define("LDAP_ADMIN", '${USER}');
// autogenerated password in init.sh
define("LDAP_PASS", '${PASS}');

// Entidades organizativas
define('LDAP_OU_COMPUTERS', 'CN=Computers,${BASEDN}');
define('LDAP_OU_USERS',     'CN=Users,${BASEDN}');
define('LDAP_OU_GROUPS',    'CN=Users,${BASEDN}');

// dominio
define('LDAP_DOMAIN', '${DOMAIN}');

define('LDAP_OU_BUILTINS',      'CN=Builtin,${BASEDN}');
// Administrators
define('LDAP_OU_ADMINS',        'CN=Administrators,CN=Builtin,${BASEDN}');
define('LDAP_OU_DADMINS',       'CN=Domain Admins,CN=Users,${BASEDN}');
define('LDAP_OU_DUSERS',        'CN=Domain Users,CN=Users,${BASEDN}');


define('TEACHERS', 'Teachers');
define('LDAP_OU_TEACHERS',      'CN=Teachers,CN=Builtin,${BASEDN}');

define('TICS', 'CoordinadoresTIC');
define('LDAP_OU_TICS',          'CN=CoordinadoresTIC,CN=Builtin,${BASEDN}');

define('INSTALLATORS', 'Instaladores');
define('LDAP_OU_INSTALLATORS',  'CN=Instaladores,CN=Builtin,${BASEDN}');


define("HOMES", "/home/");

define("LDAP_HOST", '${HOST}');
define("LDAP_HOSTNAME", '${HOSTNAME}');
define("LDAP_PORT", ${PORT});

define('CONFIGURED', True);

`cat /usr/share/max-control/conf.inc.php.init`


EOF
