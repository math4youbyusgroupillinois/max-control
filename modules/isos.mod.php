<?php


/*
*
*  Modulo isos
*
*/
global $gui;
global $permisos;
global $site;
global $module_actions;

$url=new URLHandler();

if ( ! $permisos->is_connected() ) {
    $url->ir("","");
}

if ( $permisos->get_rol() == '' ) {
    $gui->session_error("No es profesor o administrador para acceder al módulo ISOS");
    $url->ir("", "");
}




$module=$url->get("module");
$action=$url->get("action");
$subaction=$url->get("subaction");

$module_actions=array(
        "ver" => "Ver ISOS",
        #"aula" => "Por aulas",
        #"config" => "Configurar tipos de arranque",
);


/*************************************************************/
function ver($module, $action, $subaction) {
    global $gui, $url;
    
    // mostrar lista de equipos
    $ldap=new LDAP();
    $filter=leer_datos('Filter');
    
    $isos=$ldap->getISOS($filter);
    
    $urlform=$url->create_url($module, $action);
    $urlmontar=$url->create_url($module,'montar');
    
    $data=array("isos" => $isos, 
                "filter" => $filter, 
                "urlform" => $urlform, 
                "urlmontar"=>$urlmontar);
    $gui->add( $gui->load_from_template("ver_isos.tpl", $data) );
}

function montar($module, $action, $subaction) {
    global $gui, $url;
    
    // mostrar lista de equipos
    $ldap=new LDAP();
    $iso=$subaction;
    
    $isos=$ldap->getISOS($iso);
    $aulas=$ldap->get_aulas();
    $equipos=$ldap->get_computers();
    
    $urlform=$url->create_url($module, 'mountdo');
    
    $data=array("iso" => $iso,
                "isos" => $isos, 
                "aulas" => $aulas,
                "computers"=> $equipos,
                "filter" => $filter, 
                "urlform" => $urlform, 
                "urlmontar"=>$urlmontar);
    
    $gui->add( $gui->load_from_template("montar_iso.tpl", $data) );
}


function mountdo($module, $action, $subaction) {
    global $gui, $url;
    
    $iso=leer_datos('iso');
    $ldap=new LDAP();
    $gui->debug( "<pre>" . print_r($_POST,true) . "</pre>");
    /*
    Array
    (
        [aula] => aula primaria 3
        [Montar_en_el_aula] => Montar en el aula
        [iso] => test.iso
    )
    */
    $aula=leer_datos('aula');
    /*
    Array
    (
        [equipo] => wxp64
        [Montar_en_el_equipo] => Montar en el equipo
        [iso] => test.iso
    )
    */
    $equipo=leer_datos('equipo');
    
    if ($aula != '') {
        $equipos=$ldap->get_computers_from_aula($aula);
        $gui->debuga($equipos);
        if ( count($equipos) == 0 ) {
            $gui->session_error("El aula no tiene equipos.");
        }
        foreach ($equipos as $c) {
            if ( $c->exe->is_alive() ) {
                $gui->debug("Montando(".$computer->hostname()."), time: ". time_end() );
                $computer->exe->mount($iso);
                $gui->session_info("Montado $iso en ".$c->hostname());
                $gui->debug("Montado(".$computer->hostname()."), time: ". time_end() );
            }
            else {
                $gui->session_error("No se puede realizar la acción solicitada en '".$c->hostname()."', el equipo está apagado");
            }
        }
        if(!DEBUG)
            $url->ir($module, "ver");
    }
    
    elseif ($equipo != '') {
        $equipos=$ldap->get_computers($equipo . '$');
        if ( count($equipos) == 0 ) {
            $gui->session_error("Equipo '$equipo' no encontrado.");
        }
        if ( $equipos[0]->exe->is_alive() ) {
            $gui->debug("Montando(".$equipos[0]->hostname()."), time: ". time_end() );
            $equipos[0]->exe->mount($iso);
            $gui->debug("Montado(".$equipos[0]->hostname()."), time: ". time_end() );
            $gui->session_info("Montado $iso en ".$equipos[0]->hostname());
        }
        else {
            $gui->session_error("No se puede realizar la acción solicitada en '".$equipos[0]->hostname()."', el equipo está apagado");
        }
        if(!DEBUG)
            $url->ir($module, "ver");
    }
    else {
        $gui->session_error("Acción desconocida.");
        if(!DEBUG)
            $url->ir($module, "ver");
    }
}


//$gui->session_info("Accion '$action' en modulo '$module'");
switch($action) {
    case "": $url->ir($module, "ver"); break;
    case "ver": ver($module, $action, $subaction); break;
    case "montar": montar($module, $action, $subaction); break;
    case "mountdo": mountdo($module, $action, $subaction); break;
    
    
    default: $gui->session_error("Accion desconocida '$action' en modulo $module");
}

?>
