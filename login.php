<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<style type="text/css">
			body {font-family:"Verdana";}
			td,th {padding:5px;}
			h1 {text-align:left;}
			.right-align {text-align: right;}
		</style>
	</head>
	<body>
		<h1> DumbLuck </h1>
		<hr />
		<h2> Login / Sign Up: </h2>
		<form method="post" action="actions.php">
			<table>  
				<tr>
					</td>
				</tr>
				<tr> 
					<td> Customer First Name: </td>
					<td> <input type="text" name="fname" /> </td>
				</tr>
				<tr> 
					<td> Customer Last Name: </td>
					<td> <input type="text" name="lname" /> </td>
				</tr>
				<tr> 
					<td> Email: </td>
					<td> <input type="text" name="email" /> </td>
				</tr>
				<tr> 
					<td> Phone Number: </td>
					<td> <input type="number" name="phonenum" /> </td>
				</tr>
				<tr> 
					<td> Date of Birth: </td>
					<td> <input type="date" name="DoB" /> </td>
				</tr>
				<tr> 
					<td> State: </td>
					<td> <select id="states" name="state">
							<option value="AZ">AZ</option>
							<option value="AR">AR</option>
							<option value="CO">CO</option>
							<option value="CT">CT</option>
							<option value="IL">IL</option>
							<option value="IN">IN</option>
							<option value="IA">IA</option>
							<option value="KS">KS</option>
							<option value="KY">KY</option>
							<option value="LA">LA</option>
							<option value="MD">MD</option>
							<option value="MA">MA</option>
							<option value="MI">MI</option>
							<option value="NV">NV</option>
							<option value="NH">NH</option>
							<option value="NJ">NJ</option>
							<option value="NY" selected="selected">NY</option>
							<option value="OH">OH</option>
							<option value="OR">OR</option>
							<option value="PA">PA</option>
							<option value="RI">RI</option>
							<option value="TN">TN</option>
							<option value="VA">VA</option>
							<option value="DC">DC</option>
							<option value="WV">WV</option>
							<option value="WY">WY</option>
						</select>
					</td>
				</tr>
			</table>
			<tr>
				<td> <input type="submit" value="Submit" /> </td>
			</tr>
			<tr>
				<td> <input type="reset" value="Reset" /> </td>
			</tr>
		</form>
		<hr />
	</body>
</html>
