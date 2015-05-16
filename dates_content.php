<?php

	include 'db_config.php';
	$dbTable = 'events';
	// Connecting, selecting database
	$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
	mysql_select_db($dbName) or die('Could not select database');

	// NEXT DATES
	// Performing SQL query
	$query = "SELECT * FROM $dbTable";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Printing results in HTML
	echo '<span class="pageTitle">Next events</span>';
	echo '<table class="table table-striped">'."\n";
	?>
    <thead>
      <tr>
        <th>Event Date</th>
        <th>Event Name</th>
        <th>Creator</th>
      </tr>
    </thead>
    <?
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
		printf("\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n", $row["event_date"], $row["event_name"],$row["user_fk"]);
	    echo "\t</tr>\n";


	    /*echo "\t<tr>\n";
	    foreach ($line as $col_value) {
	    	echo "LINE: $line, $col_value<br/>";
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";*/
	}
	echo "</table>\n";

	// Free resultset
	mysql_free_result($result);


	// Closing connection
	mysql_close($link);

?>