<?php

include 'db_config.php';
$dbTable = 'events';
$dbTable2 = 'participants';
$dbTable3 = 'users';
// Connecting, selecting database
$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
mysql_select_db($dbName) or die('Could not select database');

// NEXT DATES
// Performing SQL query
$query = "select event_id,username,event_date,event_name, (select count(*) from $dbTable2 a where a.event_fk=b.event_id) as participants from $dbTable b, $dbTable3 c where b.user_fk=c.users_id";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo '<span class="pageTitle">Next events</span>';
echo '<table class="table table-striped">' . "\n";
?>
<script>
$(document).ready(function(){$('[data-toggle="participants"]').tooltip();});

</script>
<thead>
	<tr>
		<th>Event Date</th>
		<th>Event Name</th>
		<th>Creator</th>
		<th>Participants</th>
		<th>Participate</th>
	</tr>
</thead>
<?
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	echo "\t<tr>\n";
	printf("\t\t<td>%s</td>\n\t\t
	<td>%s</td>\n\t\t
	<td>%s</td>\n\t\t
	<td><a id=\"show_participants\" href=\"#\" data-toggle=\"participants\" title=\"showParticipants(%s);\">%s</a></td>\n\t\t
	<td>
<a class=\"standardLink\" href=\"http://foodee.sbebe.ch/index.php?page=participate&event_id=%s\"><button type=\"button\" class=\"btn btn-success\">participate</button></a>
</td>\n", $row["event_date"], $row["event_name"], $row["username"], $row["event_id"], $row["event_id"], $row["participants"], $row["event_id"]);
	echo "\t</tr>\n";

	/*echo "\t<tr>\n";
	 foreach ($line as $col_value) {
	 echo "LINE: $line, $col_value<br/>";
	 echo "\t\t<td>$col_value</td>\n";
	 }
	 echo "\t</tr>\n";*/
}
echo "</table>\n";
echo '<button type="button" class="btn btn-default">Add new event</button><br />';

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>