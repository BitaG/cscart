<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:13:15
         compiled from "/var/www/html/design/themes/responsive/templates/addons/yandex_delivery/hooks/index/scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7129078515c360f8b039f02-72689386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93be9786adef0c329c9a7d9cb3dab00f8de0be92' => 
    array (
      0 => '/var/www/html/design/themes/responsive/templates/addons/yandex_delivery/hooks/index/scripts.post.tpl',
      1 => 1547046481,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '7129078515c360f8b039f02-72689386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'addons' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c360f8b048ba3_21283342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c360f8b048ba3_21283342')) {function content_5c360f8b048ba3_21283342($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/app/functions/smarty_plugins/function.script.php';
if (!is_callable('smarty_function_set_id')) include '/var/www/html/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['addons']->value['yandex_delivery']['autocomplete']=="Y") {?>
    <?php echo smarty_function_script(array('src'=>"js/addons/yandex_delivery/autocomplete.js"),$_smarty_tpl);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['addons']->value['yandex_delivery']['autopostcode']=="Y") {?>
    <?php echo smarty_function_script(array('src'=>"js/addons/yandex_delivery/postcode.js"),$_smarty_tpl);?>

<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/yandex_delivery/hooks/index/scripts.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/yandex_delivery/hooks/index/scripts.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['addons']->value['yandex_delivery']['autocomplete']=="Y") {?>
    <?php echo smarty_function_script(array('src'=>"js/addons/yandex_delivery/autocomplete.js"),$_smarty_tpl);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['addons']->value['yandex_delivery']['autopostcode']=="Y") {?>
    <?php echo smarty_function_script(array('src'=>"js/addons/yandex_delivery/postcode.js"),$_smarty_tpl);?>

<?php }
}?><?php }} ?>
