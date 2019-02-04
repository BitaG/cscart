<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:27:19
         compiled from "/var/www/html/design/backend/templates/addons/yml_export/hooks/product_features/variants_list_clone.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9562284285c3612d7395707-08534963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe3c1e5cf41d65006aabac9dc3425b97de7414a8' => 
    array (
      0 => '/var/www/html/design/backend/templates/addons/yml_export/hooks/product_features/variants_list_clone.post.tpl',
      1 => 1545828838,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '9562284285c3612d7395707-08534963',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'num' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c3612d73974c0_67686974',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3612d73974c0_67686974')) {function content_5c3612d73974c0_67686974($_smarty_tpl) {?><td>
    <input type="text" name="feature_data[variants][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8');?>
][yml2_unit]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var']->value['yml2_unit'], ENT_QUOTES, 'UTF-8');?>
" class="span2">
</td>
<?php }} ?>
