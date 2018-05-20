<?php /* Smarty version Smarty-3.1.14, created on 2014-10-10 15:01:56
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/themes/rebecca-bootstrap-copy/modules/homeslider/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138707196254383b34ac95b7-52219713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6083d7b992a5cc999e1852bbb8e808d3dd931b7e' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/themes/rebecca-bootstrap-copy/modules/homeslider/header.tpl',
      1 => 1406842856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138707196254383b34ac95b7-52219713',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'homeslider' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54383b34b4e9a0_91629195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54383b34b4e9a0_91629195')) {function content_54383b34b4e9a0_91629195($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['homeslider']->value)){?>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homeslider_loop'=>intval($_smarty_tpl->tpl_vars['homeslider']->value['loop'])),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homeslider_width'=>intval($_smarty_tpl->tpl_vars['homeslider']->value['width'])),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homeslider_speed'=>intval($_smarty_tpl->tpl_vars['homeslider']->value['speed'])),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('homeslider_pause'=>intval($_smarty_tpl->tpl_vars['homeslider']->value['pause'])),$_smarty_tpl);?>

<?php }?><?php }} ?>