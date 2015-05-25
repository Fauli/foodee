<?php
//echo '<span class="pageTitle">-</span>';
session_start();
include 'db_config.php';
$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db($dbName) or die('Could not select database');

// get the q parameter from URL
if (isset($_REQUEST["event_id"])) {
	$event_id = $_REQUEST["event_id"];
	$dbTable = 'participants';
	$dbTable2 = 'users';
	doQuery("select username from $dbTable a, $dbTable2 b where a.event_fk=$event_id and a.user_fk=b.users_id");
	//doQuery("select * from $dbTable");
} else {
	echo "woopwoop";
}

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