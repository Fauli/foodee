<?php
	echo '<span class="pageTitle">Administration</span>';
	if($_SESSION['isAdmin'] == 1 ) {
		include 'db_config.php';
		$dbTable = 'users';

		// Connecting, selecting database
		$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		mysql_select_db($dbName) or die('Could not select database');

		// Performing SQL query
		$query = "SELECT username, firstname, lastname, email, isAdmin FROM $dbTable";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());

		// Printing results in HTML
	echo '<span class="pageTitle">Last added recipes</span>';
	echo '<table class="table table-striped">'."\n";
	?>
    <thead>
      <tr>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>e-mail</th>
        <th>is an admin</th>
      </tr>
    </thead>
    <?
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    $isAdmin = 'false';
	    if($row['isAdmin'] == 1){
	    	$isAdmin = 'true';
	    }
		printf("\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n", $row["username"], $row["firstname"],$row["lastname"],$row["email"],$isAdmin);
	    echo "\t</tr>\n";
	}
	echo "</table>\n";
	echo '<button type="button" class="btn btn-default">Add new user</button><br />';

		// Free resultset
		mysql_free_result($result);

		// Closing connection
		mysql_close($link);
	} else {
		echo '<p>You should not be here, go away you fool!</p>';
	}

?>

	<!--// TODO: STRICTLY FOR TESTING; MOVE IT TO THE RIGHT PLACE-->
	<script>
	function mytest() {
		// maybe: http://nakupanda.github.io/bootstrap3-dialog/
		alert('Would now show stuff');
		/*BootstrapDialog.show({
            message: $('<div></div>').load('http://google.com')
        });*/
	}
	</script>

