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
		echo '<button type="button" onClick="mytest()" class="btn btn-default">Add new user</button><br />';

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

