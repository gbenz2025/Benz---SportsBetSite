<!DOCTYPE html>
<html>
	<head>
		<title>Team Statistics</title>
		<style type="text/css">
			body {font-family:"Verdana";}
			td,th {padding:5px;}
			h1 {text-align:left;}
			.right-align {text-align: right;}
		</style>
	</head>
	<body>
<h1> Team Statistics: </h1>
	<hr />
	
<?php
    $db = new mysqli("localhost", "root", "", "dumbluck");
    if ($db->connect_errno) {
        die("Could not connect to DB");
    }

        $query = "SELECT * FROM TEAM";
        $result = $db->query($query);

		if ($result->num_rows > 0) {
            ?>
            <table border="1">
                <tr>
                    <th>Team Name </th>
                    <th>Players</th>
                    <th>Wins</th>
                    <th>Losses</th>
                    <th>Sport</th>
                </tr>
<?php
			while ($row = $result->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["players"]; ?></td>
                    <td><?php echo $row["wins"]; ?></td>
                    <td><?php echo $row["losses"]; ?></td>
                    <td><?php echo $row["sport"]; ?></td>
                </tr>
            <?php
			}
?>
		</table>
<?php
        } else {
            echo "No account found with the provided ID.";
        }
    
?>

	<p> <a href="actions.php"> Return to Home</a></p>
	</body>
</html>
