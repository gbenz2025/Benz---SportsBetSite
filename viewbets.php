<!DOCTYPE html>
<html>
	<head>
		<title>Your Bets</title>
		<style type="text/css">
			body {font-family:"Verdana";}
			td,th {padding:5px;}
			h1 {text-align:left;}
			.right-align {text-align: right;}
		</style>
	</head>
	<body>
<h1> Your Bets: </h1>
	<hr />
	
<?php
    $db = new mysqli("localhost", "root", "", "doofighters");
    if ($db->connect_errno) {
        die("Could not connect to DB");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userID = $_POST["userID"];
        
        $query = "SELECT * FROM TEAM_BETS WHERE userID = '$userID'";
        $result = $db->query($query);

		//again adding this code to help display data
		if ($result->num_rows > 0) {
            ?>
            <table border="1">
                <tr>
                    <th>Bet Amount Team A</th>
                    <th>Bet Amount Team B</th>
                    <th>Team A</th>
                    <th>Team B</th>
                    <th>Team A Odds</th>
                    <th>Team B Odds</th>
                </tr>
<?php
			while ($row = $result->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $row["amountForA"]; ?></td>
                    <td><?php echo $row["amountForB"]; ?></td>
                    <td><?php echo $row["teamA"]; ?></td>
                    <td><?php echo $row["teamB"]; ?></td>
                    <td><?php echo $row["team1odds"]; ?></td>
                    <td><?php echo $row["team2odds"]; ?></td>
                </tr>
            <?php
			}
?>
		</table>
<?php
        } else {
            echo "No account found with the provided ID.";
        }
	}
    
?>

<hr />

<?php
    $db = new mysqli("localhost", "root", "", "doofighters");
    if ($db->connect_errno) {
        die("Could not connect to DB");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userID = $_POST["userID"];
        
        $query = "SELECT * FROM PLAYER_BETS WHERE userID = '$userID'";
        $result = $db->query($query);

		//again adding this code to help display data
		if ($result->num_rows > 0) {
            ?>
            <table border="1">
                <tr>
                    <th>Bet Amount</th>
                    <th>Odds</th>
                    <th>Player</th>
                </tr>
<?php
			while ($row = $result->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $row["amountForPlayer"]; ?></td>
                    <td><?php echo $row["playerOdds"]; ?></td>
                    <td><?php echo $row["player"]; ?></td>
                </tr>
            <?php
			}
?>
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