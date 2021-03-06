<?php

// file autogenerated with init.sh on 'lun oct  6 18:27:14 CEST 2014'

// basedn del dominio
define('LDAP_BASEDN', 'DC=madrid,DC=lan');
define('WORKGROUP', 'MADRID');

// autenticacion
define('LDAP_BINDDN', 'CN=max-control,CN=Users,DC=madrid,DC=lan');
define('LDAP_BINDPW', '3zsswKUTCOBfBfz');

define("LDAP_ADMIN", 'max-control');
// autogenerated password in init.sh
define("LDAP_PASS", '3zsswKUTCOBfBfz');

// Entidades organizativas
define('LDAP_OU_COMPUTERS', 'CN=Computers,DC=madrid,DC=lan');
define('LDAP_OU_USERS',     'CN=Users,DC=madrid,DC=lan');
define('LDAP_OU_GROUPS',    'CN=Users,DC=madrid,DC=lan');

// dominio
define('LDAP_DOMAIN', 'madrid.lan');

define('LDAP_OU_BUILTINS',      'CN=MAXGroups,DC=madrid,DC=lan');
// Administrators
define('LDAP_OU_ADMINS',        'CN=Administrators,CN=Builtin,DC=madrid,DC=lan');
define('LDAP_OU_DADMINS',       'CN=Domain Admins,CN=Users,DC=madrid,DC=lan');
define('LDAP_OU_DUSERS',        'CN=Domain Users,CN=Users,DC=madrid,DC=lan');


define('TEACHERS', 'Teachers');
define('LDAP_OU_TEACHERS',      'CN=Teachers,CN=MAXGroups,DC=madrid,DC=lan');

define('TICS', 'CoordinadoresTIC');
define('LDAP_OU_TICS',          'CN=CoordinadoresTIC,CN=MAXGroups,DC=madrid,DC=lan');

define('INSTALLATORS', 'Instaladores');
define('LDAP_OU_INSTALLATORS',  'CN=Instaladores,CN=MAXGroups,DC=madrid,DC=lan');


define("HOMES", "/home/MADRID/");

define("LDAP_HOST", "127.0.0.1");
define("LDAP_HOSTNAME", "max-server");
define("LDAP_PORT", 389);

define('CONFIGURED', True);


// aparecerán cajas con información útil para errores.
define("DEBUG", True);

define("VERSION", "__GIT__");

/*********** a partir de aqui puede que ya no hay aque editar nada ********/

// ruta al comando winexe
define("WINEXE", "/usr/bin/pywinexe");

// ruta al comando max-control
define("MAXCONTROL", "/usr/bin/max-control");

// ruta al comando pywakeonlan
define("PYWAKEONLAN", "/usr/bin/pywakeonlan");

// RUTA a la clase smarty
define("SMARTY_REQUIRE","/usr/share/php/smarty3/Smarty.class.php");

// cache de smart
define("SMARTY_CACHE", "/var/lib/max-control/cache");

// ruta a las plantillas mejor no editar
define("SMARTY_TEMPLATES", "/templates");

define("SMARTY_PLUGINS", '/usr/share/php/smarty3/plugins/');

/*
* enable apache mod_rewrite (mejor no tocar)
*/
define("APACHE_MOD_REWRITE", True);

// puerto usado para conectar por ssh y detectar LINUX
define("LINUX_PORT", 22);
/* esperar 2 segundos para ver si el puerto 22 está abierto*/
define("PROBE_TIMEOUT", 2);

/* timeout para apagar y mostrar un mensaje */
define("POWEROFF_REBOOT_TIMEOUT", 20);

/* directorios TFTP */
define("TFTPBOOT", "/var/lib/tftpboot/");
define("PXELINUXCFG", "/var/lib/tftpboot/pxelinux.cfg/");


// compartir ISOS
define("ISOS_PATH", "/home/samba/shares/isos/");

define("FORK_ACTIONS", True);
define("FORK_LOGFILE", "/tmp/actions.log");
// define("FORK_LOGFILE", "/dev/null");


/* paginador */
define("PAGER_LIMIT", 25);
define("PAGER_MAX_LINKS", 10);

/* quota % to show a warning (needed by pyoverquota) */
define("OVERQUOTA_LIMIT", "80");
define("DEFAULT_QUOTA", "2000");

/* file to read/write programer events */
define("PROGRAMER_INI", "/var/lib/max-control/programer.ini");
define("IMPORTER_DIR", "/var/lib/max-control/importer/");
define("FIRST_RUN", "/var/lib/max-control/first-run.done");

$site["public_modules"]=array();

$site["private_modules_admin"]=array(
        "miperfil" => "Mi perfil",
        "usuarios" => "Usuarios y Grupos",
        "equipos" => "Aulas y Equipos",
        "isos" => "Distribuir ISOS",
        "power" => "Apagado y reinicio",
        "boot" => "Programar arranque",
        );

$site["private_modules_tic"]=array(
        "miperfil" => "Mi perfil",
        "usuarios" => "Usuarios y Grupos",
        "equipos" => "Aulas y Profesores",
        "isos" => "Distribuir ISOS",
        "power" => "Apagado y reinicio",
        "boot" => "Programar arranque",
        );

$site["private_modules_teacher"]=array(
        "miperfil" => "Mi perfil",
        "isos" => "Distribuir ISOS",
        "power" => "Apagado y reinicio",
        );

$site["private_modules_none"]=array(
        "miperfil" => "Mi perfil"
        );

$site["private_modules"]=array();


