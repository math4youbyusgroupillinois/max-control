

<h3>Configurar el arranque del equipo <u>{$u->hostname()}</u></h3>
<h2>Pertenece al aula '{$u->attr('sambaProfilePath')}'</h2>
<form action='{$urlform}' method='post'> 
    <table class='formTable'> 

    
    <tr> 
        <td class='tright'><span class="ftitle">Archivo de arranque:</span></td>
        <td> 
            <select name='boot' id='boot' > 
                <option value=''></option> 
                {foreach from=$tipos key=k item=o}
                <option value='{$k}' {if $k == 'aula'}selected{/if}>{$o} {if $k == 'aula'}({$u->attr('sambaProfilePath')}){/if}</option>
                {/foreach}
            </select> 
            
        </td> 
    </tr> 

    <tr> 
        <td class='tright'><span class="ftitle">Reiniciar equipo:</span></td>
        <td> <input type='checkbox' class='inputText' name='reboot' value='1' /></td> 
    </tr> 

    <tr> 
        <td></td> 
        <td> 
        <input class='inputButton' type='submit' name='Guardar' value="Guardar" alt="Guardar" /> 
        <input type='hidden' name='hostname' value='{$u->hostname()}' />
        </td> 
    </tr>

    </table> 
    </form> 


{*
{if $pruebas}
{debug}
{/if}
*}