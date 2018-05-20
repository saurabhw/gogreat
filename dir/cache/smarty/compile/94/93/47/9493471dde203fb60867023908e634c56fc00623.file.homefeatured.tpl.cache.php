<?php /* Smarty version Smarty-3.1.14, created on 2014-10-10 14:37:53
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/themes/default-bootstrap/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151899172254383591843514-33498895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9493471dde203fb60867023908e634c56fc00623' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/themes/default-bootstrap/modules/homefeatured/homefeatured.tpl',
      1 => 1406073725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151899172254383591843514-33498895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_543835918b25f0_29251037',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543835918b25f0_29251037')) {function content_543835918b25f0_29251037($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('class'=>'homefeatured tab-pane','id'=>'homefeatured'), 0);?>

<?php }else{ ?>
<ul id="homefeatured" class="homefeatured tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No featured products at this time.','mod'=>'homefeatured'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>