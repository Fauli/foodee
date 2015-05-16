<?php
echo '<span class="pageTitle">Recipes</span>';
session_start();
include 'db_config.php';
$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db($dbName) or die('Could not select database');

//tables
echo "<p>tables:</p>";
doQuery("show tables");

//ingredients
echo "<p>ingredients:</p>";
doQuery("desc ingredients");

//pictures
echo "<p>pictures:</p>";
doQuery("desc pictures");

//recipes
echo "<p>recipes:</p>";
doQuery("desc recipes");

//recipes_ingredients
echo "<p>recipes_ingredients:</p>";
doQuery("desc recipes_ingredients");

//units
echo "<p>units:</p>";
doQuery("desc units");

//users
echo "<p>users:</p>";
doQuery("desc users");

function doQuery($query) {
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	echo "<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($line as $col_value) {
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
	}
	echo "</table>\n";
	mysql_free_result($result);
}

mysql_close($link);
?>