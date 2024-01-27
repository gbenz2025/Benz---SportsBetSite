<!DOCTYPE html>
<html>
	<head>
		<title>Account Info</title>
		<style type="text/css">
			body {font-family:"Verdana";}
			td,th {padding:5px;}
			h1 {text-align:left;}
			.right-align {text-align: right;}
		</style>
	</head>
	<body>
<h1> Account Info: </h1>
	<hr />
	
<?php
    $db = new mysqli("localhost", "root", "", "dumbluck");
    if ($db->connect_errno) {
        die("Could not connect to DB");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userID = $_POST["userID"];
        
        $query = "SELECT * FROM ACCOUNT WHERE userID = '$userID'";
        $result = $db->query($query);

		//again adding this code to help display data
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <table border="1">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Bank Account Number</th>
                    <th>Account Balance</th>
                    <th>Phone Number</th>
                    <th>State</th>
                </tr>
                <tr>
                    <td><?php echo $row["fname"]; ?></td>
                    <td><?php echo $row["lname"]; ?></td>
                    <td><?php echo $row["DoB"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["BankAccNum"]; ?></td>
                    <td><?php echo $row["AccBalance"]; ?></td>
                    <td><?php echo $row["phoneNum"]; ?></td>
                    <td><?php echo $row["state"]; ?></td>
                </tr>
            </table>
            <?php
        } else {
            echo "No account found with the provided ID.";
        }
    }
?>

	
	<p> <a href="actions.php"> Return to Home</a></p>
	</body>
</html>

