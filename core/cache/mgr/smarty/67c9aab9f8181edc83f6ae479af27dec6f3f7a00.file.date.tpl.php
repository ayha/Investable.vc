<?php /* Smarty version Smarty-3.0.4, created on 2014-11-04 10:05:44
         compiled from "/var/www/vhosts/v2.investable.vc/html/manager/templates/default/element/tv/renders/inputproperties/date.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118063257254583478d1b039-21969818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67c9aab9f8181edc83f6ae479af27dec6f3f7a00' => 
    array (
      0 => '/var/www/vhosts/v2.investable.vc/html/manager/templates/default/element/tv/renders/inputproperties/date.tpl',
      1 => 1413175646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118063257254583478d1b039-21969818',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/www/vhosts/v2.investable.vc/html/core/model/smarty/plugins/modifier.escape.php';
?><div id="tv-input-properties-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
"></div>


<script type="text/javascript">
// <![CDATA[
var params = {
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('params')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
if ($_smarty_tpl->tpl_vars['v']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['p']['last'] = $_smarty_tpl->tpl_vars['v']->last;
?>
 '<?php echo (isset($_smarty_tpl->tpl_vars['k']->value) ? $_smarty_tpl->tpl_vars['k']->value : null);?>
': '<?php echo smarty_modifier_escape((isset($_smarty_tpl->tpl_vars['v']->value) ? $_smarty_tpl->tpl_vars['v']->value : null),"javascript");?>
'<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['p']['last']){?>,<?php }?>
<?php }} ?>
};
var oc = {'change':{fn:function(){Ext.getCmp('modx-panel-tv').markDirty();},scope:this}};
MODx.load({
    xtype: 'panel'
    ,layout: 'form'
    ,autoHeight: true
    ,cls: 'form-with-labels'
    ,border: false
    ,labelAlign: 'top'
    ,items: [{
        xtype: 'combo-boolean'
        ,fieldLabel: _('required')
        ,description: MODx.expandHelp ? '' : _('required_desc')
        ,name: 'inopt_allowBlank'
        ,hiddenName: 'inopt_allowBlank'
        ,id: 'inopt_allowBlank<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: !(params['allowBlank'] == 0 || params['allowBlank'] == 'false')
        ,width: 200
        ,listeners: oc
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_allowBlank<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('required_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('disabled_dates')
        ,description: MODx.expandHelp ? '' : _('disabled_dates_desc')
        ,name: 'inopt_disabledDates'
        ,id: 'inopt_disabledDates<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['disabledDates'] || ''
        ,anchor: '98%'
        ,listeners: oc
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_disabledDates<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('disabled_dates_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('disabled_days')
        ,description: MODx.expandHelp ? '' : _('disabled_days_desc')
        ,name: 'inopt_disabledDays'
        ,id: 'inopt_disabledDays<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['disabledDays'] || ''
        ,anchor: '98%'
        ,listeners: oc
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_disabledDays<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('disabled_days_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'datefield'
        ,fieldLabel: _('earliest_date')
        ,description: MODx.expandHelp ? '' : _('earliest_date_desc')
        ,name: 'inopt_minDateValue'
        ,id: 'inopt_minDateValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['minDateValue'] || ''
        ,width: 200
        ,listeners: oc
        ,format: MODx.config.manager_date_format
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_minDateValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('earliest_date_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'timefield'
        ,fieldLabel: _('earliest_time')
        ,description: MODx.expandHelp ? '' : _('earliest_time_desc')
        ,name: 'inopt_minTimeValue'
        ,id: 'inopt_minTimeValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['minTimeValue'] || ''
        ,width: 200
        ,listeners: oc
        ,format: MODx.config.manager_time_format
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_minTimeValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('earliest_time_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'datefield'
        ,fieldLabel: _('latest_date')
        ,description: MODx.expandHelp ? '' : _('latest_date_desc')
        ,name: 'inopt_maxDateValue'
        ,id: 'inopt_maxDateValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['maxDateValue'] || ''
        ,width: 200
        ,listeners: oc
        ,format: MODx.config.manager_date_format
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_maxDateValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('latest_date_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'timefield'
        ,fieldLabel: _('latest_time')
        ,description: MODx.expandHelp ? '' : _('latest_time_desc')
        ,name: 'inopt_maxTimeValue'
        ,id: 'inopt_maxTimeValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['maxTimeValue'] || ''
        ,width: 200
        ,listeners: oc
        ,format: MODx.config.manager_time_format
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_maxTimeValue<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('latest_time_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('start_day')
        ,description: MODx.expandHelp ? '' : _('start_day_desc')
        ,name: 'inopt_startDay'
        ,id: 'inopt_startDay<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['startDay'] || ''
        ,width: 100
        ,listeners: oc
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_startDay<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('start_day_desc')
        ,cls: 'desc-under'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('time_increment')
        ,description: MODx.expandHelp ? '' : _('time_increment_desc')
        ,name: 'inopt_timeIncrement'
        ,id: 'inopt_timeIncrement<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,value: params['timeIncrement'] || ''
        ,width: 100
        ,listeners: oc
    },{
        xtype: MODx.expandHelp ? 'label' : 'hidden'
        ,forId: 'inopt_timeIncrement<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
        ,html: _('time_increment_desc')
        ,cls: 'desc-under'
    }]
    ,renderTo: 'tv-input-properties-form<?php echo $_smarty_tpl->getVariable('tv')->value;?>
'
});
// ]]>
</script>

