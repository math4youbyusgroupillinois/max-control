<?php
/* file autogenerated with pygenconfig */


/* domain (net getdomainsid */
define('LDAP_DOMAIN', 'EBOX');

/* ldap admin from /etc/ldap.conf and /etc/ldap.secret */
define('LDAP_BINDDN', 'cn=ebox,dc=max-server');
define('LDAP_BINDPW', 'GzxovzAANdxoPux9');

/* usuario creado por max-control */
define('LDAP_ADMIN', 'max-control');
define('LDAP_PASS', 'DS3y273ua2m');

define('LDAP_BASEDN', 'dc=max-server');

define('CONFIGURED', True);



// aparecerán cajas con información útil para errores.
define("DEBUG", True);


/*********** a partir de aqui puede que ya no hay aque editar nada ********/

// otros datos del dominio
define("LDAP_HOSTNAME", "127.0.0.1");

// entidades organizativas del dominio
// para EBOX estas son las que se usan por defecto
define("LDAP_OU_COMPUTERS", "ou=Computers,dc=max-server");
define("LDAP_OU_USERS", "ou=Users,dc=max-server");
define("LDAP_OU_GROUPS", "ou=Groups,dc=max-server");

// Domain Admins
define("LDAP_OU_DADMINS", "cn=Domain Admins,ou=Groups,dc=max-server");

// Administrators
define("LDAP_OU_ADMINS", "cn=Administrators,ou=Groups,dc=max-server");

// si no existe crearlo con EBOX
define("TEACHERS", "Teachers");
define("LDAP_OU_TEACHERS", "cn=Teachers,ou=Groups,dc=max-server");
define("LDAP_OU_DUSERS", "cn=Domain Users,ou=Groups,dc=max-server");
define("TICS", "CoordinadoresTIC");
define("LDAP_OU_TICS", "cn=CoordinadoresTIC,ou=Groups,dc=max-server");

// ruta al comando winexe
define("WINEXE", "/usr/bin/winexe");

// ruta al comando max-control
define("MAXCONTROL", "/usr/bin/max-control");

// ruta al comando pywakeonlan
define("PYWAKEONLAN", "/usr/bin/pywakeonlan");


// rutas a los perfiles
define("HOMES", "/home/samba/users/");
define("SAMBA_HOMES", '\\\\max-server\homes\\');
define("SAMBA_PROFILES", '\\\\max-server\profiles\\');

// RUTA a la clase smarty
define("SMARTY_REQUIRE","/usr/share/php/smarty/Smarty.class.php");

// cache de smart
define("SMARTY_CACHE", "/var/lib/max-control/cache");

// ruta a las plantillas mejor no editar
define("SMARTY_TEMPLATES", "/templates");

define("SMARTY_PLUGINS", '/usr/share/php/smarty/plugins/');

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
//define("FORK_LOGFILE", "/tmp/actions.log");
define("FORK_LOGFILE", "/dev/null");


/* paginador */
define("PAGER_LIMIT", 25);
define("PAGER_MAX_LINKS", 10);

/* quota % to show a warning (needed by pyoverquota) */
define("OVERQUOTA_LIMIT", 80);

/* file to read/write programer events */
define("PROGRAMER_INI", "/var/lib/max-control/programer.ini");


$site["public_modules"]=array();

$site["private_modules_admin"]=array(
        "miperfil" => "Mi perfil",
        "usuarios" => "Usuarios y Grupos",
        "equipos" => "Equipos del dominio",
        "isos" => "Distribuir ISOS",
        "power" => "Apagado y reinicio",
        "boot" => "Programar arranque equipos",
        );

$site["private_modules_tic"]=array(
        "miperfil" => "Mi perfil",
        "usuarios" => "Usuarios y Grupos",
        "equipos" => "Equipos del dominio",
        "isos" => "Distribuir ISOS",
        "power" => "Apagado y reinicio",
        "boot" => "Programar arranque equipos",
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



?>
