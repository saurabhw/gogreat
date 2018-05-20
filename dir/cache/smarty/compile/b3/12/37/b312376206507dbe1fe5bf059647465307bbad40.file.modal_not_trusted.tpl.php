<?php /* Smarty version Smarty-3.1.14, created on 2014-07-22 19:07:47
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/shop_2013/themes/default/template/controllers/modules/modal_not_trusted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142806369753cefcd3133070-74218834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b312376206507dbe1fe5bf059647465307bbad40' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/shop_2013/themes/default/template/controllers/modules/modal_not_trusted.tpl',
      1 => 1406073717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142806369753cefcd3133070-74218834',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cefcd315d1f7_46647548',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cefcd315d1f7_46647548')) {function content_53cefcd315d1f7_46647548($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['module_name'] = new Smarty_variable('<strong><span class="module-name-placeholder"></span></strong>', null, 0);?>

<div class="modal-body">

	<div class="alert alert-warning">
		<h4><?php echo smartyTranslate(array('s'=>'You are about to install "%s", a module that could not be securely identified by PrestaShop.','sprintf'=>$_smarty_tpl->tpl_vars['module_name']->value),$_smarty_tpl);?>
</h4>

		<p><?php echo smartyTranslate(array('s'=>'This generally happens when the module is not distributed through our official marketplace, PrestaShop Addons - or when your server failed to communicate with PrestaShop Addons.'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'Since you did not download the module from PrestaShop Addons, we cannot assert that the module is safe (i.e. that it is not adding some undisclosed functionality like backdoors, ads, hidden links, spam, etc.).'),$_smarty_tpl);?>

		<strong><?php echo smartyTranslate(array('s'=>'Use at your own risk.'),$_smarty_tpl);?>
</strong></p>
	</div>

	<h3><?php echo smartyTranslate(array('s'=>'What Should I Do?'),$_smarty_tpl);?>
</h3>
	<p><?php echo smartyTranslate(array('s'=>'If you understand what this module does and you are certain that it is safe, you can proceed with the installation.'),$_smarty_tpl);?>
</p>

	<p><?php echo smartyTranslate(array('s'=>'If you are unsure about the safety of this module, you can look for similar modules on the official marketplace.'),$_smarty_tpl);?>
 <a class="catalog-link" target="_blank" href="#"><?php echo smartyTranslate(array('s'=>'Click here to browse PrestaShop Addons.'),$_smarty_tpl);?>
</a></p>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo smartyTranslate(array('s'=>'Back to safety'),$_smarty_tpl);?>
</button>
	<a id="proceed-install-anyway" href="#" class="btn btn-warning"><?php echo smartyTranslate(array('s'=>'Proceed with the installation'),$_smarty_tpl);?>
</a>
</div>
<?php }} ?>