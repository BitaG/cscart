<?php /* Smarty version Smarty-3.1.21, created on 2019-01-09 18:29:24
         compiled from "/var/www/html/design/backend/templates/common/settings_sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5457176025c361354164f81-87381116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79331551e4e554f66c8b97e41e9411ff305c58ad' => 
    array (
      0 => '/var/www/html/design/backend/templates/common/settings_sidebar.tpl',
      1 => 1545828838,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '5457176025c361354164f81-87381116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'option' => 0,
    'parent_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5c361354174b30_79435604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c361354174b30_79435604')) {function content_5c361354174b30_79435604($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/var/www/html/app/functions/smarty_plugins/block.inline_script.php';
?><div class="sidebar-row">
    <ul class="unstyled list-with-btns">
        <?php  $_smarty_tpl->tpl_vars["option"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["option"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['settings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["option"]->key => $_smarty_tpl->tpl_vars["option"]->value) {
$_smarty_tpl->tpl_vars["option"]->_loop = true;
?>

        <?php if ($_smarty_tpl->tpl_vars['option']->value['parent_id']) {?>
            <?php $_smarty_tpl->tpl_vars['parent_item'] = new Smarty_variable($_smarty_tpl->tpl_vars['settings']->value[$_smarty_tpl->tpl_vars['option']->value['parent_id']], null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars['parent_item'] = new Smarty_variable('', null, 0);?>
        <?php }?>


        <li class="<?php if ($_smarty_tpl->tpl_vars['parent_item']->value&&$_smarty_tpl->tpl_vars['parent_item']->value['value']!="Y") {?>hidden<?php }?> cm-switch-container">
            <div class="list-description">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['description'], ENT_QUOTES, 'UTF-8');?>

            </div>
            <div class="switch switch-mini cm-switch-change list-btns" <?php if ($_smarty_tpl->tpl_vars['parent_item']->value) {?>data-ca-switch-parent-id="elm_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['parent_item']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> id="elm_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
                <input type="checkbox" name="update[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['object_id'], ENT_QUOTES, 'UTF-8');?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['option']->value['value']=="Y") {?>checked="checked"<?php }?>/>
            </div>
        </li>
        <?php } ?>           
    </ul>
</div>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    (function (_, $) {
        $(_.doc).on('switch-change', '.cm-switch-change', function (e, data) {

            var self = $(this);
            var req = {};
            req[data.el.prop('name')] = data.value ? 'Y' : 'N';
            $.ceAjax('request', fn_url("settings.update"), {
                method: 'post',
                data: req,
                callback: function(){
                    
                    var sw = $('.cm-switch-change').filter('[data-ca-switch-parent-id=' + self.prop('id') + ']');
                    if (sw.length) {
                        sw.closest('.cm-switch-container').toggle();
                    }
                }
            });
        });
    }(Tygh, Tygh.$));
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
