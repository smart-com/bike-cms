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
							{html_options name="catId" options=$cats selected=$catId}
						</td>
						<td>
							{html_options name="authId" options=$authors selected=$authId}
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
