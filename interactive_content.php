<?php
//echo '<span class="pageTitle">-</span>';
session_start();
include 'db_config.php';
$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db($dbName) or die('Could not select database');


// get the q parameter from URL
$event_id = $_REQUEST["event_id"];
$dbTable = 'participants';
doQuery("select * from $dbTable a where a.event_fk=$event_id");
//doQuery("select * from $dbTable");


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