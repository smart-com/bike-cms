<?php /* Smarty version 3.1.28-dev/66, created on 2015-11-27 20:32:16
         compiled from "D:\Yandex.Disk\Projects\bikecms\templates\edit_article.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_565893a01d1891_36297635',
  'file_dependency' => 
  array (
    '30539bbf230881bf47ab3a96d6348ff5ed2ead3a' => 
    array (
      0 => 'D:\\Yandex.Disk\\Projects\\bikecms\\templates\\edit_article.tpl',
      1 => 1448645532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_565893a01d1891_36297635')) {
function content_565893a01d1891_36297635 ($_smarty_tpl) {
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
						<th>ID</th>
						<th>Name</th>
						<th>Content</th>
						<th>Date</th>
						<th>Category</th>
						<th>Author</th>
					</tr>
				</thead>
					<tr>
						<td>ID</td>
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
						<td>
							<input type="text" name="category">
						</td>
						<td>
							<input type="text" name="author">
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
