<?php
/*  generate default config  */


include('modules/common.inc.php');

class GUI {
    function debug($txt) {
        if($txt == '') return;
        //fwrite(STDERR, "D: ".print_r($txt, true)." \n");
    }
    function debuga($txt) {
        if($txt == '') return;
        //fwrite(STDERR, "D: ".print_r($txt, true)." \n");
    }
    function session_info($txt) {
        $this->debug("SESSION INFO: ".$txt);
    }
    function session_error($txt) {
        $this->debug("SESSION ERROR:".$txt);
    }
}

$LDAP_BASEDN=readLDAPFile('/etc/ldap.conf', 'base');
define('LDAP_BASEDN', $LDAP_BASEDN);
$LDAP_BINDDN=readLDAPFile('/etc/ldap.conf', 'rootbinddn');
define('LDAP_BINDDN', $LDAP_BINDDN);
$LDAP_BINDPW=file_get_contents('/etc/ldap.secret');
define('LDAP_BINDPW', $LDAP_BINDPW);


include('conf.inc.php.init');
// entidades organizativas del dominio
// para EBOX estas son las que se usan por defecto
define("LDAP_OU_COMPUTERS", "ou=Computers,$LDAP_BASEDN");
define("LDAP_OU_USERS", "ou=Users,$LDAP_BASEDN");
define("LDAP_OU_GROUPS", "ou=Groups,$LDAP_BASEDN");

// Domain Admins
define("LDAP_OU_DADMINS", "cn=Domain Admins,ou=Groups,$LDAP_BASEDN");

// Administrators
define("LDAP_OU_ADMINS", "cn=Administrators,ou=Groups,$LDAP_BASEDN");

// si no existe crearlo con EBOX
define("TEACHERS", "Teachers");
define("LDAP_OU_TEACHERS", "cn=Teachers,ou=Groups,$LDAP_BASEDN");
define("LDAP_OU_DUSERS", "cn=Domain Users,ou=Groups,$LDAP_BASEDN");
define("TICS", "CoordinadoresTIC");
define("LDAP_OU_TICS", "cn=CoordinadoresTIC,ou=Groups,$LDAP_BASEDN");
define("INSTALLATORS", "Instaladores");
define("LDAP_OU_INSTALLATORS", "cn=Instaladores,ou=Groups,$LDAP_BASEDN");


$gui = new GUI();
include("classes/ldap.class.php");

/* usuario creado por max-control */
define('LDAP_ADMIN', '$LDAP_ADMIN');
define('LDAP_PASS', '$LDAP_PASS');



//exec("net getdomainsid | grep domain", $output);
//$parts = preg_split ("/\s+/", $output[0]);
//$LDAP_DOMAIN=preg_replace('/"/', '', $parts[3]);
exec("samba-tool domain info 127.0.0.1 2>/dev/null | grep ^Domain| awk '{print \$NF}'", $output);
$LDAP_DOMAIN=$output[0];
define('LDAP_DOMAIN', "$LDAP_DOMAIN");

$LDAP_ADMIN='max-control';
$LDAP_PASS=createPassword();




$ldap=new LDAP();


// crear grupo de profesores
$teachers=$ldap->get_groups(TEACHERS, $include_system=true);
if ( ! isset($teachers[0]) ) {
    $group = new GROUP( array('cn' => TEACHERS ) );
    /* newGroup($createshared, $readonly, $grouptype=2) */
    $group->newGroup('0', '0');
    $group->description="Profesores no-borrar";
    $group->ldapdata['description']="Profesores no-borrar";
    $group->save( array('description') );
    echo " * Creado grupo Teachers (profesores).\n";
}
else {
    $teachers[0]->description="Profesores no-borrar";
    $teachers[0]->ldapdata['description']="Profesores no-borrar";
    $teachers[0]->save( array('description') );
    echo " * El grupo Teachers (profesores) ya existe.\n";
}

// crear grupo de TICS
$tics=$ldap->get_groups(TICS, $include_system=true);
if ( ! isset($tics[0]) ) {
    $group = new GROUP( array('cn' => TICS ) );
    /* newGroup($createshared, $readonly, $grouptype=2) */
    $group->newGroup('0', '0');
    $group->description="Coordinadores TIC no-borrar";
    $group->ldapdata['description']="Coordinadores TIC no-borrar";
    $group->save( array('description') );
    echo " * Creado grupo Coordinadores TIC (TICS).\n";
}
else {
    /*$tics[0]->description="Coordinadores TIC no-borrar";
    $tics[0]->ldapdata['description']="Coordinadores TIC no-borrar";
    $tics[0]->save( array('description') );*/
    echo " * El grupo Coordinadores TIC (TICS) ya existe.\n";
}

