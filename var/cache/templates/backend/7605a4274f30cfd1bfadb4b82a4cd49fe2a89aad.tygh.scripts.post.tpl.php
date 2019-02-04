<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:08:04
         compiled from "/var/www/html/design/backend/templates/addons/rus_payments/hooks/index/scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5469990385c360e54cacc26-45250258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7605a4274f30cfd1bfadb4b82a4cd49fe2a89aad' => 
    array (
      0 => '/var/www/html/design/backend/templates/addons/rus_payments/hooks/index/scripts.post.tpl',
      1 => 1545828837,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '5469990385c360e54cacc26-45250258',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c360e54cadef2_13999890',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c360e54cadef2_13999890')) {function content_5c360e54cadef2_13999890($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/var/www/html/app/functions/smarty_plugins/function.script.php';
?><?php echo smarty_function_script(array('src'=>"js/addons/rus_payments/yandex_checkpoint.js"),$_smarty_tpl);?>
<?php }} ?>
