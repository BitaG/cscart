<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:28:08
         compiled from "/var/www/html/design/themes/responsive/templates/addons/product_variations/hooks/products/brand_bigpicture.override.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11112551225c361308e07a88-35060023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53a46c9e9f981fe0e03b1a3625609253a257e4fa' => 
    array (
      0 => '/var/www/html/design/themes/responsive/templates/addons/product_variations/hooks/products/brand_bigpicture.override.tpl',
      1 => 1547046476,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '11112551225c361308e07a88-35060023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c361308e15e28_83407161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c361308e15e28_83407161')) {function content_5c361308e15e28_83407161($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/var/www/html/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><div class="ty-product-bigpicture__brand cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" id="product_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
_brand_container">
    <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('features'=>$_smarty_tpl->tpl_vars['product']->value['header_features'],'feature_image'=>true), 0);?>

<!--product_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
_brand_container--></div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/product_variations/hooks/products/brand_bigpicture.override.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/product_variations/hooks/products/brand_bigpicture.override.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><div class="ty-product-bigpicture__brand cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
" id="product_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
_brand_container">
    <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('features'=>$_smarty_tpl->tpl_vars['product']->value['header_features'],'feature_image'=>true), 0);?>

<!--product_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8');?>
_brand_container--></div><?php }?><?php }} ?>