// crear grupo de TICS
$installators=$ldap->get_groups(INSTALLATORS, $include_system=true);
if ( ! isset($installators[0]) ) {
    $group = new GROUP( array('cn' => INSTALLATORS ) );
    /* newGroup($createshared, $readonly, $grouptype=2) */
    $group->newGroup('0', '0');
    $group->description="Instaladores no-borrar";
    $group->ldapdata['description']="Instaladores no-borrar";
    $group->save( array('description') );
    echo " * Creado grupo Instaladores (INSTALLATORS).\n";
}
else {
    /*$installators[0]->description="Instaladores no-borrar";
    $installators[0]->ldapdata['description']="Instaladores no-borrar";
    $installators[0]->save( array('description') );*/
    echo " * El grupo Instaladores (INSTALLATORS) ya existe.\n";
}

// crear max-control
$user=$ldap->get_user($LDAP_ADMIN);
if ( ! $user ) {
    // user not exists, create it
    $new=array(
            "uid" => $LDAP_ADMIN,
            "cn" => $LDAP_ADMIN,
            "sn" => "admin-no-borrar",
            "description" => "Usuario administrador creado para uso del panel max-control",
            "password" => $LDAP_PASS,
            "role" => "admin",
            "loginshell" => "/bin/bash"
            );
    $user = new USER( $new );
    $user->newUser();
    echo " * Usuario 'max-control' creado.\n";
}
else {
    //change password
    echo " * Usuario 'max-control' actualizado.\n";
    //$gui->debuga( $user->show() );
    $user->update_password($LDAP_PASS, $LDAP_ADMIN);
    // forzar a ser admin para estar en INSTALLATORS
    $user->set_role("admin");
}



$extra=file_get_contents('conf.inc.php.init');
$extra = str_replace ( "<?php" , "" , $extra );
$extra = str_replace ( "<?" , "" , $extra );
$extra = str_replace ( "?>" , "" , $extra );
$out="<?php
/* file autogenerated with init.php */


/* domain (net getdomainsid) */
define('LDAP_DOMAIN', '$LDAP_DOMAIN');

/* ldap admin from /etc/ldap.conf and /etc/ldap.secret */
define('LDAP_BINDDN', '$LDAP_BINDDN');
define('LDAP_BINDPW', '$LDAP_BINDPW');

/* usuario creado por max-control */
define('LDAP_ADMIN', '$LDAP_ADMIN');
define('LDAP_PASS', '$LDAP_PASS');

define('LDAP_BASEDN', '$LDAP_BASEDN');

define('CONFIGURED', True);


/********************************************/
// entidades organizativas del dominio
// para EBOX estas son las que se usan por defecto
define('LDAP_OU_COMPUTERS', 'ou=Computers,$LDAP_BASEDN');
define('LDAP_OU_USERS', 'ou=Users,$LDAP_BASEDN');
define('LDAP_OU_GROUPS', 'ou=Groups,$LDAP_BASEDN');

// Domain Admins
define('LDAP_OU_DADMINS', 'cn=Domain Admins,ou=Groups,$LDAP_BASEDN');

// Administrators
define('LDAP_OU_ADMINS', 'cn=Administrators,ou=Groups,$LDAP_BASEDN');

// si no existe crearlo con EBOX
define('TEACHERS', 'Teachers');
define('LDAP_OU_TEACHERS', 'cn=Teachers,ou=Groups,$LDAP_BASEDN');
define('LDAP_OU_DUSERS', 'cn=Domain Users,ou=Groups,$LDAP_BASEDN');
define('TICS', 'CoordinadoresTIC');
define('LDAP_OU_TICS', 'cn=CoordinadoresTIC,ou=Groups,$LDAP_BASEDN');
define('INSTALLATORS', 'Instaladores');
define('LDAP_OU_INSTALLATORS', 'cn=Instaladores,ou=Groups,$LDAP_BASEDN');


$extra
?>";




$config = "/etc/max-control/conf.inc.php";
$fh = fopen($config, 'w');
fwrite($fh, $out);
fclose($fh);


