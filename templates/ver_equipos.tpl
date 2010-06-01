
<h2>Listado de equipos</h2>



<table class="bDataTable"> 
    <tr> 
        <td> 
        <form id="hosts" action="{$urlform}" method="post"> 
          <input type='text' name='Filter' id='Filter' value="{$filter}" /> 
          <input type='submit' name='button' value="Buscar" title="Buscar" /> 
          <input type='submit' name='button' value="Actualizar MAC e IP de todos" title="Actualizar todos" onclick="javascript:update();" />
          <input type='hidden' id="faction" name='faction' value='search' />
        </form>
        </td> 
    </tr> 
</table> 


<table class='dataTable'> 
    <thead> 
    <tr>
      <th class=''>Nombre</th> 
      <th class=''>IP / MAC</th> 
      <th class=''>Aula</th> 
      <th class=''>Editar</th> 
    </tr>
    </thead>
 
 
    <tbody> 
      {foreach from=$equipos key=k item=u}
      <tr class='border' id="{$u->hostname()}"> 
        <td class='tcenter'><span>{$u->attr('uid')}</span></td> 
        <td class='tcenter'><span>{$u->attr('ipHostNumber')} / {$u->attr('macAddress')}</span></td> 
        <td class='tcenter'><span>{$u->attr('sambaProfilePath')}</span></td>
        <td class='tcenter'> 
            <a href="{$urleditar}/{$u->hostname()}"><img src="{$baseurl}/img/edit-table.gif" alt="editar" /></a>
        </td>
      </tr>
      {/foreach}

    </tbody> 
</table> 

{literal}
<script type="text/javascript">
function update() {
    $('#faction')[0].value='update';
    $('#hosts')[0].submit();
}
</script>
{/literal}

{*
{if $pruebas}
{debug}
{/if}
*}
