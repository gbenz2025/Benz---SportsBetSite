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
<h1> Add Account / Funds </h1>
	<hr />
<h2> Actions:
	<form method="post" action="transactionscompleted.php">
		<table>  
			<tr> 
				<td> Bank Account Number: </td>
				<td> <input type="text" name="BankAccNum" /> </td>
			</tr>
			<tr> 
				<td> Amount: </td>
				<td> <input type="text" name="amount" /> </td>
			</tr>
			<tr> 
				<td> Last Name: </td>
				<td> <input type="text" name="lname" /> </td>
			</tr>
		</table>
			<tr>
				<td> <input type="submit" value="Submit Your Transaction" /> </td>
			</tr>
			<tr>
				<td> <input type="reset" value="Reset Your Form" /> </td>
			</tr>
	</form>
		
		<p> <a href="actions.php"> Return to Last Page</a></p>
