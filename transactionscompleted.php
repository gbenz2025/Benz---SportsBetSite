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
<h1> Sweet! </h1>
	<hr />
<h2> Transaction Status:

<br>
<?php
		$db=new mysqli("localhost","root","","dumbluck");
			if($db->connect_errno) {
					die("Could not connect to DB");
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$BankAccNum = $_POST["BankAccNum"];
				$amount = $_POST["amount"];
				$lname = $_POST["lname"];

			
			
				$query = "SELECT * FROM ACCOUNT WHERE BankAccNum = '$BankAccNum'";
				$result = $db->query($query);

				if ($result->num_rows == 0) {
					$insertAccQuery = "INSERT INTO ACCOUNT (BankAccNum) 
									SELECT lname
									FROM ACCOUNT
									VALUES ('$BankAccNum')";
					$db->query($insertAccQuery);
					echo '<span style="font-size: 16px;">' . '<br> Your Bank Account Has Been Added' . '</span>';
					$insertAmountQuery = "INSERT INTO ACCOUNT (AccBalance) 
										SELECT lname
										FROM ACCOUNT
										VALUES ('$amount')";
					$db->query($insertAmountQuery);
					
					
					
				} else {
					echo "<br>Your Transaction is Complete!";
						$insertAmountQuery2 = "UPDATE ACCOUNT
											SET AccBalance = AccBalance + '$amount'
											WHERE lname = '$lname'";
						$db->query($insertAmountQuery2);
				}
			}
?>

		<p> <a href="actions.php"> Return to Home Page</a></p>
	</body>
</html>
