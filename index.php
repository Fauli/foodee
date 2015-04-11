<html>
<head>
<title>FooDee</title>
<link rel="stylesheet" type="text/css" href="style.css"></link>
</head>
<body>
<div id='wrapper'>
	<div id='header'>
		Header goes here
	</div>
	<div id='navigation'>
		<ul class="navigationList">
			<li class="navigationItem"><a class="navigationLink" href="index.php?page=home">Home</a></li>
			<li class="navigationItem"><a class="navigationLink" href="index.php?page=rezepte">Rezepte</a></li>
			<li class="navigationItem"><a class="navigationLink" href="index.php?page=termine">Termine/Essen</a></li>
			<li class="navigationItem"><a class="navigationLink" href="index.php?page=admin">Admin</a></li>

		</ul>
	</div>
	<div id='content'>
		<?php
		$dbHost = 'localhost';
		$dbUser = 'foodee';
		$dbPwd = 'f00d33is1337!';
		$dbName = 'foodee';
		$dbTable = 'recipes';

		$pageParam = $_GET['page'];

		if ($pageParam == 'home') {
			$dbTable = 'recipes';
		} elseif ($pageParam == 'rezepte') {
			$dbTable = 'recipes';
		} elseif ($pageParam == 'termine') {
			$dbTable = 'pictures';
		} elseif ($pageParam == 'admin') {
			$dbTable = 'users';
		} else {
			echo 'Page not found, you foolish hacker ^^';
			http_response_code(404);
			exit;
		}


		// Connecting, selecting database
		$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
		echo 'Connected successfully';
		mysql_select_db($dbName) or die('Could not select database');

		// Performing SQL query
		$query = "SELECT * FROM $dbTable";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());

		// Printing results in HTML
		echo "<table>\n";
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    echo "\t<tr>\n";
		    foreach ($line as $col_value) {
		        echo "\t\t<td>$col_value</td>\n";
		    }
		    echo "\t</tr>\n";
		}
		echo "</table>\n";

		// Free resultset
		mysql_free_result($result);

		// Closing connection
		mysql_close($link);
		?>
	</div>
</div>