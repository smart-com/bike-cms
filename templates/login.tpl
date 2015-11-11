<div>
	<form action="/Login" method="POST">
		<input type="hidden" name="uri" value="{$smarty.server.REQUEST_URI}"/>
		{if $smarty.session.user}
			Привет, {$smarty.session.user}
			<input type="submit" value="Sign out..."/>
		{else}
			Login: <input type="text" name="login"/>
			Password: <input type="password" name="pswd"/>
			<input type="submit" value="Sign in!"/>
		{/if}
	</form>
</div>
