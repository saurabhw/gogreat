<?php /* Smarty version Smarty-3.1.14, created on 2014-07-22 19:08:48
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99932778453cefd109e88b1-79369719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bf1c7c1e2d7501b669924a3207ec53257e5ecb0' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1381208310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99932778453cefd109e88b1-79369719',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cefd10a5d1c3_11998744',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cefd10a5d1c3_11998744')) {function content_53cefd10a5d1c3_11998744($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),false));?>
';
	var favorite_products_url_remove = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),false));?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>