<?php /* Smarty version Smarty-3.1.14, created on 2014-10-10 13:53:22
         compiled from "/home/amoodf5/public_html/gmtest/salesTest/dir/shop_2013/themes/default/template/helpers/uploader/simple.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123639690154382b22babd69-73825387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4c5bb90579ccfba05d8878571dfff7da0422e65' => 
    array (
      0 => '/home/amoodf5/public_html/gmtest/salesTest/dir/shop_2013/themes/default/template/helpers/uploader/simple.tpl',
      1 => 1406073719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123639690154382b22babd69-73825387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'files' => 0,
    'file' => 0,
    'show_thumbnail' => 0,
    'id' => 0,
    'max_files' => 0,
    'name' => 0,
    'multiple' => 0,
    'size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_54382b236ee6c4_74718485',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54382b236ee6c4_74718485')) {function content_54382b236ee6c4_74718485($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['files']->value)&&count($_smarty_tpl->tpl_vars['files']->value)>0){?>
	<?php $_smarty_tpl->tpl_vars['show_thumbnail'] = new Smarty_variable(false, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['file']->value['image'])&&$_smarty_tpl->tpl_vars['file']->value['type']=='image'){?>
			<?php $_smarty_tpl->tpl_vars['show_thumbnail'] = new Smarty_variable(true, null, 0);?>
		<?php }?>
	<?php } ?>
<?php if ($_smarty_tpl->tpl_vars['show_thumbnail']->value){?>
<div class="form-group">
	<div class="col-lg-12" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-images-thumbnails">
		<?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['file']->value['image'])&&$_smarty_tpl->tpl_vars['file']->value['type']=='image'){?>
		<div>
			<?php echo $_smarty_tpl->tpl_vars['file']->value['image'];?>

			<?php if (isset($_smarty_tpl->tpl_vars['file']->value['size'])){?><p><?php echo smartyTranslate(array('s'=>'File size'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['file']->value['size'];?>
kb</p><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['file']->value['delete_url'])){?>
			<p>
				<a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['file']->value['delete_url'];?>
">
					<i class="icon-trash"></i> <?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>

				</a>
			</p>
			<?php }?>
		</div>
		<?php }?>
		<?php } ?>
	</div>
</div>
<?php }?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['max_files']->value)&&count($_smarty_tpl->tpl_vars['files']->value)>=$_smarty_tpl->tpl_vars['max_files']->value){?>
<div class="row">
	<div class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'You have reached the limit (%s) of files to upload, please remove files to continue uploading','sprintf'=>$_smarty_tpl->tpl_vars['max_files']->value),$_smarty_tpl);?>
</div>
</div>
<?php }else{ ?>
<div class="form-group">
	<div class="col-sm-6">
		<input id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" type="file" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['multiple']->value)&&$_smarty_tpl->tpl_vars['multiple']->value){?> multiple="multiple"<?php }?> class="hide" />
		<div class="dummyfile input-group">
			<span class="input-group-addon"><i class="icon-file"></i></span>
			<input id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name" type="text" name="filename" readonly />
			<span class="input-group-btn">
				<button id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
					<i class="icon-folder-open"></i> <?php if (isset($_smarty_tpl->tpl_vars['multiple']->value)&&$_smarty_tpl->tpl_vars['multiple']->value){?><?php echo smartyTranslate(array('s'=>'Add files'),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Add file'),$_smarty_tpl);?>
<?php }?>
				</button>
				<?php if ((!isset($_smarty_tpl->tpl_vars['multiple']->value)||!$_smarty_tpl->tpl_vars['multiple']->value)&&isset($_smarty_tpl->tpl_vars['files']->value)&&count($_smarty_tpl->tpl_vars['files']->value)==1&&isset($_smarty_tpl->tpl_vars['files']->value[0]['download_url'])){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['files']->value[0]['download_url'];?>
">
					<button type="button" class="btn btn-default">
						<i class="icon-cloud-download"></i>
						<?php if (isset($_smarty_tpl->tpl_vars['size']->value)){?><?php echo smartyTranslate(array('s'=>'Download current file (%skb)','sprintf'=>$_smarty_tpl->tpl_vars['size']->value),$_smarty_tpl);?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'Download current file'),$_smarty_tpl);?>
<?php }?>
					</button>
				</a>
				<?php }?>
			</span>
		</div>
	</div>
</div>
<script type="text/javascript">
<?php if (isset($_smarty_tpl->tpl_vars['multiple']->value)&&isset($_smarty_tpl->tpl_vars['max_files']->value)){?>
	var <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_max_files = <?php echo $_smarty_tpl->tpl_vars['max_files']->value-count($_smarty_tpl->tpl_vars['files']->value);?>
;
<?php }?>

	$(document).ready(function(){
		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-selectbutton').click(function(e) {
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').trigger('click');
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').click(function(e) {
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').trigger('click');
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').on('dragenter', function(e) {
			e.stopPropagation();
			e.preventDefault();
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').on('dragover', function(e) {
			e.stopPropagation();
			e.preventDefault();
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').on('drop', function(e) {
			e.preventDefault();
			var files = e.originalEvent.dataTransfer.files;
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
')[0].files = files;
			$(this).val(files[0].name);
		});

		$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').change(function(e) {
			if ($(this)[0].files !== undefined)
			{
				var files = $(this)[0].files;
				var name  = '';

				$.each(files, function(index, value) {
					name += value.name+', ';
				});

				$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').val(name.slice(0, -2));
			}
			else // Internet Explorer 9 Compatibility
			{
				var name = $(this).val().split(/[\\/]/);
				$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-name').val(name[name.length-1]);
			}
		});

		if (typeof <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_max_files !== 'undefined')
		{
			$('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
').closest('form').on('submit', function(e) {
				if ($('#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
')[0].files.length > <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_max_files) {
					e.preventDefault();
					alert('<?php echo smartyTranslate(array('s'=>sprintf('You can upload a maximum of %s files',$_smarty_tpl->tpl_vars['max_files']->value)),$_smarty_tpl);?>
');
				}
			});
		}
	});
</script>
<?php }?><?php }} ?>