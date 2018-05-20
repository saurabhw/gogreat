<?php /* Smarty version Smarty-3.1.14, created on 2014-07-22 19:08:51
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/modules/homeslider/views/templates/hook/homeslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198342844153cefd1340ef27-50683119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6b9fedcc62b062e80d718fc5c064437f7344df4' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/modules/homeslider/views/templates/hook/homeslider.tpl',
      1 => 1406073703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198342844153cefd1340ef27-50683119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'homeslider_slides' => 0,
    'slide' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cefd13477da7_32030397',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cefd13477da7_32030397')) {function content_53cefd13477da7_32030397($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?>
    <!-- Module HomeSlider -->
    <?php if (isset($_smarty_tpl->tpl_vars['homeslider_slides']->value)){?>
        <div id="homepage-slider">
            <ul id="homeslider">
                <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['homeslider_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['slide']->value['active']){?>
                        <li class="homeslider-container">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."homeslider/images/".((string)mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')));?>
"
                                     alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['legend'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
                            </a>
                            <?php if (isset($_smarty_tpl->tpl_vars['slide']->value['description'])&&trim($_smarty_tpl->tpl_vars['slide']->value['description'])!=''){?>
                                <div class="homeslider-description"><?php echo $_smarty_tpl->tpl_vars['slide']->value['description'];?>
</div>
                            <?php }?>
                        </li>
                    <?php }?>
                <?php } ?>
            </ul>
        </div>

    <?php }?>
    <!-- /Module HomeSlider -->
<?php }?><?php }} ?>