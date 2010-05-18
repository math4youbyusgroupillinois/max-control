<?php /* Smarty version 2.6.22, created on 2010-05-18 09:30:43
         compiled from ver_usuarios.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'debug', 'ver_usuarios.tpl', 42, false),)), $this); ?>

<h2>Listado de usuarios</h2>



<table class="bDataTable"> 
    <tr> 
        <td> 
        <form action="<?php echo $this->_tpl_vars['urlform']; ?>
" method="post"> 
          <input type='text' name='Filter' id='Filter' value="<?php echo $this->_tpl_vars['filter']; ?>
" /> 
          <input type='submit' name='button' value="Buscar" title="Buscar" /> 
        </form>
        </td> 
    </tr> 
</table> 


<table class='dataTable'> 
    <thead> 
      <th class=''>Nombre</th> 
      <th class=''>Nombre completo</th> 
      <th class=''>Editar</th> 
    </thead>
 
 
    <tbody> 
      <?php $_from = $this->_tpl_vars['usuarios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['u']):
?>
      <tr class='border' id="<?php echo $this->_tpl_vars['u']->attr('uid'); ?>
"> 
        <td class='tcenter'><span><?php echo $this->_tpl_vars['u']->attr('uid'); ?>
</span></td> 
        <td class='tcenter'><span><?php echo $this->_tpl_vars['u']->attr('cn'); ?>
</span></td> 
        <td class='tcenter'> 
            <a href="<?php echo $this->_tpl_vars['urleditar']; ?>
/<?php echo $this->_tpl_vars['u']->attr('uid'); ?>
"><img src="<?php echo $this->_tpl_vars['baseurl']; ?>
/img/edit-table.gif"></a>
        </td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>

    </tbody> 
</table> 


<?php if ($this->_tpl_vars['pruebas']): ?>
<?php echo smarty_function_debug(array(), $this);?>

<?php endif; ?>
