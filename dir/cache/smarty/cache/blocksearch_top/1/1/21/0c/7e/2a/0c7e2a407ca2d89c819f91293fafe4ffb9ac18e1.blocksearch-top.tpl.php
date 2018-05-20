<?php /*%%SmartyHeaderCode:52720342654383b35140fd1-88186782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c7e2a407ca2d89c819f91293fafe4ffb9ac18e1' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/themes/rebecca-bootstrap-copy/modules/blocksearch/blocksearch-top.tpl',
      1 => 1406842856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52720342654383b35140fd1-88186782',
  'variables' => 
  array (
    'link' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54383b35294c93_33293982',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54383b35294c93_33293982')) {function content_54383b35294c93_33293982($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="http://greatmoods.com/dir/search" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Search" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Search</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>