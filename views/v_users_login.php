<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>  Login  </title>

	<style type="text/css">
	
body	{	background-image: url(../images/lv.jpg);
			background-position:  center bottom;
			background-repeat:repeat-x;
		
		 }
		 
		table{
			background-color: #a7cece;
			border-color:  grey;
			border-style:double;
			border-width:10px;
			padding: 100px;
			margin-left: 100px;	
			}
			
		h1 {font-family: Verdana;
			margin-left:100px;
			}
			
		h2	{font-family: Verdana;
			font-size: 35px;
			color:greenyellow;
			margin-left: 100px;
			
		}
		td	{
			vertical-align: top;
			padding-bottom: 15px;
			padding-right: 20px;
		}
		
		ul   {
			font-family: Verdana;
			margin-left: 100px;
			color: lightsteelblue;
			font-weight: bold;
			font-size: 24px;
			
		}
	
				 
	</style>

</head>
<body>

<?php>
	<h2>Login</h2>
		
		<form method = 'POST' action = '/users/p_login'>
			<table>
				
				
				<tr>	
					<td>Email: </td>
						<td>
						<input type ='text'name ='email'><br>
						</td>
				</tr>
				<tr>	
					<td>Password:</td>
						<td>
						<input type ='password' name ='password'><br>
						</td>
				</tr>
				<?php if(isset($error)):?>
					<div class ='error'>
					
						Login failed. Please check your email / password
					</div><br>
				<?php endif; ?>	
					
				<tr>
					<th></th>					
						<td><input type ='submit' = value = 'Login'></td>
				</tr>	
			</table>
		</form>
		
</body>
</html>