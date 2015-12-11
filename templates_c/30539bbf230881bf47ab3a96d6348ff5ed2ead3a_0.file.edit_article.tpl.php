<?php /* Smarty version 3.1.28-dev/66, created on 2015-12-08 17:00:16
         compiled from "D:\Yandex.Disk\Projects\bikecms\templates\edit_article.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5666e270e1d121_13962020',
  'file_dependency' => 
  array (
    '30539bbf230881bf47ab3a96d6348ff5ed2ead3a' => 
    array (
      0 => 'D:\\Yandex.Disk\\Projects\\bikecms\\templates\\edit_article.tpl',
      1 => 1449583208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5666e270e1d121_13962020')) {
function content_5666e270e1d121_13962020 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'D:/Yandex.Disk/Projects/bikecms/smarty/libs/plugins\\function.html_options.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form method="post" action="/Article/Add">
		<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Content</th>
						<th>Date</th>
						<th>Category</th>
						<th>Author</th>
					</tr>
				</thead>
					<tr>
						<td>
							<input type="text" name="name">
						</td>
						<td>
							<textarea name="content"></textarea>
						</td>
						<td>
							<input type="date" name="pubdate">
						</td>
						<td>
							<?php echo smarty_function_html_options(array('name'=>"catId",'options'=>$_smarty_tpl->tpl_vars['cats']->value,'selected'=>$_smarty_tpl->tpl_vars['catId']->value),$_smarty_tpl);?>

						</td>
						<td>
							<?php echo smarty_function_html_options(array('name'=>"authId",'options'=>$_smarty_tpl->tpl_vars['authors']->value,'selected'=>$_smarty_tpl->tpl_vars['authId']->value),$_smarty_tpl);?>

						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Сохранить">
						</td>
					</tr>
			</table>
		</form>
	</body>
</html>
<?php }
}
