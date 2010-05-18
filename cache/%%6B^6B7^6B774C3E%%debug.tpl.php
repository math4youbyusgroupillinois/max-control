<?php /* Smarty version 2.6.22, created on 2010-05-18 12:51:06
         compiled from debug.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'assign_debug_info', 'debug.tpl', 5, false),array('modifier', 'escape', 'debug.tpl', 23, false),array('modifier', 'string_format', 'debug.tpl', 26, false),array('modifier', 'debug_print_var', 'debug.tpl', 46, false),)), $this); ?>


<?php echo smarty_function_assign_debug_info(array(), $this);?>


    

	<table class="debug_table">
	<tr class="debug_tr" >
	    <th colspan=2>Smarty Debug Console</th>
	</tr>
	
	<tr class="debug_tr">
	    <td colspan='2'><b>included templates &amp; config files (load time in seconds):</b></td>
	</tr>
	
	<?php unset($this->_sections['templates']);
$this->_sections['templates']['name'] = 'templates';
$this->_sections['templates']['loop'] = is_array($_loop=$this->_tpl_vars['_debug_tpls']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['templates']['show'] = true;
$this->_sections['templates']['max'] = $this->_sections['templates']['loop'];
$this->_sections['templates']['step'] = 1;
$this->_sections['templates']['start'] = $this->_sections['templates']['step'] > 0 ? 0 : $this->_sections['templates']['loop']-1;
if ($this->_sections['templates']['show']) {
    $this->_sections['templates']['total'] = $this->_sections['templates']['loop'];
    if ($this->_sections['templates']['total'] == 0)
        $this->_sections['templates']['show'] = false;
} else
    $this->_sections['templates']['total'] = 0;
if ($this->_sections['templates']['show']):

            for ($this->_sections['templates']['index'] = $this->_sections['templates']['start'], $this->_sections['templates']['iteration'] = 1;
                 $this->_sections['templates']['iteration'] <= $this->_sections['templates']['total'];
                 $this->_sections['templates']['index'] += $this->_sections['templates']['step'], $this->_sections['templates']['iteration']++):
$this->_sections['templates']['rownum'] = $this->_sections['templates']['iteration'];
$this->_sections['templates']['index_prev'] = $this->_sections['templates']['index'] - $this->_sections['templates']['step'];
$this->_sections['templates']['index_next'] = $this->_sections['templates']['index'] + $this->_sections['templates']['step'];
$this->_sections['templates']['first']      = ($this->_sections['templates']['iteration'] == 1);
$this->_sections['templates']['last']       = ($this->_sections['templates']['iteration'] == $this->_sections['templates']['total']);
?>
		<tr class="<?php if (!(1 & $this->_sections['templates']['index'])): ?>even<?php else: ?>not_even<?php endif; ?>">
		    <td colspan='2'>
		        <tt><?php unset($this->_sections['indent']);
$this->_sections['indent']['name'] = 'indent';
$this->_sections['indent']['loop'] = is_array($_loop=$this->_tpl_vars['_debug_tpls'][$this->_sections['templates']['index']]['depth']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['indent']['show'] = true;
$this->_sections['indent']['max'] = $this->_sections['indent']['loop'];
$this->_sections['indent']['step'] = 1;
$this->_sections['indent']['start'] = $this->_sections['indent']['step'] > 0 ? 0 : $this->_sections['indent']['loop']-1;
if ($this->_sections['indent']['show']) {
    $this->_sections['indent']['total'] = $this->_sections['indent']['loop'];
    if ($this->_sections['indent']['total'] == 0)
        $this->_sections['indent']['show'] = false;
} else
    $this->_sections['indent']['total'] = 0;
if ($this->_sections['indent']['show']):

            for ($this->_sections['indent']['index'] = $this->_sections['indent']['start'], $this->_sections['indent']['iteration'] = 1;
                 $this->_sections['indent']['iteration'] <= $this->_sections['indent']['total'];
                 $this->_sections['indent']['index'] += $this->_sections['indent']['step'], $this->_sections['indent']['iteration']++):
$this->_sections['indent']['rownum'] = $this->_sections['indent']['iteration'];
$this->_sections['indent']['index_prev'] = $this->_sections['indent']['index'] - $this->_sections['indent']['step'];
$this->_sections['indent']['index_next'] = $this->_sections['indent']['index'] + $this->_sections['indent']['step'];
$this->_sections['indent']['first']      = ($this->_sections['indent']['iteration'] == 1);
$this->_sections['indent']['last']       = ($this->_sections['indent']['iteration'] == $this->_sections['indent']['total']);
?>&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?>
		        <span class='<?php if ($this->_tpl_vars['_debug_tpls'][$this->_sections['templates']['index']]['type'] == 'template'): ?>brown<?php elseif ($this->_tpl_vars['_debug_tpls'][$this->_sections['templates']['index']]['type'] == 'insert'): ?>black<?php else: ?>green<?php endif; ?>'>
		        <?php echo ((is_array($_tmp=$this->_tpl_vars['_debug_tpls'][$this->_sections['templates']['index']]['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
		        
		        <?php if (isset ( $this->_tpl_vars['_debug_tpls'][$this->_sections['templates']['index']]['exec_time'] )): ?> 
		        <small><i>(<?php echo ((is_array($_tmp=$this->_tpl_vars['_debug_tpls'][$this->_sections['templates']['index']]['exec_time'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.5f") : smarty_modifier_string_format($_tmp, "%.5f")); ?>
)<?php if ($this->_sections['templates']['index'] == 0): ?> (total)<?php endif; ?></i></small><?php endif; ?></tt>
		    </td>
		</tr>
	<?php endfor; else: ?>
		<tr class="even">
		    <td colspan='2'><tt><i>no templates included</i></tt></td>
		</tr>	
	<?php endif; ?>
	
	
	<tr class="debug_tr">
	    <td colspan='2'><b>assigned template variables:</b></td>
	</tr>
	
	<?php unset($this->_sections['vars']);
$this->_sections['vars']['name'] = 'vars';
$this->_sections['vars']['loop'] = is_array($_loop=$this->_tpl_vars['_debug_keys']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vars']['show'] = true;
$this->_sections['vars']['max'] = $this->_sections['vars']['loop'];
$this->_sections['vars']['step'] = 1;
$this->_sections['vars']['start'] = $this->_sections['vars']['step'] > 0 ? 0 : $this->_sections['vars']['loop']-1;
if ($this->_sections['vars']['show']) {
    $this->_sections['vars']['total'] = $this->_sections['vars']['loop'];
    if ($this->_sections['vars']['total'] == 0)
        $this->_sections['vars']['show'] = false;
} else
    $this->_sections['vars']['total'] = 0;
if ($this->_sections['vars']['show']):

            for ($this->_sections['vars']['index'] = $this->_sections['vars']['start'], $this->_sections['vars']['iteration'] = 1;
                 $this->_sections['vars']['iteration'] <= $this->_sections['vars']['total'];
                 $this->_sections['vars']['index'] += $this->_sections['vars']['step'], $this->_sections['vars']['iteration']++):
$this->_sections['vars']['rownum'] = $this->_sections['vars']['iteration'];
$this->_sections['vars']['index_prev'] = $this->_sections['vars']['index'] - $this->_sections['vars']['step'];
$this->_sections['vars']['index_next'] = $this->_sections['vars']['index'] + $this->_sections['vars']['step'];
$this->_sections['vars']['first']      = ($this->_sections['vars']['iteration'] == 1);
$this->_sections['vars']['last']       = ($this->_sections['vars']['iteration'] == $this->_sections['vars']['total']);
?>
		<tr class="<?php if (!(1 & $this->_sections['vars']['index'])): ?>even<?php else: ?>not_even<?php endif; ?>">
		    <td valign=top>
		        <tt><span class="blue">{$<?php echo $this->_tpl_vars['_debug_keys'][$this->_sections['vars']['index']]; ?>
}</span></tt>
		    </td>
		    <td>
		        <tt><span class="green"><?php echo smarty_modifier_debug_print_var($this->_tpl_vars['_debug_vals'][$this->_sections['vars']['index']]); ?>
</span></tt>
		    </td>
		</tr>
		
	<?php endfor; else: ?>
		<tr class="even">
		    <td colspan='2'>
		        <tt><i>no template variables assigned</i></tt>
		    </td>
		</tr>	
	<?php endif; ?>
	
	
	<tr class="debug_tr">
	    <td colspan='2'><b>assigned config file variables (outer template scope):</b></td>
	</tr>
	
	<?php unset($this->_sections['config_vars']);
$this->_sections['config_vars']['name'] = 'config_vars';
$this->_sections['config_vars']['loop'] = is_array($_loop=$this->_tpl_vars['_debug_config_keys']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['config_vars']['show'] = true;
$this->_sections['config_vars']['max'] = $this->_sections['config_vars']['loop'];
$this->_sections['config_vars']['step'] = 1;
$this->_sections['config_vars']['start'] = $this->_sections['config_vars']['step'] > 0 ? 0 : $this->_sections['config_vars']['loop']-1;
if ($this->_sections['config_vars']['show']) {
    $this->_sections['config_vars']['total'] = $this->_sections['config_vars']['loop'];
    if ($this->_sections['config_vars']['total'] == 0)
        $this->_sections['config_vars']['show'] = false;
} else
    $this->_sections['config_vars']['total'] = 0;
if ($this->_sections['config_vars']['show']):

            for ($this->_sections['config_vars']['index'] = $this->_sections['config_vars']['start'], $this->_sections['config_vars']['iteration'] = 1;
                 $this->_sections['config_vars']['iteration'] <= $this->_sections['config_vars']['total'];
                 $this->_sections['config_vars']['index'] += $this->_sections['config_vars']['step'], $this->_sections['config_vars']['iteration']++):
$this->_sections['config_vars']['rownum'] = $this->_sections['config_vars']['iteration'];
$this->_sections['config_vars']['index_prev'] = $this->_sections['config_vars']['index'] - $this->_sections['config_vars']['step'];
$this->_sections['config_vars']['index_next'] = $this->_sections['config_vars']['index'] + $this->_sections['config_vars']['step'];
$this->_sections['config_vars']['first']      = ($this->_sections['config_vars']['iteration'] == 1);
$this->_sections['config_vars']['last']       = ($this->_sections['config_vars']['iteration'] == $this->_sections['config_vars']['total']);
?>
		<tr class="<?php if (!(1 & $this->_sections['vars']['index'])): ?>even<?php else: ?>not_even<?php endif; ?>">
		    <td valign=top>
		        <tt><span class="brown">{#<?php echo $this->_tpl_vars['_debug_config_keys'][$this->_sections['config_vars']['index']]; ?>
#}</span></tt>
		    </td>
		    
		    <td>
		        <tt><span class="green"><?php echo smarty_modifier_debug_print_var($this->_tpl_vars['_debug_config_vals'][$this->_sections['config_vars']['index']]); ?>
</span></tt>
		    </td>
	    </tr>
	    
	<?php endfor; else: ?>
		<tr class="even"><td colspan=2><tt><i>no config vars assigned</i></tt></td></tr>	
	<?php endif; ?>
	
	</table>
	
</body>	
</html>