<?php /* Smarty version Smarty-3.1.14, created on 2014-10-10 15:02:01
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/themes/rebecca-bootstrap-copy/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82006965254383b39b09fd9-98897933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b639af03829d00853692bfac36e7fbb0bff1aa0' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/themes/rebecca-bootstrap-copy/modules/homefeatured/homefeatured.tpl',
      1 => 1406842856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82006965254383b39b09fd9-98897933',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54383b39b33705_09984689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54383b39b33705_09984689')) {function content_54383b39b33705_09984689($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('class'=>'homefeatured tab-pane','id'=>'homefeatured'), 0);?>

<?php }else{ ?>
<ul id="homefeatured" class="homefeatured tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No featured products at this time.','mod'=>'homefeatured'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>