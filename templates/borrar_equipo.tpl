<h2>Borrar equipo</h2>

<form action='{$urlaction}' method='post'> 
    <div class="warning">
     <h2>Se van a borrar los equipos</h2>
     
        <ul>
        {foreach from=$equiposarray item=k}
            <li>{$k}</li>
        {/foreach}
        </ul>
     
     <h4>Esta operación no se puede deshacer</h4>
     <br/><br/>
     
     <input type='hidden' name='equipos' value='{$equipos}' />
     
     <input class='inputButton' type='submit' name='confirm' value="Confirmar" alt="Confirmar" />
    </div>
</form>



{if $DEBUG}
{debug}
{/if}
