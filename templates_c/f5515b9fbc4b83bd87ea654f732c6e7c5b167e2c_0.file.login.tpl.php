<?php /* Smarty version 3.1.28-dev/66, created on 2015-11-11 16:27:56
         compiled from "D:\Yandex.Disk\Projects\bikecms\templates\login.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_5643425c9795d3_07406997',
  'file_dependency' => 
  array (
    'f5515b9fbc4b83bd87ea654f732c6e7c5b167e2c' => 
    array (
      0 => 'D:\\Yandex.Disk\\Projects\\bikecms\\templates\\login.tpl',
      1 => 1447248471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_5643425c9795d3_07406997')) {
function content_5643425c9795d3_07406997 ($_smarty_tpl) {
?>
<div>
	<form action="/Login" method="POST">
		Привет, <?php echo $_SESSION['user'];?>

		<input type="hidden" name="uri" value="<?php echo $_SERVER['REQUEST_URI'];?>
"/>
		<?php if ($_SESSION['user']) {?>
			<input type="submit" value="Sign out..."/>
		<?php } else { ?>
			Login: <input type="text" name="login"/>
			Password: <input type="password" name="pswd"/>
			<input type="submit" value="Sign in!"/>
		<?php }?>
	</form>
</div>
<?php }
}
