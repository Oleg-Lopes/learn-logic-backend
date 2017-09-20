<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<body>
	<?php
		$addr = $_POST['addr'];
		$theme = $_POST['theme'];
		$text = $_POST['text'];
		if (isset($addr) && isset($theme) && isset($text)
				&& $addr != "" && $theme != "" && $text != "") {
			if (mail($addr, $theme, $text, "From: rozetta212@gmail.com")) {
				echo "<h3>Сообщение отправлено</h3>";
			}
		else {
				echo "<h3>При отправке сообщения возникла ошибка</h3>";
			}
		}
		echo date('Y-m-d');
	?>
	<form action="" method="post">
		<p>
			<label for="addr">eMail:</label>
			<input type="text" name="addr" id="addr" size="30" />
		</p>
		<p>
			<label for="theme">Тема письма:</label>
			<input type="text" name="theme" id="theme" size="30" />
		</p>
		<p>
			<label for="text">Текст письма:</label>
			<textarea rows="10" cols="20" name="text" id="text"></textarea>
		</p>
		<p>
			<input type="submit" value="Отправить" />
		</p>
	</form>
</body>
</html>