<?php /* Smarty version Smarty-3.1.14, created on 2014-10-10 15:16:19
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/modules/greatmoodslogin/views/templates/hook/greatmoodslogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83126770754383e93cf4545-94729795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97adfe718ea54e3326570cf9f9e1889ab5dfd2fa' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/modules/greatmoodslogin/views/templates/hook/greatmoodslogin.tpl',
      1 => 1412972050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83126770754383e93cf4545-94729795',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54383e93d42611_15609496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54383e93d42611_15609496')) {function content_54383e93d42611_15609496($_smarty_tpl) {?><html>
<body>
		<div id="leftnav1">
				<div id="leftnav1">
				<form action="modules/greatmoodslogin/LoginValidate.php" method="POST"><ul>
					<li><h4>Sign in</h4></li>
					
            
 				<li>Email:
				 <input type="text" name="email" id="email"></li>

    				<li>Password:
				<input type="password" name="password" id="password"></li>

    				<li><input type="submit" name="login" id="login" value="Sign in"></li>
				</form>

				<br>	  

			
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/greatmoodslogin/controllers/front/display_gms_setup_vp.php">Vice President Register</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/greatmoodslogin/controllers/front/display_gms_vp_setup_gmfr_v3.php">Fundraiser Account Register</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/greatmoodslogin/controllers/front/display_my_account_setup.php">Customer Register</a></li>
				</ul>
			
			</div>
	</body>
</html><?php }} ?>