<?php /* Smarty version Smarty-3.1.21, created on 2019-02-04 12:26:05
         compiled from "/home/bitabi00/bitabit.com.ua/cscart/design/themes/responsive/templates/buttons/go.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11274890885c58052de614a6-79956364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62f3d4641f515f63f5bcc020e8cf5bb79c3bd1d2' => 
    array (
      0 => '/home/bitabi00/bitabit.com.ua/cscart/design/themes/responsive/templates/buttons/go.tpl',
      1 => 1549269839,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '11274890885c58052de614a6-79956364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'alt' => 0,
    'but_text' => 0,
    'but_name' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c58052de91079_21344384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c58052de91079_21344384')) {function content_5c58052de91079_21344384($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/home/bitabi00/bitabit.com.ua/cscart/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><button title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['alt']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-btn-go" type="submit"><?php if ($_smarty_tpl->tpl_vars['but_text']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['but_text']->value, ENT_QUOTES, 'UTF-8');
} else { ?><i class="ty-btn-go__icon ty-icon-right-dir"></i><?php }?></button>
<input type="hidden" name="dispatch" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_name']->value, ENT_QUOTES, 'UTF-8');?>
" /><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="buttons/go.tpl" id="<?php echo smarty_function_set_id(array('name'=>"buttons/go.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><button title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['alt']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-btn-go" type="submit"><?php if ($_smarty_tpl->tpl_vars['but_text']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['but_text']->value, ENT_QUOTES, 'UTF-8');
} else { ?><i class="ty-btn-go__icon ty-icon-right-dir"></i><?php }?></button>
<input type="hidden" name="dispatch" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['but_name']->value, ENT_QUOTES, 'UTF-8');?>
" /><?php }?><?php }} ?>
