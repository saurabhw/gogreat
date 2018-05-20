<?php /* Smarty version Smarty-3.1.14, created on 2014-07-22 19:08:48
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/modules/homeslider/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15187624653cefd10b57df3-94296035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ac601c1822a830eb5883acbe0e11afb6f43248b' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/modules/homeslider/views/templates/hook/header.tpl',
      1 => 1406073703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15187624653cefd10b57df3-94296035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'homeslider' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cefd10b73406_57306586',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cefd10b73406_57306586')) {function content_53cefd10b73406_57306586($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['homeslider']->value)){?>
<script type="text/javascript">
     var homeslider_loop=<?php echo $_smarty_tpl->tpl_vars['homeslider']->value['loop'];?>
;
     var homeslider_width=<?php echo $_smarty_tpl->tpl_vars['homeslider']->value['width'];?>
;
     var homeslider_speed=<?php echo $_smarty_tpl->tpl_vars['homeslider']->value['speed'];?>
;
     var homeslider_pause=<?php echo $_smarty_tpl->tpl_vars['homeslider']->value['pause'];?>
;
</script>
<?php }?><?php }} ?>