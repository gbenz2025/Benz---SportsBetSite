<!DOCTYPE html>
<html>
<head>
    <title>Place a Bet</title>
    <style type="text/css">
        body {font-family:"Verdana";}
        td,th {padding:5px;}
        h1 {text-align:left;}
        .right-align {text-align: right;}
    </style>
</head>
<body>
<h1> Place a Bet! </h1>
<hr />

<h2> Game Bets: </h2>
<?php
	$db = new mysqli("localhost", "root", "", "dumbluck");
	if ($db->connect_errno) {
		die("Could not connect to DB");
	}
	
	$queryTeams = "SELECT t1.name AS teamA, t2.name AS teamB, te.team1odds, te.team2odds
				   FROM TEAM_EVENT te
				   INNER JOIN TEAM t1 ON te.teamA = t1.teamID
				   INNER JOIN TEAM t2 ON te.teamB = t2.teamID";

	$resultTeams = $db->query($queryTeams);

if ($resultTeams->num_rows > 0) {
?>
    <form method="post" action="betscompleted.php">
        <table border="1">
            <tr>
                <td>Bet A Amount</td>
                <td>Team A</td>
                <td>Odds</td>
                <td>Team B</td>
                <td>Odds</td>
                <td>Bet B Amount</td>
            </tr>
<?php	
            while ($row = $resultTeams->fetch_assoc()) {
?>
                <tr>
                    <td> <input type="number" name="amountForA[]" step="0.01" /> </td>
                    <input type="hidden" name="teamA[]" value="<?php echo $row['teamA']; ?>" />
                    <input type="hidden" name="team1odds[]" value="<?php echo $row['team1odds']; ?>" />
                    <td><?php echo $row['teamA']; ?></td>
                    <td><?php echo $row['team1odds']; ?></td>
                    <td><?php echo $row['teamB']; ?></td>
                    <td><?php echo $row['team2odds']; ?></td>
                    <td> <input type="number" name="amountForB[]" step="0.01" /> </td>
                    <input type="hidden" name="teamB[]" value="<?php echo $row['teamB']; ?>" />
                    <input type="hidden" name="team2odds[]" value="<?php echo $row['team2odds']; ?>" />
                </tr>
                <?php
            }
?>
</table>

<br>
<br>
<hr />
<h2> Player Bets: </h2>
<?php
        $queryPlayers = "SELECT DISTINCT pe.playerOdds, pe.overunder, pe.type, p.name
                        FROM PLAYER_EVENT pe
                        INNER JOIN PLAYER p ON pe.playerID = p.playerID";

        $resultPlayers = $db->query($queryPlayers);

        if ($resultPlayers->num_rows > 0) {
?>
            <table border="1">
                <tr>
                    <td>Bet Amount</td>
                    <td>Player</td>
                    <td>Type</td>
                    <td>Stat</td>
                    <td>Odds</td>
                </tr>
<?php
                while ($row = $resultPlayers->fetch_assoc()) {
?>
                    <tr>
                        <td> <input type="number" name="amountForPlayer[]" step="0.01" /> </td>
                        <input type="hidden" name="player[]" value="<?php echo $row['name']; ?>" />
                        <input type="hidden" name="type[]" value="<?php echo $row['type']; ?>" />
                        <input type="hidden" name="overunder[]" value="<?php echo $row['overunder']; ?>" />
                        <input type="hidden" name="playerOdds[]" value="<?php echo $row['playerOdds']; ?>" />
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['overunder']; ?></td>
                        <td><?php echo $row['playerOdds']; ?></td>
                    </tr>
<?php
                }
?>
            </table>
<?php
        } else {
            echo "<p>No Order Info Yet</p>";
        }
?>
<br>
<br>
<hr />
        <tr>
            <td> USER ID: <input type="number" name="userID" /> </td>
        </tr>

        <tr>
            <td> <input type="submit" value="Submit" /> </td>
        </tr>
        <tr>
            <td> <input type="reset" value="Reset" /> </td>
        </tr>
    </form>
    <p> <a href="actions.php">Return to Last Page</a></p>
<?php
} else {
    echo "<p>No Team Info Yet</p>";
}
?>
</body>
</html>

