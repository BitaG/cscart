<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:29:05
         compiled from "/var/www/html/design/backend/templates/views/companies/components/company_status_switcher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:805209275c361341224213-99255451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '909cfcc84a838b3bfc99819d47e87fde1cadac80' => 
    array (
      0 => '/var/www/html/design/backend/templates/views/companies/components/company_status_switcher.tpl',
      1 => 1545828838,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '805209275c361341224213-99255451',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'config' => 0,
    'checked' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c36134122bd58_89910661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c36134122bd58_89910661')) {function content_5c36134122bd58_89910661($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_enum')) include '/var/www/html/app/functions/smarty_plugins/modifier.enum.php';
?><div class="switch switch-mini cm-switch list-btns company-switch-storefront-status-button" data-ca-company-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
" data-ca-opened-status="<?php echo htmlspecialchars(smarty_modifier_enum("StorefrontStatuses::OPENED"), ENT_QUOTES, 'UTF-8');?>
" data-ca-closed-status="<?php echo htmlspecialchars(smarty_modifier_enum("StorefrontStatuses::CLOSED"), ENT_QUOTES, 'UTF-8');?>
" data-ca-return-url="<?php echo htmlspecialchars(rawurlencode($_smarty_tpl->tpl_vars['config']->value['current_url']), ENT_QUOTES, 'UTF-8');?>
" id="switch_storefront_status_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['company']->value['company_id'], ENT_QUOTES, 'UTF-8');?>
">
    <?php $_smarty_tpl->tpl_vars['checked'] = new Smarty_variable($_smarty_tpl->tpl_vars['company']->value['storefront_status']==smarty_modifier_enum("StorefrontStatuses::OPENED"), null, 0);?>
    <input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['checked']->value) {?> checked="checked"<?php }?>/>
</div>
<?php }} ?>
