<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title> signup</title>

<style type="text/css">
	
	
	
body	{	background-image: url(../images/lv.jpg);
			background-position:  center bottom;
			background-repeat:repeat-x;
		
		 }
		 
		table{
			background-color: lightblue;
			border-color:  grey;
			border-style:double;
			border-width:10px;
			padding: 100px;
			margin-left: 100px;
			font-size:18px;	
			font-color:slategrey;	
			}
			
		h1 {font-family: Verdana;
			margin-left:105px;
			}
			
		h2	{font-family: Verdana;
			font-size: 35px;
			color:greenyellow;
			margin-left: 105px;
			
		}
		td	{
			vertical-align: top;
			padding-bottom: 15px;
			padding-right: 20px;
		}
		
		ul   {
			font-family: Verdana;
			margin-left: 100px;
			color: grey;
			font-weight: bold;
			font-size: 24px;
			
		}
		
</style>
</head>
<body>


<?php>
	<h2>Sign Up</h2>
		<form method = 'POST' action = '/users/p_signup'>
			<table>
				<tr>
					<td>First Name</td>
						<td>
						<input type ='text'name ='first_name'><br>
						</td>
				</tr>	
				<tr>
					<td>Last Name</td>	
					<td>
					<input type ='text'name ='last_name'><br>
					</td>
				</tr>	
				<tr>
					<td>Email </td>		
					<td>
					<input type ='text'name ='email'><br>
					</td>
				</tr>	
				<tr>	
					<td>Password</td>	
					<td>
					<input type ='password' name ='password'><br>
					</td>
				</tr>
 <?php if(isset($error) && $error == 'blank-fields'): ?>
        <div class='error'>
            Signup Failed. All fields are required.
        </div>
        

    <?php endif; ?>

    <?php if(isset($error) && $error == 'email-exists'): ?>
        <div class='error'>
            There is already an account associated with this email. 
            <a href="/users/login">Login</a>
        </div>
        

    <?php endif; ?>
				<tr>	<th></th>
					<td><input type ='submit' = value = 'Sign Up'></td>
				</tr>	
			</table
		</form>


	
		
</body>
</html>