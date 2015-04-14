<html>
	<head>
		<title>FooDee</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		</link>
	</head>
	<body>
		<div id='wrapper'>
			<div id='header'>
				<!-- Header goes here -->

				<?php
					session_start();
					if (isset($_SESSION['username'])) {
				?>
				<form method="post" action="logout.php" class="loginform">
					<fieldset>
						<input type="submit" value="Usloggääh" />
					</fieldset>
				</form>
				<?php 
					} 
				?>
			</div>
			<div id='navigation'>
				<ul class="navigationList">
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=home">Home</a>
					</li>
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=rezepte">Rezepte</a>
					</li>
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=termine">Termine/Essen</a>
					</li>
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=admin">Admin</a>
					</li>
				</ul>
			</div>
			<div id='content'>
				<?php

				$pageParam = $_GET['page'];

				// DO SESSION CHECK HERE
				// GO INTO BELOW IF WHEN THE SESSION IS VALID

				if (isset($_SESSION['username'])) {

					# ROUTER
					if ($pageParam == 'home') {
						$dbTable = 'recipes';
						include 'index_content.php';

					} elseif ($pageParam == 'rezepte') {
						$dbTable = 'recipes';
						include 'recipes_content.php';

					} elseif ($pageParam == 'termine') {
						$dbTable = 'pictures';
						include 'dates_content.php';

					} elseif ($pageParam == 'admin') {
						$dbTable = 'users';
						include 'admin_content.php';

					} else {
						echo 'Page not found, you foolish hacker ^^';
						http_response_code(404);
						exit ;
					}

					// DISPLAY THE LOGIN PAGE HERE IN AN ELSE IF THE SESSION IS NOT ESABLISHED
					// SOMEWHAT LIKE:

				} else {
					include 'login.php';
				}
				?>
			</div>
		</div>
