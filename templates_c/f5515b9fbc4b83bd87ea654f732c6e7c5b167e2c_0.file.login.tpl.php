<?php /* Smarty version 3.1.28-dev/66, created on 2015-12-01 19:42:33
         compiled from "D:\Yandex.Disk\Projects\bikecms\templates\login.tpl" */ ?>
<?php
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/66',
  'unifunc' => 'content_565dcdf97c7cc2_35484172',
  'file_dependency' => 
  array (
    'f5515b9fbc4b83bd87ea654f732c6e7c5b167e2c' => 
    array (
      0 => 'D:\\Yandex.Disk\\Projects\\bikecms\\templates\\login.tpl',
      1 => 1448988148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false);
if ($_valid && !is_callable('content_565dcdf97c7cc2_35484172')) {
function content_565dcdf97c7cc2_35484172 ($_smarty_tpl) {
?>
<div>
	<form action="/Login" method="POST">
		<input type="hidden" name="uri" value="<?php echo $_SERVER['REQUEST_URI'];?>
"/>
		<?php if ($_SESSION['user']) {?>
			Привет, <?php echo $_SESSION['user'];?>

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
