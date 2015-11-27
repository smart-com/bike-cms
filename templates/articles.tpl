<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form method="post" action="/Article/Index">
			{html_options name="catId" options=$cats selected=$catId}
			{html_options name="authId" options=$authors selected=$authId}
			{html_options name="pubDate" options=$pubDates selected=$pubdate}
			<input type="submit" value="Refresh">
		</form>

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
			{foreach from=$articles item=$a}
				<tr>
					<td>{$a->id}</td>
					<td>{{$a->name|escape}}</td>
					<td>{$a->content}</td>
					<td>{$a->pubdate}</td>
					<td>{$a->category}</td>
					<td>{foreach from=$a->authors item=$a}{$a}<br />{/foreach}</td>
				</tr>
			{/foreach}
		</table>

		{* Форма передается post, чтобы не дублировался адрес в строке браузера*}
		<form method="post" action="/Article/Add">
			<input type="submit" method="post" name="Article" value="Add">
		</form>
	</body>
</html>
