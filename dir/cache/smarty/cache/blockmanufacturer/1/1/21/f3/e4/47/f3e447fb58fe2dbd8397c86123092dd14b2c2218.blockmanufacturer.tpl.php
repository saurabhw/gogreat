<?php /*%%SmartyHeaderCode:142402343754383b37dda385-38690239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3e447fb58fe2dbd8397c86123092dd14b2c2218' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/themes/rebecca-bootstrap-copy/modules/blockmanufacturer/blockmanufacturer.tpl',
      1 => 1406842856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142402343754383b37dda385-38690239',
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_561ba4c0e774f9_90756060',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561ba4c0e774f9_90756060')) {function content_561ba4c0e774f9_90756060($_smarty_tpl) {?>
<!-- Block manufacturers module -->
<div id="manufacturers_block_left" class="block blockmanufacturer">
	<p class="title_block">
					<a href="http://greatmoods.com/dir/manufacturers" title="Manufacturers">
						Manufacturers
					</a>
			</p>
	<div class="block_content list-block">
								<ul>
														<li class="first_item">
						<a 
						href="http://greatmoods.com/dir/1_apple-computer-inc" title="More about Apple Computer, Inc">
							Apple Computer, Inc
						</a>
					</li>
																			<li class="last_item">
						<a 
						href="http://greatmoods.com/dir/2_shure-incorporated" title="More about Shure Incorporated">
							Shure Incorporated
						</a>
					</li>
												</ul>
										<form action="/dir/index.php" method="get">
					<div class="form-group selector1">
						<select class="form-control" name="manufacturer_list">
							<option value="0">All manufacturers</option>
													<option value="http://greatmoods.com/dir/1_apple-computer-inc">Apple Computer, Inc</option>
													<option value="http://greatmoods.com/dir/2_shure-incorporated">Shure Incorporated</option>
												</select>
					</div>
				</form>
						</div>
</div>
<!-- /Block manufacturers module -->
<?php }} ?>