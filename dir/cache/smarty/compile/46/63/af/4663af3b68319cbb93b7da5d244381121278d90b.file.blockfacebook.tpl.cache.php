<?php /* Smarty version Smarty-3.1.14, created on 2014-10-11 04:22:07
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/modules/blockfacebook/blockfacebook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3205387115438358e39ce96-80775180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4663af3b68319cbb93b7da5d244381121278d90b' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/modules/blockfacebook/blockfacebook.tpl',
      1 => 1412972358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3205387115438358e39ce96-80775180',
  'function' => 
  array (
  ),
  'cache_lifetime' => 31536000,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5438358e3f74a4_10090480',
  'variables' => 
  array (
    'facebookurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438358e3f74a4_10090480')) {function content_5438358e3f74a4_10090480($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['facebookurl']->value!=''){?>
<div id="fb-root"></div>
<div id="facebook_block" class="col-xs-4">
	<h4 ><?php echo smartyTranslate(array('s'=>'Follow us on Facebook','mod'=>'blockfacebook'),$_smarty_tpl);?>
</h4>
	<div class="facebook-fanbox">
		<div class="fb-like-box" data-href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facebookurl']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false">
		</div>
	</div>
</div>
<?php }?>
<?php }} ?>