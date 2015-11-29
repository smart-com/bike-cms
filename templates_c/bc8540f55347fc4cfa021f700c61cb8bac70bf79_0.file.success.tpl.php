<?php /* Smarty version 3.1.28-dev/66, created on 2015-11-27 20:43:49
         compiled from "D:\Yandex.Disk\Projects\bikecms\templates\success.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_565896553fd8a6_57042785',
  'file_dependency' => 
  array (
    'bc8540f55347fc4cfa021f700c61cb8bac70bf79' => 
    array (
      0 => 'D:\\Yandex.Disk\\Projects\\bikecms\\templates\\success.tpl',
      1 => 1448645601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_565896553fd8a6_57042785')) {
function content_565896553fd8a6_57042785 ($_smarty_tpl) {
?>
<p>You have successfully added the article!!!</p>
<form method="post" action="/Article/Index">
	<input type="submit" method="post" name="Article" value="Index">
</form>
<?php }
}
