<?php /* Smarty version Smarty-3.1.14, created on 2014-10-10 15:12:06
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/modules/blockfacebook/blockfacebook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138517573154383d9615e206-43647418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4663af3b68319cbb93b7da5d244381121278d90b' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/modules/blockfacebook/blockfacebook.tpl',
      1 => 1412971904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138517573154383d9615e206-43647418',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebookurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54383d96182651_68567043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54383d96182651_68567043')) {function content_54383d96182651_68567043($_smarty_tpl) {?>
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