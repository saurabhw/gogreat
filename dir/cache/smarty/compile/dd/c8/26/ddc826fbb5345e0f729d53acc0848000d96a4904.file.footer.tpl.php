<?php /* Smarty version Smarty-3.1.14, created on 2014-07-22 19:08:53
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/themes/greatmoods/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:588928453cefd152955a2-11398968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddc826fbb5345e0f729d53acc0848000d96a4904' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/themes/greatmoods/footer.tpl',
      1 => 1382810880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '588928453cefd152955a2-11398968',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'HOOK_FOOTER' => 0,
    'PS_ALLOW_MOBILE_DEVICE' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cefd152c0058_20122935',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cefd152c0058_20122935')) {function content_53cefd152c0058_20122935($_smarty_tpl) {?>

		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
				</div>

<!-- Right -->
				
			</div>

<!-- Footer -->
			<div id="footer" class="grid_9 alpha omega clearfix">
				<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

				<?php if ($_smarty_tpl->tpl_vars['PS_ALLOW_MOBILE_DEVICE']->value){?>
					<p class="center clearBoth"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true);?>
?mobile_theme_ok"><?php echo smartyTranslate(array('s'=>'Browse the mobile site'),$_smarty_tpl);?>
</a></p>
				<?php }?>
			</div>
		</div>
	<?php }?>
	</body>
</html>
<?php }} ?>