<?php session_start();?>
<!DOCTYPE HTML>
<html lang="ru">

	<head>
		<meta charset="utf-8"/>
		
		<title>Web №1</title>

		<link rel="shortcut icon" href="img/favicon.ico">
		<link rel="stylesheet" href="style.css">
	</head>

	<body>

		<div id="header">
			
			<span class="header-content">Студент: Грудогло Никита || Группа: P3230 || Вариант: 2629</span>
				
		</div>
		
		<div id="workspace-container">
			
			<!-- AREA -->
			<div class="workspace-item-container">
				
				<h1>Область</h1>

				<div class="horisontal-centering-container">
					<canvas id="task-chart"></canvas>
				</div>

			</div>
				
			<!-- PARAMETERS -->	
			<div class="workspace-item-container">

				
				<h1>Параметры</h1>
				
				<form method="post" id="computation-form" name="form" onsubmit="return validate(this);">
				
					<div class="parameter-form-container">
						
						<!-- BUTTON -->
						<div class="parameter-container">
							<label class="parameter-label">X:</label>
							<input type="text" name="X" id="X-param" placeholder="(-5 ... 3)" maxlength="10">
							<span id="warning-container-X" class="warning-container"></span>
						</div>
						
						<!-- TEXT -->
						<div class="parameter-container">
							<label class="parameter-label">Y:</label>
							<input type="text" name="Y" id="Y-param" placeholder="(-3 ... 3)" maxlength="10">
							<span id="warning-container-Y" class="warning-container"></span>
						</div>

						<!-- RADIO -->					
						<div class="parameter-container">
							<label class="parameter-label">R:</label>
						    <input type="checkbox" id="R-param1" name="R" value="1.0">
						    <label class="parameter-label-R" for="R-param1">1.0</label>
						    <input type="checkbox" id="R-param2" name="R" value="1.5">
						    <label class="parameter-label-R" for="R-param2">1.5</label>
						    <input type="checkbox" id="R-param3" name="R" value="2.0">
						    <label class="parameter-label-R" for="R-param3">2.0</label>
						    <input type="checkbox" id="R-param4" name="R" value="2.5">
						    <label class="parameter-label-R" for="R-param4">2.5</label>
						    <input type="checkbox" id="R-param5" name="R" value="3.0">
						    <label class="parameter-label-R" for="R-param5">3.0</label>
							<span id="warning-container-R" class="warning-container"></span>
						
						<div>
							<input type="hidden" name="uniqid" value="">
						</div>				 				
						
						</div>
						<!-- SUBMIT -->
						<div class="horisontal-centering-container">
						
							<button class="submit-button" type="submit">Отправить</button>
						
						</div>
					
					</div>

				</form>

			</div>
		
		</div>
		
		<div id="result-container" class="horisontal-centering-container">
			
			<h1>
				Результат
				<?php include 'check.php'; ?>
			</h1>
			
		</div>

	<script src="js/validate.js"></script>
	<script src="js/create-chart.js"></script>
</body>

</html>
