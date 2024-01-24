<!DOCTYPE html>
<html>
	<head>
		<title>Actions</title>
		<style type="text/css">
			body {font-family:"Verdana";}
			td,th {padding:5px;}
			h1 {text-align:left;}
			.right-align {text-align: right;}
		</style>
	</head>
	<body>
<h1> Welcome! </h1>
	<hr />
	<?php
		$db=new mysqli("localhost","root","","doofighters");
			if($db->connect_errno)
					die("Could not connect to DB");
				

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$fname = $_POST["fname"];
				$lname = $_POST["lname"];
				$email = $_POST["email"];
				$phonenum = $_POST["phonenum"]; 
				$DoB = $_POST["DoB"]; 
				$state = $_POST["state"]; 

				$query = "SELECT * FROM ACCOUNT WHERE fname = '$fname' AND lname = '$lname' AND email = '$email'";
				$result = $db->query($query);

				if ($result->num_rows > 0) {
					echo "Welcome back  $fname!";
				} else {
					$insertQuery = "INSERT INTO ACCOUNT (fname, lname, email, phonenum, DoB, state) VALUES ('$fname', '$lname', '$email', '$phonenum', '$DoB', '$state')";
				
					if ($db->query($insertQuery) === TRUE) {
						echo '<span style="font-size: 16px;">' . '<br>Welcome First Time User ' . $_POST['fname'] .'! We have added you to our customer database' . '</span>';
					} else {
						echo "Error adding customer: " . $db->error;
					}
				}				
			}
	?>
<h2> Actions:

	<p> <a href="placebet.php"> Place a Bet</a></p>
	
	<p> <a href="addfunds.php"> Add Funds to Your Account</a></p>
	
	
	
<hr />
	
	<p> <a href="viewaccountinfopointer.php"> View your Account Info</a></p>
	<p> <a href="viewbetspointer.php"> View your Bets</a></p>
	<p> <a href="viewteams.php"> View Team Stats</a></p>
	<p> <a href="viewplayers.php"> View Player Stats</a></p>
	
	
<hr />
	<p> <a href="login.php"> Return to Login</a></p>
	</body>
</html>