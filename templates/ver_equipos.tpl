
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Listado de equipos ({$pager->getMAX()})</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <div class="row">

                    <div class="col-lg-6">
                        <form class="form-inline" id="hosts" action="{$urlform}" method="post"> 
                          <input class="form-group form-group form-control" placeholder="Buscar" type='text' name='Filter' id='Filter' value="{$filter}" /> 
                          <input type='hidden' name='role' id="role" value='{$role}' />
                          
                          <button type="submit" class="btn btn-primary">Buscar</button>
                          <a href="{$urlupdate}" class="btn btn-warning" >Actualizar MAC e IP de todos</a>

                          <input type='hidden' name='aula' id="aula" value='{$aula}' />
                          
                        </form>


                    </div>
                    <div class="col-lg-6 text-right pull-right" >
                        <a class="btn btn-danger" style="display:none;" type='button' name='btnDelete' id='btnDelete' onclick="javascript:deleteSelected();"/>Borrar seleccionados</a>
                    </div>

                </div>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre {$pager->getSortIcons('cn')}</th> 
                                <th class="hidden-xs">IP {$pager->getSortIcons('ipHostNumber')} / MAC {$pager->getSortIcons('macAddress')}</th>

                                <th class="hidden-xs form-group form-inline">Aula {$pager->getSortIcons('aula')} 
                                    <select class="form-control" name='selectaula' id='selectaula' onchange="javascript:aulaFilter(this);">
                                      <option value='' {if $aula == ''}selected='selected'{/if}>----------</option>
                                      {foreach from=$aulas key=k item=u}
                                      <option value='{$u}' {if $aula == $u}selected='selected'{/if}>{$u}</option>
                                      {/foreach}
                                    </select>
                                </th> 
                                
                                <th>Estado</th> 
                                <th>Borrar <input title='Seleccionar todos los visibles' class="nomargin" type='checkbox' onchange="javascript:enableAll(this);"/></th>
                            </tr>
                        </thead>
                        <tbody>
                    
                    {foreach from=$equipos key=k item=u}
                        <tr class='border' id="computer-{$u->hostname()}"> 
                          <td class='text-center'>
                            {$u->cn}

                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle btn btn-info" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown" data-data='{$u|@json_encode}'>
                                    <li class="visible-xs">IP: {$u->ipHostNumber}</li>
                                    <li class="visible-xs">MAC: {$u->macAddress}</li>
                                    <li class="visible-xs">Aula: {$u->aula}</li>
                                    <li class="visible-xs divider"></li>
                                    <li><a href="{$urleditar}/{$u->cn}"><i class="fa fa-edit fa-fw"></i> Editar</a></li>
                                    <li><a href="{$urlborrar}?hostnames={$u->cn}"><i class="fa fa-trash-o fa-fw"></i> Borrar</a></li>
                                </ul>
                            </div>

                        </td> 
                          <td class='text-center hidden-xs'>{$u->ipHostNumber} / {$u->macAddress}</td> 
                          <td class='text-center hidden-xs'>{$u->aula}</td>
                          <td class='text-center'> 
                              <img src="{$baseurl}/status.php?hostname={$u->hostname()}&amp;rnd={$u->rnd()}" alt="calculando..." />
                          </td>
                          {*<td class='text-center'> 
                              <a href="{$urleditar}/{$u->hostname()}"><img src="{$baseurl}/img/edit-table.gif" alt="editar" /></a>
                          </td>*}
                          <td class='text-center'> 
                              <input type='checkbox' class="hostdel" name="{$u->cn}" id="{$u->cn}" onchange="javascript:oncheckboxChange();"/>
                          </td>
                        </tr>
                    {/foreach}

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

                {if $pager->needPager()}
                    <div class="well">
                    {$pager->getHTML()}
                    </div>
                {/if}

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->


<form id="formdeletemultiplehost" name="formdeletemultiplehost" action="{$urlborrar}" method="post">
    <input type='hidden' name='hostnames' id="hostnames" value='' />
</form>



{literal}
<script type="text/javascript">
<!--

function oncheckboxChange() {
    var multiple=false;
    var toDelete=new Array();
    $.each($('.hostdel'), function(i) { 
        if ($('.hostdel')[i].checked) {
            toDelete.push($('.hostdel')[i].id);
            multiple=true;
        }
    });
    if(multiple)
        $('#btnDelete').show();
    else
        $('#btnDelete').hide();
}

function deleteSelected(){
    var toDelete=new Array();
    $.each($('.hostdel'), function(i) { 
        if ($('.hostdel')[i].checked) {
            toDelete.push($('.hostdel')[i].id);
            multiple=true;
        }
    });
    $('#hostnames')[0].value=toDelete;
    $('#formdeletemultiplehost')[0].submit();
}

function enableAll(obj){
    $.each($('.hostdel'), function(i) { 
        $('.hostdel')[i].checked=obj.checked;
    });
    if(obj.checked)
        $('#btnDelete').show();
    else
        $('#btnDelete').hide();
}

function aulaFilter(obj) {
    $('#aula')[0].value=obj.value;
    document.forms.hosts.submit();
}
-->
</script>
{/literal}

