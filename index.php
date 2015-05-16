<html>
	<head>
		<title>FooDee</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		</link>
		<!-- TODO: ADD OWN SCRIPTS ON SERVER -->
		<!-- Latest compiled and minified CSS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id='wrapper'>
			<div id='header'>
				<!-- Header goes here -->

				<?php
					session_start();
					if (isset($_SESSION['username'])) {
				?>
				<div id="logoutWrapper">
					<form id="logoutForm" method="post" action="logout.php" class="loginform">
					<!--<fieldset> -->
						<input class="btn btn-default" type="submit" value="Logout" />
					<!--</fieldset> -->
					</form>
				</div>
				<?php 
					} 
				?>
			</div>
			<div id='navigation'>
				<ul class="navigationList">
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=home"><button type="button" class="btn btn-default">Home</button></a>
					</li>
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=rezepte"><button type="button" class="btn btn-default">Rezepte</button></a>
					</li>
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=termine"><button type="button" class="btn btn-default">Termine/Essen</button></a>
					</li>
					<li class="navigationItem">
						<a class="navigationLink" href="index.php?page=admin"><button type="button" class="btn btn-default">Admin</button></a>
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
