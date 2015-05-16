<?php
	echo '<span class="pageTitle">Administration</span>';
	include 'db_config.php';
	$dbTable = 'users';

	// Connecting, selecting database
	$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
	//echo 'Connected successfully';
	mysql_select_db($dbName) or die('Could not select database');

	// Performing SQL query
	$query = "SELECT * FROM $dbTable";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Printing results in HTML
	echo '<table class="table table-striped">'."\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo '<td><button type="button" class="btn btn-default">Edit</button></td>';
	    echo "\t</tr>\n";
	}
	echo "</table>\n";

	// Free resultset
	mysql_free_result($result);

	// Closing connection
	mysql_close($link);

?>