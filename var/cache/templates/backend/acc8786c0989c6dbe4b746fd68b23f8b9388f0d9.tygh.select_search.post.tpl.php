<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:27:16
         compiled from "/var/www/html/design/backend/templates/addons/bestsellers/hooks/products/select_search.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21265016805c3612d42762b9-95772135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acc8786c0989c6dbe4b746fd68b23f8b9388f0d9' => 
    array (
      0 => '/var/www/html/design/backend/templates/addons/bestsellers/hooks/products/select_search.post.tpl',
      1 => 1545828837,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '21265016805c3612d42762b9-95772135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c3612d4278d52_12276876',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3612d4278d52_12276876')) {function content_5c3612d4278d52_12276876($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('bestsellers'));
?>
<option <?php if ($_smarty_tpl->tpl_vars['search']->value['sort_by']=="bestsellers") {?>selected="selected"<?php }?> value="bestsellers"><?php echo $_smarty_tpl->__("bestsellers");?>
</option><?php }} ?>
