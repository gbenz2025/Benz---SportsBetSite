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
<h1> You Placed a Bet! </h1>
	<hr />
<h2> 
    <hr />
<?php
$db = new mysqli("localhost", "root", "", "doofighters");
if ($db->connect_errno)
    die("Could not connect to DB");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$userID = $_POST["userID"];
		$amountForA = $_POST["amountForA"];
		$teamA = $_POST["teamA"];
		$team1odds = $_POST["team1odds"];
		$amountForB = $_POST["amountForB"];
		$teamB = $_POST["teamB"];
		$team2odds = $_POST["team2odds"];

// This below is extra code outside of class that I 
// decided was the easiest way to figure out how to get the results I wanted
    for ($i = 0; $i < count($amountForA); $i++) {
        $amountA = $amountForA[$i];
        $amountB = $amountForB[$i];

        if ($amountA > 0 || $amountB > 0) {
  
            $query = "INSERT INTO TEAM_BETS (amountForA, amountForB, teamA, team1odds, teamB, team2odds, userID) 
                      VALUES ('$amountA', '$amountB', '$teamA[$i]', '$team1odds[$i]', '$teamB[$i]', '$team2odds[$i]', '$userID')";

            if (!$db->query($query)) {
                echo "Error inserting bet: " . $db->error;
            }
        }
    }

    echo "Bets saved successfully!";
}
?>
<br>
<?php
$db = new mysqli("localhost", "root", "", "doofighters");
if ($db->connect_errno)
    die("Could not connect to DB");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$player = $_POST['player'];
		$amountForPlayer = $_POST['amountForPlayer'];
		$playerOdds = $_POST['playerOdds'];
		$userID = $_POST['userID'];

	// Same deal here
		for ($i = 0; $i < count($player); $i++) {
			$playerName = $player[$i];
			$betAmount = $amountForPlayer[$i];
			$betOdds = $playerOdds[$i];

		if ($betAmount > 0) {
			$query = "INSERT INTO PLAYER_BETS (player, amountForPlayer, playerOdds, userID)
					  VALUES ('$playerName', '$betAmount', '$betOdds', '$userID')";

            if (!$db->query($query)) {
                echo "Error inserting bet: " . $db->error;
            }
        }
    }

    echo "Bets saved successfully!";
}
?>
    <p><a href="actions.php">Return to Home Page</a></p>
</body>
</html>
