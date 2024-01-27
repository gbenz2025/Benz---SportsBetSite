<!DOCTYPE html>
<html>
	<head>
		<title>Player Stats</title>
		<style type="text/css">
			body {font-family:"Verdana";}
			td,th {padding:5px;}
			h1 {text-align:left;}
			.right-align {text-align: right;}
		</style>
	</head>
	<body>
<h1> Player Stats: </h1>
	<hr />
	
<?php
    $db = new mysqli("localhost", "root", "", "dumbluck");
    if ($db->connect_errno) {
        die("Could not connect to DB");
    }

        $query = "SELECT * FROM PLAYER";
        $result = $db->query($query);

        //if ($result && $result->num_rows > 0) {
        //    $row = $result->fetch_assoc();
		if ($result->num_rows > 0) {
            ?>
            <table border="1">
                <tr>
                    <th>Name </th>
                    <th>Position</th>
                    <th>Number</th>
                </tr>
<?php
			while ($row = $result->fetch_assoc()) {
?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["position"]; ?></td>
                    <td><?php echo $row["number"]; ?></td>
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
