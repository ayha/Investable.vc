<?php /* Smarty version Smarty-3.0.4, created on 2014-10-24 17:10:02
         compiled from "/var/www/vhosts/v2.investable.vc/html/manager/templates/default/element/tv/renders/input/richtext.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1527470465544a176a462f80-57244987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2a05c47ac133335f4b7ee41e94df8764ed5fd8d' => 
    array (
      0 => '/var/www/vhosts/v2.investable.vc/html/manager/templates/default/element/tv/renders/input/richtext.tpl',
      1 => 1413175645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1527470465544a176a462f80-57244987',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/vhosts/v2.investable.vc/html/core/model/smarty/plugins/modifier.escape.php';
?><textarea id="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" name="tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
" class="modx-richtext" onchange="MODx.fireResourceFormChange();"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('tv')->value->get('value'));?>
</textarea>

<script type="text/javascript">

Ext.onReady(function() {
    
    MODx.makeDroppable(Ext.get('tv<?php echo $_smarty_tpl->getVariable('tv')->value->id;?>
'));
    
});
</script>