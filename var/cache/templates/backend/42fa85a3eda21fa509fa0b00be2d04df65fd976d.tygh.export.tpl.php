<?php /* Smarty version Smarty-3.1.21, created on 2019-02-04 13:39:51
         compiled from "/home/bitabi00/bitabit.com.ua/cscart/design/backend/templates/addons/sendpulse/views/sendpulse/export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13641455305c581677922e51-83778858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42fa85a3eda21fa509fa0b00be2d04df65fd976d' => 
    array (
      0 => '/home/bitabi00/bitabit.com.ua/cscart/design/backend/templates/addons/sendpulse/views/sendpulse/export.tpl',
      1 => 1549272583,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '13641455305c581677922e51-83778858',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pattern' => 0,
    'p_id' => 0,
    'book_list' => 0,
    'book_id' => 0,
    'book_name' => 0,
    'export_fields' => 0,
    'assigned_ids' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c5816779aaaa9_27104154',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5816779aaaa9_27104154')) {function content_5c5816779aaaa9_27104154($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('general','sp.address_book','no_items','sp.export_name'));
?>

<?php $_smarty_tpl->_capture_stack[0][] = array("mainbox", null, null); ob_start(); ?>

        <?php $_smarty_tpl->_capture_stack[0][] = array("tabsbox", null, null); ob_start(); ?>
                <?php $_smarty_tpl->tpl_vars["p_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['pattern']->value['pattern_id'], null, 0);?>
                <div id="content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("common/subheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->__("general")), 0);?>

                        <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="sendpulse_export" class="form-horizontal form-edit">
                                <div class="control-group">
                                        <label class="control-label"><?php echo $_smarty_tpl->__("sp.address_book");?>
</label>
                                        <div class="controls">
                                                <?php if ($_smarty_tpl->tpl_vars['book_list']->value) {?>
                                                        <select name="sendpulse_book_id" id="sendpulse_book_id">
                                                                <?php  $_smarty_tpl->tpl_vars['book_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['book_name']->_loop = false;
 $_smarty_tpl->tpl_vars['book_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['book_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['book_name']->key => $_smarty_tpl->tpl_vars['book_name']->value) {
$_smarty_tpl->tpl_vars['book_name']->_loop = true;
 $_smarty_tpl->tpl_vars['book_id']->value = $_smarty_tpl->tpl_vars['book_name']->key;
?>
                                                                <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['book_id']->value, ENT_QUOTES, 'UTF-8');?>
" value=<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['book_id']->value, ENT_QUOTES, 'UTF-8');?>
<?php $_tmp1=ob_get_clean();?><?php echo htmlspecialchars($_tmp1, ENT_QUOTES, 'UTF-8');?>
><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['book_name']->value, ENT_QUOTES, 'UTF-8');?>
</option>
                                                                <?php } ?>
                                                        </select>
                                                <?php } else { ?>
                                                        <p class="lowercase"><?php echo $_smarty_tpl->__("no_items");?>
</p>
                                                <?php }?>
                                        </div>
                                </div>
                                <div class="control-group">
                                        <label class="control-label"><?php echo $_smarty_tpl->__("sp.export_name");?>
</label>
                                        <div class="controls">
                                                <input type="checkbox" id="one_name" name="one_name">
                                        </div>
                                </div>
                                <?php echo $_smarty_tpl->getSubTemplate ("views/exim/components/selectboxes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('items'=>$_smarty_tpl->tpl_vars['export_fields']->value,'assigned_ids'=>$_smarty_tpl->tpl_vars['assigned_ids']->value,'left_name'=>"selected_field",'left_id'=>"pattern"), 0);?>

                        </form>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/tabsbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('content'=>Smarty::$_smarty_vars['capture']['tabsbox']), 0);?>

        <?php $_smarty_tpl->_capture_stack[0][] = array("buttons", null, null); ob_start(); ?>
                <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

                <div class="cm-tab-tools pull-right shift-left" id="tools_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p_id']->value, ENT_QUOTES, 'UTF-8');?>
">
                        <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>"Експорт",'but_name'=>"dispatch[sendpulse.export]",'but_role'=>"submit-link",'but_target_form'=>"sendpulse_export",'but_meta'=>"cm-tab-tools cm-comet"), 0);?>

                </div>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate ("common/mainbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"SendPulse",'buttons'=>Smarty::$_smarty_vars['capture']['buttons'],'content'=>Smarty::$_smarty_vars['capture']['mainbox']), 0);?>



<?php }} ?>
