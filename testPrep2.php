<!DOCTYPE html>
<html>
<head>
	<title>A BASIC HTML FORM</title>

<?PHP 
$email = "";
$passW = "";
$uName = "";
$date1 = "";
if (isset($_POST['Submit1'])){
	require 'configure.php';

	$uName = $_POST['user'];
	$email = $_POST['email'];
	$passW = $_POST['pass'];
	$date1 = $_POST['date1'];
	$_POST['membertest'] = 'membertest';//Or u can use CONSTANTS


	$database = $_POST['membertest'];
	$db_found = new mysqli (DB_SERVER, DB_USER, DB_PASS, $_POST['membertest']);

	if ($db_found) {
		$SQL = $db_found->prepare("INSERT INTO members (username, password,email,date) VALUES(?, ?, ?, ?)");
		$SQL->bind_param("ssss", $uName, $passW, $email, $date1);

		
		$SQL->execute();
		$SQL->close();
		$db_found->close();
		print "New row inserted";

	}

	else
		{
			print "Database NOT found";
		}
	}
?>

</head>
<body>
	<FORM NAME ="form1" METHOD ="POST" ACTION ="testPrep2.php">
	user <input type="TEXT" name="user" value="test2"><BR>
	Pass <input type="TEXT" name="pass" value="test2"><BR>
	email address <input type="TEXT" name="email" value="<?php print $email; ?>">	
	Date <input type="date" name="date1" value="Enter Date"> <BR>

	<input type = "Submit" Name = "Submit1" value = "Login"> 
	</FORM>

</body>
</html>
