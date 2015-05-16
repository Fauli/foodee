<?php
session_start();
include 'db_config.php';
$link = mysql_connect($dbHost, $dbUser, $dbPwd) or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db($dbName) or die('Could not select database');

// desc usertable
// $query = "desc $dbUsertbl";
// $result = mysql_query($query) or die('Query failed: ' . mysql_error());
// echo "<table>\n";
// while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
// echo "\t<tr>\n";
// foreach ($line as $col_value) {
// echo "\t\t<td>$col_value</td>\n";
// }
// echo "\t</tr>\n";
// }
// echo "</table>\n";
// mysql_free_result($result);

//
//query = "insert into users (username, password) values ('asdf1',password('asdf1'))";
//$result = mysql_query($query) or die('Query failed: ' . mysql_error());
//mysql_free_result($result);

// entries usertable
// $query = "select * from $dbUsertbl";
// $result = mysql_query($query) or die('Query failed: ' . mysql_error());
// echo "<table>\n";
// while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
// echo "\t<tr>\n";
// foreach ($line as $col_value) {
// echo "\t\t<td>$col_value</td>\n";
// }
// echo "\t</tr>\n";
// }
// echo "</table>\n";
// mysql_free_result($result);

//here
if (!isset($_SESSION['username'])) {
	if (isset($_POST['login_username']) && isset($_POST['login_password'])) {
		$login_username = $_POST['login_username'];
		$login_password = $_POST['login_password'];
		if (!empty($login_username) && !empty($login_password)) {
			$query = "SELECT username, password, isAdmin FROM $dbUsertbl WHERE username='" . mysql_real_escape_string($login_username) . "' AND password=PASSWORD('" . mysql_real_escape_string($login_password) . "')";
			$result = mysql_query($query) or die('Query failed: ' . mysql_error());
			if ($result) {
				$query_num_rows = mysql_num_rows($result);
				if ($query_num_rows != 1) {
					header("Location:index.php");
				} else {
					$_SESSION['username'] = $_POST['login_username'];
					while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
						$_SESSION['isAdmin'] = $row["isAdmin"];
						//echo "is admin is now: ".$row['isAdmin']." on session";
					}
					mysql_free_result($result);
					mysql_close($link);
					header("Location: index.php?page=home");
exit();
				}
			} else {
				//echo 'sql error ' . mysql_error();

				header("Location: index.php?page=home0");
exit();
			}
			mysql_free_result($result);
			mysql_close($link);
		} else {

			header("Location: index.php?page=home1");
exit();
		}
	} else {

		header("Location: index.php?page=home2");
exit();
	}
} else {

	header("Location: index.php?page=home3");
exit();
}

header("Location: index.php?page=home4");
exit();
?>