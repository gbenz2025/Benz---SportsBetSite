<!DOCTYPE html>
<html>
	<head>
		<title>Access Your Bets</title>
		<style type="text/css">
			body {font-family:"Verdana";}
			td,th {padding:5px;}
			h1 {text-align:left;}
			.right-align {text-align: right;}
		</style>
	</head>
	<body>
<h1> View Your Bets: </h1>
	<hr />
	<form method="post" action="viewbets.php">
		<table>  
			<tr> 
				<td> Account ID Number: </td>
				<td> <input type="text" name="userID" /> </td>
			</tr>
		</table>
			<tr>
				<td> <input type="submit" value="Submit" /> </td>
			</tr>
			<tr>
				<td> <input type="reset" value="Reset Your Form" /> </td>
			</tr>
	</form>
		
		<p> <a href="actions.php"> Return to Home Page</a></p>
		
	</body>
</html>