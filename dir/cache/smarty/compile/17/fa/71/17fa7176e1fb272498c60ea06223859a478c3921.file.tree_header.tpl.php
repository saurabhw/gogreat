<?php /* Smarty version Smarty-3.1.14, created on 2014-10-10 14:37:03
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/shop_2013/themes/default/template/helpers/tree/tree_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7595302175438355feed908-58277850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17fa7176e1fb272498c60ea06223859a478c3921' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/shop_2013/themes/default/template/helpers/tree/tree_header.tpl',
      1 => 1406073719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7595302175438355feed908-58277850',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'toolbar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_543835600442c6_69916391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543835600442c6_69916391')) {function content_543835600442c6_69916391($_smarty_tpl) {?>
<div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)){?><i class="icon-tag"></i>&nbsp;<?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl);?>
<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)){?><?php echo $_smarty_tpl->tpl_vars['toolbar']->value;?>
<?php }?>
</div><?php }} ?>