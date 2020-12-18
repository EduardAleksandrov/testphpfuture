<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Task</title>
		<link rel="stylesheet" href="css/about.css">
	
		<style>
			#main {
				background-image: url('png/test.png');
				background-repeat: no-repeat;
				background-attachment: local;
				background-position:center top;
				height: 1040px;
			}
		</style>
	
	</head>
<body>
				
	<div id="main"> 
		<div class="note1"><b>Телефон: (499) 340-94-71<br><br>
													Email: <a href="">info@future-group.ru</a></b><br><br><br>
													<span class="letter">Комментарии</span>
		</div>
			
			
		<?php require_once 'php/push.php'; ?>
		
		<div id='MainSidebar'>	
			<?php
			$host='localhost';
			$user='Will';
			$password='password';
			$database='testdb';

			$link = mysqli_connect($host, $user, $password, $database) 
				or die("Ошибка " . mysqli_error($link)); 
     
			$query ="SELECT * FROM comments ORDER BY id DESC";
 
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
			if($result)
			{
				$rows = mysqli_num_rows($result); // количество полученных строк
				
				for ($i = 0 ; $i < $rows ; ++$i)
			{
				$row = mysqli_fetch_row($result);
						$time = substr($row[4],0,-3);	
						$date =  date("d.m.Y", strtotime($row[3]));
						echo "<p><b>$row[1]</b> <span style='font-size:14px; position:absolute;left:140px;white-space:pre;'>$time   $date</span></p>" ;
						echo "<span style='font-size:16px;':>$row[2]</span><br><br>";		
			
			}
     
			// очищаем результат
			mysqli_free_result($result);
			}
 
			mysqli_close($link);

			?>
		</div>

		<div class="note4"><hr class="hr-line"></div>
		<div class="note2"><b>Оставить комментарий</b></div>
		<div class="container">
				<form method="POST" >  
					<p>Ваше имя<br><br>
						<input type="text" name="names" class="text1" size="57" autocomplete="off" placeholder="Введите имя">
					</p><br>
					<p>Ваш комментарий<br><br>
						<textarea type="text" name="comment" cols="60" rows="5" placeholder="Введите комментарий"></textarea>
					</p>
					<p><input type="submit"  class="c-button" value="Отправить"></p>
				</form>
		</div>	
		
		<div class="note3">
			<b>Телефон: (499) 340-94-71<br>
			Email: <a href="">info@future-group.ru</a><br> 
			Адрес: <a href="">115088 Москва, ул. 2-я Машиностроения, д. 7, стр. 1</a><br></b><br>
			&copy; 2010-2014 Future. Все права защищены
		</div>
	
	
	</div>

</body>
</html>