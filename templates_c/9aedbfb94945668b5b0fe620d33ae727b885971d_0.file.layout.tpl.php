<?php /* Smarty version 3.1.28-dev/66, created on 2015-11-11 15:42:06
         compiled from "D:\Yandex.Disk\Projects\bikecms\templates\layout.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5643379eab0fb2_84820016',
  'file_dependency' => 
  array (
    '9aedbfb94945668b5b0fe620d33ae727b885971d' => 
    array (
      0 => 'D:\\Yandex.Disk\\Projects\\bikecms\\templates\\layout.tpl',
      1 => 1447236307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:login.tpl' => 1,
  ),
),false);
if ($_valid && !is_callable('content_5643379eab0fb2_84820016')) {
function content_5643379eab0fb2_84820016 ($_smarty_tpl) {
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php $_smarty_tpl->setupSubTemplate('file:login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false)->render();
?>

		<h1>Мой супер сайт!!!</h1>
		<?php $_smarty_tpl->setupSubTemplate(((string)$_smarty_tpl->tpl_vars['content_tpl']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true)->render();
?>

	</body>
</html>
<?php }
}
