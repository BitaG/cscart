<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:29:24
         compiled from "/var/www/html/design/backend/templates/addons/email_marketing/views/em_subscribers/components/subscribers_search_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14674198525c361354177347-80549434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7383b3b97816073f688fbd655f6df483d02962b7' => 
    array (
      0 => '/var/www/html/design/backend/templates/addons/email_marketing/views/em_subscribers/components/subscribers_search_form.tpl',
      1 => 1545828837,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '14674198525c361354177347-80549434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search' => 0,
    'language' => 0,
    'dispatch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c3613541994f2_58840350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3613541994f2_58840350')) {function content_5c3613541994f2_58840350($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('search','email','person_name','language','status','active','pending','period'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("common/saved_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('dispatch'=>"em_subscribers.manage",'view_type'=>"em_subscribers"), 0);?>


<div class="sidebar-row">

<h6><?php echo $_smarty_tpl->__("search");?>
</h6>
<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" name="subscribers_search_form" method="get">

<?php $_smarty_tpl->_capture_stack[0][] = array("simple_search", null, null); ob_start(); ?>

<div class="sidebar-field">
    <label><?php echo $_smarty_tpl->__("email");?>
</label>
    <input type="text" name="email" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['email'], ENT_QUOTES, 'UTF-8');?>
" />
</div>

<div class="sidebar-field">
    <label><?php echo $_smarty_tpl->__("person_name");?>
</label>
    <input type="text" name="name" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
</div>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php $_smarty_tpl->_capture_stack[0][] = array("advanced_search", null, null); ob_start(); ?>

<div class="row-fluid">
<div class="group span6 form-horizontal">
    <div class="control-group">
        <label class="control-label" for="elm_lang_code"><?php echo $_smarty_tpl->__("language");?>
</label>
        <div class="controls">
            <select id="elm_lang_code" name="lang_code">
                <option value="">--</option>
                <?php  $_smarty_tpl->tpl_vars["language"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["language"]->_loop = false;
 $_from = fn_get_translation_languages(''); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["language"]->key => $_smarty_tpl->tpl_vars["language"]->value) {
$_smarty_tpl->tpl_vars["language"]->_loop = true;
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['lang_code'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['search']->value['lang_code']==$_smarty_tpl->tpl_vars['language']->value['lang_code']) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<div class="group span6 form-horizontal">
    <div class="control-group">
        <label class="control-label" for="elm_status"><?php echo $_smarty_tpl->__("status");?>
</label>
        <div class="controls">
            <select id="elm_status" name="status">
                <option value="">--</option>
                <option <?php if ($_smarty_tpl->tpl_vars['search']->value['status']=="A") {?>selected="selected"<?php }?> value="A"><?php echo $_smarty_tpl->__("active");?>
</option>
                <option <?php if ($_smarty_tpl->tpl_vars['search']->value['status']=="P") {?>selected="selected"<?php }?>value="P"><?php echo $_smarty_tpl->__("pending");?>
</option>
            </select>
        </div>
    </div>
</div>
</div>
<div class="row-fluid">
<div class="group form-horizontal">
    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__("period");?>
</label>
        <div class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("common/period_selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('period'=>$_smarty_tpl->tpl_vars['search']->value['period'],'form_name'=>"subscribers_search_form"), 0);?>

        </div>
    </div>
</div>
</div>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/advanced_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('simple_search'=>Smarty::$_smarty_vars['capture']['simple_search'],'advanced_search'=>Smarty::$_smarty_vars['capture']['advanced_search'],'dispatch'=>$_smarty_tpl->tpl_vars['dispatch']->value,'view_type'=>"em_subscribers"), 0);?>


</form>

</div>
<?php }} ?>
