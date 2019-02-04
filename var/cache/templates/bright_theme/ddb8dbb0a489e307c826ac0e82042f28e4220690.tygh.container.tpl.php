<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:13:09
         compiled from "/var/www/html/design/themes/responsive/templates/views/block_manager/render/container.tpl" */ ?>
<?php /*%%SmartyHeaderCode:964685795c360f85d885a5-75022048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddb8dbb0a489e307c826ac0e82042f28e4220690' => 
    array (
      0 => '/var/www/html/design/themes/responsive/templates/views/block_manager/render/container.tpl',
      1 => 1547046472,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '964685795c360f85d885a5-75022048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout_data' => 0,
    'container' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c360f85d8b926_87336945',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c360f85d8b926_87336945')) {function content_5c360f85d8b926_87336945($_smarty_tpl) {?><div class="<?php if ($_smarty_tpl->tpl_vars['layout_data']->value['layout_width']!="fixed") {?>container-fluid <?php } else { ?>container<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['container']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</div><?php }} ?>
