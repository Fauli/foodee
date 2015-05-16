<?php

	include 'db_config.php';
	$dbTable = 'recipes';
	// Connecting, selecting database
	$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
	mysql_select_db($dbName) or die('Could not select database');

    //  ## LATEST RECIEPES
	// Performing SQL query
	$query = "SELECT r.name, r.description, r.url, u.username, r.date, r.instructions, r.eaters FROM recipes r LEFT OUTER JOIN users u on r.user_fk = u.users_id;";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Printing results in HTML
	echo '<span class="pageTitle">Last added recipes</span>';
	echo '<table class="table table-striped">'."\n";
	?>
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>URL</th>
        <th># persons</th>
        <th>Added by</th>
        <th>Added on</th>
      </tr>
    </thead>
    <?
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
		printf("\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n", $row["name"], $row["description"],$row["url"],$row["eaters"],$row["username"],$row["date"]);
	    echo "\t</tr>\n";
	}
	echo "</table>\n";
	echo '<button type="button" class="btn btn-default">Add new recipe</button><br />';

	// Free resultset
	mysql_free_result($result);

	// ## END OF LATEST RECIPES SECTION

	//  ## NEXT EVENTS
	$dbTable = 'events';
	// Performing SQL query
	$query = "SELECT e.event_date, e.event_name, u.username FROM events e LEFT OUTER JOIN users u on e.user_fk = u.users_id";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Printing results in HTML
	echo '<span class="pageTitle">Interesting events</span>';
	echo '<table class="table table-striped">'."\n";
	?>
    <thead>
      <tr>
        <th>Date</th>
        <th>Name</th>
        <th>Creator</th>
      </tr>
    </thead>
    <?
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
		printf("\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n", $row["event_date"], $row["event_name"],$row["username"]);
	    echo "\t</tr>\n";
	}
	echo "</table>\n";
	echo '<button type="button" class="btn btn-default">Add new event</button><br />';

	// Free resultset
	mysql_free_result($result);

	// ## END OF NEXT EVENTS SECTION


	// Closing connection
	mysql_close($link);

?>