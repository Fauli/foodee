<?php

	include 'db_config.php';
	$dbTable = 'recipes';
	// Connecting, selecting database
	$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
	mysql_select_db($dbName) or die('Could not select database');

    // LATEST RECIEPES
	// Performing SQL query
	$query = "SELECT * FROM $dbTable";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Printing results in HTML
	echo '<span class="pageTitle">Latest reciepes</span>';
	echo '<table class="table table-striped">'."\n";
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

	// NEXT DATES
	$dbTable = 'events';
	// Performing SQL query
	$query = "SELECT * FROM $dbTable";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Printing results in HTML
	echo '<span class="pageTitle">Next events</span>';
	echo '<table class="table table-striped">'."\n";
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