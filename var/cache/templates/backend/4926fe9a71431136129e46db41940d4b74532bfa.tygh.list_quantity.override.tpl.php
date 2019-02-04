<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:27:15
         compiled from "/var/www/html/design/backend/templates/addons/product_variations/hooks/products/list_quantity.override.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13943720615c3612d36b3476-39662113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4926fe9a71431136129e46db41940d4b74532bfa' => 
    array (
      0 => '/var/www/html/design/backend/templates/addons/product_variations/hooks/products/list_quantity.override.tpl',
      1 => 1545828837,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '13943720615c3612d36b3476-39662113',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c3612d36bd581_66600881',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3612d36bd581_66600881')) {function content_5c3612d36bd581_66600881($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('edit'));
?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['product_type']===constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_CONFIGURABLE")) {?>
    <?php ob_start();
echo htmlspecialchars(constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_VARIATION"), ENT_QUOTES, 'UTF-8');
$_tmp5=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>$_smarty_tpl->__("edit"),'but_href'=>"products.manage?parent_product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])."&product_type=".$_tmp5,'but_role'=>"edit"), 0);?>

<?php }?><?php }} ?>
